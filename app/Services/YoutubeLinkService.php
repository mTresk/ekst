<?php

namespace App\Services;

class YoutubeLinkService
{
    public function simplifyLink($link): string
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);

        return $match[1];
    }
}
