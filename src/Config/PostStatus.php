<?php // src/Config/PostStatus.php
namespace App\Config;

enum PostStatus: string
{
    case Draft = 'DRAFT';
    case Private = 'PRIVATE';
    case Scheduled = 'SCHEDULED';
    case Public = 'PUBLIC';
}