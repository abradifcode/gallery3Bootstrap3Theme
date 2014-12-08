<?php defined("SYSPATH") or die("No direct script access.") ?>
<? // See http://docs.kohanaphp.com/libraries/pagination ?>

<nav class="pager no-item-preview<?= ($page_type == "collection") ? ' collection' : ''; ?>"
     data-max-page="<?= $max_pages ?>">
    <ul>
        <? if ($page_type == "collection"): ?>
            <li class="first<?= (isset($first_page_url)) ? '' : ' disabled' ?>">
                <?= (isset($first_page_url)) ? '<a href="' . $first_page_url . '">' : '<span>' ?>
                <span aria-hidden="true">&laquo;</span>
                <span>
                    <?= t("first") ?>
                </span>
                <?= (isset($first_page_url)) ? '</a>' : '</span>' ?>
            </li>
        <? endif; ?>

        <li class="previous<?= (isset($previous_page_url)) ? '' : ' disabled' ?>">
            <?= (isset($previous_page_url)) ? '<a href="' . $previous_page_url . '">' : '<span>' ?>
            <span aria-hidden="true">&lsaquo;</span>
                <span>
                    <?= t("previous") ?>
                </span>
            <?= (isset($previous_page_url)) ? '</a>' : '</span>' ?>
        </li>

        <li class="next<?= (isset($next_page_url)) ? '' : ' disabled'; ?>">
            <?= (isset($next_page_url)) ? '<a href="' . $next_page_url . '">' : '<span>' ?>
            <span aria-hidden="true">&rsaquo;</span>
            <span>
                <?= t("next") ?>
            </span>
            <?= (isset($next_page_url)) ? '</a>' : '</span>' ?>
        </li>

        <? if ($page_type == "collection"): ?>
            <li class="last<?= (isset($last_page_url)) ? '' : ' disabled' ?>">
                <?= (isset($last_page_url)) ? '<a href="' . $last_page_url . '">' : '<span>' ?>
                <span aria-hidden="true">&raquo;</span>
                <span>
                    <?= t("last") ?>
                </span>
                <?= (isset($last_page_url)) ? '</a>' : '</span>' ?>
            </li>
        <? endif; ?>
    </ul>
</nav>