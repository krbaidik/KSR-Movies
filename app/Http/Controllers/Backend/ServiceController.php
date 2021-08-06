<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ServiceController extends Controller
{

    protected $view_path = 'backend.service';
    protected $base_route = 'backend.services';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Service::all();
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
    public function store(ServiceRequest $req)
    {
        if ($req->hasFile('service_image'))
       {
           $image = $req->file('service_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/services', $image_name);
           $req->request->add(['image' => $image_name]);
       }
        Service::create([
            'title' => $req->title,
            'slug' => $req->slug,
            'description' => $req->description,
            'image' => $req->image,
            'status' => $req->status
        ]);
        return redirect()->route($this->base_route.'.index')->with('message','Service added successfully');
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
            $request->file('upload')->storeAs('public/service/uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/service/uploads/'.$filenametostore);
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
        $data['row'] = Service::find($id);
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
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($id);
        if ($request->hasFile('service_image'))
       {
           $image = $request->file('service_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/services', $image_name);
           $request->request->add(['image' => $image_name]);
           if($service->image){
           unlink(public_path().'/images/services/'.$Service->image);
           }
       }
        $service->update([
            'title' => $request->title,
            'image' => $request->has('service_image')?$request->image:$service->image,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        $request->session()->flash('message', 'Service updated successfully');
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
        Service::find($id)->delete();
        return redirect()->route($this->base_route.'.index')->with('message','Service deleted successfully');
    }
}
