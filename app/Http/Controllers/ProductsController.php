<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();

        return view('product.products', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::arrayForSelect();

        $this->data['mood'] = 'create';
        $this->data['headline'] = ' Add new products';

        return view('product.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        if (Product::create($data)) {

            Session::flash('message', ' Product added Successfully');

        };

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::find($id);

        return view('product.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product'] = Product::findOrFail($id);
        $this->data['categories'] = Category::arrayForSelect();
        $this->data['mood'] = 'edit';

        return view('product.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $product = Product::findOrFail($id);

        $product->category_id = $data['category_id'];
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->cost_price = $data['cost_price'];
        $product->price = $data['price'];

        if ($product->save()) {

            Session::flash('message', ' Product data Updated Successfully');

        };

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Product::find($id)->delete()) {

            Session::flash('message', ' Product Deleted');

        };

        return redirect('products');
    }
}
