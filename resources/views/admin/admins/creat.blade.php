@extends('admin.master')

@section('content')
<div class="card-body">

  <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
          <div class="col">
              <label for="fname">{{trans('admin_trans.fname')}}</label>
              <div class="input-group mb-3">
                  <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="fname">
              </div>
              @error('firstName')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="col">
              <label for="lname">{{trans('admin_trans.fname')}}</label>
              <div class="input-group mb-3 col">
                  <input type="text" class="form-control @error('LastName') is-invalid @enderror" name="lname">

              </div>
              @error('LastName')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
      </div>

      <div class="row">

        <div class="col">
          <label for="email">{{trans('admin_trans.email')}}</label>
          <div class="input-group mb-3">
              <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email">
          </div>
          @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div> 
          
        <div class="col">
          <label for="password">{{trans('admin_trans.password')}}</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control  @error('password') is-invalid @enderror" name="password">
          </div>
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>

          
          
      </div>

    

      <div class="row">
        <div class="col">
          <label for="phoneNumber">{{trans('admin_trans.phonenumber')}}</label>
          <div class="input-group mb-3">
              <input type="number" class="form-control  @error('phoneNumber') is-invalid @enderror" name="phoneNumber">
          </div>
          @error('phoneNumber')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>

      <div class="col">
        <label for="country">{{trans('admin_trans.country')}}</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control  @error('country') is-invalid @enderror" name="country">
        </div>
        @error('country')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>



      </div>
    <div class="row">
      <div class="col">
          <label for="address">{{trans('admin_trans.address')}}</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address">
          </div>
          @error('address')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>  

        <div class="col">
          <label for="city">{{trans('admin_trans.city')}}</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control  @error('city') is-invalid @enderror" name="city">
          </div>
          @error('city')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div> 
        
  </div>
  <div class="row">
    <div class="col">
        <label for="is_admin">{{trans('admin_trans.Admin_permission')}}</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="is_admin" name="is_admin">
            <label class="form-check-label" for="is_admin">
                {{trans('admin_trans.Admin_permission')}}
            </label>
        </div>
    </div>
</div>




      <button type="submit" class="btn btn-outline-primary">{{trans('button_trans.Save')}}</button>
  </form>
</div>

@endsection


@section('title')
{{trans('admin_title_page_trans.Title_create_admin')}}
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
{{trans('admin_title_page_trans.Title_create_admin')}}
@endsection