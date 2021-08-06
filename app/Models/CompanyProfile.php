<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
	protected $table = 'company_profiles';

    protected $fillable = ['name','registration_number','pan_no','address','phone','email','website','contact_person','contact_person_number','short_intro_title','short_intro','short_intro_image','facebook_url','twitter_url','instagram_url','youtube_url','google_map','main_logo','m_banner','login_logo','footer_logo','fav_icon','status','created_at','updated_at'];
}
