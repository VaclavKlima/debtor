<?php

namespace App\Models;

enum PaymentStatus: string
{
    case Pending = 'Pending';
    case PaymentSubmitted = 'PaymentSubmitted';
    case Paid = 'Paid';
    case Failed = 'Failed';

}
