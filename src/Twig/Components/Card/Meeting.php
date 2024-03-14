<?php // src/Twig/Components/Card/Meeting.php

namespace App\Twig\Components\Card;

use App\Entity\Meeting as Post;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Meeting
{
    public Post $post;
}
