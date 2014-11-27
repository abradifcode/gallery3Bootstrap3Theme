<?php defined("SYSPATH") or die("No direct script access.");

/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2013 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class Bootstrap_Controller extends Controller
{
    public function download($id)
    {
        $item = ORM::factory("item", $id);
        $file = $item->file_path();

        // Make sure we have (full) access to the item
        if (!access::can("view", $item) ||
            !access::can("view_full", $item) ||
            $item->is_album() ||
            !file_exists($file)
        )
        {
            throw new Kohana_404_Exception();
        }

        // Use gallery 3's built-in download class
        download::force($file);
    }
}