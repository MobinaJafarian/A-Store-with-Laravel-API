<?php

namespace App\Enums;

enum OrderStatus:string{

    case Received = 'received';

    case Rejected = 'rejected';

    case Processing = 'processing';
    
    case Send = 'send';

}
