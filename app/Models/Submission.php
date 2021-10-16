<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Submission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feedback[] $feedbacks
 * @property-read int|null $feedbacks_count
 * @property-read \App\Models\Team $team
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Submission query()
 * @mixin \Eloquent
 */
class Submission extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
