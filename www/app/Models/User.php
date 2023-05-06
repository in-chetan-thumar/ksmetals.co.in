<?php

namespace App\Models;

use App\Mail\ResetPasswordMail;
use App\Traits\CustomTimestamps;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles,SoftDeletes,CustomTimestamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'logins',
        'last_login_ip',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtFormattedAttribute()
    {
        return Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }
    public function sendPasswordResetNotification($token)
    {
        $params = [];
        $params['token'] = $token;
        $params['email'] = $this->email;
        Mail::send(new ResetPasswordMail($params));
    }
    public function getProfileAttribute($profile)
    {
        if (!empty($profile) and File::exists(public_path('storage' . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $profile))) {
            return asset('storage' . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . $profile);
        } else {
            return asset('assets/images/users/avatar-2.png');
        }
    }
}
