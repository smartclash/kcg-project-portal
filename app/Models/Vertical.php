<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Vertical
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Vertical newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vertical newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vertical query()
 * @mixin \Eloquent
 */
class Vertical extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
