<?php

namespace App\Otp;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use SadiqSalau\LaravelOtp\Contracts\OtpInterface as Otp;

class UserRegistrationOtp implements Otp
{
  /**
     * Initiates the OTP with user detail
     *
     * @param string $link
     * @param string $name
     * @param string $email
     * @param string $phone
     * @param string $level
     * @param string $password
     */
    public function __construct(
        protected string $link,
        protected string $name,
        protected string $email,
        protected string $phone,
        protected string $level,
        protected string $password
    ) {
    }

    /**
     * Processes the Otp
     *
     * @return mixed
     */
    public function process()
    {
        /** @var User */
        $user = User::unguarded(function () {
            return User::create([
                'link'              =>      $this->link,
                'name'              =>      $this->name,
                'email'             =>      $this->email,
                'phone'             =>      $this->phone,
                'level'             =>      $this->level,
                'password'          =>      Hash::make($this->password),
                'removed'           =>      0,
                'email_verified_at' =>      now(),
            ]);
        });
        $UserQuery = User::where([
            ['id','=',e($user->id)],
            ['removed','=',0]
        ]);
        session()->put('user.link', e($UserQuery->first()->link));
        session()->put('user.id', e($UserQuery->first()->id));
        session()->put('user.picture', e($UserQuery->first()->picture));
        session()->put('user.name', e($UserQuery->first()->name));
        session()->put('user.email', e($UserQuery->first()->email));
        session()->put('user.phone', e($UserQuery->first()->phone));
        session()->put('user.adress', e($UserQuery->first()->adress));
        session()->put('user.created_at', e($UserQuery->first()->created_at));

        event(new Registered($user));

        Auth::login($user);

        return [
            'user' => $user
        ];
    }
}
