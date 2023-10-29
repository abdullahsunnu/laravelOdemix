$(function () {
    $(".slider-brand-content").not('.slick-initialized').slick({
        infinite: false,
        slidesToShow: 8,
        slidesToScroll: 1,
        //autoplay: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 899,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    $(".right-arrow").on("click", function () {
        $(".slider-brand-content").slick("slickNext");
    });

    $(".left-arrow").on("click", function () {
        $(".slider-brand-content").slick("slickPrev");
    });

    $(".right-arrow-installment").on("click", function () {
        $("#installments").slick("slickNext");
    });

    $(".left-arrow-installment").on("click", function () {
        $("#installments").slick("slickPrev");
    });
});

/* function installmentCarousel(id) {
    $("#" + id).slick({
        infinite: true,
        slidesToShow: 8,
        slidesToScroll: 1,
        //autoplay: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 899,
                settings: {
                    slidesToShow: 8,
                    slidesToScroll: 1,
                },
            },
        ],
    });
}
 */
