<?php defined("SYSPATH") or die("No direct script access.") ?>
<ul class="tag-list">
    <? foreach ($tags as $tag): ?>
        <li>
            <a href="<?= $tag->url() ?>">
                <i></i>
                <?= html::clean($tag->name) ?>
                <span class="badge"><?= $tag->count ?></span>
            </a>
        </li>
    <? endforeach ?>
</ul>
