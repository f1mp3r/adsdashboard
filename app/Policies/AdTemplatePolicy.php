<?php

namespace App\Policies;

use App\Enums\Permissions;
use App\Models\AdTemplate;
use App\Models\User;

class AdTemplatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can(Permissions::MANAGE_AD_TEMPLATES);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AdTemplate $adTemplate): bool
    {
        return $user->can(Permissions::MANAGE_AD_TEMPLATES);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can([Permissions::CREATE_AD_TEMPLATE_FROM_AD, Permissions::CREATE_AD_TEMPLATE]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AdTemplate $adTemplate): bool
    {
        return $user->can(Permissions::MANAGE_AD_TEMPLATES);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AdTemplate $adTemplate): bool
    {
        return $user->can(Permissions::MANAGE_AD_TEMPLATES);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AdTemplate $adTemplate): bool
    {
        return $user->can(Permissions::MANAGE_AD_TEMPLATES);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AdTemplate $adTemplate): bool
    {
        return $user->can(Permissions::MANAGE_AD_TEMPLATES);
    }
}
