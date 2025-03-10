<?php

namespace App\Http\Controllers\Chef\User;

use App\Models\ChefDetails;
use App\Models\Item;
use App\Models\Order;
use App\Models\UserWishlist;
use App\User;
use App\Models\ChefCuisines;
use App\Models\Cuisines;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Hash;
use Session;
use validate;
use File;

class UserController extends Controller
{

    /*
     * User Edit
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = User::findorFail($id);
        $role = ['' => 'Select Role'] + Role::pluck('display_name', 'id')->all();
        $cusinies = Cuisines::where('status','active')->pluck('cuisine_name','id')->all();
        $selectedCusinies = ChefCuisines::where('user_id',$id)->pluck('cuisine_id');

        return view('Admin.User.edit', compact('data', 'role','cusinies','selectedCusinies'));
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
          $data['profile_img'] = $filename;
      }

      $userData['name'] = $request->name;
      $userData['email'] = $request->email;
      $userData['phone_number'] = $request->phone_number;
      $userData['address'] = $request->address;
      $userData['zipcode'] = $request->zipcode;
      $userData['lat'] = $request->lat;
      $userData['lang'] = $request->lang;
      $userData['status'] = $request->status;

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

                return redirect('chef-admin');

      }
    }

}
