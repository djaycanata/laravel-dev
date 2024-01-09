<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\dd;
use Illuminate\Support\Facades\Validator;


class ShopController extends Controller
{
    public function index($userID)
    {
        // Assuming 'id' is the primary key column for the users table
        // $user = User::findOrFail($userID);
        // $user = User::find($userID, ['userID']);
        $user = User::find($userID);
        
        $products = Product::all();
        return view('shop.index', compact('products', 'user'));
    }

    public function purchase(Request $request)
    {
        // Validate the form data
        // $validator = Validator::make($request->all(), [
        //     'userID' => 'required|numeric',
        //     'productNames' => 'required|array',
        //     'productNames.*' => 'required|string|max:255',
        //     'quantities' => 'required|array',
        //     'quantities.*' => 'required|numeric|min:0',
        //     'totalAmount' => 'required|numeric',
        // ]);
        
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $transaction = new Transaction();
        $transaction->user_id = $request->user_id;
        
        
        dd($request->all());

       
        // Redirect back with a success message
        // return redirect()->route('shop.index', ['userID' => $request->userID])->with('success', 'Purchase completed successfully.');
        return redirect()->route('shop.index', ['userID' => $request->userID])->with('success', 'Purchase completed successfully.');

    }

}
