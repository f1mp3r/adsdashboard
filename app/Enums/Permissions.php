<?php

namespace App\Enums;

enum Permissions: string
{
    // Dashboard
    case VIEW_DASHBOARD = 'view dashboard';

    // Ads
    case MANAGE_ADS = 'manage ads';
    case VIEW_ADS = 'view ads';
    case CREATE_ADS = 'create ads';

    // Ad Templates
    case MANAGE_AD_TEMPLATES = 'manage ad templates';
    case CREATE_AD_TEMPLATE = 'create ad template';
    case CREATE_AD_TEMPLATE_FROM_AD = 'create ad template from ad';
    case LINK_AD_TO_AD_TEMPLATE = 'link ad to ad template';

    // Roles
    case MANAGE_ROLES = 'manage roles';

    // Permissions
    case MANAGE_PERMISSIONS = 'manage permissions';

    // Users
    case MANAGE_USERS = 'manage users';

    // Settings
    case MANAGE_SETTINGS = 'manage settings';
}
