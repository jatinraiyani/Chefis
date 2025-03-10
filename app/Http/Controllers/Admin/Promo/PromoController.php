<?php

namespace App\Http\Controllers\Admin\Promo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Session;
use Auth;
use validate;

class PromoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data =  Promocode::get();

      return view('Admin.Promo.index',compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('Admin.Promo.create');
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
          'name'=>'required|unique:promocode',
          'value'=>'required|numeric',
          'time_per_user'=>'required|numeric',
          'start_date'=>'required',
          'end_date'=>'required'
      ]);

      $data = $request->all();
      $promo = new Promocode();
      $promo->fill($data);
      if ($promo->save()) {
          Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Promocode Added Successfully.!! </div>');
          return redirect('admin/promo');
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
      $data = Promocode::findorFail($id);
      return view('Admin.Promo.edit',compact('data'));
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
        'name'=>'required|unique:promocode,name,'.$id,
        'value'=>'required|numeric',
        'time_per_user'=>'required|numeric',
        'start_date'=>'required',
        'end_date'=>'required'
    ]);

      $data = $request->all();
      $data = $request->except('_token', '_method');

      $update = Promocode::where('id',$id)->update($data);
      if ($update) {
          Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Promocode Updated Successfully.!! </div>');
          return redirect('admin/promo');
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

      $delete = Promocode::where('id', $id)->delete();

      Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Promocode Deleted Successfully.!! </div>');

      return redirect('admin/promo');
  }

  /**
   * Change Status Data
   * @param $id
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function changeStatus($id){

      $staus = Promocode::where('id', $id)->first();

      if (!empty($staus)) {
          $upstatus['status'] = $staus['status'] == 'active' ? 'inactive' : 'active';
          $update = Promocode::where('id', $id)->update($upstatus);
      }

      return redirect('admin/promo');
  }
}
