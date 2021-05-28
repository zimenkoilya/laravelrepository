<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the current user can update the user.
     *
     * @param  \App\User  $currentUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id || $currentUser->hasRole('admin');
    }

    /**
     * Determine whether the current user can delete the user.
     *
     * @param  \App\User  $currentUser
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $currentUser, User $user)
    {
        return $currentUser->hasRole('admin');
    }
}
