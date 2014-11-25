<?php defined("SYSPATH") or die("No direct script access.") ?>

<?= $theme->dynamic_top() ?>

<header class="item-information">

    <h2 class="<?= (isset($tag) ? 'tag' : '') ?>">
        <i></i>
        <?= html::clean($title) ?>
    </h2>

    <p><?= nl2br(html::purify($item->description)) ?></p>
</header>

<? if (count($children)): ?>
    <?
    $items = $children;
    include '_itemlist.html.php'
    ?>

    <?= $theme->paginator() ?>
<? endif; ?>

<?= $theme->dynamic_bottom() ?>


