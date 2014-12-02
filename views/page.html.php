<?php defined("SYSPATH") or die("No direct script access.") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <? if ($page_title): ?>
            <?= $page_title ?>
        <? else: ?>
            <? if ($theme->item()): ?>
                <? if ($theme->item()->is_album()): ?>
                    <?= t("Browse Album :: %album_title", array("album_title" => $theme->item()->title)) ?>
                <? elseif ($theme->item()->is_photo()): ?>
                    <?= t("Photo :: %photo_title", array("photo_title" => $theme->item()->title)) ?>
                <?
                else: ?>
                    <?= t("Movie :: %movie_title", array("movie_title" => $theme->item()->title)) ?>
                <? endif ?>
            <? elseif ($theme->tag()): ?>
                <?= t("Browse Tag :: %tag_title", array("tag_title" => $theme->tag()->name)) ?>
            <?
            else: /* Not an item, not a tag, no page_title specified.  Help! */
            {
                ?>
                <?= t("Gallery") ?>
            <? } endif ?>
        <? endif ?>
    </title>
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300'
        rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?= url::file("lib/images/favicon.ico") ?>" type="image/x-icon"/>
    <?= $theme->css("style.min.css") ?>
    <?= $theme->script("footer.min.js") ?>
    <?= $theme->script("json2-min.js") ?>
    <?= $theme->script("jquery.form.js") ?>
    <?= $theme->script("gallery.common.js") ?>
    <? /* MSG_CANCEL is required by gallery.dialog.js */ ?>
    <script type="text/javascript">
        var MSG_CANCEL = <?= t('Cancel')->for_js() ?>;
    </script>
    <?= $theme->script("gallery.ajax.js") ?>
    <?= $theme->script("gallery.dialog.js") ?>

    <? /* These are page specific, but if we put them before $theme->head() they get combined */ ?>
    <? if ($theme->page_type == "photo"): ?>
        <?= $theme->script("jquery.scrollTo.js") ?>
    <? elseif ($theme->page_type == "movie"): ?>
        <?= $theme->script("flowplayer.js") ?>
    <? endif ?>

    <?= $theme->head() ?>
</head>

<body <?= $theme->body_attributes() ?>>
<?= $theme->page_top() ?>
<div id="doc4" class="gView">
    <header role="banner">
        <? if ($header_text = module::get_var("gallery", "header_text")): ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <?= $header_text ?>
                    </div>
                </div>
            </div>
        <? endif ?>

        <nav id="gBanner" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gSiteMenu">
                        <span>Toggle navigation</span>
                        <i></i>
                    </button>
                    <? if (is_file(realpath(dirname(__FILE__).'/../').'/images/logo.png')): ?>
                        <? $image_src = $theme->url("images/logo.png") ?>
                    <? else: ?>
                        <? $image_src = url::file("lib/images/logo.png") ?>
                    <? endif; ?>
                    <a href="<?= url::site("albums/1") ?>"
                       title="<?= t("Gallery Home")->for_html_attr() ?>">
                        <img alt="<?= t("Gallery")->for_html_attr() ?>"
                        src="<?= $image_src ?>" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="gSiteMenu">
                    <?= $theme->site_menu(); ?>
                </div>

                <div class="profile-menu">
                    <?= $theme->user_menu() ?>
                </div>

            </div>
        </nav>

        <? if ($header_text = module::get_var("gallery", "header_bottom")): ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <?= $header_bottom ?>
                    </div>
                </div>
            </div>
        <? endif ?>
    </header>


    <section class="sub-header container-fluid">
        <div>
            <div class="breadcrumbs">
                <nav>
                    <ol>
                        <li>
                            <a href="<?= url::site("albums/1") ?>"
                               class="home">
                                <i></i>
                            </a>
                        </li>

                        <? if ($theme->tag()): ?>
                            <li>
                                <a href="<?= $breadcrumbs[1]->url ?>"
                                   class="tag">
                                    <i></i>
                                    <?= html::purify($breadcrumbs[1]->title) ?>
                                </a>
                            </li>
                        <? elseif (count($parents) > 0): ?>
                            <? foreach ($parents as $index => $parent): ?>
                                <li>
                                    <?
                                    if ($parent->is_album())
                                    {
                                        $class = 'album';
                                    }
                                    elseif ($parent->is_movie())
                                    {
                                        $class = 'movie';
                                    }
                                    else
                                    {
                                        $class = 'photo';
                                    }
                                    ?>
                                    <a href="<?= url::site("albums/{$parent->id}?show={$theme->item()->id}") ?>"
                                       class="<?= $class ?>">
                                        <i></i>
                                        <?= html::purify($parent->title) ?>
                                    </a>
                                </li>
                            <? endforeach ?>

                            <?
                            if ($theme->item()->is_album())
                            {
                                $class = 'album';
                            }
                            elseif ($theme->item()->is_movie())
                            {
                                $class = 'movie';
                            }
                            else
                            {
                                $class = 'photo';
                            }
                            ?>

                            <li class="active">
                        <span class="<?= $class ?>">
                            <i></i>
                            <?= html::purify($theme->item()->title) ?>
                        </span>
                            </li>
                        <? endif; ?>

                    </ol>
                </nav>
            </div>

            <div class="search-form">
                <?= $theme->header_top() ?>
            </div>
        </div>
    </section>

    <main id="bd">
        <div id="content">

            <? if ($theme->site_status() != ''): ?>
                <div class="status">
                    <?= $theme->site_status() ?>
                </div>
            <? endif ?>

            <? if ($theme->messages() != ''): ?>
                <div class="messages">
                    <?= $theme->messages() ?>
                </div>
            <? endif; ?>

            <?= $content ?>
        </div>

        <div id="sidebar">
            <? if ($theme->page_type != "login"): ?>
                <?= new View("sidebar.html") ?>
            <? endif ?>
        </div>
    </main>


    <footer id="footer">
        <?= $theme->footer() ?>
        <? if ($footer_text = module::get_var("gallery", "footer_text")): ?>
            <?= $footer_text ?>
        <? endif ?>

        <? if (module::get_var("gallery", "show_credits")): ?>
            <ul id="gCredits">
                <?= $theme->credits() ?>
            </ul>
        <? endif ?>
    </footer>
</div>

<? //= $theme->page_bottom() ?>
</body>
</html>
