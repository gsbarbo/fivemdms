<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrol extends Model
{
    use HasFactory;

    protected $fillable = ['user_steam_hex', 'started_at', 'stopped_at', 'user_department_id'];

    protected $casts = [
        'started_at' => 'datetime',
        'stopped_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_department()
    {
        return $this->belongsTo(UserDepartments::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function scopeMine($query)
    {
        return $query->where('user_steam_hex', auth()->user()->steam_hex);
    }

    public function scopeRunning($query)
    {
        return $query->whereNull('stopped_at')->first();
    }

    public function totalTime()
    {

        if (is_null($this->stopped_at)) {
            return "Not Completed";
        }

        $date = Carbon::parse($this->stopped_at);
        $now = Carbon::parse($this->started_at);


        $seconds =  $date->diffInRealSeconds($now);

        // return gmdate("H:i:s", $seconds);

        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;

        if ($hours == 0) {
            $hours = "";
        } else {
            $hours = $hours . " hours";
        }

        if ($minutes == 0) {
            $minutes = "";
        } else {
            $minutes = $minutes . " minutes";
        }

        return $hours . ' ' . $minutes . ' ' . $seconds . ' seconds';
    }
}
