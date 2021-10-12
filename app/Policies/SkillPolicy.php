<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserSkill;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Console\Migrations\ResetCommand;

class SkillPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserSkill  $userSkill
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserSkill $userSkill)
    {
        return $user->id === $userSkill->user_id
        ? Response::allow()
        : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny("Sorry You are not Authorize");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserSkill  $userSkill
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserSkill $userSkill)
    {
        return $user->id === $userSkill->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserSkill  $userSkill
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserSkill $userSkill)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserSkill  $userSkill
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserSkill $userSkill)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserSkill  $userSkill
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserSkill $userSkill)
    {
        //
    }
}
