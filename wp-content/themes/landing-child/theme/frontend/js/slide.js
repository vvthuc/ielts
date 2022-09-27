var SLIDER = (function () {
    var _initSlide = function () {
        const swiperBanner = new Swiper(".banner .swiper", {
            slidesPerView: 1,
            loop: false,
            speed: 600,
            autoHeight: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            speed: 1000,
            pagination: {
                el: ".banner .swiper-pagi",
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    };
    var _initTeacher = function () {
        const slideTeacher = new Swiper(".swiper-teacher-thumb", {
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                    centeredSlides: true,
                    centeredSlidesBounds: true,
                    grid: {
                        rows: 1,
                    },
                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                    centeredSlides: true,
                    centeredSlidesBounds: true,
                    grid: {
                        rows: 1,
                    },
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                    centeredSlides: true,
                    centeredSlidesBounds: true,
                    grid: {
                        rows: 1,
                    },
                },
                1024: {
                    grid: {
                        rows: 2,
                    },
                    slidesPerView: 3,
                    centeredSlides: false,
                    centeredSlidesBounds: false,
                },
            },
            spaceBetween: 0,
            pagination: {
                el: ".swiper-teacher-thumb .swiper-pagi",
                clickable: true,
            },
        });
        const slideTeacherMain = new Swiper(".swiper-teacher-main.swiper", {
            autoHeight: true,
            thumbs: {
                swiper: slideTeacher,
            },
        });
    };
    var _initPartner = function () {
        const slideTeacher = new Swiper(".swiper-partner", {
            slidesPerView: 3,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            spaceBetween: 10,
        });
    };
    var _initVideo = function () {
        const slideVideo = new Swiper(".swiper-video", {
            slidesPerView: 3,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".section-video .swiper-next",
                prevEl: ".section-video .swiper-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1.5,
                    spaceBetween: 10,
                    centeredSlidesBounds: true,
                    grid: {
                        rows: 1,
                    },
                },
                576: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                    centeredSlidesBounds: true,
                    grid: {
                        rows: 1,
                    },
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                    grid: {
                        rows: 1,
                    },
                    centeredSlidesBounds: true,
                },
                1024: {
                    grid: {
                        rows: 2,
                    },
                    centeredSlidesBounds: false,
                },
            },
            spaceBetween: 0,
            pagination: {
                el: ".swiper-video .swiper-pagi",
                clickable: true,
            },
        });
    };
    var loadEffectWow = function () {
        wow = new WOW();
        wow.init();
    };
    var _initFaq = function () {
        var itemFaq = $(".item-faq");
        var contentFaq = $(".item-faq .s-content");
        itemFaq.click(function (event) {
            event.preventDefault();
            var _content = $(this).children(".s-content");
            _content.slideDown(300);
            contentFaq.not(_content).slideUp(300);
        });
    };
    return {
        _: function () {
            _initSlide();
            _initTeacher();
            _initVideo();
            _initPartner();
            _initFaq();
            loadEffectWow();
        },
    };
})();
window.addEventListener("DOMContentLoaded", (event) => {
    SLIDER._();
});

$(document).ready(function () {
    var win = $(window);
    var html = $("html");
    var nav = $(".box-menu");
    var menu = nav.children(".menu").children("ul");
    var blur = $(".overlay");
    var heightHeader = $("header").outerHeight();
    function loadMenuMobile() {
        var showMenu = $(".btn-menu");
        menu.find("li").each(function (index, el) {
            if ($(this).find("ul li").length > 0) {
                $(this).prepend('<i class="fa fa-angle-right smooth"></i>');
            }
        });
        menu.find("i").click(function (event) {
            var offParent = $(this).offsetParent();
            var index = $(this).offsetParent().children("ul");
            var _this = $(this);
            if (index.is(":hidden")) {
                offParent.parent().find("ul").not(index).slideUp(250);
                offParent
                    .parent()
                    .find("ul")
                    .not(index)
                    .siblings("i")
                    .removeClass("active");
                index.slideToggle(250);
                _this.addClass("active");
                event.stopPropagation();
            } else {
                _this.removeClass("active");
                index.slideUp(250);
            }
            event.stopPropagation();
        });
        showMenu.click(function (event) {
            if (!nav.hasClass("active")) {
                showMenu.addClass("open");
                blur.addClass("active");
                nav.addClass("active");
                html.addClass("show-menu");
            } else {
                showMenu.removeClass("open");
                nav.removeClass("active");
                blur.removeClass("active");
                html.removeClass("show-menu");
            }
            event.stopPropagation();
        });
    }
    function loadCloseMenu() {
        win.click(function (e) {
            if (nav.has(e.target).length == 0 && !nav.is(e.target)) {
                nav.removeClass("active");
                blur.removeClass("active");
                html.removeClass("show-menu");
            }
        });
    }
    loadMenuMobile();
    loadCloseMenu();
});

var TAB_PANEL = (function () {
    const _navTargets = document.querySelectorAll(".navv .nav-item");
    const _tabTargets = document.querySelectorAll(".panel .tab-panel");
    var init = function () {
        _navTargets.forEach(function (elm, idx) {
            elm.addEventListener("click", function (event) {
                event.preventDefault();
                let _target = this.dataset.target;
                let _id = this.getAttribute("id");
                let _navs = this.parentElement.querySelectorAll(
                    "*:not(#" + _id + ")"
                );
                let _targetPanel = document.querySelector(_target);
                if (_targetPanel != null) {
                    this.dataset.state = "true";
                    _navs.forEach(function (e, i) {
                        e.dataset.state = "hide";
                    });
                    let _panelSiblings =
                        _targetPanel.parentElement.querySelectorAll(
                            ".tab-panel:not(" + _target + ")"
                        );
                    _panelSiblings.forEach(function (e, i) {
                        e.style.display = "none";
                        e.dataset.state = "hide";
                    });
                    _targetPanel.style.display = "flex";
                    _targetPanel.dataset.state = "show";
                } else {
                    console.log("Error Panel Empty !");
                }
            });
        });
    };
    return {
        _: function () {
            init();
        },
    };
})();
TAB_PANEL._();
