<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\ChefCuisines;
use App\Models\ChefDetails;
use App\Models\Cuisines;
use App\Models\DriverRequest;
use App\Models\Item;
use App\Models\LoginLog;
use App\Models\Order;
use App\Models\UserWishlist;
use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;
use Session;
use Validate;
use File;

class UserController extends Controller
{
    /**
     * Admin List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = User::adminusers()->get();
        $page = 'Admin';
        return view('Admin.User.index', compact('data', 'page'));
    }

    /**
     * Chef List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ChefUsers()
    {
        $data = User::chefusers()->get();
        foreach ($data as $row){
            $total_rating = array_sum(array_column($row->rating_data->toArray(), 'rating'));
            if ($total_rating != 0 && count($row->rating_data->toArray()) > 0) {
                $row['rating'] = $total_rating / count($row->rating_data->toArray());
            } else {
                $row['rating'] = 0;
            }
        }

        return view('Admin.User.page.chef', compact('data'));
    }

    /**
     * User List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Users()
    {
        $data = User::users()->get();
        foreach ($data as $row){
            $row['totalSpend'] = Order::where('user_id',$row->id)
                ->where('order_status','delivered')
                ->count('order_final_total');

            $paymentMethods = Order::where('user_id',$row->id)->groupBy('payment_method')->select('payment_method')->get();

            // $row['payment_method'] = '-';
            // if(count($paymentMethods) > 0){
            //     $row['payment_method'] = implode(',',$paymentMethods->payment_method);
            // }

            $row['last_login'] = LoginLog::where('user_id',$row->id)->orderBy('id','DESC')->value('date');
            $row['totalMonthlySpend'] = Order::where('user_id',$row->id)
                ->where('order_status','delivered')
                ->whereMonth('updated_at',\Carbon\Carbon::now()->format('m'))
                ->count('order_final_total');
        }

        return view('Admin.User.page.user', compact('data'));
    }

    /**
     * Driver List
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Driver()
    {
        $data = User::driverusers()->get();
        foreach ($data as $row){
            $row['total_tips'] = DriverRequest::where('user_id',$row->id)->whereNotIn('order_status',['pending','reject','cancel'])->count();
            $row['km_driven'] = 10;
            $row['last_login'] = LoginLog::where('user_id',$row->id)->orderBy('id','DESC')->value('date');
        }

        return view('Admin.User.page.driver', compact('data'));
    }

    /**
     * User Create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($type)
    {

        // $role = ['' => 'Select Role'] + Role::pluck('display_name', 'id')->all();
        $cusinies = Cuisines::where('status','active')->pluck('cuisine_name','id')->all();
        return view('Admin.User.create', compact('cusinies','type'));
    }

    /**
     * User Store
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required|numeric',
            'user_role' => 'required',
            'profile_pic' => 'mimes:jpeg,png,gif,jpg'
        ]);

        if($request['user_role'] == 'chef'){
          $this->validate($request, [
              'cusinies' => 'required',
              'is_hyginic_course' => 'required',
              'year_of_experience' => 'required',
              'resturant_name' => 'required',
              'specialities' => 'required',
              'account_no' => 'required',
              'bank_name' => 'required',
              'about_chef' => 'required',
              'hyginic_course' => 'mimes:jpeg,png,gif,jpg,pdf',
          ]);

        }


        $data = $request->all();
        $data['password'] = Hash::make(uniqid());
        $data['is_password_change'] = 'true';
        if($request['user_role'] == 'chef') {
            $data['status'] = 'inactive';
        }

        if ($request->hasFile('profile_pic')) {

            $file = $request->file('profile_pic');
            $filename = 'user-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/user', $filename);
            $data['profile_img'] = $filename;
        }

        $user = new User();
        $user->fill($data);
        if ($user->save()) {
          // role attachment logic by JATIN start
          if($request->user_role == 'user'){
            $request['user_role'] = 2;
          }else if($request->user_role == 'chef'){
            $request['user_role'] = 3;
          } else {
            $request['user_role'] = 4;
          }
          // role End
            $clientrole = Role::where('id', $request['user_role'])->first();
            $user->attachRole($clientrole);
            if($request['user_role'] == 3){
                $cusinies = $request['cusinies'];
                for ($i = 0; $i < count($cusinies); $i++) {
                    $cusiniesData = array(
                        "user_id" => $user->id,
                        "cuisine_id" => $cusinies[$i]
                    );

                    $insert_time_field_hours = new ChefCuisines();
                    $insert_time_field_hours->fill($cusiniesData);
                    $insert_time_field_hours->save();
                }

                $chef_details['year_of_experience'] = $request['year_of_experience'];
                $chef_details['resturant_name'] = $request['resturant_name'];
                $chef_details['specialities'] = $request['specialities'];
                $chef_details['about_chef'] = $request['about_chef'];
                $chef_details['is_hyginic_course'] = $request['is_hyginic_course'];
                if($request['is_hyginic_course'] == 'yes'){
                    if ($request->hasFile('hyginic_course')) {

                        $file = $request->file('hyginic_course');
                        $filename = 'user-hyginic_course-' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move('public/upload/user/chef', $filename);
                        $chef_details['hyginic_course'] = $filename;
                    }
                }
                $chef_details['chef_id'] = $user->id;
                $chef_data = new ChefDetails();
                $chef_data->fill($chef_details);
                $chef_data->save();

            }



            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> ' . $clientrole['display_name'] . ' Added Successfully.!! </div>');

            if ($clientrole['name'] == 'admin') {
                return redirect('admin/user-admin');
            } elseif ($clientrole['name'] == 'user') {
                return redirect('admin/user');
            } elseif ($clientrole['name'] == 'chef') {
                return redirect('admin/user-chef');
            } elseif ($clientrole['name'] == 'driver') {
                return redirect('admin/user-driver');
            }

        }
    }

    /**
     * User Show
     */
    public function show($id){
        $data = User::findorFail($id);
        $order = Order::where('chef_id',$id)->get();
        $totalpurchase = Order::where('chef_id',$id)->where('payment_status','success')->sum('order_final_total');
        $totalOrder = count($order);
        $totalItem = Item::where('chef_id',$id)->count();
        if($data->roles->first()->name == 'user'){
            $wishlist = UserWishlist::where('user_id',$id)->get();
            $totalwishlist = count($wishlist);
            $totalpurchase = Order::where('user_id',$id)->where('payment_status','success')->sum('order_final_total');
            $order = Order::where('user_id',$id)->get();
            $totalOrder = count($order);
            return view('Admin.User.view',compact('data','wishlist','order','totalpurchase','totalwishlist','totalOrder'));
        }
        return view('Admin.User.chef_view',compact('data','order','totalpurchase','totalOrder','totalItem'));
    }


