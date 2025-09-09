<?php

namespace App\Policies;

use App\Models\CorrectiveMaintenance;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CorrectiveMaintenancePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {

         return $user->id === 1;

        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CorrectiveMaintenance $correctiveMaintenance): bool
    {
       return false;
        // return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // return true;
       return $user->is_admin || $user->is_moderator || $user->is_creator;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CorrectiveMaintenance $correctiveMaintenance): bool
    {
        // return false;
        //  return in_array($user->id,([1,2]));
        return $user->is_admin || $user->is_moderator;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CorrectiveMaintenance $correctiveMaintenance): bool
    {
        return $user->is_admin || $user->is_moderator;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CorrectiveMaintenance $correctiveMaintenance): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CorrectiveMaintenance $correctiveMaintenance): bool
    {
        return false;
    }
}
