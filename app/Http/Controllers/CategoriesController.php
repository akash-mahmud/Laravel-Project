<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();

        return view('category.categories', $this->data);
// return 'hellow from controller';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['headline'] = 'Add new category';
        $this->data['mode'] = 'create';
        return view('category.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $fromData = $request->all();
        if (Category::create($fromData)) {

            Session::flash('message', $fromData['title'] . ' added Successfully');
        };
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $this->data['category'] = Category::findOrFail($id);
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update category';

        return view('category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        $category = Category::findOrFail($id);

        $category->title = $request->get('title');
        $this->data['mode'] = 'edit';

        if ($category->save()) {

            Session::flash('message', ' Category Updated Successfully');

        };

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::find($id)->delete()) {

            Session::flash('message', ' Category Deleted Successfully');

        };

        return redirect('categories');
    }
}
