<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShoppingCartController extends Controller
{
    // Display the shopping cart page (index method)
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        // Calculate total price
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('frontend.shoping-cart', compact('cart', 'total'));
    }

    // Add product to cart
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('shop.index')->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        // If product exists in the cart, increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Add the product to the cart
            $cart[$id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
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

            // Update the quantity of the product
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
    
    // Checkout process
    public function checkout()
    {
        // Implement checkout logic here
        return view('frontend.checkout');
    }
 

    
    // Search functionality for products
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'LIKE', "%{$searchTerm}%")->get();

        return view('frontend.search-results', compact('products'));
    }
}
