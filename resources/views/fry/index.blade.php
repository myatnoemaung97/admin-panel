@extends('layout-1')
@section('content-header')
    <div class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">鱼苗管理/清单</h1>
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
        <a class="btn btn-success" href="{{ route('fry.create') }}">创建</a>
    </div>
    <div class="pt-3 bg-white border-top border-primary" style="font-size: 14px;">

        <div class="table-responsive">
            <table id="fry" class="table table-bordered table-hover" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>电话</th>
                    <th>昵称</th>
                    <th>是本地的吗?</th>
                    <th>分配给</th>
                    <th>状态</th>
                    <th>唯一标识</th>
                    <th>语言</th>
                    <th>评论</th>
                    <th>开</th>
                    <th>更新于</th>
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
                    'data': 'open'
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
                title: '你想删除这个吗?',
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
                        '成功删除',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection



