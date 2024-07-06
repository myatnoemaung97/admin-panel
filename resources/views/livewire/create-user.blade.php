<div class="w-100 bg-white border-top border-primary">
    <div class="d-flex justify-content-between align-items-center p-2">
        <h5>create</h5>
        <a class="btn btn-secondary" href="{{ route('users.index') }}">Users List</a>
    </div>
    <form wire:submit.prevent="save" class="border-top border-bottom pb-3">
        <hr class="m-0">
        <div class="--form-wrapper">
            <div class="d-flex align-items-start">
                <label class="m-0 text-end" for="username"><span class="text-danger mr-1">*</span>Username</label>
                <div class="w-100">
                    <input wire:model="username" class="shadow-sm form-control ml-3" id="username" type="text">
                    <div>
                        @error('username') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="name"><span class="text-danger mr-1">*</span>Name</label>
                <div class="w-100">
                    <input wire:model="name" class="shadow-sm form-control ml-3" id="name" type="text">
                    <div>
                        @error('name') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="image">Avatar</label>
                <div class="w-100 pl-3">
                    @if ($image)
                        <img class="mb-2" src="{{ $image->temporaryUrl() }}" width="100">
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
                <label class="m-0 text-end" for="confirmPassword"><span class="text-danger mr-1">*</span>Confirm Password</label>
                <div class="w-100">
                    <input wire:model="confirmPassword" class="shadow-sm form-control ml-3" id="confirmPassword" type="password">
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
