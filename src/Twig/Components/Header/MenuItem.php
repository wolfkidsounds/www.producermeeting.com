<?php // src/Twig/Components/Header/MenuItem.php

namespace App\Twig\Components\Header;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class MenuItem
{
    public array $menu;
}
