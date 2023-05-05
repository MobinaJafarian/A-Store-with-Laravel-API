<?php

namespace  App\Enums;

enum CommentStatus:string{
    case Draft = 'draft';
    case Accept = 'accept';
    case Reject = 'reject';
}