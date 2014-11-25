<?php defined("SYSPATH") or die("No direct script access.") ?>
<? // See http://docs.kohanaphp.com/libraries/pagination ?>
<nav class="pager">
    <ul>
        <li<?= ($first_page) ? ' class="disabled"' : '' ?>>
            <a href="<?= str_replace('{page}', 1, $url) ?>">
                <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">
                        <?= t("first") ?>
                    </span>
            </a>
        </li>

        <li<?= (!$previous_page) ? ' class="disabled"' : '' ?>>
            <a href="<?= str_replace('{page}', $previous_page, $url) ?>">
                <span aria-hidden="true">&lsaquo;</span>
                    <span class="sr-only">
                        <?= t("previous") ?>
                    </span>
            </a>
        </li>

        <li<?= (!$next_page) ? ' class="disabled"' : ''; ?>>
            <a href="<?= str_replace('{page}', $next_page, $url) ?>">
                <span aria-hidden="true">&rsaquo;</span>
                    <span class="sr-only">
                        <?= t("next") ?>
                        </span>
            </a>
        </li>

        <li<?= ($last_page) ? ' class="disabled"' : '' ?>>
            <a href="<?= str_replace('{page}', $last_page, $url) ?>">
                <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">
                        <?= t("last") ?>
                        </span>
            </a>
        </li>
    </ul>
</nav>