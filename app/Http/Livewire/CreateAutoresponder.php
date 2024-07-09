<?php

namespace App\Http\Livewire;

use App\Models\AutoResponder;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAutoresponder extends Component
{
    use WithFileUploads;

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

    public function render()
    {
        return view('livewire.create-autoresponder', [
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

    public function save()
    {
        $rules = [
            'name' => 'required',
            'user_id' => 'required',
            'language' => 'required',
            'first_pic' => 'required|image',
            'first_phrase' => 'required',
            'second_pic_android' => 'required|image',
            'second_pic_ios' => 'required|image',
            'second_phrase' => 'required',
            'phrase_after_phone' => 'required',
            'captcha_output_phrase' => 'required',
            'logout_phrase' => 'required',
            'login_phrase' => 'required',
            'incorrect_phone_tips' => 'required',
            'state' => 'required',
        ];

        $validated = $this->validate($rules);

        $validated['first_pic'] = $this->first_pic->store(path: 'templates');
        $validated['second_pic_android'] = $this->second_pic_android->store(path: 'templates');
        $validated['second_pic_ios'] = $this->second_pic_ios->store(path: 'templates');

        AutoResponder::create($validated);

        return redirect()->route('autoresponders.index')->with('create', "Autoresponder template");
    }

    public function resetFields() {
        $this->reset();
    }
}
