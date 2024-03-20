<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upload_vedio extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'subcategory',
        'video_detail_heading',
        'video_detail_description',
        'video',
        'video_url',
    ];
}
