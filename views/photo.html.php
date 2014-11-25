<?php defined("SYSPATH") or die("No direct script access.") ?>

<div class="item">

    <?= $theme->photo_top() ?>

    <header class="item-information">
        <div>
            <h2 class="<?= $item->type ?>">
                <i></i>
                <?= html::purify($item->title) ?>
            </h2>
        </div>

        <div>
            <?= $theme->context_menu($item, "#gPhotoId-{$item->id}") ?>

            <? if (access::can("view_full", $theme->item())): ?>
                <a class="download-link" href="<?= url::site("bootstrap/download/{$item->id}") ?>">
                    <i></i>
                    Download
                </a>
            <? endif ?>
        </div>

        <p><?= nl2br(html::purify($item->description)) ?></p>
    </header>

    <div class="item photo">
        <?= $theme->resize_top($item) ?>
        <?= $item->resize_img(array("id" => "gPhotoId-{$item->id}")) ?>
        <?= $theme->resize_bottom($item) ?>
    </div>

    <div class="pager">
        <ul>
            <? if ($previous_item): ?>
                <li<?= (!$previous_item) ? ' class="disabled"' : '' ?>>
                    <a href="<?= $previous_item->url() ?>"
                       data-toggle="tooltip"
                       data-placement="top"
                       data-html="true"
                       data-trigger="hover"

                       data-title="<img src='<?= $previous_item->thumb_url() ?>' /><?= $previous_item->name; ?>">
                        <span aria-hidden="true">&lsaquo;</span>
                    <span class="sr-only">
                        <?= t("previous") ?>
                    </span>
                    </a>
                </li>
            <? endif ?>

            <? if (count($siblings = $item->parent()->children()) > 0): ?>
                <? foreach ($item->parent()->children() as $index => $sibling): ?>
                    <li<?= ($item->id == $sibling->id) ? ' class="disabled"' : '' ?>>
                        <a href="<?= $sibling->url() ?>"
                            <? if ($item->id != $sibling->id): ?>
                           data-toggle="tooltip"
                           data-placement="top"
                           data-html="true"
                           data-trigger="hover"
                           data-title="<img src='<?= $sibling->thumb_url() ?>' /><?= $sibling->name; ?>">
                            <? endif; ?>
                            <span aria-hidden="true"><?= $index + 1 ?></span>
                    <span class="sr-only">
                        <?= $sibling->name; ?>
                    </span>
                        </a>
                    </li>
                <? endforeach; ?>
            <? endif ?>

            <? if ($next_item): ?>
                <li<?= (!$next_item) ? ' class="disabled"' : '' ?>>
                    <a href="<?= $next_item->url() ?>"
                       data-toggle="tooltip"
                       data-placement="top"
                       data-html="true"
                       data-trigger="hover"
                       data-title="<img src='<?= $next_item->thumb_url() ?>' /><?= $next_item->name; ?>">
                        <span aria-hidden="true">&rsaquo;</span>
                    <span class="sr-only">
                        <?= t("next") ?>
                    </span>
                    </a>
                </li>
            <? endif ?>
        </ul>
    </div>

    <?= $theme->photo_bottom() ?>
</div>
