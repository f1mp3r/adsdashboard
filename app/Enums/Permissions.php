<?php

namespace App\Enums;

enum Permissions: string
{
    // Dashboard
    case VIEW_DASHBOARD = 'view dashboard';

    // Ads
    case MANAGE_ADS = 'manage ads';

    // Ad Templates
    case MANAGE_AD_TEMPLATES = 'manage ad templates';

    // Roles
    case MANAGE_ROLES = 'manage roles';

    // Permissions
    case MANAGE_PERMISSIONS = 'manage permissions';

    // Users
    case MANAGE_USERS = 'manage users';

    // Settings
    case MANAGE_SETTINGS = 'manage settings';
}
