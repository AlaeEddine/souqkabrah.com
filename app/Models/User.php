<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    public $timestamps = true;
    public function conversations()
    {
        return \App\Conversation::where('user1',$this->id)->orWhere('user2',$this->id)->get();
    }
    public function messages()
    {
        return $this->hasMany('App\Message');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'name', 'adress', 'login', 'picture', 'id_country', 'name_country', 'id_city', 'name_city', 'id_bank', 'name_bank', 'account_bank', 'whatsapp', 'phone', 'phone_code', 'sold', 'email', 'email_code', 'email_verified_at', 'password', 'role', 'isAdmin', 'special_user', 'special_start', 'special_end', 'attempts_validation_phone', 'attempts_validation_email', 'phone_enabled', 'email_enabled', 'cv_category', 'cv_exprience', 'cv_car', 'cv_permis', 'cv_diplome', 'cv_married', 'cv_info', 'cv_competences', 'cv_adress', 'cv_languages', 'cv_type', 'cv_salaire', 'plan', 'level', 'ip', 'seen', 'cv_seen', 'comission', 'link', 'birthday', 'hidephone', 'gender', 'banned', 'removed', 'remember_token', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
