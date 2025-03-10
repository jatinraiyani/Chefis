<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use App\Models\UserAddress;
use App\Models\UserCard;
use App\Models\Role;
use Auth;
Use URL;
Use Hash;
use Redirect;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    public function login(){
        return view('Frontend.Auth.login');
    }
    public function ajaxLogin(Request $request)
    {
      $this->validate($request, [
          'email' => 'required',
          'password' => 'required'
      ]);

      $email = $request['email'];

      $checklogin = User::where(function ($query) use ($email) {
          $query->where('email', $email)
              ->orWhere('phone_number', $email);
      })->first();

      if (empty($checklogin)) {
        return response()->json([
           'error' => [
               'email' => 'User not found.'
           ],
           'status' => 0
        ]);

      }

      $checklogin = User::where(function ($query) use ($email) {
          $query->where('email', $email)
              ->orWhere('phone_number', $email);
      })->where('status', 'active')->first();

      if (empty($checklogin)) {
        return response()->json([
           'error' => [
               'email' => 'User block by admin..!'
           ],
           'status' => 0
        ]);

      }

      $logindetails = array(
          'email' => $checklogin['email'],
          'password' => $request['password']
      );

      $request->session()->forget('locked');

      if (Auth::attempt($logindetails)) {
          if (Auth::user()->hasRole('user')) {
              \BaseFunction::LoginLog(Auth::user()->id);
              return response()->json([
                 'success' => [
                     'msg' => 'logged in successfully'
                 ],
                 'status' => 1
              ]);
          }
          Auth::logout();
          return response()->json([
             'error' => [
                 'email' => 'Only User Can Login Here..!'
             ],
             'status' => 0
          ]);


      } else {
        return response()->json([
           'error' => [
               'email' => 'Invalid Login Details.'
           ],
           'status' => 0
        ]);

      }
    }
    public function doLogin(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request['email'];

        $checklogin = User::where(function ($query) use ($email) {
            $query->where('email', $email)
                ->orWhere('phone_number', $email);
        })->first();

        if (empty($checklogin)) {
            return redirect()->back()
                ->withErrors(['email' => "User not found"]);
        }

        $checklogin = User::where(function ($query) use ($email) {
            $query->where('email', $email)
                ->orWhere('phone_number', $email);
        })->where('status', 'active')->first();

        if (empty($checklogin)) {
            return redirect()->back()
                ->withErrors(['email' => "User block by admin..!"]);
        }

        $logindetails = array(
            'email' => $checklogin['email'],
            'password' => $request['password']
        );

        $request->session()->forget('locked');

        if (Auth::attempt($logindetails)) {
            if (Auth::user()->hasRole('user')) {
                \BaseFunction::LoginLog(Auth::user()->id);
                return Redirect::to('/');
            }
            Auth::logout();
            return redirect()->back()
                ->withErrors(['email' => "Only User Can Login Here..!"]);

        } else {
            return redirect()->back()
                ->withErrors(['email' => 'Invalid Login Details.']);
        }
    }

    public function register(){
        return view('Frontend.Auth.register');
    }
    public function ajaxregister(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|unique:users',
          'phone_number' => 'required|numeric',
          'password' => 'required|min:6'
      ]);

      $data = $request->all();
      $data['is_agree'] = $request['is_agree'] =='on' ?'yes':'no';
      $data['password'] = Hash::make($request['password']);
      $user = new User();
      $user->fill($data);
      if($user->save()){

          $clientrole = Role::where('id', 2)->first();
          $user->attachRole($clientrole);

          $logindetails = array(
              'email' => $request['email'],
              'password' => $request['password']
          );

          if (Auth::attempt($logindetails)) {
              if (Auth::user()->hasRole('user')) {
                  \BaseFunction::LoginLog(Auth::user()->id);
                  // mail send start
                  $datas = array('name' => $user->name);
                    Mail::send('emails.register',$datas,function($message) use($user){
                      $message->to($user->email,$user->name)->subject('Registration');
                      $message->from('comida@chefis.app','Chefis');
                    });
                    // mail send end 
                  return response()->json([
                     'success' => [
                         'msg' => 'registerd in successfully'
                     ],
                     'status' => 1
                  ]);
              }
          }


          return response()->json([
                 'error' => [
                     'email' => 'Something went wrong.'
                 ],
                 'status' => 0
            ]);
      }
    }
    public function doregister(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required|numeric',
            'password' => 'required|min:6'
        ]);

        $data = $request->all();
        $data['is_agree'] = $request['is_agree'] =='on' ?'yes':'no';
        $data['password'] = Hash::make($request['password']);
        $user = new User();
        $user->fill($data);
        if($user->save()){

            $clientrole = Role::where('id', 2)->first();
            $user->attachRole($clientrole);

            $logindetails = array(
                'email' => $request['email'],
                'password' => $request['password']
            );

            if (Auth::attempt($logindetails)) {
                if (Auth::user()->hasRole('user')) {
                    \BaseFunction::LoginLog(Auth::user()->id);
                    // mail send start
                    $datas = array('name' => $user->name);
                      Mail::send('emails.register',$datas,function($message) use($user){
                        $message->to($user->email,$user->name)->subject('Registration');
                        $message->from('comida@chefis.app','Chefis');
                      });
                    // mail send end
                    return Redirect::to('/');
                }
            }

            return redirect('/login')
                ->withErrors(['email' => "Something went wrong."]);
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
    public function updateprofile(Request $request)
    {

        $input = $request->all();
        $phone_number = $input['phone_number'];
        $name = $input['name'];
        $email = $input['email'];
        if ($request->hasFile('profile_img')) {

              $imageName = time().'.'.request()->profile_img->getClientOriginalExtension();
              request()->profile_img->move(public_path('upload/user'), $imageName);
              $update = User::where('id', Auth::user()->id)->update(['name' => $name, 'email' => $email, 'phone_number' => $phone_number,'profile_img'=>$imageName]);
              $msg = "your profile is updated successfully.";
              return redirect('/my-account?success='.$msg.'#v-pills-home-tab');



        }
        else
        {
            $update = User::where('id', Auth::user()->id)->update(['name' => $name, 'email' => $email, 'phone_number' => $phone_number]);
            $msg = "Your profile is updated successfully.";
            return redirect('/my-account?success='.$msg.'#v-pills-home-tab');

        }
    }
    public function addupdateaddress(Request $request)
    {

      if($request->addform == 3)
      {

          $delete = UserAddress::where('id', $request->editid)->delete();
          $msg = "Your Address is successfully deleted.";
          return redirect('/my-account?success='.$msg.'#addresstabs');
      }

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'contactnumber' => 'required|numeric',
            'zipcode' => 'required|numeric',
            'city' => 'required',
            'addresstype' => 'required',
            'landmark' => 'required'
        ];

       $validator = Validator::make($request->all(), $rules);

       if($validator->fails()) {
           return redirect()->back()
           ->withInput()
           ->withErrors($validator);
       }

       $name = $request->name;
       $address2 = $request->address2;
       $contactnumber = $request->contactnumber;
       $zipcode = $request->zipcode;
       $city = $request->city;
       $formtype = $request['addform'];
       $addresstype = $request['addresstype'];
       $address = $request['address'];
       $landmark = $request['landmark'];

       // start get lat-lon

        $add = $address.','.$address2.','.$zipcode.','.$city;
        $prepAddr = str_replace(' ','+',$add);
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&key=AIzaSyDb5KGfWAckxCGpoBYfAxNvPuiez5r_rJw');
        $output= json_decode($geocode);
        if($output->results == NULL){

            return redirect()->back()->with('message','Please add Valid Address....!');

        }

        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;

       // end lat-lon


        //addresstype
        if($formtype == 1)
        {
            //insert
            $UserAddress = new UserAddress();
            $data['user_id'] = Auth::user()->id;
            $data['name'] = $name;
            $data['address'] = $address;
            $data['address2'] = $address2;
            $data['contact_no'] = $contactnumber;
            $data['zipcode'] = $zipcode;
            $data['city'] = $city;
            $data['landmark'] = $landmark;
            $data['type'] = $addresstype;
            $data['lat'] = $lat;
            $data['lon'] = $long;

            $UserAddress->fill($data);
            if($UserAddress->save()){

                $msg = "Address is Added successfully.";
                return redirect('/my-account?success='.$msg.'#addresstabs');

            }else{
                $msg = "something went wrong.";
                return redirect('/my-account?error='.$msg.'#addresstabs');
            }

        }

        if($formtype == 2)
        {
            //update
            $editid = $request['editid'];

            $update = UserAddress::where('id', $editid)->update(['name' => $name,'city' => $city,'zipcode' => $zipcode,'contact_no' => $contactnumber,'address2' => $address2,'address' => $address, 'landmark' => $landmark, 'type' => $addresstype,'lat'=>$lat ,'lon'=>$long]);
            $msg = "Your Address is successfully updated.";
            return redirect('/my-account?success='.$msg.'#addresstabs');
        }


    }

    public function deleteSavedCard(Request $request){

        $deleteCard = UserCard::where('id',$request->cardId)->update(['save_status' => 'no']);
        if($deleteCard){
          $msg = "Your Card is successfully Deleted.";
          return redirect('/my-account?success='.$msg.'#cardtabs');
        }
    }
}
