<?php

namespace App\Enums;

enum Permissions: string
{
    // Dashboard
    case VIEW_DASHBOARD = 'dashboard.view';

    // Ads
    case ADS_ALL = 'ads.*';
    case MANAGE_ADS = 'ads.manage';
    case VIEW_ADS = 'ads.view';
    case CREATE_ADS = 'ads.create';

    // Ad Templates
    case AD_TEMPLATES_ALL = 'ad-templates.*';
    case MANAGE_AD_TEMPLATES = 'ad-templates.manage';
    case CREATE_AD_TEMPLATE = 'ad-templates.create';
    case CREATE_AD_TEMPLATE_FROM_AD = 'ad-templates.create-from-ad';
    case LINK_AD_TO_AD_TEMPLATE = 'ad-templates.link-to-ad';

    // Roles
    case MANAGE_ROLES = 'roles.manage';
    case ROLES_ALL = 'roles.*';

    // Permissions
    case MANAGE_PERMISSIONS = 'permissions.manage';
}
