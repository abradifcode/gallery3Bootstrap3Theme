<?php defined("SYSPATH") or die("No direct script access.") ?>
<? // See http://docs.kohanaphp.com/libraries/pagination ?>

<nav class="pager no-item-preview">
    <ul>
        <li<?= (!$first_page_url) ? ' class="disabled"' : '' ?>>
            <?= ($first_page_url) ? '<a href="' . str_replace('{page}', 1, $url) . '">' : '<span>' ?>
                <span aria-hidden="true">&laquo;</span>
                <span>
                    <?= t("first") ?>
                </span>
            <?= ($first_page_url) ? '</a>' : '</span>' ?>
        </li>

        <li<?= (!$previous_page_url) ? ' class="disabled"' : '' ?>>
            <?= ($previous_page_url) ? '<a href="' . str_replace('{page}', $previous_page, $url) . '">' : '<span>' ?>
                <span aria-hidden="true">&lsaquo;</span>
                <span>
                    <?= t("previous") ?>
                </span>
            <?= ($first_page_url) ? '</a>' : '</span>' ?>
        </li>

        <li<?= (!$next_page_url) ? ' class="disabled"' : ''; ?>>
            <?= ($next_page_url) ? '<a href="' . str_replace('{page}', $next_page, $url) . '">' : '<span>' ?>
            <span aria-hidden="true">&rsaquo;</span>
            <span>
                <?= t("next") ?>
            </span>
            <?= ($first_page_url) ? '</a>' : '</span>' ?>
        </li>

        <li<?= (!$last_page_url) ? ' class="disabled"' : '' ?>>
            <?= ($last_page_url) ? '<a href="' . str_replace('{page}', $last_page, $url) . '">' : '<span>' ?>
                <span aria-hidden="true">&raquo;</span>
                <span>
                    <?= t("last") ?>
                </span>
            <?= ($first_page_url) ? '</a>' : '</span>' ?>
        </li>
    </ul>
</nav>