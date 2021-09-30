@extends('backend.layout.common')

@section('title')
    Ksr | album - View
@endsection

@section('title2')
<style type="text/css">
    .del_btn{
        top: 30px;
        right: -20px;
    }
</style>
    <section class="content-header">
        <h1>
            <a href="{{ route('backend.albums.index') }}" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-list"></i>List</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"><a href="#">edit</a></li>

        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Album View</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped">
                            <tr>
                                <th><h3>Title</h3></th>
                                <td><h4>{{ $album->title}}</h4></td>
                            </tr>
                            <tr>
                                <th><h3>Album Cover</h3></th>
                                <td><img src="{{ asset('images/albums/'.$album->cover_image)}}" title="{{ $album->cover_image}}" width="210" height="150"></td>
                            </tr>

                            <tr>
                                <th><h3>Album Gallery</h3></th>
                                <td>
                                    @forelse($album->galleries as $gallery)
                                    <div class="col-md-3 imagediv">
                                        <span class="del_btn delImg" title="Delete Image" id="{{ $gallery->id}}"><i class="fa fa-trash" ></i></span>
                                        <a href="{{ asset('images/galleries/'.$gallery->image)}}" target="_blank"><img src="{{ asset('images/galleries/'.$gallery->image)}}" alt="{{ $gallery->image}}" width="210" height="150" style="padding: 10px;"></a>
                                    </div>
                                    @empty
                                    <h4 class="text-danger">Album Gallery Not Found.</h4>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th><h3>Status</h3></th>
                                <td>
                                    @if($album->status == 1)
                                        <button type="button" class="btn btn-success">Active</button>
                                    @else
                                        <button type="button" class="btn btn-danger">In Active</button>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.col -->
        </div>

    </section>

    @section('jsforpage')

    <script type="text/javascript">
        $('.delImg').on('click', function(){
            div = $(this);
            const id = $(this).attr('id');
            var url = "{{ route('gallery.del')}}";

if (confirm('Are you sure you want to Delete ?')) {
            div.parent().remove();
            $.ajax({
                type : "POST",
                url : url,
                data : {
                    "_token" : "{{ csrf_token()}}",
                    "id" : id,
                },
                dataType : "json",

                success: function(){
                    
                }
            })
        } else{
            return false;
        }

        });

    </script>
@endsection

@endsection


