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
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\VerticalFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Vertical whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vertical whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vertical whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vertical whereUpdatedAt($value)
 */
class Vertical extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
