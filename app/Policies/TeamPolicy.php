<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->type->in([UserType::Admin(), UserType::Head()]);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Team $team)
    {
        if ($user->team) {
            return $user->team->id === $team->id;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->type->isNot(UserType::Student())) {
            return false;
        }

        return !$user->team;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Team $team)
    {
        return $team->leader->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Team $team)
    {
        return $team->leader->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Team $team)
    {
        //
    }
}