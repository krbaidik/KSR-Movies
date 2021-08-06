<div class="box-body">
     <div class="form-group">
        {{Form::label('name', 'Name *')}}
        {{Form::text('name', null,['class' => 'form-control','placeholder' => 'Enter name'])}}
      </div>

      <div class="form-group">
        {{Form::label('position', 'Position *')}}
        {{Form::text('position', null,['class' => 'form-control','placeholder' => 'Enter position'])}}
      </div>

      <div class="form-group">
        {{Form::label('team_image', 'Image *')}}
        {{Form::file('team_image', null,['class' => 'form-control'])}}       
            @if($data['row'])
            <img src="{{ asset('images/teams/'.$data['row']->image) }}" alt="" width="150">
            @endif
      </div>
      <div class="form-group">
        {{Form::label('twitter_url', 'Twitter')}}
        {{Form::text('twitter_url', null,['class' => 'form-control','placeholder' => 'Enter twitter_url'])}}
      </div>
      <div class="form-group">
        {{Form::label('facebook_url', 'Facebook')}}
        {{Form::text('facebook_url', null,['class' => 'form-control','placeholder' => 'Enter facebook_url'])}}
      </div>
      <div class="form-group">
        {{Form::label('instagram_url', 'Instagram')}}
        {{Form::text('instagram_url', null,['class' => 'form-control','placeholder' => 'Enter Instagram'])}}
      </div>
      <div class="form-group">
        {{Form::label('youtube_url', 'Youtube')}}
        {{Form::text('youtube_url', null,['class' => 'form-control','placeholder' => 'Enter youtube_url'])}}
      </div>

      <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} DeActive
      </div>
</div>