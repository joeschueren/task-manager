<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['creator_email', 'task_name', 'is_completed'];

    protected $attributes = [
        'is_completed' => false,
    ];

    public $timestamps = true;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
