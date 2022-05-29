<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['report_form_id', 'question', 'type'];

    public function report_form()
    {
        return $this->hasMany(ReportForm::class);
    }
}
