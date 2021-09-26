<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Team;
use App\Models\Service;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Project;
use App\Models\Notice;
use App\Models\Video;
use App\Models\Album;
use App\Models\Gallery;
use App\Models\Slider;

class FrontendHomeController extends Controller
{

    public function index()
    {
        $data = [];
        $data['teams'] = Team::where([['status','1']])->latest()->get();
        $data['services'] = Service::where([['status','1']])->latest()->take(4)->get();
        $data['projects'] = Project::where([['status','1']])->latest()->take(6)->get();
        $data['sliders'] = Slider::where([['status','1']])->latest()->take(6)->get();
        return view('frontend.index',compact('data'));
    }

    public function msgSubmit(Request $req)
    {
        $msg = Message::create([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
            'subject' => $req->subject,
            'description' => $req->description,
        ]);

        if($msg){
            return redirect('/#feedback') -> with('success','Message sent ! Thank you for your feedback.');
        }else{
            return redirect('/#feedback') -> with('success','Message not sent !');
        }
    }

    public function service(){
        $data = [];
        $data['services'] = Service::where([['status','1']])->latest()->get();
        return view('frontend.service.service',compact('data'));
    }

    public function serviceDetail($slug){
        $data = [];
        $data['service'] = Service::where([['slug',$slug]])->firstOrFail();
        return view('frontend.service.servicedetail',compact('data'));
    }

    public function project(){
        $data = [];
        $data['project_type']  = 'All Projects';
        $data['projects'] = Project::where([['status','1']])->latest()->get();
        return view('frontend.project.project',compact('data'));
    }

    public function upcomingProject(){
        $data = [];
        $data['project_type']  = 'Upcoming Projects';
        $data['projects'] = Project::where([['status','1'],['upcoming_project','1']])->latest()->get();
        return view('frontend.project.project',compact('data'));
    }

    public function projectDetail($slug){
        $data = [];
        $data['project'] = Project::where([['slug',$slug]])->firstOrFail();
        return view('frontend.project.projectdetail',compact('data'));
    }

    public function course(){
        $data = [];
        $data['courses'] = Course::where([['status','1']])->latest()->get();
        return view('frontend.course.course',compact('data'));
    }

    public function courseType($slug){
        $data = [];
        $data['course_type'] = CourseType::where([['slug',$slug]])->firstOrFail();
        $data['courses'] = Course::where([['status','1'],['course_type_id',$data['course_type']->id]])->latest()->get();
        return view('frontend.course.course',compact('data'));
    }

    public function courseDetail($slug){
        $data = [];
        $data['course'] = Course::where([['slug',$slug]])->firstOrFail();
        return view('frontend.course.coursedetail',compact('data'));
    }

     public function notice(){
        $data = [];
        $data['notices'] = Notice::where([['status','1']])->latest()->paginate(20);
        return view('frontend.notice.notice',compact('data'));
    }

    public function noticeDetail($slug){
        $data = [];
        $data['notice'] = Notice::where([['slug',$slug]])->firstOrFail();
        return view('frontend.notice.noticedetail',compact('data'));
    }

    public function youtubeVideo(){
        $data = [];
        $data['video'] = Video::where([['status','1']])->latest()->paginate(10);
        return view('frontend.video.video',compact('data'));
    }

    public function album(){
        $data = [];
        $data['album'] = Album::where([['status','1']])->latest()->paginate(10);
        return view('frontend.album.album',compact('data'));
    }

    public function gallery($id){
        $data = [];
        $data['album_name'] = Album::find($id)->title;
        $data['gallery'] = Gallery::where([['status','1'],['album_id',$id]])->get();
        return view('frontend.album.gallery',compact('data'));
    }
}
