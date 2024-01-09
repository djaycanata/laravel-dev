<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\dd;

class ShopController extends Controller
{
    public function index($userID)
    {
        // Assuming 'id' is the primary key column for the users table
        // $user = User::findOrFail($userID);
        $user = User::find($userID, ['userID']);
        $products = Product::all();
        return view('shop.index', compact('products', 'user'));
    }

    public function purchase(Request $request)
    {
        // Validate the form data
        $request->validate([
            'productName' => 'required|string|max:255',
            'quantities.*' => 'required|numeric',
            'totalAmount' => 'required|numeric',
        ]);


        // Implement your purchase logic here
        // Loop through the submitted quantities and perform necessary actions
        foreach ($request->quantities as $productId => $quantity) {
            if ($quantity > 0) {
                // Perform actions for each product being purchased
                // For example, insert into the transactions table

                // Uncomment the below lines after verifying the data

                // var_dump($request->all());
                dd($request->all());
                var_dump($request->all());
                print_r($request->all());

                // Product::create([
                //     'productName' => $request->productName,
                //     'price' => $request->price,
                //     'stocks' => $request->stocks,
                // ]);

                // return redirect()->route('products.index')->with('success', 'Product added successfully.');
            }
        }

        // Redirect back with a success message
        return redirect()->route('shop.index', ['userID' => $request->userID])->with('success', 'Purchase completed successfully.');
    }
}
