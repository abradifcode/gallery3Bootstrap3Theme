<?php defined("SYSPATH") or die("No direct script access.") ?>

<div class="search-form">
    <? include realpath(dirname(__FILE__)) . '/search_link.html.php' ?>
</div>

<div class="searched-in">
    <? if ($album->id == item::root()->id): ?>
        <p>
            <?= t("Searched the whole gallery, and found the following results:") ?>
        </p>
    <? else: ?>
        <p>
            <?= t("Searched within album <b>%album</b>.", array("album" => html::purify($album->title))) ?>
            <a href="<?= url::site(url::merge(array("album" => item::root()->id))) ?>"><?= t("Search whole gallery") ?></a>
        </p>
    <? endif; ?>
</div>

<? if (count($items)): ?>
    <div id="gAlbumGrid">
        <div>
            <? foreach ($items as $item): ?>
                <? $item_class = $item->is_album() ? "album" : "photo" ?>
                <div id="gItemId-<?= $item->id ?>" class="gItem <?= $item_class ?>">
                    <div>
                        <a href="<?= $item->url() ?>">
                            <?= $item->thumb_img() ?>
                        </a>

                        <h6>
                            <a href="<?= $item->url() ?>">
                                <i></i>
                                <?= html::purify($item->title) ?>
                            </a>
                        </h6>
                        <ul class="gMetadata">
                            <?= $theme->thumb_info($item) ?>
                        </ul>
                    </div>
                </div>
            <? endforeach ?>
        </div>
    </div>

    <?= $theme->paginator() ?>

<? else: ?>
    <p>
        <?= t("No results found for <b>%term</b>", array("term" => $q)) ?>
    </p>

<? endif; ?>

