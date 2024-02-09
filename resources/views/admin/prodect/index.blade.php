@extends('admin.master')
@section('title')
{{trans('admin_title_page_trans.Title_prodect_page')}}
@endsection



@section('content')
<div class="card-header">
    <a href="{{route('prodects.create')}}" class="btn btn-outline-primary">{{trans('button_trans.Create')}}</a>
</div>

<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>

        <tr>
            <th>ID</th>

            <th>{{trans('prodect_trans.Name')}}</th>
            <th>{{trans('prodect_trans.Category_Name')}}</th>
            <th>{{trans('prodect_trans.Image')}}</th>
            <th>{{trans('prodect_trans.Status')}}</th>
            <th>{{trans('prodect_trans.Trend')}}</th>
            <th>{{trans('prodect_trans.Action')}}</th>


        </tr>
        </thead>
        <tbody>

        @foreach ($prodects as $prodect)
            <tr>
            <td>{{$prodect->id}}</td>

            <td>{{$prodect->name}}</td>

            <td>{{$prodect->category->name}}</td>

            <td><img src="{{Storage::url($prodect->image)}} " style="width: 50px; height: 50px;"></td>
            <td>
                @if($prodect->status == 1)
                    <span class="badge badge-success">{{trans('prodect_trans.showing')}}</span>
                @else
                    <span class="badge badge-danger">{{trans('prodect_trans.hidden')}}</span>
                @endif
            </td>
            <td>
                @if($prodect->trend == 1)
                    <span class="badge badge-success">{{trans('prodect_trans.Trend')}}</span>
                @else
                    <span class="badge badge-danger">{{trans('prodect_trans.NO_Trend')}}</span>
                @endif
            </td>
            <td>

                    <a href="{{route('prodects.show',$prodect->id)}}" class="btn btn-sm btn-outline-success">{{trans('button_trans.Show')}}</a>
                    <a href="{{route('prodects.edit' ,$prodect->id)}}" class="btn btn-sm btn-outline-warning">{{trans('button_trans.Edit')}}</a>
                    <form action="{{route('prodects.destroy' ,$prodect->id)}}" method="post" style="display:inline;">
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
{{trans('admin_title_page_trans.Title_prodect_page')}}
@endsection
