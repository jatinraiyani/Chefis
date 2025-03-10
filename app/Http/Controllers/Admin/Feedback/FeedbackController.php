<?php

namespace App\Http\Controllers\Admin\Feedback;

use App\Models\AppFeedback;
use App\Models\ChefRating;
use App\Models\Features;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index(){
        $data = AppFeedback::get();
        return view('Admin.Feedback.index',compact('data'));
    }

    public function destroy($id){
        $payment = AppFeedback::where('id', $id)->delete();

        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Feedback Deleted Successfully.!! </div>');

        return \redirect('admin/feedback');
    }

    public function Rating(){
        $data = ChefRating::get();
        return view('Admin.Rating.index',compact('data'));
    }

    public function RatingDestroy($id){
        $payment = ChefRating::where('id', $id)->delete();

        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Rating Deleted Successfully.!! </div>');

        return \redirect('admin/rating-review');
    }
}
