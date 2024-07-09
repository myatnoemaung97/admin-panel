@extends('layout-1')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <h1 class="m-0">Customer service</h1><span class="ml-2 text-secondary">edit</span>
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
            <h5>edit</h5>
            <a class="btn btn-secondary" href="{{ route('customer-service.index') }}">Customer service list</a>
        </div>
        <form class="border-top border-bottom pb-3"
              action="{{ route('customer-service.update', $customerService->id) }}" method="post">
            @csrf
            @method('patch')

            <hr class="m-0">
            <div class="--form-wrapper">
                <div class="d-flex align-items-start">
                    <label class="m-0 text-end" for="user_id">Assignment</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="user_id" name="user_id">
                            <option value="">-</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id') == $user->id ? 'selected' :
                                        (!old('user_id') && $customerService->user_id == $user->id ? 'selected' : '') }}
                                >
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <div>
                            @error('user_id') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start mt-3">
                    <label class="m-0 text-end" for="auto_responder_id">Language</label>
                    <div class="w-100">
                        <select class="shadow-sm form-control ml-3" id="auto_responder_id" name="auto_responder_id">
                            <option value="">-</option>
                            @foreach($autoresponders as $autoresponder)
                                <option
                                    value="{{ $autoresponder->id }}"
                                    {{ old('auto_responder_id') == $autoresponder->id ? 'selected' :
                                        (!old('auto_responder_id') && $customerService->auto_responder_id == $autoresponder->id ? 'selected' : '') }}>{{ $autoresponder->name }}
                                </option>
                            @endforeach
                        </select>
                        <div>
                            @error('auto_responder_id') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="--form-wrapper d-flex">
                <div class="mr-3" style="width: 100px;"></div>
                <div class="w-100 d-flex justify-content-between mt-3">
                    <button onclick="resetFields({{$customerService}})" class="btn btn-sm text-white btn-warning" type="button">Reset
                    </button>
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
        function resetFields(customerService) {
            const user_id = document.getElementById('user_id')
            const language = document.getElementById('language')

            user_id.value = customerService.user_id
            language.value = customerService.language
        }
    </script>
@endsection



