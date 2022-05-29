<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_steam_hex', 'answers', 'report_form_id', 'patrol_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report_form()
    {
        return $this->belongsTo(ReportForm::class);
    }
}
