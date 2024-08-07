@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <h1 class="m-0">用户</h1><span class="ml-2 text-secondary">细节</span>
                    </div>
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
    <div class="w-100 bg-white border-top border-primary">
        <div class="d-flex justify-content-between align-items-center p-2">
            <h5>细节</h5>
            <div class="d-flex">
                <a class="btn btn-secondary" href="{{ route('users.index') }}">用户列表</a>
                <a class="btn btn-primary ml-2" href="{{ route('users.edit', $user->id) }}">编辑</a>
                <a href='' class="deleteUserButton btn btn-danger ml-2" data-id="{{ $user->id }}">删除</a>

            </div>
        </div>
        <div class="border-top border-bottom pb-3">
            <div class="--form-wrapper">
                <div class="d-flex align-items-center">
                    <label class="m-0 text-end">ID</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $user->id }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">用户名</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $user->username }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">名字</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $user->name }}
                    </div>
                </div>
                @if($user->image)
                    <div class="d-flex align-items-center mt-3">
                        <label class="m-0 text-end">名字</label>
                        <div class="ml-3 w-100 border rounded p-2">
                            <img src="/storage/{{$user->image }}" width="150">
                        </div>
                    </div>
                @endif
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">作用</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        <span class="badge badge-success">{{ $user->getRoleNames()->first() }}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">准许</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        @foreach ($user->getAllPermissions() as $permission)
                            <span class="badge badge-success">{{ $permission->name }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">创建于</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $user->created_at }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">更新于</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $user->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.deleteUserButton', function (a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this user?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/auth/users/' + id,
                        type: 'DELETE',
                        success: function () {
                            window.location.href = '/admin/auth/users'
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
