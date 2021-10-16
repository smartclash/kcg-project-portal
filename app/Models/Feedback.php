<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Feedback
 *
 * @property-read \App\Models\Submission $submission
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 * @mixin \Eloquent
 */
class Feedback extends Model
{
    use HasFactory;

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
