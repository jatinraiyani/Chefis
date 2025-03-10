<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Auth;
use Session;
use validate;
use DB;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::get();
        return view('Admin.Category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chef = ['' => 'Select Chef'] + User::chefusers()->where('status','active')->pluck('name','id')->all();
        return view('Admin.Category.create',compact('chef'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
            'category_image'=>'mimes:jpeg,png,gif,jpg'
        ]);

        $data = $request->all();

        if ($request->hasFile('category_image')) {

            $file = $request->file('category_image');
            $filename = 'category-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/category', $filename);
            $data['category_image'] = $filename;
        }
        $category = new Category();
        $category->fill($data);
        if ($category->save()) {
            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Category Added Successfully.!! </div>');
            return redirect('admin/category');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::findorFail($id);
        $chef = ['' => 'Select Chef'] + User::chefusers()->where('status','active')->pluck('name','id')->all();
        return view('Admin.Category.edit',compact('data','chef'));
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
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
            'category_image'=>'mimes:jpeg,png,gif,jpg'
        ]);

        $data = $request->all();
        $data = $request->except('_token', '_method');

        if ($request->hasFile('category_image')) {

            $oldimage = Category::where('id', $id)->value('category_image');

            if (!empty($oldimage)) {

                File::delete('public/upload/category/' . $oldimage);
            }

            $file = $request->file('category_image');
            $filename = 'category-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/category', $filename);
            $data['category_image'] = $filename;
        }

        $category = Category::where('id',$id)->update($data);
        if ($category) {
            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Category Updated Successfully.!! </div>');
            return redirect('admin/category');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldimage = Category::where('id', $id)->value('category_image');

        if (!empty($oldimage)) {

            File::delete('public/upload/category/' . $oldimage);
        }

        $user = Category::where('id', $id)->delete();

        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Category Deleted Successfully.!! </div>');

        return \redirect('admin/category');
    }

    /**
     * Change Status Data
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeStatus($id){

        $staus = Category::where('id', $id)->first();

        if (!empty($staus)) {
            $upstatus['status'] = $staus['status'] == 'active' ? 'inactive' : 'active';
            $update = Category::where('id', $id)->update($upstatus);
        }

        return \redirect('admin/category');
    }
}
