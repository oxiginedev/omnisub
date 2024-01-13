<?php

namespace App\Enums;

enum TransactionType
{
    case DEPOSIT;
    case AIRTIME;
    case DATA;
    case ELECTRICITY;
    case CABLE_TV;
}
