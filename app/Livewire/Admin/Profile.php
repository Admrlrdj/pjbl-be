<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class Profile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab' => ['keep' => true]];

    public $name, $email, $username;

    public $current_password, $new_password, $new_password_confirmation;

    protected $listeners = [
        'updateProfile' => '$refresh'
    ];

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = Request('tab') ? Request('tab') : $this->tabname;

        // Populate
        $user = User::findOrFail(auth()->id());
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
    }

    public function updatePersonalDetails()
    {
        $user = User::findOrFail(auth()->id());

        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'username' => 'required|string|max:50|unique:users,username,' . $user->id,
        ]);

        // Update User Info
        $user->name = $this->name;
        // $user->email = $this->email;
        $user->username = $this->username;
        $updated = $user->save();

        sleep(0.5);

        if ($updated) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Your Personal Details have been updated successfully!']);
            $this->dispatch('updateTopUserInfo')->to(TopUserInfo::class);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong!']);
        }
    }

    public function updatePassword()
    {
        // dd('Not implemented yet.');
        $user = User::findOrFail(auth()->id());

        // Validate form
        $this->validate([
            'current_password' => [
                'required',
                'min:5',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail(__('Your current password does not match our records.'));
                    }
                }
            ],
            'new_password' => 'required|min:5|confirmed'
        ]);

        // Update User password
        $updated = $user->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($updated) {
            // Logout and Redirect User to login page
            auth()->logout();
            Session::flash('info', 'Your password has been successfully changed. Please login with your new password');
            $this->redirectRoute('admin.login');
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Something went wrong.']);
        }
    }

    public function render()
    {
        return view('livewire.admin.profile', [
            'user' => User::findOrFail(auth()->id())
        ]);
    }
}