    /**
     * User Edit
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
      public function edit($id)
       {
        $data = User::findorFail($id);
        $role = ['' => 'Select Role'] + Role::whereNotIn('id',['1'])->pluck('display_name', 'id')->all();
        $cusinies = Cuisines::where('status','active')->pluck('cuisine_name','id')->all();
        $selectedCusinies = ChefCuisines::where('user_id',$id)->pluck('cuisine_id');
        $chefDetails = array();
        if($data->roles->first()->id == 3){
            $chefDetails = ChefDetails::where('chef_id',$id)->first();
        }

        return view('Admin.User.edit', compact('data', 'role','cusinies','chefDetails','selectedCusinies'));
    }

    /**
     * User Update
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'phone_number' => 'required|numeric',
            'user_role' => 'required',
            'profile_pic' => 'mimes:jpeg,png,gif,jpg'
        ]);

        if($request['user_role'] == 3){
          $this->validate($request, [
              'cusinies' => 'required',
              'is_hyginic_course' => 'required',
              'year_of_experience' => 'required',
              'resturant_name' => 'required',
              'specialities' => 'required',
              'account_no' => 'required',
              'bank_name' => 'required',
              'about_chef' => 'required',
              'hyginic_course' => 'mimes:jpeg,png,gif,jpg,pdf',
          ]);

        }

        $data = $request->all();
        $data = $request->except('_token', '_method', 'user_role', 'profile_pic');

        if ($request->hasFile('profile_pic')) {

            $oldimage = User::where('id', $id)->value('profile_img');

            if (!empty($oldimage)) {
                File::delete('public/upload/user/' . $oldimage);
            }

            $file = $request->file('profile_pic');
            $filename = 'user-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('public/upload/user', $filename);
            $userData['profile_img'] = $filename;

        }

        $userData['name'] = $request->name;
        $userData['email'] = $request->email;
        $userData['phone_number'] = $request->phone_number;
        $userData['address'] = $request->address;
        $userData['zipcode'] = $request->zipcode;
        $userData['lat'] = $request->lat;
        $userData['lang'] = $request->lang;
        $userData['status'] = $request->status;
        $userData['account_no'] = $request->account_no;
        $userData['bank_name'] = $request->bank_name;

        $user = User::where('id', $id)->update($userData);

        if ($user) {

            $updateRole = DB::table('role_user')->where('user_id', $id)->update(['role_id' => $request['user_role']]);
            $clientrole = Role::where('id', $request['user_role'])->first();

            if($request['user_role'] == 3){

                $cusinies = $request['cusinies'];
                $deleteCuisine = ChefCuisines::where('user_id',$id)->delete();
                for ($i = 0; $i < count($cusinies); $i++) {
                    $cusiniesData = array(
                        "user_id" => $id,
                        "cuisine_id" => $cusinies[$i]
                    );

                    $insert_time_field_hours = new ChefCuisines();
                    $insert_time_field_hours->fill($cusiniesData);
                    $insert_time_field_hours->save();
                }

                $chef_details['year_of_experience'] = $request['year_of_experience'];
                $chef_details['resturant_name'] = $request['resturant_name'];
                $chef_details['specialities'] = $request['specialities'];
                $chef_details['about_chef'] = $request['about_chef'];
                $chef_details['is_hyginic_course'] = $request['is_hyginic_course'];
                if($request['is_hyginic_course'] == 'yes'){
                    if ($request->hasFile('hyginic_course')) {

                        $oldimages = ChefDetails::where('chef_id', $id)->value('hyginic_course');
                        if (!empty($oldimages)) {
                            File::delete('public/upload/user/chef/' . $oldimages);
                        }


                        $files = $request->file('hyginic_course');
                        $filenames = 'user-hyginic_course-' . uniqid() . '.' . $files->getClientOriginalExtension();
                        $files->move('public/upload/user/chef', $filenames);
                        $chef_details['hyginic_course'] = $filenames;
                    }
                }
                $chef_details['chef_id'] = $id;
                $chef_data = ChefDetails::where('chef_id', $id)->update($chef_details);
            }

            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> ' . $clientrole['display_name'] . ' Updated Successfully.!! </div>');

             if($clientrole['name'] == 'user') {
                return redirect('admin/user');
            } elseif ($clientrole['name'] == 'chef') {
                return redirect('admin/user-chef');
            } elseif ($clientrole['name'] == 'driver') {
                return redirect('admin/user-driver');
            }

        }
    }

    /**
     * User Destroy
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $oldimage = User::where('id', $id)->value('profile_img');
        if (!empty($oldimage)) {
            File::delete('public/user/' . $oldimage);
        }
        $user = User::where('id', $id)->delete();
        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> User Deleted Successfully.!! </div>');
        return \redirect()->back();

    }

    /**
     * User Status Change
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id)
    {
        $staus = User::where('id', $id)->first();

        if (!empty($staus)) {
            $upstatus['status'] = $staus['status'] == 'active' ? 'inactive' : 'active';
            $update = User::where('id', $id)->update($upstatus);
        }
        Session::flash('message', '<div class="alert alert-success"><strong>Alert!</strong> Status Updated Successfully.!! </div>');
        return \redirect()->back();
    }
}
