<?php

namespace App\Enums;

enum State: string
{
    case pending = '1';
    case sended = '2';
    case received = '3';
}
