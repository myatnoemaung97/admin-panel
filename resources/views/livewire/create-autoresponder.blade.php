<div class="w-100 bg-white border-top border-primary">
    <div class="d-flex justify-content-between align-items-center p-2">
        <h5>create</h5>
        <a class="btn btn-secondary" href="{{ route('autoresponders.index') }}">Templates List</a>
    </div>
    <form wire:submit.prevent="save" class="border-top border-bottom pb-3" style="font-size: 14px;">
        <hr class="m-0">
        <div class="--form-wrapper">
            <div class="d-flex align-items-start">
                <label class="m-0 text-end" for="name"><span class="text-danger mr-1">*</span>Name</label>
                <div class="w-100">
                    <input wire:model="name" class="shadow-sm form-control ml-3" id="name" type="text">
                    <div>
                        @error('name') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="user_id">Assignment</label>
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
                <label class="m-0 text-end" for="language">Language</label>
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
                <label class="m-0 text-end" for="image">Auto reply to first picture</label>
                <div class="w-100 pl-3">
                    @if ($first_pic)
                        <img class="mb-2" src="{{ $first_pic->temporaryUrl() }}" width="100">
                    @endif
                    <input wire:model="first_pic" class="shadow-sm form-control" id="image" type="file"
                           accept="image/*">
                    <div>
                        @error('first_pic') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="first_phrase"><span class="text-danger mr-1">*</span>Auto reply to
                    first phrase</label>
                <div class="w-100">
                    <textarea wire:model="first_phrase" class="shadow-sm form-control ml-3"
                              id="first_phrase"></textarea>
                    <div>
                        @error('first_phrase') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="second_pic_android">Android picture of second sentence
                    technique</label>
                <div class="w-100 pl-3">
                    @if ($second_pic_android)
                        <img class="mb-2" src="{{ $second_pic_android->temporaryUrl() }}" width="100">
                    @endif
                    <input wire:model="second_pic_android" class="shadow-sm form-control" id="second_pic_android"
                           type="file" accept="image/*">
                    <div>
                        @error('second_pic_android') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="second_pic_ios">IOS picture of second sentence technique</label>
                <div class="w-100 pl-3">
                    @if ($second_pic_ios)
                        <img class="mb-2" src="{{ $second_pic_ios->temporaryUrl() }}" width="100">
                    @endif
                    <input wire:model="second_pic_ios" class="shadow-sm form-control" id="second_pic_ios" type="file"
                           accept="image/*">
                    <div>
                        @error('second_pic_ios') <span class="text-danger ml-3">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start mt-3">
                <label class="m-0 text-end" for="second_phrase"><span class="text-danger mr-1">*</span>Auto reply to
                    second phrase</label>
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
                    The first reply phrase after entering the mobile phone number
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
                    Captcha output phrase
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
                    The phrase output when logging out
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
                    Output phrase when login is successful
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
                    Tips for incorrect phone number input
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
                    State
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

