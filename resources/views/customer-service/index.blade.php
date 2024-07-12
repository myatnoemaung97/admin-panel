@extends('layout-1')
@section('content-header')
    <div class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">客户服务列表</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="/admin">Home</a></li>
{{--                        <li class="breadcrumb-item active">Starter Page</li>--}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a class="btn btn-success" href="{{ route('customer-service.create') }}">创建</a>
    </div>
    <div class="pt-3 bg-white border-top border-primary">
        <div class="table-responsive">
            <table id="customer-service" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>客户服务人员</th>
                    <th>对话框模板</th>
                    <th>创建于</th>
                    <th>行动</th>
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
        var customerServiceTable = $('#customer-service').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/customer-service/',
                error: function (xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "user_id"
                },
                {
                    "data": "auto_responder_id"
                },
                {
                    'data': 'created_at'
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteCustomerServiceButton', function (a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: '你想删除这个吗？',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/customer-service/' + id,
                        type: 'DELETE',
                        success: function () {
                            customerServiceTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        '成功删除',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection



