<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Project
 *
 * @property-read \App\Models\User $mentor
 * @property-read \App\Models\Team|null $team
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Vertical[] $verticals
 * @property-read int|null $verticals_count
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @mixin \Eloquent
 */
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

    public function verticals()
    {
        return $this->belongsToMany(Vertical::class)
            ->withTimestamps();
    }
}
