<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    use HasFactory;
    protected $table = "exam";
    public $timestamps = false;
    protected $primaryKey = 'exam_id';

    protected $fillable = [
        'title',
        'duration',
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'exam_id');
    }

}
