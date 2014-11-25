<?php defined("SYSPATH") or die("No direct script access.") ?>
<form action="<?= url::site("search") ?>" role="search">
    <input type="hidden" name="album" value="<?= $album_id ?>"/>

    <? if (isset($item)): ?>
        <? $album_id = $item->is_album() ? $item->id : $item->parent_id; ?>
    <? else: ?>
        <? $album_id = item::root()->id; ?>
    <? endif; ?>

    <div class="input-group">
        <? if ($album_id == item::root()->id): ?>
            <label for="g-search">
                <?
                $label = t("Search the gallery");
                echo $label;
                ?>
            </label>
        <? else: ?>
            <label for="g-search">
                <?
                $label = t("Search this album");
                echo $label;
                ?>
            </label>
        <? endif; ?>
        <input type="text"
               name="q"
               id="g-search"
               class="text"
               placeholder="<?= $label; ?>"
               value="<?= isset($q) ? $q : '' ?>"/>

      <span class="input-group-btn">
        <button type="submit">
            <i></i>
            <span><?= t("Search")->for_html_attr() ?></span>
        </button>
      </span>
    </div>
</form>
