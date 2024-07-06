<div class="w-100 bg-white border-top border-primary">
    <div class="d-flex justify-content-between align-items-center p-2">
        <h5>edit</h5>
        <div class="d-flex">
            <a class="btn btn-secondary" href="{{ route('users.index') }}">Users List</a>
            <a class="btn btn-primary ml-2" href="{{ route('users.show', $user->id) }}">Show</a>
{{--            <form action="{{ route('users.destroy', $user->id) }}" method="post">--}}
{{--                @csrf--}}
{{--                @method('delete')--}}

{{--                <button class="btn btn-danger ml-2" >Delete</button>--}}
{{--            </form>--}}
        </div>
    </div>
    <form wire:submit.prevent="update" class="border-top border-bottom pb-3">
        <div class="--form-wrapper">
            <div class="d-flex align-items-center">
                <label class="m-0 text-end">ID</label>
                <div class="ml-3 w-100 border rounded p-2">
                    {{ $user->id }}
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="username"><span class="text-danger mr-1">*</span>Username</label>
                <div class="w-100">
                    <input wire:model="username" class="shadow-sm form-control ml-3" id="username" type="text" value="{{ $username }}">
                    <div>
                        @error('username') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="name"><span class="text-danger mr-1">*</span>Name</label>
                <div class="w-100">
                    <input wire:model="name" class="shadow-sm form-control ml-3" id="name" type="text" value="{{ $name }}">
                    <div>
                        @error('name') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="image">Avatar</label>
                <div class="w-100 pl-3">
                    @if ($image)
                        <img class="mb-2" src="{{ $image->temporaryUrl() }}" width="100" alt="avatar of {{$user->username}}">
                    @else
                        <img class="mb-2" src="/storage/{{ $user->image }}" width="100" alt="avatar of {{$user->username}}">
                    @endif
                    <input wire:model="image" class="shadow-sm form-control" id="image" type="file">
                    <div>
                        @error('image') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="password"><span class="text-danger mr-1">*</span>Password</label>
                <div class="w-100">
                    <input wire:model="password" class="shadow-sm form-control ml-3" id="password" type="password">
                    <div>
                        @error('password') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="confirmPassword"><span class="text-danger mr-1">*</span>Confirm
                    Password</label>
                <div class="w-100">
                    <input wire:model="confirmPassword" class="shadow-sm form-control ml-3" id="confirmPassword"
                           type="password">
                    <div>
                        @error('confirmPassword') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="--form-wrapper d-flex">
            <div class="mr-3" style="width: 100px;"></div>
            <div class="w-100 d-flex justify-content-between mt-3">
                <button wire:click="resetFields" class="btn btn-sm text-white btn-warning" type="button">Reset</button>
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

