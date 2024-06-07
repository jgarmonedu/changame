<?php

namespace App\Enums;

enum Condition: string
{
    case acceptable = 'acceptable';
    case good = 'good';
    case veryGood =  'very good';
    case likeNew = 'like new';
}
