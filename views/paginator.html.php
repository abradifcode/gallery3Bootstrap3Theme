<?php defined("SYSPATH") or die("No direct script access.") ?>
<? // See http://docs.kohanaphp.com/libraries/pagination ?>

<nav class="pager no-item-preview">
    <ul>
        <li<?= (!$first_page_url) ? ' class="disabled"' : '' ?>>
            <a href="<?= str_replace('{page}', 1, $url) ?>">
                <span aria-hidden="true">&laquo;</span>
                    <span>
                        <?= t("first") ?>
                    </span>
            </a>
        </li>

        <li<?= (!$previous_page_url) ? ' class="disabled"' : '' ?>>
            <a href="<?= str_replace('{page}', $previous_page, $url) ?>">
                <span aria-hidden="true">&lsaquo;</span>
                    <span>
                        <?= t("previous") ?>
                    </span>
            </a>
        </li>

        <li<?= (!$next_page_url) ? ' class="disabled"' : ''; ?>>
            <a href="<?= str_replace('{page}', $next_page, $url) ?>">
                <span aria-hidden="true">&rsaquo;</span>
                    <span>
                        <?= t("next") ?>
                        </span>
            </a>
        </li>

        <li<?= (!$last_page_url) ? ' class="disabled"' : '' ?>>
            <a href="<?= str_replace('{page}', $last_page, $url) ?>">
                <span aria-hidden="true">&raquo;</span>
                    <span>
                        <?= t("last") ?>
                        </span>
            </a>
        </li>
    </ul>
</nav>