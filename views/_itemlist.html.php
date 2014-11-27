<div class="item-list">
    <div>
        <? foreach ($items as $i => $item): ?>
            <? $item_class = "photo"; ?>
            <? if ($item->is_album()): ?>
                <? $item_class = "album"; ?>
            <? endif ?>
            <div id="item-id-<?= $item->id ?>" class="item <?= $item->type ?>">
                <div>
                    <a href="<?= $item->url() ?>">
                        <?= $theme->thumb_top($item) ?>
                        <? if ($item->album_cover_item_id === null && $item->is_album()): ?>
                            <img data-src="holder.js/200x150/auto/#ffffff:#5a5a5a/text:No Preview" />
                        <? else: ?>
                            <?= $item->thumb_img() ?>
                        <? endif; ?>
                        <?= $theme->thumb_bottom($item) ?>
                    </a>

                    <div class="item-information">
                        <h6>
                            <a class="<?= $item->type ?>" href="<?= $item->url() ?>">
                                <i></i>
                                <?= html::purify($item->title) ?>
                            </a>
                        </h6>

                        <ul class="metadata">
                            <?= $theme->thumb_info($item) ?>
                        </ul>
                    </div>

                    <div class="actions">
                        <div class="row">
                            <div class="context-menu">
                                <?= $theme->context_menu($item, "#item-id-{$item->id} .gThumbnail") ?>
                            </div>

                            <? if (!$item->is_album() && access::can("view_full", $item)): ?>
                                <div class="download">
                                    <a class="download-link"
                                       href="<?= url::site("bootstrap/download/{$item->id}") ?>">
                                        <i></i>
                                        <?= t('Download') ?>
                                    </a>
                                </div>
                            <? endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach ?>
    </div>
</div>
<?= $theme->paginator() ?>