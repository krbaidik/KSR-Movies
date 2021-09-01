<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('backend.company_profile.create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        if(CompanyProfile::count() > 0){
        $data['row'] = CompanyProfile::where('id','1')->first();
        return redirect()->route('backend.company_profile.edit',1);

        }else{
            $data['row'] = null;
            return view('backend.company_profile.create',compact('data'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('short_intro_photo'))
       {
           $image = $request->file('short_intro_photo');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['short_intro_image' => $image_name]);
       }
       if ($request->hasFile('main_banner'))
       {
           $image = $request->file('main_banner');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['m_banner' => $image_name]);
       }

       if ($request->hasFile('main_logo_image'))
       {
           $image = $request->file('main_logo_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['main_logo' => $image_name]);
       }

       if ($request->hasFile('footer_logo_image'))
       {
           $image = $request->file('footer_logo_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['footer_logo' => $image_name]);
       }

       if ($request->hasFile('login_logo_image'))
       {
           $image = $request->file('login_logo_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['login_logo' => $image_name]);
       }

       if ($request->hasFile('fav_icon_image'))
       {
           $image = $request->file('fav_icon_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['fav_icon' => $image_name]);
       }
       
       CompanyProfile::create($request->all());
       return redirect()->route('backend.company_profile.create')->with('success','Company Profile Created Successfully');
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
        $data = [];
        if(CompanyProfile::count() > 0){
        $data['row'] = CompanyProfile::where('id','1')->first();
        return view('backend.company_profile.edit', compact('data'));
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
        $data = CompanyProfile::where('id',$id)->first();

        if ($request->hasFile('short_intro_photo'))
       {
           $image = $request->file('short_intro_photo');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['short_intro_image' => $image_name]);
           if($data->short_intro_image){
            if(file_exists(public_path().'/images/company_profile/'. $data->short_intro_image)){
            unlink(public_path().'/images/company_profile/'. $data->short_intro_image);
            }
           }
       }

       if ($request->hasFile('main_banner'))
       {
           $image = $request->file('main_banner');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['m_banner' => $image_name]);
           if($data->m_banner){
            if(file_exists(public_path().'/images/company_profile/'. $data->m_banner)){
            unlink(public_path().'/images/company_profile/'. $data->m_banner);
            }
           }
       }

       if ($request->hasFile('main_logo_image'))
       {
           $image = $request->file('main_logo_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile/', $image_name);
           $request->request->add(['main_logo' => $image_name]);
           if($data->main_logo){
            if(file_exists(public_path().'/images/company_profile/'. $data->main_logo)){
            unlink(public_path().'/images/company_profile/'. $data->main_logo);
            }
           }
       }

       if ($request->hasFile('footer_logo_image'))
       {
           $image = $request->file('footer_logo_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['footer_logo' => $image_name]);
           if($data->footer_logo){
            if(file_exists(public_path().'/images/company_profile/'. $data->footer_logo)){
            unlink(public_path().'/images/company_profile/'. $data->footer_logo);
            }
           }
       }

       if ($request->hasFile('login_logo_image'))
       {
           $image = $request->file('login_logo_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['login_logo' => $image_name]);
           if($data->login_logo){
            if(file_exists(public_path().'/images/company_profile/'. $data->login_logo)){
            unlink(public_path().'/images/company_profile/'. $data->login_logo);
            }
           }
       }

       if ($request->hasFile('fav_icon_image'))
       {
           $image = $request->file('fav_icon_image');
           $image_name = rand(1179, 9864).'_'.$image->getClientOriginalName();
           $image->move(public_path().'/images/company_profile', $image_name);
           $request->request->add(['fav_icon' => $image_name]);
           if($data->fav_icon){
            if(file_exists(public_path()."/images/company_profile/". $data->fav_icon)){
                
            unlink(public_path()."/images/company_profile/". $data->fav_icon);
            }
           }
       }
       
       $data->update($request->all());
       return redirect()->route('backend.company_profile.edit',1)->with('success','Company Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
