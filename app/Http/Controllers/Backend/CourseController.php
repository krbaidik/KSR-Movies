<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CourseRequest;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CourseController extends Controller
{

    protected $view_path = 'backend.course';
    protected $base_route = 'backend.courses';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Course::all();
        return view($this->view_path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['row'] = null;
        $data['course_type'] = CourseType::pluck('title','id');
        return view($this->view_path.'.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $req)
    {
        if ($req->hasFile('course_image'))
       {
           $image = $req->file('course_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/courses', $image_name);
           $req->request->add(['image' => $image_name]);
       }
        Course::create([
            'course_type_id' => $req->course_type_id,
            'title' => $req->title,
            'slug' => $req->slug,
            'short_description' => $req->short_description,
            'description' => $req->description,
            'image' => $req->image,
            'status' => $req->status
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','course added successfully');
    }

    public function ckupload(Request $request){
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('public/course/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/course/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
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
        dd($id);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [];
        $data['course_type'] = CourseType::pluck('title','id');
        $data['row'] = Course::find($id);
        return view($this->view_path.'.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::find($id);
        if ($request->hasFile('course_image'))
       {
           $image = $request->file('course_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/courses', $image_name);
           $request->request->add(['image' => $image_name]);
           if($course->image){
           unlink(public_path().'/images/courses/'.$course->image);
           }
       }
        $course->update([
            'course_type_id' => $request->course_type_id,
            'title' => $request->title,
            'image' => $request->has('course_image')?$request->image:$course->image,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        $request->session()->flash('message', 'course updated successfully');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route($this->base_route.'.index')->with('message','course deleted successfully');
    }
}
