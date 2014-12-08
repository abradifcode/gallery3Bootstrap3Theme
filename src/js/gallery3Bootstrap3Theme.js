$(document).ready(function () {

    // TWBS 3-level nav addition
    $('.dropdown-toggle', '.dropdown-menu').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();

        // Close any open menus on this level
        var $this = $(this);
        $this.parent('li').siblings('li').removeClass('open');

        // opening the one you clicked on
        $this.parent().addClass('open');

        // Find menu that's being opened, and adjust position
        var menu = $this.siblings('ul').first();
        var menupos = $(menu).offset();

        if (menupos.left + menu.width() > $(window).width()) {
            var newpos = -$(menu).width();
            menu.css({left: newpos});
        }
        else {
            var newpos = $this.parent().width();
            menu.css({left: newpos});
        }
    });

    // Pagination tooltips to show images on hover
    $('[data-toggle="tooltip"]').tooltip();

    // Intialize empty album covers with holder js images
    Holder.run({});

    // Initialize dialogs
    $(".g-dialog-link").gallery_dialog();

    // Initialize short forms
    $(".g-short-form").gallery_short_form();

    $(this).find(".g-dialog-link").gallery_dialog();
    $(this).find(".g-ajax-link").gallery_ajax();

    // Infinite scroll on collection pages
    /**
     * Extend and override the infinite scroll plugin
     */
    $.extend($.infinitescroll.prototype, {

        /**
         * Because we overrode the loading.msg to remove the <img> and the plugin expects it
         * it will error out, so we override the showdonemsg with our own custom callback
         *
         * @private
         */
        _showdonemsg_gallery3Bootstrap3Theme: function () {
            console.log('done');
            $('.infscr-loading').children('div').html('Done.').animate({opacity: 0}, 3000, function () {
                $('.infscr-loading').fadeOut()
            });
        }

    });

    $('body').infinitescroll({
        navSelector: ".pager.collection",
        nextSelector: '.pager.collection .next a',
        itemSelector: ".item-list > div .item",
        contentSelector: ".item-list > div",
        prefill: true,
        behavior: 'gallery3Bootstrap3Theme',
        loading: {
            msg: $('<div class="infscr-loading"><div><i class="fa fa-spin fa-circle-o-notch"></i></div></div>')
        }
    }, function(contentSelector, opts, url){
        var max = $(opts.navSelector).data('max-page');
        opts.maxPage = (max !== undefined) ? max : undefined;
    });
});