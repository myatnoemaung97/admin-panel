<div class="w-100 bg-white border-top border-primary">
    <div class="d-flex justify-content-between align-items-center p-2">
        <h5>展览</h5>
        <div>
            <a class="btn btn-secondary" href="{{ route('roles.index') }}">角色列表</a>
            <a class="btn btn-primary ml-2" href="{{ route('roles.show', $role->id) }}">展览</a>
        </div>
    </div>
    <form wire:submit.prevent="save" class="border-top border-bottom pb-3">
        <hr class="m-0">
        <div class="--form-wrapper">
            <div class="d-flex align-items-start">
                <label class="m-0 text-end" for="name"><span class="text-danger mr-1">*</span>名字</label>
                <div class="w-100">
                    <input wire:model="name" class="shadow-sm form-control ml-3" id="name" type="text">
                    <div>
                        @error('name') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="name">权限</label>
                <div class="w-100 row ml-3 ">
                    <input wire:model="unselectedFilter" class="form-control col-6" placeholder="filter">
                    <div class="col-6"></div>

                    <div class="col-6 px-0">
                        <div wire:click="addAllPermission" class="--move-all-btn d-flex justify-content-center py-1">
                            <div>
                                <i class="fa-solid fa-right-long"></i>
                                <i class="fa-solid fa-right-long"></i>
                            </div>
                        </div>
                        <div>
                            <ul class="--permission-list border pb-2">
                                @foreach($unselectedPermissions as $permission)
                                    <li wire:click="addPermission({{ $permission['id'] }})"
                                        class="pl-2">{{ $permission['name'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div wire:click="removeAllPermission" class="--move-all-btn d-flex justify-content-center py-1">
                            <div>
                                <i class="fa-solid fa-left-long"></i>
                                <i class="fa-solid fa-left-long"></i>
                            </div>
                        </div>
                        <div>
                            <ul class="--permission-list border pb-2">
                                @foreach($selectedPermissions as $permission)
                                    <li wire:click="removePermission({{ $permission['id'] }})"
                                        class="pl-2">{{ $permission['name'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="--form-wrapper d-flex">
            <div class="mr-3" style="width: 100px;"></div>
            <div class="w-100 d-flex justify-content-between mt-3">
                <button wire:click="resetFields" class="btn btn-sm text-white btn-warning" type="button">重置</button>
                <div>
{{--                    <input type="checkbox" name="check" id="check">--}}
{{--                    <label class="--no-fixed-width mr-2" for="check">Check</label>--}}
{{--                    <input type="checkbox" name="continue-create" id="continue-create">--}}
{{--                    <label class="--no-fixed-width mr-2" for="continue-create">Continue Creating</label>--}}
{{--                    <input type="checkbox" name="continue-edit" id="continue-edit">--}}
{{--                    <label class="--no-fixed-width mr-2" for="continue-edit">Continue Editing</label>--}}
                    <button class="btn btn-sm text-white --bg-second" type="submit">提交</button>
                </div>
            </div>
        </div>

    </form>

</div>
