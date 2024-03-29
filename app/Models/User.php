<?php

namespace App\Models;

//verifie email uncomment this line
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
//roles 
use Maklad\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
#implements or not mustVerifyemail
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable ;
    use HasRoles;
    #stripe
    use Billable;
    
    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
