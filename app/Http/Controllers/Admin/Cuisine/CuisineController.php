<?php

namespace App\Http\Controllers\Admin\Cuisine;

use App\Models\Cuisines;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Auth;
use Session;
use validate;
use DB;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  Cuisines::get();
        return view('Admin.Cuisine.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Cuisine.create');
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
            'cuisine_name'=>'required',
            'cuisine_image'=>'mimes:jpeg,png,gif,jpg'
        ]);

        $data = $request->all();

        if ($request->hasFile('cuisine_image')) {

            $file = $request->file('cuisine_image');
            $filename = 'cuisine-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/cuisine', $filename);
            $data['cuisine_image'] = $filename;
        }
        $cuisine = new Cuisines();
        $cuisine->fill($data);
        if ($cuisine->save()) {
            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Cuisine Added Successfully.!! </div>');
            return redirect('admin/cuisine');
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
        $data = Cuisines::findorFail($id);
        return view('Admin.Cuisine.edit',compact('data'));
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
            'cuisine_name'=>'required',
            'cuisine_image'=>'mimes:jpeg,png,gif,jpg'
        ]);

        $data = $request->all();
        $data = $request->except('_token', '_method');

        if ($request->hasFile('cuisine_image')) {

            $oldimage = Cuisines::where('id', $id)->value('cuisine_image');

            if (!empty($oldimage)) {

                File::delete('public/upload/cuisine/' . $oldimage);
            }

            $file = $request->file('cuisine_image');
            $filename = 'cuisine-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/cuisine', $filename);
            $data['cuisine_image'] = $filename;
        }

        $cuisine = Cuisines::where('id',$id)->update($data);
        if ($cuisine) {
            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Cuisine Updated Successfully.!! </div>');
            return redirect('admin/cuisine');
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
        
        $oldimage = Cuisines::where('id', $id)->value('cuisine_image');
        if (!empty($oldimage)) {

            File::delete('public/upload/cuisine/' . $oldimage);
        }
        $cuisine = Cuisines::where('id', $id)->delete();

        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Cuisine Deleted Successfully.!! </div>');

        return \redirect('admin/cuisine');
    }

    /**
     * Change Status Data
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeStatus($id){

        $staus = Cuisines::where('id', $id)->first();

        if (!empty($staus)) {
            $upstatus['status'] = $staus['status'] == 'active' ? 'inactive' : 'active';
            $update = Cuisines::where('id', $id)->update($upstatus);
        }

        return \redirect('admin/cuisine');
    }
}
