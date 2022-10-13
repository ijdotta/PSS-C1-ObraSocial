<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum BenefitStates : string
{

    use EnumToArray;

    case REQUESTED = 'Solicitado';
    case APPROVED = 'Aprobado';
    case REJECTED = 'Rechazado';
}
