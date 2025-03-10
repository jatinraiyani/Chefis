<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CmsController extends Controller
{
    public function index(){
        $data = CMS::get();
        return view('Admin.CMS.index',compact('data'));
    }

    public function edit($id){
        $data = CMS::findorFail($id);
        return view('Admin.CMS.edit',compact('data'));
    }

    public function update(Request $request,$id){
        
        $this->validate($request,[
           'title'=>'required',
           'slug'=>'required'
        ]);

        $data = $request->all();
        $data = $request->except('_token', '_method');

        $Cms = CMS::where('id',$id)->update($data);

        if($Cms){
            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> CMS Updated Successfully.!! </div>');
            return redirect('admin/cms');
        }
    }

}
