<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum UserRole {

    use EnumToArray;

    case EMPLOYEE;
    case AFFILIATE;
}