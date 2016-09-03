(function () {
    var $listWeapon = $('.list-weapon');
    var $listWeaponInfo = $('.list-weapon-info');
    var $weaponInfoWrapper = $('.weapon-info-wrapper');
    // 兵器谱--初始化轮播
    $listWeapon.slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: true,
        arrows: false
    });
    // 兵器谱详情--初始化轮播
    $listWeaponInfo.slick({
        infinite: false,
        slidesToShow: 2,
        centerMode: true,
        slidesToScroll: 1,
        dots: false,
        adaptiveHeight: true,
        vertical: true,
        prevArrow: $('.list-weapon-info-nav .up'),
        nextArrow: $('.list-weapon-info-nav .down')
    });

    $('.list-weapon-info .item').hover(function () {
        $(this).siblings().removeClass('slick-current');
    });

    $listWeapon.on('click', '.weapon-item', function (e) {
        e.stopPropagation();
        var index = $('.weapon-item').index($(this));
        $listWeaponInfo.slick('slickGoTo', index, true);
        $weaponInfoWrapper.addClass('active');
    });
    $weaponInfoWrapper.on('click', function (e) {
        e.stopPropagation();
    });
    $weaponInfoWrapper.on('click', '.fa-times', function () {
        $weaponInfoWrapper.removeClass('active');
    });
    $('.section-weapons').on('click', function () {
        $weaponInfoWrapper.removeClass('active');
    });
})();
