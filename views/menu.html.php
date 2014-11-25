<?php defined("SYSPATH") or die("No direct script access.") ?>
<? if (!$menu->is_empty()): ?>
    <? if ($menu->is_root): ?>
        <ul <?= $menu->css_id ? "id='$menu->css_id'" : "" ?> class="<?= $menu->css_class ?>">
            <? foreach ($menu->elements as $element): ?>
                <?= $element->render() ?>
            <? endforeach ?>
        </ul>

    <? else: ?>

        <li <?= (count($menu->elements) > 0 ? 'class="dropdown"' : ''); ?> title="<?= $menu->label->for_html_attr() ?>">
            <? if (count($menu->elements) > 0): ?>
            <? $cssClass = 'dropdown-toggle' ?>
            <? endif ?>
            <a href="#" class="<?= $cssClass ?> <?= $menu->id ?>"<?= (count($menu->elements) > 0 ? ' data-toggle="dropdown"' : ''); ?>>
                <? if ($menu->id == 'options_menu'): ?>
                    <i></i>
                    <span><?= $menu->label->for_html() ?></span>
                <? else: ?>
                    <?= $menu->label->for_html() ?>
                    <? if (count($menu->elements) > 0): ?>
                        <b class="caret"></b>
                    <? endif; ?>
                <? endif; ?>
            </a>
            <ul class="dropdown-menu">
                <? foreach ($menu->elements as $element): ?>
                    <?= $element->render() ?>
                <? endforeach ?>
            </ul>
        </li>

    <? endif ?>
<? endif ?>
