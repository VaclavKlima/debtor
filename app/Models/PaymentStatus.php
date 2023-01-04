<?php

namespace App\Models;

enum PaymentStatus
{
    case Pending;
    case PaymentSubmitted;
    case Paid;
    case Failed;

}
