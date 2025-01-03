<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'schedules';
    protected $primaryKey = 'schedule_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'exam_id',
        'start_at',
        'end_at'
    ];


    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function exam()
    {
        return $this->belongsTo(ExamModel::class, 'exam_id', 'exam_id');
    }
}
