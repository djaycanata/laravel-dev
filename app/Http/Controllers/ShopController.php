<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\dd;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{
    public function index($userID)
    {
        // Assuming 'id' is the primary key column for the users table
        // $user = User::findOrFail($userID);
        // $user = User::find($userID, ['userID']);
        $user = User::find($userID);
        
        $products = Product::all();
        // $product = Product::find();

        return view('shop.index', compact('products', 'user'));
    }

    public function purchase(Request $request, $userID)
    {

        $user = User::find($userID);
        $productID = $request->input('productID');

        $userID = $user->userID;
        $productID = $request->productID;
        $selectedProductIDs = $request->input('productID', []);
        $quantities = $request->input('quantities', []);
        $totalAmount = $request->input('totalAmount');

        $productIDsJson = json_encode($selectedProductIDs);
        $quantitiesJson = json_encode($quantities);

        DB::insert(
            'INSERT INTO transactions (userID, productID, quantity, totalAmount, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())',
            [$userID, $productIDsJson, $quantitiesJson, $totalAmount]
        );

        // Generate a common transactionID for the entire transaction
        // $transactionID = $userID * 1000000 + time();

        // foreach ($selectedProductIDs as $index => $selectedProductID) {
        //     DB::insert(
        //         'INSERT INTO transactions (transactionID, userID, productID, quantity, totalAmount, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())',
        //         [$transactionID, $userID, $selectedProductID, $quantities[$index], $totalAmount]
        //     );
        // }
         

        // $validator = Validator::make($request->all(), [
        //     'userID' => 'required|numeric',
        //     'productID' => 'required|numeric',
        //     'productNames.*' => 'required|string|max:255',
        //     '.*' => 'required|numeric|min:0',
        //     'totalAmount' => 'required|numeric',
        // ]);
        
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        
        // // Extract data from the request
        // $userID = $user->userID;
        // $productID = $request->productID;
        // $productNames = $request->input('productNames');
        // $quantities = $request->input('quantities');
        // $totalAmount = $request->input('totalAmount');
        
        // // Create an array of records for bulk insertion
        // $records = [];
        // foreach ($selectedProductIDs as $index => $productID) {
        //     $records[] = [
        //         'userID' => $userID,
        //         'productID' => $productID,
        //         'quantity' => $quantities[$index],
        //         'totalAmount' => $totalAmount,
        //     ];
        // }
        
        // Perform the bulk insertion using a single SQL query
        // Transaction::insert($records);

        // dd($totalAmount);
        
        // Redirect back with a success message
        return redirect()->route('shop.index', ['userID' => $userID])->with('success', 'Purchase completed successfully.');
        


        
        // dd($request->all());
        // dd($request->productID);
        // dd($user->userID);
        // dd($userID);

       
        // Redirect back with a success message
        // return redirect()->route('shop.index', ['userID' => $request->userID])->with('success', 'Purchase completed successfully.');

    }

}
