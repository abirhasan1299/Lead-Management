<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Leads extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'operation');
    }
    public function commented()
    {
        return $this->hasMany(Comment::class)->orderBy('id','desc');
    }
}
