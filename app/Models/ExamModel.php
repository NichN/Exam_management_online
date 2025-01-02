<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'exam_id';

    protected $fillable = [
        'title',
        'category_id',
        'duration_minutes',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function questions()
    {
        return $this->hasMany(CategoryModel::class, 'exam_id');
    }

    public function schedule()
    {
        return $this->hasOne(CategoryModel::class, 'exam_id');
    }

}
