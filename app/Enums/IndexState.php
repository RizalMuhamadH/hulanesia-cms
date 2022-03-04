<?php

namespace App\Enums;


enum IndexState: string {
    case EDITORCHOICE = 'editor_choice';
    case HEADLINE = 'headline';
    case BREAKINGNEWS = 'breaking_news';
}