<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameRevision extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_title',
        'platform',
        'revision_date',
        'revision_type',
        'description',
        'status',
        'github_link',
        'image',
        'priority'
    ];

    protected $casts = [
        'revision_date' => 'date',
    ];
}