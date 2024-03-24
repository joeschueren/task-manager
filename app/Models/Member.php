<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = ['email', 'role', 'team_id'];

    public $timestamps = true;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
