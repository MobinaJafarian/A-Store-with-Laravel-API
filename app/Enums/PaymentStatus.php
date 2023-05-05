<?php

namespace App\Enums;

enum PaymentStatus:string{
    case Success = 'success';

    case Failed = 'failed';

    case Draft = 'draft';
}
