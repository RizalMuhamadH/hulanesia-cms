<?php

namespace App\Enums;

enum FeedEnum: string {
    case ATOM = 'atom';
    case RSS = 'rss';
}