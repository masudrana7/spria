(function ($) {
    var windowOn = $(window);

    $(".sc-slick-slides").each(function () {
        var $this = $(this),
            slidestoshow =
                typeof $(this).data("slidestoshow") != "undefined" && $(this).data("slidestoshow").length != 0
                    ? $(this).data("slidestoshow")
                    : 1,
            speed =
                typeof $(this).data("speed") != "undefined" && $(this).data("speed").length != 0
                    ? $(this).data("speed")
                    : 500,
            slidesToScroll =
                typeof $(this).data("slidesToScroll") != "undefined" && $(this).data("slidesToScroll").length != 0
                    ? $(this).data("slidesToScroll")
                    : 1,
            centerMode =
                typeof $(this).data("centerMode") != "undefined" && $(this).data("centerMode").length != 0
                    ? $(this).data("centerMode")
                    : false,
            centerPadding =
                typeof $(this).data("centerPadding") != "undefined" && $(this).data("centerPadding").length != 0
                    ? $(this).data("centerPadding")
                    : "0",
            autoplay =
                typeof $(this).data("autoplay") != "undefined" && $(this).data("autoplay").length != 0
                    ? $(this).data("autoplay")
                    : true,
            arrows =
                typeof $(this).data("arrows") != "undefined" && $(this).data("arrows").length != 0
                    ? $(this).data("arrows")
                    : true,
            dots =
                typeof $(this).data("dots") != "undefined" && $(this).data("dots").length != 0
                    ? $(this).data("dots")
                    : false,
            prevArrow =
                typeof $(this).data("prevArrow") != "undefined" && $(this).data("prevArrow").length != 0
                    ? $(this).data("prevArrow")
                    : '<button class="prev">←</button>',
            nextArrow =
                typeof $(this).data("nextArrow") != "undefined" && $(this).data("nextArrow").length != 0
                    ? $(this).data("nextArrow")
                    : '<button class="next">→</button>',
            mobile_view =
                typeof $(this).data("mobile_view") != "undefined" && $(this).data("mobile_view").length != 0
                    ? $(this).data("mobile_view")
                    : 1,
            sm_tablet_view =
                typeof $(this).data("small_tablet_view") != "undefined" && $(this).data("small_tablet_view").length != 0
                    ? $(this).data("small_tablet_view")
                    : 1,
            tablet_view =
                typeof $(this).data("tablet_view") != "undefined" && $(this).data("tablet_view").length != 0
                    ? $(this).data("tablet_view")
                    : 1,
            laptop_view =
                typeof $(this).data("laptop_view") != "undefined" && $(this).data("laptop_view").length != 0
                    ? $(this).data("laptop_view")
                    : 1,
            main_view =
                typeof $(this).data("1200") != "undefined" && $(this).data("1200").length != 0
                    ? $(this).data("1200")
                    : 1;

        // alert(mobile_view);
        $($this).slick({
            slidesToShow: slidestoshow,
            speed: speed,
            slidesToScroll: slidesToScroll,
            centerMode: centerMode,
            centerPadding: centerPadding,
            autoplay: autoplay,
            prevArrow: prevArrow,
            nextArrow: nextArrow,
            arrows: arrows,
            dots: dots,
            responsive: [
                {
                    breakpoint: 1700,
                    settings: {
                        slidesToShow: main_view,
                    },
                },
                {
                    breakpoint: 1700,
                    settings: {
                        slidesToShow: laptop_view,
                    },
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: tablet_view,
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: sm_tablet_view,
                    },
                },
                {
                    breakpoint: 320,
                    settings: {
                        slidesToShow: mobile_view,
                    },
                },
            ],
        });
    });

    var popupvideos = $(".popup-video");
    if (popupvideos.length) {
        $(".popup-video").magnificPopup({
            disableOn: 10,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });
    }

    // Header Sticky  Js
    windowOn.on("scroll", function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $("#sc-header-sticky").removeClass("sc-header-sticky");
        } else {
            $("#sc-header-sticky").addClass("sc-header-sticky");
        }
    });

    /*-- canvas menu scripts start --*/
    var canva_expander = $("#canva_expander");
    if (canva_expander.length) {
        $("#canva_expander, #canva_close, #sc-overlay-bg2").on("click", function (e) {
            e.preventDefault();
            $("body").toggleClass("canvas_expanded");
        });
    }

    $(".mobile-navbar-menu a").each(function () {
        var href = $(this).attr("href");
        if ((href = "#")) {
            $(this).addClass("hash");
        } else {
            $(this).removeClass("hash");
        }
    });

    $.fn.menumaker = function (options) {
        var mobile_menu = $(this),
            settings = $.extend(
                {
                    format: "dropdown",
                    sticky: false,
                },
                options
            );

        return this.each(function () {
            mobile_menu.find("li ul").parent().addClass("has-sub");
            var multiTg = function () {
                mobile_menu.find(".has-sub").prepend('<span class="submenu-button"><em></em></span>');
                mobile_menu.find(".hash").parent().addClass("hash-has-sub");
                mobile_menu.find(".submenu-button").on("click", function () {
                    if ($(this).parent().siblings("li").hasClass("active")) {
                        $(this).parent().siblings("li").removeClass("active");
                        $(this).parent().siblings("li").find(".submenu-button").removeClass("submenu-opened");
                        $(this).parent().addClass("active");
                        $(this).addClass("submenu-opened");
                        if (
                            $(this).parent().siblings("li").find(".submenu-button").siblings("ul").hasClass("open-sub")
                        ) {
                            $(this)
                                .parent()
                                .siblings("li")
                                .find(".submenu-button")
                                .siblings("ul")
                                .removeClass("open-sub")
                                .hide("fadeIn");
                            $(this).parent().siblings("li").find(".submenu-button").siblings("ul").hide("fadeIn");
                        } else {
                            $(this)
                                .parent()
                                .siblings("li")
                                .find(".submenu-button")
                                .siblings("ul")
                                .addClass("open-sub")
                                .hide("fadeIn");
                            $(this)
                                .parent()
                                .siblings("li")
                                .find(".submenu-button")
                                .siblings("ul")
                                .slideToggle()
                                .show("fadeIn");
                        }

                        if ($(this).siblings("ul").hasClass("open-sub")) {
                            $(this).siblings("ul").removeClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").hide("fadeIn");
                            $(this).parent().removeClass("active");
                            $(this).removeClass("submenu-opened");
                        } else {
                            $(this).siblings("ul").addClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").slideToggle().show("fadeIn");
                        }
                    } else {
                        $(this).parent().addClass("active");
                        $(this).addClass("submenu-opened");
                        if ($(this).siblings("ul").hasClass("open-sub")) {
                            $(this).siblings("ul").removeClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").hide("fadeIn");
                            $(this).parent().removeClass("active");
                            $(this).removeClass("submenu-opened");
                        } else {
                            $(this).siblings("ul").addClass("open-sub").hide("fadeIn");
                            $(this).siblings("ul").slideToggle().show("fadeIn");
                        }
                    }
                });
            };

            if (settings.format === "multitoggle") multiTg();
            else mobile_menu.addClass("dropdown");
            if (settings.sticky === true) mobile_menu.css("position", "fixed");
            var resizeFix = function () {
                if ($(window).width() > 991) {
                    mobile_menu.find("ul").show("fadeIn");
                    mobile_menu.find("ul.sub-menu").hide("fadeIn");
                }
            };
            resizeFix();
            return $(window).on("resize", resizeFix);
        });
    };

    // scrollTop init
    var totop = $("#scrollUp");
    windowOn.on("scroll", function () {
        if (windowOn.scrollTop() > 150) {
            totop.fadeIn();
        } else {
            totop.fadeOut();
        }
    });
    totop.on("click", function () {
        $("html,body").animate(
            {
                scrollTop: 0,
            },
            500
        );
    });

    // Sal Animation
    sal({
        threshold: 0.1,
        once: true,
    });

    $(document).ready(function () {
        $("#mobile-navbar-menu").menumaker({
            format: "multitoggle",
        });
    });

    $(document).ready(function () {
        // ========== odometer initialize==========
        $(".odometer").appear(function (e) {
            var odo = $(".odometer");
            odo.each(function () {
                var countNumber = $(this).attr("data-count");
                $(this).html(countNumber);
            });
        });
    });

    /*-- pricing selector scripts start --*/
    $(".pricing-monthly-btn").on("click", function () {
        $("#pricing-selector").prop("checked", false);
        $(".pricing-monthly").css("display", "block");
        $(".pricing-yearly").css("display", "none");
    });

    $(".pricing-yearly-btn").on("click", function () {
        $("#pricing-selector").prop("checked", true);
        $(".pricing-monthly").css("display", "none");
        $(".pricing-yearly").css("display", "block");
    });

    $("#pricing-selector").on("change", function () {
        if (this.checked) {
            $(".pricing-monthly").css("display", "none");
            $(".pricing-yearly").css("display", "block");
        } else {
            $(".pricing-monthly").css("display", "block");
            $(".pricing-yearly").css("display", "none");
        }
    });
})(jQuery);
