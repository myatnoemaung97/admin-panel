@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer Service Management</h1>
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
        <a class="btn btn-success" href="{{ route('autoresponders.create') }}">Add</a>
    </div>
    <div class="pt-3 bg-white border-top border-primary">

        <div class="table-responsive">
            <table id="autoresponders" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Language</th>
                    <th>Customer Service Name</th>
                    <th>First Sentence Auto Reply Picture</th>
                    <th>Android Picture of Second Auto Reply</th>
                    <th>IOS Picture of Second Auto Reply</th>
                    <th>Created</th>
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
        var autorespondersTable = $('#autoresponders').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/autoresponders/',
                error: function (xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "language"
                },
                {
                    "data": "name"
                },
                {
                    "data": "first_pic"
                },
                {
                    "data": "second_pic_android"
                },
                {
                    "data": "second_pic_ios"
                },
                {
                    'data': 'created_at'
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteAutoResponderButton', function (a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this auto respond template?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/autoresponders/' + id,
                        type: 'DELETE',
                        success: function () {
                            autorespondersTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Template has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
