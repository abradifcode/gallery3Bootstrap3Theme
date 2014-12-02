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
    <? include '_itemlist.html.php' ?>
<? else: ?>
    <p>
        <?= t("No results found for <b>%term</b>", array("term" => $q)) ?>
    </p>

<? endif; ?>

