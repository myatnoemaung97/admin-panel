@extends('layout-1')
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User Setting</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-dark" href="/admin">Home</a></li>
          <li class="breadcrumb-item">Auth</li>
          <li class="breadcrumb-item active"><a class="text-dark" href="/admin/auth/setting">Setting</a></li>
          {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('content')
<div class="--user-setting-edit bg-white pt-2">
  <p class="mb-1 pl-2 font-weight-bold">Edit</p>

  <form class="border-top border-bottom pb-3">
    {{--
    <hr class="m-0"> --}}
    <div class="--form-wrapper">
      <div class="d-flex align-items-center">
        <label class="m-0 text-end" for="username">Username</label>
        <input class="shadow-sm form-control ml-3" id="username" type="text" value="admin">
      </div>
      <div class="d-flex align-items-center mt-3">
        <label class="m-0 text-end" for="name"><span class="text-danger mr-1">*</span>Name</label>
        <input class="form-control ml-3" type="text" id="name" value="Adminstrator">
      </div>
      <div class="d-flex align-items-start mt-3">
        <label class="m-0 text-end mr-3" for="avatar">Avatar</label>
        <div class="d-flex flex-column w-100">
          <div class="border border-1 w-100 p-3">
            <img class="shadow border" src="/dist/img/user2-160x160.jpg" alt="avatar" width="200">
          </div>
          <input class="form-control mt-2" type="file">
        </div>
      </div>
      <div class="d-flex align-items-center mt-3">
        <label class="m-0 text-end" for="password"><span class="text-danger mr-1">*</span>Password</label>
        <input class="form-control ml-3" id="password" type="password">
      </div>
      <div class="d-flex align-items-center mt-3">
        <label class="m-0 text-end" for="confirm"><span class="text-danger mr-1">*</span>Confirm Password</label>
        <input class="form-control ml-3" id="confirm" type="password">
      </div>
    </div>
    <hr>
    <div class="--form-wrapper d-flex">
      <div class="mr-3" style="width: 100px;"></div>
      <div class="w-100 d-flex justify-content-between mt-3">
        <button class="btn btn-sm text-white btn-warning" type="button">Reset</button>
        <div>
          <input type="checkbox" name="check" id="check">
          <label class="--no-fixed-width mr-2" for="check">Check</label>
          <input type="checkbox" name="continue-create" id="continue-create">
          <label class="--no-fixed-width mr-2" for="continue-create">Continue Creating</label>
          <input type="checkbox" name="continue-edit" id="continue-edit">
          <label class="--no-fixed-width mr-2" for="continue-edit">Continue Editing</label>
        <button class="btn btn-sm text-white --bg-second">Submit</button>

        </div>
      </div>
    </div>
    
  </form>

</div>
@endsection