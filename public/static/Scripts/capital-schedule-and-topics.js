// 大会日程详情轮播初始化
$('.schedule-detail-list').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: $('.schedule-detail-list-nav .arrow-prev'),
    nextArrow: $('.schedule-detail-list-nav .arrow-next')
});
$('#modal-schedule').on('click', function (e) {
    if (!$(e.target).hasClass('close')) {
        e.stopPropagation();
    }
});
// 隐藏大会日程弹层
$('.close').on('click', function () {
    $('#modal-schedule').removeClass('show');
});

var $linkModalHelloworld = $('.j-modal-helloworld');
var $linkModalBeHacker = $('.j-modal-tobeahacker');
$linkModalHelloworld.hover(function () {
    $linkModalHelloworld.addClass('active')
}, function () {
    $linkModalHelloworld.removeClass('active')
});
$linkModalBeHacker.hover(function () {
    $linkModalBeHacker.addClass('active')
}, function () {
    $linkModalBeHacker.removeClass('active')
});

// 显示大会日程弹层--helloworld
$('.tabs-schedule').on('click', '.j-modal-helloworld', function () {
    e.stopPropagation();
    $('#modal-schedule').addClass('show');
    $('.schedule-detail-list').slick('slickGoTo', 0, true);

});
// 显示大会日程弹层--tobeahacker
$('.tabs-schedule').on('click', '.j-modal-tobeahacker', function () {
    e.stopPropagation();
    $('#modal-schedule').addClass('show');
    $('.schedule-detail-list').slick('slickGoTo', 1, true);
});
// 大会日程详情--轮播--修改当前位置


// 大会议题--初始化轮播
$('.list-topics').slick({
    lazyLoad: 'ondemand',
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: true,
    prevArrow: $('.list-topics-navs .arrow-prev'),
    nextArrow: $('.list-topics-navs .arrow-next'),
    appendDots: $('.list-topics-navs .dots-wrapper')
});
// 大会议题--轮播--修改当前位置
$('.list-topics').on('afterChange', function (event, slick, currentSlide) {
    var num = currentSlide / 4 + 1;
    $('.list-topics-navs .position').text('0' + num.toString());
});

// 大会议题--旋转
$('.section-topics .item-topic').hover(function () {
    $(this).addClass('reverse');
}, function () {
    $(this).removeClass('reverse');
});

;
(function ($) {
    // 加减器
    $.fn.counter = function () {
        return this.each(function () {
            var $input = $(this).find('input');
            var $minus = $(this).find('.minus');
            var $plus = $(this).find('.plus');

            var min = $input.attr('data-min') || 1;

            $input.val(min);

            $minus.click(function () {
                var cur = parseInt($input.val());
                if (isNaN(cur)) {
                    $input.val(min);
                } else if (cur == min) {
                    $input.val(min);
                } else {
                    $input.val(cur - 1);
                }
            });

            $plus.click(function () {
                var max = $input.attr('data-max') || 99999;
                var cur = parseInt($input.val());
                if (isNaN(cur)) {
                    $input.val(min);
                } else if (cur == max) {
                    $input.val(max);
                } else {
                    $input.val(cur + 1);
                }
            });

            $input.blur(function () {
                var cur = parseInt($input.val());
                if (isNaN(cur)) {
                    $(this).val(min);
                }
            });

        })
    };

}(jQuery));

