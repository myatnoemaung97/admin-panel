@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <h1 class="m-0">Fry Management</h1><span class="ml-2 text-secondary">create</span>
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
    <div class="w-100 bg-white border-top border-primary">
        <div class="d-flex justify-content-between align-items-center p-2">
            <h5>create</h5>
            <a class="btn btn-secondary" href="{{ route('fry.index') }}">Fry Management List</a>
        </div>
        <form class="border-top border-bottom pb-3" action="/admin/fry" method="post">
            @csrf

            <hr class="m-0">
            <div class="--form-wrapper">
                <div class="d-flex align-items-start">
                    <label class="m-0 text-end" for="user_id">Assignment</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="user_id" name="user_id">
                            <option value="">-</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == old('user_id') ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div>
                            @error('user_id') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="state">State</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="state" name="state">
                            <option value="Already Logged In" {{ old('state') == 'Already Logged In' ? 'selected' : '' }}>Already Logged In</option>
                            <option value="Disconnection" {{ old('state') == 'Disconnection' ? 'selected' : '' }}>Disconnection</option>
                        </select>
                        <div>
                            @error('state') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="uid"><span class="text-danger mr-1">*</span>UID</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="uid" name="uid" type="text" value="{{ old('uid') }}">
                        <div>
                            @error('uid') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="phone"><span class="text-danger mr-1">*</span>Phone number</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="phone" name="phone" type="text" value="{{ old('phone') }}">
                        <div>
                            @error('phone') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="nick_name"><span class="text-danger mr-1">*</span>Nick Name</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="nick_name" name="nick_name" type="text" value="{{ old('nick_name') }}">
                        <div>
                            @error('nick_name') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="language"><span class="text-danger mr-1">*</span>Language</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="language" name="language" type="text" value="{{ old('language') }}">
                        <div>
                            @error('language') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="is_local"><span class="text-danger mr-1">*</span>Is Local?</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="is_local" name="is_local">
                            <option value="1" {{ old('local') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('local') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                        <div>
                            @error('is_local') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="remark">Remark</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="remark" name="remark" type="text" value="{{ old('remark') }}">
                        <div>
                            @error('remark') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="--form-wrapper d-flex">
                <div class="mr-3" style="width: 100px;"></div>
                <div class="w-100 d-flex justify-content-between mt-3">
                    <button onclick="resetFields()" class="btn btn-sm text-white btn-warning" type="button">Reset</button>
                    <div>
                        <input type="checkbox" name="check" id="check">
                        <label class="--no-fixed-width mr-2" for="check">Check</label>
                        <input type="checkbox" name="continue-create" id="continue-create">
                        <label class="--no-fixed-width mr-2" for="continue-create">Continue Creating</label>
                        <input type="checkbox" name="continue-edit" id="continue-edit">
                        <label class="--no-fixed-width mr-2" for="continue-edit">Continue Editing</label>
                        <button class="btn btn-sm text-white --bg-second" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        function resetFields() {
            const user_id = document.getElementById('user_id')
            const state = document.getElementById('state')
            const uid = document.getElementById('uid')
            const phone = document.getElementById('phone')
            const nickname = document.getElementById('nick_name')
            const language = document.getElementById('language')
            const local = document.getElementById('is_local')
            const remark = document.getElementById('remark')

            user_id.value = ''
            state.value = ''
            uid.value = ''
            phone.value = ''
            nickname.value = ''
            language.value = ''
            local.value = ''
            remark.value = ''
        }
    </script>
@endsection



