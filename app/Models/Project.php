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
 * @property int $id
 * @property string $name
 * @property string $content
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProjectFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'user_id',
    ];

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
