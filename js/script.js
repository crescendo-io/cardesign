$(window).on('load',function(){
    $('.burger-menu').click(function(){
       $('.main-menu').slideToggle(100);
    });

    $('.arrow-sub').click(function(){
        var el = $(this);

        el.parent().find('.submenu').slideToggle(100);
    })

    $('.filter-buttons-toggle').click(function(){
       $('.filters-form').slideToggle();
    });

    $('.filters-form').on('change', function(){
        $('.filters-form').submit();
    });

    setTimeout(function(){
        $('.loader').fadeOut();
    },500);

});


$('.beforeAfter').beforeAfter({
    movable: true,
    clickMove: true,
    position: 50,
    separatorColor: '#fafafa',
    bulletColor: '#fafafa',
    onMoveStart: function(e) {
        console.log(event.target);
    },
    onMoving: function() {
        console.log(event.target);
    },
    onMoveEnd: function() {
        console.log(event.target);
    },
});