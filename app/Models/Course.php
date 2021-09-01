<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseType;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title','course_type_id','slug','short_description','description','image','status'];


    public function course_type(){
        return $this->belongsTo(CourseType::class,'course_type_id');
    }
}
