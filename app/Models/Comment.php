<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'leads_id',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function leads()
    {
        $this->belongsTo(Leads::class);
    }
}
