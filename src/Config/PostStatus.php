<?php // src/Config/PostStatus.php
namespace App\Config;

enum PostStatus: string
{
    case DRAFT = 'DRAFT';
    case SCHEDULED = 'SCHEDULED';
    case PUBLIC = 'PUBLIC';
}