@extends('admin.master')


@section('content')

    <div class="card-header">
        <a href="{{route('admins.creat')}}" class="btn btn-outline-primary">{{trans('button_trans.Create')}}</a>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>

            <tr>
                <th>ID</th>
                <th>{{trans('admin_trans.name')}}</th>
                <th>{{trans('admin_trans.email')}}</th>
                <th>{{trans('admin_trans.address')}}</th>
                <th>{{trans('admin_trans.the_date_of_join')}}</th>
                <th>{{trans('admin_trans.Action')}}</th>


            </tr>
            </thead>
            <tbody>
            @foreach ($admins as $admin) 
                <tr>
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->fname}}
                    <span>{{$admin->lname}}</span>
                    </td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->city}} / <span>{{$admin->address}}</span>
                    </td>
                    <td>{{$admin->created_at}}</td>
                    <td>
                            <a href="{{route('admins.show',[$admin->id])}}" class="btn btn-sm btn-outline-success">{{trans('button_trans.Show')}}</a>
                            <a href="{{route('admins.edit',[$admin->id])}}" class="btn btn-sm btn-outline-warning">{{trans('button_trans.Edit')}}</a>
                            <form action="{{route('admins.delete',[$admin->id])}}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('{{ trans('message_trans.confirm_delete') }}')">
                                    {{ trans('button_trans.Delete') }}
                                </button>
                            </form>
                    </td>
                </tr>

            @endforeach 
            </tbody>
            <tfoot>

            </tfoot>
            </table>
    </div>

@endsection

@section('title')
{{trans('admin_title_page_trans.Title_admins_page')}}
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
{{trans('admin_title_page_trans.Title_admins_page')}}
@endsection