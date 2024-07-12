@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">客户服务管理</h1>
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
        <a class="btn btn-success" href="{{ route('autoresponders.create') }}">创建</a>
    </div>
    <div class="pt-3 bg-white border-top border-primary">
        <div class="table-responsive">
            <table id="autoresponders" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>语言</th>
                    <th>客户服务名称</th>
                    <th>第一张自动回复图片</th>
                    <th>第二次自动回复的 Android 图片</th>
                    <th>第二次自动回复的 IOS 图片</th>
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
                title: '您想删除此模板吗？',
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
                        '模板已删除。',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
