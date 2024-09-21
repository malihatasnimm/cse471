<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('shop.index')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        // If product already in cart, increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Otherwise, add the product to cart
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update product quantity in cart
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]['quantity'] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully!');
        }

        return redirect()->back();
    }

    // Remove product from cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        session()->flash('success', 'Product removed successfully!');
        return redirect()->back();
    }

    // View cart
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $cartTotal = $this->getCartTotal();
        return view('cart', compact('cart', 'cartTotal'));
    }

    // Checkout process
    public function checkout()
    {
        $cartTotal = $this->getCartTotal();
        return view('checkout', compact('cartTotal'));
    }

    // Search for products
    public function search(Request $request)
    {
        $query = $request->input('search');

        // Perform a search for products based on the name
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        return view('frontend.search-results', compact('products'));
    }

    // Helper function to calculate the total cart value
    private function getCartTotal()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }
}
