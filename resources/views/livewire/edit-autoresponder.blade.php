<div class="w-100 bg-white border-top border-primary">
    <div class="d-flex justify-content-between align-items-center p-2">
        <h5>编辑</h5>
        <a class="btn btn-secondary" href="{{ route('autoresponders.index') }}">模板列表</a>
    </div>
    <form wire:submit.prevent="update" class="border-top border-bottom pb-3" style="font-size: 14px;">
        <hr class="m-0">
        <div class="--form-wrapper">
            <div class="d-flex align-items-start">
                <label class="m-0 text-end" for="name"><span class="text-danger mr-1">*</span>名称</label>
                <div class="w-100">
                    <input wire:model="name" class="shadow-sm form-control ml-3" id="name" type="text">
                    <div>
                        @error('name') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="user_id">指派给</label>
                <div class="w-100">
                    <select wire:model="user_id" class="shadow-sm form-control ml-3" id="user_id">
                        <option value="">-</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('user_id') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="language">语言</label>
                <div class="w-100">
                    <select wire:model="language" class="shadow-sm form-control ml-3" id="language">
                        <option value="">-</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language }}">{{ $language }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('language') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="image">自动回复第一张图片</label>
                <div class="w-100 pl-3">
                    @if ($first_pic)
                        <img class="mb-2" src="{{ $first_pic->temporaryUrl() }}" width="100">
                    @else
                        <img class="mb-2" src="/storage/{{ $autoresponder->first_pic }}" width="100">
                    @endif
                    <input wire:model="first_pic" class="shadow-sm form-control" id="image" type="file"
                           accept="image/*">
                    <div>
                        @error('first_pic') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="first_phrase"><span
                        class="text-danger mr-1">*</span>自动回复第一句话</label>
                <div class="w-100">
                    <textarea wire:model="first_phrase" class="shadow-sm form-control ml-3"
                              id="first_phrase"></textarea>
                    <div>
                        @error('first_phrase') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="second_pic_android">第二次自动回复的安卓图片</label>
                <div class="w-100 pl-3">
                    @if ($second_pic_android)
                        <img class="mb-2" src="{{ $second_pic_android->temporaryUrl() }}" width="100">
                    @else
                        <img class="mb-2" src="/storage/{{ $autoresponder->second_pic_android }}" width="100">
                    @endif
                    <input wire:model="second_pic_android" class="shadow-sm form-control" id="second_pic_android"
                           type="file" accept="image/*">
                    <div>
                        @error('second_pic_android') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="second_pic_ios">第二次自动回复的 ios 图片</label>
                <div class="w-100 pl-3">
                    @if ($second_pic_ios)
                        <img class="mb-2" src="{{ $second_pic_ios->temporaryUrl() }}" width="100">
                    @else
                        <img class="mb-2" src="/storage/{{ $autoresponder->second_pic_ios }}" width="100">
                    @endif
                    <input wire:model="second_pic_ios" class="shadow-sm form-control" id="second_pic_ios" type="file"
                           accept="image/*">
                    <div>
                        @error('second_pic_ios') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="second_phrase"><span
                        class="text-danger mr-1">*</span>自动回复第二句</label>
                <div class="w-100">
                    <textarea wire:model="second_phrase" class="shadow-sm form-control ml-3"
                              id="second_phrase"></textarea>
                    <div>
                        @error('second_phrase') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="phrase_after_phone">
                    <span class="text-danger mr-1">*</span>
                    输入手机号码后的第一个回复短语
                </label>
                <div class="w-100">
                    <textarea wire:model="phrase_after_phone" class="shadow-sm form-control ml-3"
                              id="phrase_after_phone"></textarea>
                    <div>
                        @error('phrase_after_phone') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="captcha_output_phrase">
                    <span class="text-danger mr-1">*</span>
                    验证码输出短语
                </label>
                <div class="w-100">
                    <textarea wire:model="captcha_output_phrase" class="shadow-sm form-control ml-3"
                              id="captcha_output_phrase"></textarea>
                    <div>
                        @error('captcha_output_phrase') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="logout_phrase">
                    <span class="text-danger mr-1">*</span>
                    注销时输出的短语
                </label>
                <div class="w-100">
                    <textarea wire:model="logout_phrase" class="shadow-sm form-control ml-3"
                              id="logout_phrase"></textarea>
                    <div>
                        @error('logout_phrase') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="login_phrase">
                    <span class="text-danger mr-1">*</span>
                    登录成功后的输出短语
                </label>
                <div class="w-100">
                    <textarea wire:model="login_phrase" class="shadow-sm form-control ml-3"
                              id="login_phrase"></textarea>
                    <div>
                        @error('login_phrase') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="incorrect_phone_tips">
                    <span class="text-danger mr-1">*</span>
                    电话号码输入错误提示
                </label>
                <div class="w-100">
                    <textarea wire:model="incorrect_phone_tips" class="shadow-sm form-control ml-3"
                              id="incorrect_phone_tips"></textarea>
                    <div>
                        @error('incorrect_phone_tips') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="state">
                    <span class="text-danger mr-1">*</span>
                    状态
                </label>
                <div class="w-100">
                    <select wire:model="state" class="shadow-sm form-control ml-3" id="state">
                        <option value="">-</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                    <div>
                        @error('state') <span class="text-danger ml-3">{{ $message }}</span> @enderror
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

