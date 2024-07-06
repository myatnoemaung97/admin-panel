@extends('layout-1')
@section('content-header')
    <div class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fry Management/List</h1>
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
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success" href="{{ route('fry.create') }}">Add</a>
    </div>
    <div class="container pt-3 bg-white border-top border-primary">

        <div class="table-responsive">
            <table id="fry" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Nick Name</th>
                    <th>Local?</th>
                    <th>Assignment</th>
                    <th>State</th>
                    <th>UID</th>
                    <th>Language</th>
                    <th>Remark</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        var fryTable = $('#fry').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/fry/',
                error: function (xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "phone"
                },
                {
                    "data": "nick_name"
                },
                {
                    "data": "is_local"
                },
                {
                    "data": "user_id"
                },
                {
                    "data": "state"
                },
                {
                    "data": "uid"
                },
                {
                    "data": "language"
                },
                {
                    "data": "remark"
                },
                {
                    'data': 'updated_at'
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteFryButton', function (a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this fry?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/fry/' + id,
                        type: 'DELETE',
                        success: function () {
                            fryTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Fry has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection



