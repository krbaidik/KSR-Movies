<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['title','cover_image','status'];


    public function galleries(){
        return $this->hasMany(Gallery::class,'album_id','id');
    }
}
