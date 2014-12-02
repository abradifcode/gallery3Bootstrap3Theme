<?php defined("SYSPATH") or die("No direct script access.") ?>

<?= $theme->album_top() ?>

    <header class="item-information">

        <h2 class="<?= $item->type ?>">
            <i></i>
            <?= html::purify($item->title) ?>
        </h2>

        <p><?= nl2br(html::purify($item->description)) ?></p>
    </header>


<? if (count($children)): ?>
    <?
        $items = $children;
        include '_itemlist.html.php';
    ?>
<? else: ?>
    <? if ($user->admin || access::can("add", $item)): ?>
        <? $addurl = url::file("index.php/simple_uploader/app/$item->id") ?>
        <?= t("There aren't any photos here yet! <a %attrs>Add some</a>.",
            array("attrs" => html::mark_clean("href=\"$addurl\" class=\"gDialogLink\""))) ?>
    <? else: ?>
        <?= t("There aren't any photos here yet!") ?>
    <? endif; ?>
<? endif; ?>


<?= $theme->album_bottom() ?>