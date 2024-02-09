@inject('admins', 'app\Http\Controllers\Admin\adminController')
@inject('users', 'app\Http\Controllers\Admin\adminController')
@inject('sections', 'app\Http\Controllers\Admin\adminController')
@inject('prodects', 'app\Http\Controllers\Admin\adminController')



@extends('admin.master')


@section('title')
{{trans('admin_title_page_trans.Title_dashboard_page')}}
@endsection

@section('content')

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">

                <h1>{{trans('admin_title_page_trans.Site_visitors')}}</h1>
                <div class="d-flex justify-content-between">
                  <h1 class="card-title">{{trans('admin_title_page_trans.Number_of_admins')}}</h1>
                </div>
                <div class="d-flex">
                    <p class="d-flex flex-column">
                      <span class="text-bold text-lg">{{$admins::NumberOfAdmins()}}</span>
                    </p>
                  </div>
                </div>
              <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1 class="card-title">{{trans('admin_title_page_trans.Number_of_users')}}</h1>
                  </div>
                  <div class="d-flex">
                      <p class="d-flex flex-column">
                        <span class="text-bold text-lg">{{$users::NumberOfUsers()}}</span>
                      </p>
                    </div>
                </div>
              </div> 
            </div>

            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h1 class="card-title">{{trans('admin_title_page_trans.content')}} </h1>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>{{trans('admin_title_page_trans.nameOfSection')}}</th>
                    <th>{{trans('admin_title_page_trans.nameOfProdect')}}</th>
                  </tr>
                  </thead>
                  <tbody> 
                    @foreach($sections::NumberOfCategory_Prodect() as $categoryName => $productCount)
                    <tr>
                        <td>{{ $categoryName }}</td>
                        <td>{{ $productCount }}</td>
                    </tr>
                @endforeach
            
                  </tbody>
                </table>
            </div>

         


 


@endsection

@section('js')
@endsection

@section('title_page')
{{trans('admin_title_page_trans.Title_dashboard_page')}}
@endsection

@section('css')
@endsection