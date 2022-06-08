<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'steam_hex';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_login' => 'datetime',
    ];

    public function hasActivePatrol()
    {
        return $this->patrol()->running()->count();
    }

    public static function dec2hex($number)
    {
        $hexvalues = array(
            '0', '1', '2', '3', '4', '5', '6', '7',
            '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'
        );
        $hexval = '';
        while ($number != '0') {
            $hexval = $hexvalues[bcmod($number, '16', 0)] . $hexval;
            $number = bcdiv($number, '16', 0);
        }
        return $hexval;
    }

    public function patrol()
    {
        return $this->hasMany(Patrol::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function getRouteKeyName()
    {
        return 'steam_hex';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getAccountStatusNameAttribute()
    {
        $status_name = DB::table('account_statuses')->where('id', '=', $this->account_status)->first();
        return $status_name->name;
    }
}
