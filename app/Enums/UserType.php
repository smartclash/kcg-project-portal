<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Student()
 * @method static static Mentor()
 * @method static static Head()
 * @method static static Admin()
 */
final class UserType extends Enum
{
    const Student   = 0;
    const Mentor    = 1;
    const Head      = 2;
    const Admin     = 3;
}
