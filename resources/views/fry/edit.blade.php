@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <h1 class="m-0">鱼苗管理</h1><span class="ml-2 text-secondary">编辑</span>
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
            <h5>编辑</h5>
            <div>
                <a class="btn btn-secondary" href="{{ route('fry.index') }}">鱼苗管理清单</a>
                <a class="btn btn-primary" href="{{ route('fry.show', $fry->id) }}">展览</a>
            </div>
        </div>
        <form class="border-top border-bottom pb-3" action="{{ route('fry.update', $fry->id) }}" method="post">
            @csrf
            @method('patch')

            <hr class="m-0">
            <div class="--form-wrapper">
                <div class="d-flex align-items-start">
                    <label class="m-0 text-end" for="user_id">指派给</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="user_id" name="user_id">
                            <option value="">-</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id') == $user->id ? 'selected' : (!old('user_id') && $user->id == $fry->user_id ? 'selected' : '') }}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                        <div>
                            @error('user_id')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="state">状态</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="state" name="state">
                            <option value="已登录"
                                {{ old('state') == '已登录' ? 'selected' : (!old('state') && $fry->state == '已登录' ? 'selected' : '') }}>
                                已登录
                            </option>
                            <option value="未登记"
                                {{ old('state') == '未登记' ? 'selected' : (!old('state') && $fry->state == '未登记' ? 'selected' : '') }}>
                                未登记
                            </option>
                        </select>
                        <div>
                            @error('state')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="uid"><span class="text-danger mr-1">*</span>唯一标识</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="uid" name="uid" type="text"
                            value="{{ old('uid') ?? $fry->uid }}">
                        <div>
                            @error('uid')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="phone"><span class="text-danger mr-1">*</span>电话号码</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="phone" name="phone" type="text"
                            value="{{ old('phone') ?? $fry->phone }}">
                        <div>
                            @error('phone')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="nick_name"><span class="text-danger mr-1">*</span>别名</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="nick_name" name="nick_name" type="text"
                            value="{{ old('nick_name') ?? $fry->nick_name }}">
                        <div>
                            @error('nick_name')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="language"><span class="text-danger mr-1">*</span>语言</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="language" name="language" type="text"
                            value="{{ old('language') ?? $fry->language }}">
                        <div>
                            @error('language')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="is_local"><span class="text-danger mr-1">*</span>是本地的吗?</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="is_local" name="is_local">
                            <option value="1"
                                {{ old('is_local') == '1' ? 'selected' : (!old('is_local') && $fry->is_local == '1' ? 'selected' : '') }}>
                                Yes</option>
                            <option value="0"
                                {{ old('is_local') == '0' ? 'selected' : (!old('is_local') && $fry->is_local == '0' ? 'selected' : '') }}>
                                No</option>
                        </select>
                        <div>
                            @error('is_local')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="remark">评论</label>
                    <div class="w-100">
                        <input class="shadow-sm form-control ml-3" id="remark" name="remark" type="text"
                            value="{{ old('remark') ?? $fry->remark }}">
                        <div>
                            @error('remark')
                                <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="--form-wrapper d-flex">
                <div class="mr-3" style="width: 100px;"></div>
                <div class="w-100 d-flex justify-content-between mt-3">
                    <button onclick="resetFields({{ $fry }})" class="btn btn-sm text-white btn-warning"
                        type="button">
                        重置
                    </button>
                    <div>
{{--                        <input type="checkbox" name="check" id="check">--}}
{{--                        <label class="--no-fixed-width mr-2" for="check">Check</label>--}}
{{--                        <input type="checkbox" name="continue-create" id="continue-create">--}}
{{--                        <label class="--no-fixed-width mr-2" for="continue-create">Continue Creating</label>--}}
{{--                        <input type="checkbox" name="continue-edit" id="continue-edit">--}}
{{--                        <label class="--no-fixed-width mr-2" for="continue-edit">Continue Editing</label>--}}
                        <button class="btn btn-sm text-white --bg-second" type="submit">提交</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script>
        function resetFields(fry) {
            console.log(fry);
            const user_id = document.getElementById('user_id')
            const state = document.getElementById('state')
            const uid = document.getElementById('uid')
            const phone = document.getElementById('phone')
            const nickname = document.getElementById('nick_name')
            const language = document.getElementById('language')
            const local = document.getElementById('is_local')
            const remark = document.getElementById('remark')

            user_id.value = fry.user_id
            state.value = fry.state
            uid.value = fry.uid
            phone.value = fry.phone
            nickname.value = fry.nick_name
            language.value = fry.language
            local.value = fry.is_local
            remark.value = fry.remark;
        }
    </script>
@endsection
