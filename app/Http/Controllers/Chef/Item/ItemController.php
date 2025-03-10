<?php

namespace App\Http\Controllers\Chef\Item;

use App\Models\Category;
use App\Models\Cuisines;
use App\Models\ItemCuisine;
use App\Models\ItemOnDemand;
use App\Models\ItemTiming;
use App\Models\Item;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Auth;
use Session;
use validate;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::where('chef_id',Auth::user()->id)->get();
        return view('Chef.Item.index',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chef = ['' => 'Select Chef'] + User::chefusers()->where('status','active')->pluck('name','id')->all();
        $category = ['' => 'Select Category'] + Category::where('chef_id',Auth::user()->id)->where('status','active')->pluck('category_name','id')->all();
        $cuisine = Cuisines::where('status','active')->get();
        return view('Chef.Item.create',compact('chef','category','cuisine'));
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
            'chef_id'=>'required',
//            'category_id'=>'required',
            'item_name'=>'required',
            'item_price'=>'required|numeric',
            'item_preparation_time'=>'required',
            'item_image'=>'required|mimes:jpeg,png,gif,jpg,webp'
        ]);

        $data = $request->all();
        $data = $request->except('_method','_token','cuisines','days','start_time','end_time','status','f_start_time','f_end_time','f_qty',
            's_start_time','s_end_time','s_qty','d_status','d_status','deliver_day','d_time','d_qty');

        if ($request->hasFile('item_image')) {

            $file = $request->file('item_image');
            $filename = 'item-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/item', $filename);
            $data['item_image'] = $filename;
        }

        $item = new Item();
        $item->fill($data);
        if($item->save()){

            /**
             * Item Cuisines
             */
            $cuisine = $request->get('cuisines');
            for ($i = 0; $i < count($cuisine); $i++) {
                $insert_cuisine = array(
                    'item_id'=> $item->id,
                    'cuisine_id'=>$cuisine[$i]
                );

                $insert_cuisine_field = ItemCuisine::insert($insert_cuisine);
            }

            /**
             * Item on Demand
             */
            $on_day = $request->get('days');
            $status = $request->get('status');
            $status1 = $request->get('status1');
            $f_start_time = $request->get('f_start_time');
            $f_end_time = $request->get('f_end_time');
            $f_qty = $request->get('f_qty');
            $s_start_time = $request->get('s_start_time');
            $s_end_time = $request->get('s_end_time');
            $s_qty = $request->get('s_qty');

            for ($i = 0; $i < count($on_day); $i++) {
                if (array_key_exists($on_day[$i],$status1))
                  {

                    $insertrecord_ondemand_hours = array(
                        "item_id" => $item->id,
                        "day" => $on_day[$i],
                        "first_open" => $f_start_time[$on_day[$i]][0],
                        "first_close" => $f_end_time[$on_day[$i]][0],
                        "first_qty" => $f_qty[$on_day[$i]][0],
                        "second_open" => $s_start_time[$on_day[$i]][0],
                        "second_close" => $s_end_time[$on_day[$i]][0],
                        "second_qty" => $s_qty[$on_day[$i]][0],
                        "status" => $status[$on_day[$i]][0] == null ? 'close' :$status[$on_day[$i]][0],
                    );

                  }
                else
                  {
                        $insertrecord_ondemand_hours = array(
                        "item_id" => $item->id,
                        "day" => $on_day[$i],
                        "first_open" => '00:00',
                        "first_close" => '00:00',
                        "first_qty" => 0,
                        "second_open" => '00:00',
                        "second_close" => '00:00',
                        "second_qty" => 0,
                        "status" => 'close',
                     );
                  }

                $insert_time_field_hours = ItemOnDemand::insert($insertrecord_ondemand_hours);
            }

            /**
             * Item on schdule event
             */
            $days = $request->get('d_days');
            $start_time = $request->get('start_time');
            $end_time = $request->get('end_time');
            $d_status = $request->get('d_status');
            $d_status1 = $request->get('d_status1');

            $deliver_day = $request->get('deliver_day');
            $d_time = $request->get('d_time');
            $d_qty = $request->get('d_qty');

            for ($i = 0; $i < count($days); $i++) {

                if (array_key_exists($days[$i],$d_status1))
                  {

                    $insertrecord_time_hours = array(
                        "item_id" => $item->id,
                        "day" => $days[$i],
                        "open" => $start_time[$days[$i]][0],
                        "close" => $end_time[$days[$i]][0],                        
                        "delivered_day" => $deliver_day[$days[$i]][0],
                        "delivered_time" => $d_time[$days[$i]][0],
                        "qty" => $d_qty[$days[$i]][0],
                        "status" => $d_status[$days[$i]][0] == null ? 'close' :$d_status[$days[$i]][0],
                    );

                  }
                else
                  {
                        $insertrecord_time_hours = array(
                        "item_id" => $item->id,
                        "day" => $days[$i],
                        "open" => '00:00',
                        "close" => '00:00',
                        "delivered_day" => null,
                        "delivered_time" => null,
                        "qty" => 0,
                        "status" => 'close',
                     );
                  }
                $insert_time_field_hours = ItemTiming::insert($insertrecord_time_hours);
            }

            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Items Added Successfully.!! </div>');
            return redirect('chef-admin/item');
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
        $chef = ['' => 'Select Chef'] + User::chefusers()->where('status','active')->pluck('name','id')->all();
        $category = ['' => 'Select Category'] + Category::where('chef_id',Auth::user()->id)->where('status','active')->pluck('category_name','id')->all();
        $item_time = ItemTiming::where('item_id',$id)->get();
        $data = Item::findorFail($id);
        $item_cuisines = ItemCuisine::where('item_id',$id)->select('cuisine_id')->get();
        $item_on_demands = ItemOnDemand::where('item_id',$id)->get();
        $cuisine = Cuisines::where('status','active')->get();
        $item_cuisine = array();
        foreach ($item_cuisines as $row){
            $item_cuisine[] = $row['cuisine_id'];
        }

        if(Auth::user()->id == $data['chef_id']){
            return view('Chef.Item.edit',compact('data','chef','category','item_time','cuisine','item_cuisine','item_on_demands'));
        } else {
            return redirect('chef-admin/item');
        }
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
            'chef_id'=>'required',
//            'category_id'=>'required',
            'item_name'=>'required',
            'item_price'=>'required|numeric',
            'item_preparation_time'=>'required',
            'item_image'=>'mimes:jpeg,png,gif,jpg,webp'
        ]);

        $data = $request->all();
        $data = $request->except('_method','_token','cuisines','days','start_time','end_time','status','status1','f_start_time','f_end_time','f_qty',
            's_start_time','s_end_time','s_qty','d_status','d_status1','deliver_day','d_time','d_qty','d_days');

        if ($request->hasFile('item_image')) {

            $oldimage = Item::where('id', $id)->value('item_image');
            if (!empty($oldimage)) {
                File::delete('public/upload/item/' . $oldimage);
            }

            $file = $request->file('item_image');
            $filename = 'item-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/item', $filename);
            $data['item_image'] = $filename;
        }

        $item = Item::where('id',$id)->update($data);

        if($item){

            /**
             * Item Cuisines
             */
            $cuisine = $request->get('cuisines');

            $deletecuisine = ItemCuisine::where('item_id',$id)->delete();
            for ($i = 0; $i < count($cuisine); $i++) {
                $insert_cuisine = array(
                    'item_id'=> $id,
                    'cuisine_id'=>$cuisine[$i]
                );

                $insert_cuisine_field = ItemCuisine::insert($insert_cuisine);
            }


            /**
             * Item on Demand
             */
            $on_day = $request->get('days');
            $status = $request->get('status');
            $status1 = $request->get('status1');
            $f_start_time = $request->get('f_start_time');
            $f_end_time = $request->get('f_end_time');
            $f_qty = $request->get('f_qty');
            $s_start_time = $request->get('s_start_time');
            $s_end_time = $request->get('s_end_time');
            $s_qty = $request->get('s_qty');



            $deleteItemOnDemand = ItemOnDemand::where('item_id',$id)->delete();

            for ($i = 0; $i < count($on_day); $i++) {
                if (array_key_exists($on_day[$i],$status1))
                  {

                    $insertrecord_ondemand_hours = array(
                        "item_id" => $id,
                        "day" => $on_day[$i],
                        "first_open" => $f_start_time[$on_day[$i]][0],
                        "first_close" => $f_end_time[$on_day[$i]][0],
                        "first_qty" => $f_qty[$on_day[$i]][0],
                        "second_open" => $s_start_time[$on_day[$i]][0],
                        "second_close" => $s_end_time[$on_day[$i]][0],
                        "second_qty" => $s_qty[$on_day[$i]][0],
                        "status" => $status[$on_day[$i]][0] == null ? 'close' :$status[$on_day[$i]][0],
                    );

                  }
                else
                  {
                        $insertrecord_ondemand_hours = array(
                        "item_id" => $id,
                        "day" => $on_day[$i],
                        "first_open" => '00:00',
                        "first_close" => '00:00',
                        "first_qty" => 0,
                        "second_open" => '00:00',
                        "second_close" => '00:00',
                        "second_qty" => 0,
                        "status" => 'close',
                     );
                  }
                /*$insertrecord_ondemand_hours = array(
                    "item_id" => $id,
                    "day" => $on_day[$i],
                    "first_open" => $f_start_time[$i],
                    "first_close" => $f_end_time[$i],
                    "first_qty" => $f_qty[$i],
                    "second_open" => $s_start_time[$i],
                    "second_close" => $s_end_time[$i],
                    "second_qty" => $s_qty[$i],
                    "status" => $status[$i] == null ? 'close' :$status[$i],
                );*/

                $insert_time_field_hours = ItemOnDemand::insert($insertrecord_ondemand_hours);
            }


            /**
             * Item on schdule event
             */
            $days = $request->get('d_days');
            $start_time = $request->get('start_time');
            $end_time = $request->get('end_time');
            $d_status = $request->get('d_status');
            $d_status1 = $request->get('d_status1');
            $deliver_day = $request->get('deliver_day');
            $d_time = $request->get('d_time');
            $d_qty = $request->get('d_qty');

            $deleteItemTiming = ItemTiming::where('item_id',$id)->delete();
            for ($i = 0; $i < count($days); $i++) {
                if (array_key_exists($days[$i],$d_status1))
                  {

                    $insertrecord_time_hours = array(
                        "item_id" => $id,
                        "day" => $days[$i],
                        "open" => $start_time[$days[$i]][0],
                        "close" => $end_time[$days[$i]][0],
                        "delivered_day" => $deliver_day[$days[$i]][0],
                        "delivered_time" => $d_time[$days[$i]][0],
                        "qty" => $d_qty[$days[$i]][0],
                        "status" => $d_status[$days[$i]][0] == null ? 'close' :$d_status[$days[$i]][0],
                    );

                  }
                else
                  {
                        $insertrecord_time_hours = array(
                        "item_id" => $id,
                        "day" => $days[$i],
                        "open" => '00:00',
                        "close" => '00:00',
                        "delivered_day" => null,
                        "delivered_time" => null,
                        "qty" => 0,
                        "status" => 'close',
                     );
                  }
                /*$insertrecord_time_hours = array(
                    "item_id" => $id,
                    "day" => $days[$i],
                    "open" => $start_time[$i],
                    "close" => $end_time[$i],
                    "qty" => $d_qty[$i],
                    "delivered_day" => $days[$i],
                    "delivered_time" => $d_time[$i],
                    "qty" => $d_qty[$i],
                    "status" => $d_status[$i] == null ?'close' :$d_status[$i],
                );*/

                $insert_time_field_hours = ItemTiming::insert($insertrecord_time_hours);
            }


            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Items Updated Successfully.!! </div>');
            return redirect('chef-admin/item');
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
        $oldimage = Item::where('id', $id)->value('item_image');
        if (!empty($oldimage)) {
            File::delete('public/upload/item/' . $oldimage);
        }

        $item = Item::where('id', $id)->delete();
        $itemTiming = ItemTiming::where('item_id', $id)->delete();
        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Item Deleted Successfully.!! </div>');

        return \redirect('chef-admin/item');
    }

    /**
     * Change Status Data
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeStatus($id){

        $staus = Item::where('id', $id)->first();

        if (!empty($staus)) {
            $upstatus['status'] = $staus['status'] == 'active' ? 'inactive' : 'active';
            $update = Item::where('id', $id)->update($upstatus);
        }

        return \redirect('chef-admin/item');
    }
}
