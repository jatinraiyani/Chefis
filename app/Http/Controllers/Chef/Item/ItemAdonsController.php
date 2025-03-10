<?php

namespace App\Http\Controllers\Chef\Item;

use App\Models\Item;
use App\Models\ItemAdons;
use App\Models\ItemSubAdons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ItemAdonsController extends Controller
{
    public function index($id){
        $data = ItemAdons::where('item_id',$id)->get();
        foreach ($data as $row){
            $row['subadons'] = ItemSubAdons::where('adons_id',$row->id)->get();
        }

        return view('Chef.Item.Adons.index',compact('data','id'));
    }

    public function create($id){
        return view('Chef.Item.Adons.create',compact('id'));
    }

    public function store(Request $request,$id){
        $this->validate($request, [
            'title' => 'required',
            'box_type' => 'required',
            'box_validation' => 'required',
            'status' => 'required',
        ]);

        $getItem = Item::where('id',$id)->first();

        $data['title'] = $request['title'];
        $data['box_type'] = $request['box_type'];
        $data['box_validation'] = $request['box_validation'];
        $data['status'] = $request['status'];
        $data['item_id'] = $getItem['id'];

        $adons  = new ItemAdons();
        $adons->fill($data);
        if($adons->save()){

            $subname = $request['sub_name'];
            $subprice = $request['sub_price'];

            for($i=0;$i<count($subname);$i++){
                $value['name'] = $subname[$i];
                $value['price'] = $subprice[$i];
                $value['item_id'] = $getItem['id'];
                $value['adons_id'] = $adons['id'];
                $subadons = new ItemSubAdons();
                $subadons->fill($value);
                $subadons->save();
            }

            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Adons Added Successfully.!! </div>');

            return redirect('chef-admin/item/'.$id.'/adons');
        }

    }

    public function edit($item,$id){
        $data = ItemAdons::where('id',$id)->first();
        $subdata = ItemSubAdons::where('adons_id',$id)->get();
        return view('Chef.Item.Adons.edit',compact('id','data','subdata','item'));

    }

    public function update(Request $request,$item,$id){
        
        $this->validate($request, [
            'title' => 'required',
            'box_type' => 'required',
            'box_validation' => 'required',
            'status' => 'required',
        ]);

        
        
        $getItem = ItemAdons::where('id', $id)->first();

        $data['title'] = $request['title'];
        $data['box_type'] = $request['box_type'];
        $data['box_validation'] = $request['box_validation'];
        $data['status'] = $request['status'];

        $adons = ItemAdons::where('id', $id)->update($data);

        if ($adons) {

            $old_sur_id = $request['old_sub_id'];
            $old_sur_name = $request['old_sub_name'];
            $old_sur_price = $request['old_sub_price'];

            if (!empty($old_sur_id)) {
                $delete = ItemSubAdons::where('adons_id', $id)->whereNotIn('id', $old_sur_id)->delete();
                for ($j = 0; $j < count($old_sur_id); $j++) {
                    $old_data['name'] = $old_sur_name[$j];
                    $old_data['price'] = $old_sur_price[$j];

                    $updateSubAdons = ItemSubAdons::where('id', $old_sur_id[$j])->update($old_data);
                }
            }

            $subname = $request['sub_name'];
            $subprice = $request['sub_price'];

            for ($i = 0; $i < count($subname); $i++) {
                if (!empty($subname[$i])) {
                    $value['name'] = $subname[$i];
                    $value['price'] = $subprice[$i] == '' ? 0 : $subprice[$i];
                    $value['category_id'] = $getItem['category_id'];
                    $value['item_id'] = $getItem['item_id'];
                    $value['adons_id'] = $getItem['id'];
                    $subadons = new ItemSubAdons();
                    $subadons->fill($value);
                    $subadons->save();
                }

            }
            return redirect('chef-admin/item/'.$item.'/adons');
        }

    }

    public function destroy($item,$id){
        $data = ItemAdons::where('id',$id)->first();
        $dataDelete = ItemAdons::where('id',$id)->delete();
        return redirect('chef-admin/item/'.$item.'/adons');
    }
}
