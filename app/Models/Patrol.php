<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrol extends Model
{
    use HasFactory;

    protected $fillable = ['user_steam_hex', 'started_at', 'stopped_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeMine($query)
    {
        return $query->where('user_steam_hex', auth()->user()->steam_hex);
    }

    public function scopeRunning($query)
    {
        return $query->whereNull('stopped_at')->first();
    }
}
