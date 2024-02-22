<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Providers\ClientServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $barcode;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login(ClientServiceProvider $clientServiceProvider)
    {
        $users = json_decode($clientServiceProvider->getClient()->get('Users')->getBody()->getContents());
        $users = $users->response->ttAuthUsers->ttAuthUsers;

        $user = [];
        $user = collect($users)->where('ttUserCode', 'ADC')->all();

        if(!$user)
            return redirect()->back()->with('error', 'User not found');

        $user = $user[0];

        $user_data = json_decode($clientServiceProvider->getClient()->get('Users/'.$user->ttUserCode)->getBody()->getContents());
        $user_data = $user_data->response->userRecord->userRecord[0];
        

        $count = User::where('email', $user->ttUserEmail)->count();

        if(!$count)
        {
            User::create([
                'name' => $user->ttUserName,
                'email' => $user->ttUserEmail,
                'password' => Hash::make($user_data->ttUserPassword)
            ]);
        }

        Auth::login(User::where('email', $user->ttUserEmail)->first());

        return redirect()->route('home');
        
    }
}
