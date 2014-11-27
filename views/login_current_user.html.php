<?php defined("SYSPATH") or die("No direct script access.") ?>
<li>
  <? $name = $menu->label->for_html() ?>
  <? $hover_text = t("Your profile")->for_html_attr() ?>
  <?= t("%text", array("text" => html::mark_clean(
        '<p>Hi, <a href="'.$menu->url.'" title="'.$hover_text.'" id="'.$menu->id.'">'.$name.'</a></p>'))) ?>
</li>
