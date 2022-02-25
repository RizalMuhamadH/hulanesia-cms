<?php

namespace App\Enums;

enum PostStatus: string {
    case DRAFT = 'DRAFT';
    case PUBLISH = 'PUBLISH';
    case ARCHIVE = 'ARCHIVE';
    case SCHEDULE = 'SCHEDULE';
    case TRASH = 'TRASH';
}