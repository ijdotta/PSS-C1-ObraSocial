<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum EmployeeRole : string
{

    use EnumToArray;

    case ADMIN = "admin";
    case AREA_BOSS = "Jefe de área";
    case ADMINISTRATIVE = "Administrativo";
}
