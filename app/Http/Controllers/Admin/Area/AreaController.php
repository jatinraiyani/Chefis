<?php

namespace App\Http\Controllers\Admin\Area;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Auth;
use Session;
use validate;
use DB;

class AreaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data =  Area::get();
      return view('Admin.Area.index',compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('Admin.Area.create');
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
          'area_name'=>'required|unique:area',
          'availability'=>'required'
      ]);

      // start get lat-lon

       $add = $request->area_name;
       $prepAddr = str_replace(' ','+',$add);
       $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDb5KGfWAckxCGpoBYfAxNvPuiez5r_rJw');
       $output= json_decode($geocode);
       if($output->results == NULL){

           return redirect()->back()->with('message','Please add Valid Address....!');

       }

       $data['area_name'] = $request->area_name;
       $data['availability'] = $request->availability;
       $data['lat'] = $output->results[0]->geometry->location->lat;
       $data['lon'] = $output->results[0]->geometry->location->lng;

      $area = new Area();
      $area->fill($data);
      if ($area->save()) {
          Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Area Added Successfully.!! </div>');
          return redirect('admin/area');
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
      $data = Area::findorFail($id);
      return view('Admin.Area.edit',compact('data'));
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
        'area_name'=>'required|unique:area,area_name,'.$id,
        'availability'=>'required'
    ]);

      // start get lat-lon

       $add = $request->area_name;
       $prepAddr = str_replace(' ','+',$add);
       $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDb5KGfWAckxCGpoBYfAxNvPuiez5r_rJw');
       $output= json_decode($geocode);
       if($output->results == NULL){

           return redirect()->back()->with('message','Please add Valid Address....!');

       }

       $data['area_name'] = $request->area_name;
       $data['availability'] = $request->availability;
       $data['lat'] = $output->results[0]->geometry->location->lat;
       $data['lon'] = $output->results[0]->geometry->location->lng;


      $update = Area::where('id',$id)->update($data);
      if ($update) {
          Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Area Updated Successfully.!! </div>');
          return redirect('admin/area');
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

      $delete = Area::where('id', $id)->delete();

      Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Area Deleted Successfully.!! </div>');

      return redirect('admin/area');
  }

  /**
   * Change Status Data
   * @param $id
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function changeStatus($id){

      $staus = Area::where('id', $id)->first();

      if (!empty($staus)) {
          $upstatus['availability'] = $staus['availability'] == 'yes' ? 'no' : 'yes';
          $update = Area::where('id', $id)->update($upstatus);
      }

      return redirect('admin/area');
  }
}
