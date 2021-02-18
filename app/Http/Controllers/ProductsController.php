<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::get();

        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->nameproducts;
        $detail = $request->detail;
        $quantity = $request->quantity;
        $price = $request->price;
        $date = $request->expiredate;

        $products = new Products();
        $products->nameproducts = $name;
        $products->detail = $detail;
        $products->quantity = $quantity;
        $products->price = $price;
        $products->expiredate = $date;
        $products->save();
        return response()->json([
            'massage' => 'สำเร็จ',
            'data' => $products,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::select('nameproducts','detail','quantity','price','expiredate')
        ->where('id',$id)
        ->first()
        ;
            // return response($products);
        return response()->json([
            'code' => strval(200),
            'message' => 'เรียกดูสำเร็จ',
            'data' => $products,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
