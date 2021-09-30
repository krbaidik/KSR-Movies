<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ProjectRequest;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProjectController extends Controller
{

    protected $view_path = 'backend.project';
    protected $base_route = 'backend.projects';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Project::all();
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
        return view($this->view_path.'.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $req)
    {
        if ($req->hasFile('project_image'))
       {
           $image = $req->file('project_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/projects', $image_name);
           $req->request->add(['image' => $image_name]);
       }
        Project::create([
            'title' => $req->title,
            'slug' => $req->slug,
            'description' => $req->description,
            'image' => $req->image,
            'upcoming_project' => $req->upcoming_project,
            'status' => $req->status
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','Project added successfully');
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
            $request->file('upload')->storeAs('public/project/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/project/uploads/'.$filenametostore);
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
        $data['row'] = Project::find($id);
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
    public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);
        if ($request->hasFile('project_image'))
       {
           $image = $request->file('project_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/projects', $image_name);
           $request->request->add(['image' => $image_name]);
           if($project->image){
            if(file_exists(public_path().'/images/projects/'.$project->image)){
                
           unlink(public_path().'/images/projects/'.$project->image);
            }
           }
       }
        $project->update([
            'title' => $request->title,
            'image' => $request->has('project_image')?$request->image:$project->image,
            'slug' => $request->slug,
            'description' => $request->description,
            'upcoming_project' => $request->upcoming_project,
            'status' => $request->status,
        ]);
        $request->session()->flash('message', 'Project updated successfully');
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
        $project = Project::find($id);

        if(file_exists(public_path().'/images/projects/'.$project->image)){
                
           unlink(public_path().'/images/projects/'.$project->image);
        }

        $project->delete();
        return redirect()->route($this->base_route.'.index')->with('message','Project deleted successfully');
    }
}
