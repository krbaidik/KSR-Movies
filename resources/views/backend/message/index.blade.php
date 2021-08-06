@extends('backend.layout.common')

@section('title')
    KSR | List - User 
@endsection

@section('title2')
    <section class="content-header">
        <h1>
            {{-- <a href="#" class="btn btn-primary btn-block margin-bottom"></a> --}}

        </h1><br>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"><a href="javascript::void(0)">Message List</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><b>Message</b></h3>
                    </div>
                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible" id="mymessage">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('message') }}</h4>

                    </div>
                    @endif


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                               @forelse($msg as $i=>$u)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->phone ?? 'N/A' }}</td>
                                        <td>{{ $u->subject}}</td>
                                        <td>{{ $u->description}}</td>
                                        <td><a href="{{route('backend.message.destroy', ['id' => $u->id])}}" type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

    </section>

@endsection

@section('pagecss')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
    @endsection

@section('jsforpage')
    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

    </script>
    @endsection
