<?php defined("SYSPATH") or die("No direct script access.");

/**
 * Override the default Gallery tag theme file
 */
class tag_theme
{
    /**
     * Remove the front side css
     * @param $theme
     */
    static function head($theme)
    {
        return;
    }
}