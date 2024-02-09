@extends('admin.master')

@section('content')


<div class="card-body">
    <form action="{{route('admins.update',[$admin->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col">
                    <label for="fname">{{trans('admin_trans.fname')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="fname" value="{{$admin->fname}}" >
                    </div>
                </div>
                <div class="col">
                    <label for="lname">{{trans('admin_trans.lname')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control" name="lname" value="{{$admin->lname}}" >

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <label for="email">{{trans('admin_trans.email')}}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" value="{{$admin->email}}" >
                    </div>
                </div>
                <div class="col">
                    <label for="city">{{trans('admin_trans.address')}}</label>
                    <div class="input-group mb-3 col">
                        <input type="text" class="form-control" name="city" value="{{$admin->city}}" >

                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary">{{trans('button_trans.Update')}}</button>
        </form>
    


    
    
    </div>
    


</div>
@endsection


@section('title')
{{trans('admin_title_page_trans.Title_edit_admin')}}
@endsection




@section('css')
@endsection


@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<!--<script src=""></script>-->
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
  </script>
@endsection

@section('title_page')
{{trans('admin_title_page_trans.Title_edit_admin')}}
@endsection