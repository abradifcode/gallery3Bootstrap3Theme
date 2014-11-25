<?php defined("SYSPATH") or die("No direct script access.");

class bootstrap_event_Core
{
    /**
     * @param $menu
     * @param $theme
     */
    static function site_menu($menu, $theme)
    {
        if (!empty($menu))
        {
            static::add_site_menu_css($menu, 0);
        }
    }

    /**
     * @param $menu
     * @param $theme
     */
    static function context_menu($menu, $theme)
    {
        if (!empty($menu))
        {
            $submenu = $menu->get("options_menu");

            // Make it a button
            //$submenu
            //    ->label('<i></i><span>'.t('Options').'</span>');

        }
    }

    static private function add_site_menu_css($menu, $depth)
    {
        if (count($menu->elements) > 0)
        {
            foreach ($menu->elements as $item)
            {
                // Add twbs3 dropdown menu classes to the href
                if (count($item->elements) > 0)
                {
                    $item->css_class('dropdown-toggle');
                }

                // Recurse
                static::add_site_menu_css($item, $depth++);
            }
        }
    }
}