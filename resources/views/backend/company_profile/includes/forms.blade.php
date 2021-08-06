<div class="box-body">
	 <div class="form-group">
	 	{{Form::label('name', 'Name *')}}
		{{Form::text('name', null,['class' => 'form-control','placeholder' => 'Enter Name'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('registration_number', 'Registration Number')}}
		{{Form::text('registration_number', null,['class' => 'form-control','placeholder' => 'Enter Registration Number'])}}
      </div>
      <div class="form-group">
	 	{{Form::label('pan_no', 'Pan Number')}}
		{{Form::text('pan_no', null,['class' => 'form-control','placeholder' => 'Enter Pan Number'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('address', 'Address *')}}
		{{Form::text('address', null,['class' => 'form-control','placeholder' => 'Enter Address'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('phone', 'Phone *')}}
		{{Form::text('phone', null,['class' => 'form-control','placeholder' => 'Enter Phone Number'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('email', 'Email *')}}
		{{Form::email('email', null,['class' => 'form-control','placeholder' => 'Enter Email Address'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('website', 'Website')}}
		{{Form::text('website', null,['class' => 'form-control','placeholder' => 'Enter Website url'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('contact_person', 'Contact Person')}}
		{{Form::text('contact_person', null,['class' => 'form-control','placeholder' => 'Enter Contact Person Name'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('contact_person_number', 'Contact Person Number')}}
		{{Form::text('contact_person_number', null,['class' => 'form-control','placeholder' => 'Enter contact Person Number'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('short_intro_title', 'Short Introduction Title')}}
		{{Form::textarea('short_intro_title', null,['class' => 'form-control','rows' => '4','placeholder' => 'Enter short introduction title about company','style' =>'resize:none'])}}
      </div>
      <div class="form-group">
	 	{{Form::label('short_intro', 'Short Introduction')}}
		{{Form::textarea('short_intro', null,['class' => 'form-control','rows' => '4','placeholder' => 'Enter Short Introduction about company','style' =>'resize:none'])}}
      </div>		

      <div class="form-group">
	 	{{Form::label('short_intro_photo', 'Short Introduction Image')}}
		{{Form::file('short_intro_photo', null,['class' => 'form-control'])}}		
			@if($data['row'])
			<img src="{{ asset('images/company_profile/'.$data['row']->short_intro_image) }}" alt="" width="150">
			@endif
      </div>

      <div class="form-group">
	 	{{Form::label('facebook_url', 'Facebook URL')}}
		{{Form::text('facebook_url', null,['class' => 'form-control','placeholder' => 'Enter Facebook URL'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('twitter_url', 'Twitter URL')}}
		{{Form::text('twitter_url', null,['class' => 'form-control','placeholder' => 'Enter Twitter URL'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('instagram_url', 'Instagram URL')}}
		{{Form::text('instagram_url', null,['class' => 'form-control','placeholder' => 'Enter Instagram URL'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('youtube_url', 'Youtube URL')}}
		{{Form::text('youtube_url', null,['class' => 'form-control','placeholder' => 'Enter Youtube URL'])}}
      </div>

      <div class="form-group">
	 	{{Form::label('google_map', 'Google Map')}}
		{{Form::textarea('google_map', null,['class' => 'form-control','rows' => '3','placeholder' => 'Enter Google map Embeded Code','style' =>'resize:none'])}}
      </div>
      <div class="form-group">
	 	{{Form::label('main_banner', 'Main Banner *')}}
		{{Form::file('main_banner', null,['class' => 'form-control'])}}
		@if($data['row'])
			<img src="{{ asset('images/company_profile/'.$data['row']->m_banner) }}" alt="" width="150">
		@endif	
      </div>

      <div class="form-group">
	 	{{Form::label('main_logo_image', 'Main Logo *')}}
		{{Form::file('main_logo_image', null,['class' => 'form-control'])}}
		@if($data['row'])
			<img src="{{ asset('images/company_profile/'.$data['row']->main_logo) }}" alt="" width="150">
		@endif	
      </div>

      <div class="form-group">
	 	{{Form::label('login_logo_image', 'Login Logo')}}
		{{Form::file('login_logo_image', null,['class' => 'form-control'])}}
		@if($data['row'])
			<img src="{{ asset('images/company_profile/'.$data['row']->login_logo) }}" alt="" width="150">
		@endif
      </div>

      <div class="form-group">
	 	{{Form::label('footer_logo_image', 'Footer Logo')}}
		{{Form::file('footer_logo_image', null,['class' => 'form-control'])}}
		@if($data['row'])
			<img src="{{ asset('images/company_profile/'.$data['row']->footer_logo) }}" alt="" width="150">
			@endif
      </div>

      <div class="form-group">
	 	{{Form::label('fav_icon_image', 'Fav Icon Image')}}
		{{Form::file('fav_icon_image', null,['class' => 'form-control'])}}
		@if($data['row'])
			<img src="{{ asset('images/company_profile/'.$data['row']->fav_icon) }}" alt="" width="150">
			@endif
      </div>

      <div class="form-group">
	 	{{Form::label('status', 'Status')}}
		{{Form::radio('status', 1, false)}} Active
		{{Form::radio('status', 0, true)}} DeActive
      </div>
</div>

