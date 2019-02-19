$(document).ready(function(){
    // init Masonry

    var $grid = $('.grid-imagens').masonry({
        itemSelector: 'none', // select none at first
        columnWidth: '.grid-imagens__col-sizer',
        gutter: '.grid-imagens__gutter-sizer',
        percentPosition: true,
        stagger: 10,
        // nicer reveal transition
        visibleStyle: { transform: 'translateY(0)', opacity: 1 },
        hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
    });

    // get Masonry instance
    var msnry = $grid.data('masonry');

    function resize_itens(msnry_inst) {
        var items = $grid.find('.grid-imagens__item');
        items.each(function(){
            if (!$(this).hasClass('item-event-loaded')) {
                $(this).click(function(event) {
                    if ($(this).hasClass('grid-imagens__item--width2')){
                        $(this).removeClass('grid-imagens__item--width2');
                        $('.hide-item').removeClass('hide-item');
                    } else {
                        $('.grid-imagens__item').addClass('hide-item');
                        $('.grid-imagens__item').removeClass('grid-imagens__item--width2');
                        $(this).addClass('grid-imagens__item--width2');
                        $(this).removeClass('hide-item');
                    }
                    msnry_inst.layout();
                });
                $(this).addClass('item-event-loaded');
            }
        });
    };

    // initial items reveal
    $grid.imagesLoaded( function() {
        $grid.removeClass('are-images-unloaded');
        $grid.masonry( 'option', { itemSelector: '.grid-imagens__item' });
        var $items = $grid.find('.grid-imagens__item');
        $grid.masonry( 'appended', $items );
        resize_itens(msnry);
    });

    // init Infinte Scroll

    $grid.infiniteScroll({
        path: '/060-divulgacao/2-galeria-de-imagens/page/{{#}}',
        append: '.grid-imagens__item',
        outlayer: msnry,
        status: '.page-load-status',
        scrollThreshold: 30,
        checkLastPage: '.grid-imagens__item',
        onInit: function() {
            this.on( 'load', function() {
                resize_itens(msnry);
            });
        }
    });

})
