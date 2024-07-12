@extends('layout-1')
@section('content-header')
    <div class="content-header pb-0" >
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">角色列表</h1>
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
        <a class="btn btn-success" href="{{ route('roles.create') }}">创建</a>
    </div>
    <div class="pt-3 bg-white border-top border-primary">

        <table id="roles" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>名字</th>
                <th>创建于</th>
                <th>更新于</th>
                <th>行动</th>
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
                title: '您想删除这个角色吗？',
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
                        '角色已删除。',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection



