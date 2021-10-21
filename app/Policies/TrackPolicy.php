<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\Project;
use App\Models\Track;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user, Project $project)
    {
        if ($user->type->is(UserType::Mentor())) {
            return $user->id === $project->user_id;
        }

        if ($user->type->is(UserType::Student())) {
            return $user->team && $user->team->project_id === $project->id;
        }

        return $user->type->in([UserType::Head(), UserType::Admin()]);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Track $track, Project $project)
    {
        if ($user->type->is(UserType::Mentor())) {
            return $user->id === $project->user_id;
        }

        if ($user->type->is(UserType::Student())) {
            return $user->team && $user->team->project_id === $project->id;
        }

        return $user->type->in([UserType::Head(), UserType::Admin()]);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Project $project)
    {
        return $user->type->is(UserType::Mentor()) && (
            $project->user_id === $user->id
        );
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Track $track)
    {
        //
    }
}
