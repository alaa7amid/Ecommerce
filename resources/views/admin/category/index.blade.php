@extends('admin.master')
@section('content')

    <div class="card-header">
        <a href="{{route('categories.create')}}" class="btn btn-outline-primary">{{trans('button_trans.Create')}}</a>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>

            <tr>
                <th>ID</th>
                <th>{{trans('category_trans.Name')}}</th>
                <th>{{trans('category_trans.Image')}}</th>
                <th>{{trans('category_trans.Status')}}</th>
                <th>{{trans('category_trans.Popular')}}</th>
                <th>{{trans('category_trans.Action')}}</th>


            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><img src="{{Storage::url($category->image)}} " style="width: 50px; height: 50px;"></td>
                <td>
                    @if($category->is_showing == 1)
                        <span class="badge badge-success">{{trans('category_trans.showing')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                    @endif
                </td>
                <td>
                    @if($category->is_popular == 1)
                        <span class="badge badge-success">{{trans('category_trans.Popular')}}</span>
                    @else
                        <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                    @endif
                </td>
                
                <td>

                        <a href="{{route('categories.destroy' , $category->id)}}" class="btn btn-sm btn-outline-success">{{trans('button_trans.Show')}}</a>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-outline-warning">{{trans('button_trans.Edit')}}</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline;">
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
{{trans('admin_title_page_trans.Title_category_page')}}
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
{{trans('admin_title_page_trans.Title_category_page')}}
@endsection
