@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <h1 class="m-0">Fry Management</h1><span class="ml-2 text-secondary">detail</span>
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
                <a class="btn btn-secondary" href="{{ route('fry.index') }}">Fry Management List</a>
                <a class="btn btn-primary ml-2" href="{{ route('fry.edit', $fry->id) }}">Edit</a>
                <a href='' class="deleteFryButton btn btn-danger ml-2" data-id="{{$fry->id}}">Delete</a>

            </div>
        </div>
        <div class="border-top border-bottom pb-3">
            <div class="--form-wrapper">
                <div class="d-flex align-items-center">
                    <label class="m-0 text-end">ID</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->id }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">UID</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->uid }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Created At</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->created_at }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Phone number</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->phone }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Nick name</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->nick_name }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">User Id</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->user_id }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Language</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->language }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Phone number</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->phone }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Created At</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->created_at }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Updated At</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->updated_at }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Is local</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->is_local }}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <label class="m-0 text-end">Remark</label>
                    <div class="ml-3 w-100 border rounded p-2">
                        {{ $fry->remark }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.deleteFryButton', function(a) {
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
                        success: function() {
                            window.location.href = '/admin/fry'
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Fry management has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection



