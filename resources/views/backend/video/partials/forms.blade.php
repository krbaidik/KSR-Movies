<div class="box-body">
     <div class="form-group">
        {{Form::label('title', 'Title *')}}
        {{Form::text('title', null,['class' => 'form-control','placeholder' => 'Enter title'])}}
      </div>

      <div class="form-group">
        {{Form::label('video_link', 'Video Link *')}}
        {{Form::text('video_link', null,['class' => 'form-control','placeholder' => 'Enter Video Link'])}}
      </div>

      <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} DeActive
      </div>
</div>