<?php

namespace App\Policies;

use App\Models\CmEquipmentTag;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CmEquipmentTagPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CmEquipmentTag $cmEquipmentTag): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CmEquipmentTag $cmEquipmentTag): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CmEquipmentTag $cmEquipmentTag): bool
    {
         return $user->is_admin || $user->is_moderator;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CmEquipmentTag $cmEquipmentTag): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CmEquipmentTag $cmEquipmentTag): bool
    {
        return false;
    }
}
