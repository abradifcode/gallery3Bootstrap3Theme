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
            <?
                // Show a range of +/- 4 items from the current
                $current_index = $item->get_position($item);
                $siblings = $item->parent()->children();
                $numSiblings = $item->parent()->children_count();
                $start = ($current_index - 5) > 0 ? ($current_index - 5) : 0;
                $end = ($numSiblings > 9) ? 9 : $numSiblings - 1;
            ?>
            <? if ($numSiblings > 0): ?>
                <? $index = $start; ?>
                <? while($index <= $end): ?>
                    <? $sibling = $siblings[$index] ?>
                    <li<?= ($item->id == $sibling->id) ? ' class="disabled"' : '' ?>>
                        <a href="<?= $sibling->url() ?>"
                            <? if ($item->id != $sibling->id): ?>
                           data-toggle="tooltip"
                           data-placement="top"
                           data-title="<?= $sibling->name; ?>"
                            <? endif; ?>
                            >
                            <span>
                                <?= $index + 1 ?>
                            </span>
                            <span>
                                <?= $sibling->name; ?>
                            </span>
                            <img src="<?= $sibling->thumb_url() ?>" />

                        </a>
                    </li>
                    <? $index++ ?>
                <? endwhile ?>
            <? endif ?>
        </ul>
    </div>

    <?= $theme->photo_bottom() ?>
</div>
