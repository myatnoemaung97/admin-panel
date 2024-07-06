@extends('layout-1')
@section('content-header')
    <div class="content-header pb-0" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="/admin">Home</a></li>
                        {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success" href="{{ route('roles.create') }}">Create Role</a>
    </div>
    <div class="container pt-3 bg-white border-top border-primary">

        <table id="roles" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>
        var rolesTable = $('#roles').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/auth/roles/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "name"
                },
                {
                    'data': 'created_at'
                },
                {
                    'data': 'updated_at'
                },
                {
                    "data": "action"
                }
            ]
        });

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
                            rolesTable.ajax.reload();
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



