<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Step extends Model
{
    use HasFactory;

    protected $table = 'steps';

    protected $fillable = ['step_name'];

    protected $attributes = [
        'is_completed' => false,
    ];

    public $timestamps = true;

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
