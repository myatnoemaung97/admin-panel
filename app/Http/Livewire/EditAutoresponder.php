<?php

namespace App\Http\Livewire;

use App\Models\AutoResponder;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAutoresponder extends Component
{
    use WithFileUploads;

    public $autoresponder;

    public $name;
    public $user_id;
    public $language;
    public $first_pic;
    public $first_phrase;
    public $second_pic_android;
    public $second_pic_ios;
    public $second_phrase;
    public $phrase_after_phone;
    public $captcha_output_phrase;
    public $logout_phrase;
    public $login_phrase;
    public $incorrect_phone_tips;
    public $state;

    public function mount(Autoresponder $autoresponder)
    {
        $this->autoresponder = $autoresponder;

        $this->name = $autoresponder->name;
        $this->user_id = $autoresponder->user_id;
        $this->language = $autoresponder->language;
        $this->first_phrase = $autoresponder->first_phrase;
        $this->second_phrase = $autoresponder->second_phrase;
        $this->phrase_after_phone = $autoresponder->phrase_after_phone;
        $this->captcha_output_phrase = $autoresponder->captcha_output_phrase;
        $this->logout_phrase = $autoresponder->logout_phrase;
        $this->login_phrase = $autoresponder->login_phrase;
        $this->incorrect_phone_tips = $autoresponder->incorrect_phone_tips;
        $this->state = $autoresponder->state;
    }

    public function render()
    {
        return view('livewire.edit-autoresponder', [
            'users' => User::all(),
            'languages' => [
                'Chinese Simplified',
                'Chinese Traditional',
                'English',
                'Lao',
                'Japanese',
                'Korean',
                'Thai',
                'Spain',
                'Code language template'],

        ]);
    }

    public function update()
    {
        $rules = [
            'name' => 'required',
            'user_id' => 'required',
            'language' => 'required',
            'first_phrase' => 'required',
            'second_phrase' => 'required',
            'phrase_after_phone' => 'required',
            'captcha_output_phrase' => 'required',
            'logout_phrase' => 'required',
            'login_phrase' => 'required',
            'incorrect_phone_tips' => 'required',
            'state' => 'required',
        ];

        if ($this->first_pic) {
            $rules['first_pic'] = 'image';
        }

        if ($this->second_pic_android) {
            $rules['second_pic_android'] = 'image';
        }

        if ($this->second_pic_ios) {
            $rules['second_pic_ios'] = 'image';
        }

        $validated = $this->validate($rules);

        if ($this->first_pic) {
            $validated['first_pic'] = $this->first_pic->store(path: 'templates');
            Storage::delete($this->first_pic);
        }

        if ($this->second_pic_android) {
            $validated['second_pic_android'] = $this->second_pic_android->store(path: 'templates');
            Storage::delete($this->second_pic_android);
        }

        if ($this->second_pic_ios) {
            $validated['second_pic_ios'] = $this->second_pic_ios->store(path: 'templates');
            Storage::delete($this->second_pic_ios);
        }

        $this->autoresponder->update($validated);

        return redirect()->route('autoresponders.edit', $this->autoresponder->id)->with('update', 'Autoresponder template');
    }

    public function resetFields() {
        $this->mount($this->autoresponder);
        $this->first_pic = '';
        $this->second_pic_android = '';
        $this->second_pic_ios = '';
    }
}
