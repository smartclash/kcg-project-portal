<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->hasOne(Team::class);
    }

    public function mentor()
    {
        return $this->belongsTo(User::class);
    }
}
