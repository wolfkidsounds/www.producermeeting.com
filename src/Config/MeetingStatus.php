<?php // src/Config/MeetingStatus.php
namespace App\Config;

enum MeetingStatus: string
{
    case Upcoming = 'UPCOMING';
    case Cancelled = 'CANCELLED';
    case Passed = 'PASSED';
}