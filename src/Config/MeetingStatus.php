<?php // src/Config/MeetingStatus.php
namespace App\Config;

enum MeetingStatus: string
{
    case UPCOMING = 'UPCOMING';
    case CANCELLED = 'CANCELLED';
    case PASSED = 'PASSED';
}