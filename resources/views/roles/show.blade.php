@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <h1 class="m-0">Role</h1><span class="ml-2 text-secondary">detail</span>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <div class="w-100 bg-white border-top border-primary" >
        <div class="d-flex justify-content-between align-items-center p-2">
            <h5>detail</h5>
            <div class="d-flex">
                <a class="btn btn-secondary" href="{{ route('roles.index') }}">Roles List</a>
                <a class="btn btn-primary ml-2" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                <a href='' class="deleteRoleButton btn btn-danger ml-2" data-id="{{$role->id}}">Delete</a>

            </div>
        </div>
        <div class="border-top border-bottom pb-3">
            <div class="--form-wrapper">
                <div class="d-flex align-items-center">
                    <label class="m-0 text-end">Name</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $role->name }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Permissions</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        @foreach($role->permissions as $permission)
                            <span class="badge badge-success">{{ $permission->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Created At</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $role->created_at }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Updated At</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $role->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.deleteRoleButton', function(a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this role?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/auth/roles/' + id,
                        type: 'DELETE',
                        success: function() {
                            window.location.href = '/admin/auth/roles'
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Role has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection


