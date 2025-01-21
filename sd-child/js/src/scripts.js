"use strict";

function site() {
    this.vars = {
        ready: !0,
        pageLoading: !1,
        pageReady: !1,
        history: {
            urls: [location.href.split("/").pop().split("?").shift()],
            index: 0
        },
        scrolltop: 0
    }, this.timer_resize, this.$navigation = $(".navigation"), this.$loopoffices = $(".loopoffices")
}

function _history() {
    this.historyLog = [], this.vars = {
        historyLogIndex: -1,
        contentChanged: !1,
        allowStateChange: !1,
        module: null,
        userClicked: !0,
        startUrl: this.relativeUrl(window.location.href),
        lastState: 0,
        stateChanged: !1
    }
}

function navigation(t) {
    this.$navigation = t, this.$navigation_wrap = t.find(".navigation__wrapper"), this.$navigation_sub = $(".navigation-sub"), this.$scroll = $(".navigation__scroll__bar"), this.$offices = $(".js-offices"), this.$a = $("a", t), this.icon = ".navigation .navigation__logo__icon", this.circular = ".navigation .navigation__logo__circular", this.path_group = this.circular + " .navigation__logo__path-group", this.path = this.circular + " .navigation__logo__path", this.scrollY = 0, this.currentPos = 0, this.initialized
}

function social() {
    this.selector = "[class*=icon--social]", this.initialized
}

function socialhub() {
    this.selector = ".socialhub", this.item = ".socialhub__item", this.filter = ".socialhub__head__filter", this.$item_tpl = $('<div class="socialhub__item">\t\t\t\t\t\t\t<div class="socialhub__item__inner">\t\t\t\t\t\t\t\t<div class="socialhub__item__content">\t\t\t\t\t\t\t\t\t<div class="socialhub__item__user">\t\t\t\t\t\t\t\t\t\t<div class="socialhub__item__user__img"></div>\t\t\t\t\t\t\t\t\t\t<div class="socialhub__item__user__name"></div>\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t<a target="_blank" class="socialhub__item__date"></a>\t\t\t\t\t\t\t\t\t<div class="socialhub__item__hover">\t\t\t\t\t\t\t\t\t\t<div class="socialhub__item__text"></div>\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t</div>'), this.scrollController = new ScrollMagic.Controller, this.scenes = []
}

function labs() {
    this.selector = ".labs-overview__outer", this.holder = ".labs-overview__inner", this.$item_tpl = $('<a class="labs-overview__item" href="javascript:;">\t\t\t\t\t\t\t<div class="labs-overview__item__image">\t\t\t\t\t\t\t\t<div class="teaser__date">\t\t\t\t\t\t\t\t\t<div class="teaser__date__inner">\t\t\t\t\t\t\t\t\t\t<span class="day"></span>\t\t\t\t\t\t\t\t\t\t<span class="month"></span>\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t<div class="bg" data-bg=""></div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<div class="labs-overview__item__text">\t\t\t\t\t\t\t\t<p class="subheadline subheadline--small"></p>\t\t\t\t\t\t\t\t<h3 class="h4--big"></h2>\t\t\t\t\t\t\t\t<p class="desc"></p>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t</a>'), this.scrollController = new ScrollMagic.Controller, this.scenes = []
}

function footer() {
    this.$footer = $("footer"), this.$wrapper = $(".footer__wrapper"), this.$bg = $(".footer__background"), this.$video = $(".footer__video"), this.slider, this.timer, this.icon = ".footer__header .navigation__logo__icon", this.circular = ".footer__header .navigation__logo__circular", this.path_group = this.circular + " .navigation__logo__path-group", this.path = this.circular + " .navigation__logo__path", this.loading, this.$icon = $(this.icon), this.$footer_header = $(".footer__header"), this.$contents = $(".contents"), this.initialized
}

function slider() {
    this.selector = ".js-slider", this.mobile = $("html.until-desktopEx").length
}

function swiper() {
    this.selector = ".js-swiper"
}

function textmask() {
    this.selector = ".hero h1, .intro h1", this.settings = {
        add: "",
        remove: "bottom",
        delay: 40
    }
}

function parallax() {
    this.tweens = []
}

function gallery() {
    this.selector = ".gallery--zoom,.images", this.sel, this.$zoom_pages, this.$zoom_items, this.$overlay, this.overlay, this.zoom_index, this.zoom_length
}

function subheadline() {
    this.selector = "h2.subheadline", this.tweens = []
}

function videoInline() {
    this.selector = ".js-video-inline", this.$video = $('<video loop preload="none"></video>'), this.$video_button = $('<div class="video-inline__button"></div>'), this.win_y
}

function slider() {
    this.selector = ".js-slider", this.mobile = $("html.until-desktopEx").length
}

function countup() {
    this.selector = ".js-countup", this.scrollController = new ScrollMagic.Controller, this.scenes = []
}

function showmore() {
    this.selector = ".js-showmore", this.selector_name = this.selector.split(".").join("")
}

function filter() {
    this.selector = ".filter", this.line_height = 1.5
}

function smoothScroll() {
    this.enabled = !0
}

function offices() {
    this.selector = ".js-offices", this.trigger = ".js-offices-trigger", this.list = ".loopoffices__content ul li .time", this.timer, this.initialized
}

function infobar() {
    this.selector = ".js-infobar", this.close = ".js-infobar-close", this.cookies = ".js-cookies", this.accept = ".js-cookies-accept", this.$offices = $(".js-offices"), this.$chatbutton = $(".js-chatbutton"), this.initialized
}

function contactOffices() {
    this.selector = ".js-contactOffices"
}

function onScreen() {
    this.selector = ".js-on-screen", this.mobile = $("html.until-desktopEx").length, this.tweens = []
}

function scrollto() {
    this.trigger = ".js-scrollto"
}

function landing() {
    this.selector = ".js-landing", this.img_tpl = '<div class="landing__img" style="background-image: url(###img###);"></div>', this.$placeholder, this.speed = 200, this.states = {
        visible: "is-visible",
        active: "is-active",
        prev: "is-prev",
        hover: "is-hover",
        hover_body: "page--landing-hover",
        init: "is-init"
    }
}

function teaser() {
    this.selector = ".js-teaser", this.$video = $('<video preload="none" loop muted></video>')
}

function teaser_button() {
    this.selector = ".js-teaser-button", this.$video = $('<video preload="none" loop muted></video>')
}

function form() {
    this.selector = ".form", this.classes = {
        upload: ".form__item__upload",
        select: "select",
        select_options: ".form__item__select__options"
    }, this.states = {
        loading: "is-loading"
    }
}

function infobox() {
    this.selector = ".infobox", this.slides = ".infobox__content--slides", this.slide = ".infobox__content__slide", this.button = ".infobox__button", this.back = ".infobox__content__slide__back"
}

function svginline() {
    this.selector = ".js-svginline", this.scrollController = new ScrollMagic.Controller, this.scenes = []
}

function chatbutton() {
    this.selector = ".js-chatbutton", this.$el = $(".js-chatbutton"), this.index = 0
}

function checklist() {
    this.tweens = []
}

function process() {
    this.tweens = []
}

function videoHero() {
    this.selector = ".js-video-hero"
}
var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(t) {
    return typeof t
} : function(t) {
    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
};
$.extend($.lazyLoadXT, {
    oninit: {
        addClass: "lazy"
    },
    onload: {
        removeClass: "lazy",
        addClass: "lazy-loaded"
    }
});
var options = $.lazyLoadXT,
    bgAttr = options.bgAttr || "data-bg";
options.selector += ",[" + bgAttr + "]", $(document).on("lazyshow", function(t) {
    var e = $(t.target);
    if (!e.data("lazyshow")) {
        var i = e.parent(),
            n = i.attr("data-lazyloaded");
        e.data("lazyshow", !0), i.addClass("lazy--loaded").attr("data-lazyloaded", n ? Number(n) + 1 : 1), ($(".content--new .lazy")[0] == e[0] || !$(".content--new").length && $(".lazy")[0] == e[0]) && app.modules.site.pageShow(), e.is("[" + bgAttr + "]") && e.css("background-image", "url('" + e.attr(bgAttr) + "')").removeAttr(bgAttr)
    }
}).on("lazyload", function(t) {
    $(t.target)
}), $("img[data-src]").each(function(t) {
    var e = $(this);
    e.attr("width") && e.attr("height") && e.css("padding-bottom", e.attr("height") / e.attr("width") * 100 - 0 + "%")
});
var app = new function() {
        this.modules = {}, this.obj = {}, this.settings = {}, this.vars = {
            isTouchDevice: !1,
            breakPoints: {
                mobile: 320,
                mobileLandscape: 480,
                tablet: 740,
                desktopAd: 810,
                tabletLandscape: 906,
                desktop: 980,
                desktopEx: 1025,
                wide: 1200,
                full: 1480,
                max: 1600,
                design: 1600
            }
        }, this.init = function() {
            var t = this;
            this.resize(), this.detectTouchDevice();
            $.expr[":"].internal = function(t) {
                var e = $(t),
                    i = e.attr("href") || "",
                    n = History.getRootUrl();
                return i.substring(0, n.length) === n || -1 === i.indexOf(":")
            }, $.each(this.modules, function(t, e) {
                "function" == typeof e.init && e.init()
            }), this.parse($("body")), $win.bind("load", function() {
                $.each(t.modules, function(t, e) {
                    "function" == typeof e.onLoad && e.onLoad()
                })
            })
        }, this.parse = function(t) {
            $.each(this.modules, function(e, i) {
                "function" == typeof i.parse && i.parse(t)
            })
        };
        var t = $win_w;
        this.resize = function(e, i) {
            $win_w = $win.innerWidth(), $win_h = $win.innerHeight(), $navigation_height = $navigation.height(), $win_scroll_top = $win.scrollTop(), $win_scroll_height = $body.height() - $win_h, (t != $win_w || e) && (t = $win_w, $.each(this.modules, function(t, e) {
                "function" != typeof e.resize || i && i == e || e.resize()
            }))
        }, this.detectTouchDevice = function() {
            var t = navigator.userAgent.toLowerCase(),
                e = "ontouchstart" in window || navigator.maxTouchPoints;
            if ((t.match(/(iphone|ipod|ipad)/) || t.match(/(android)/) || t.match(/(iemobile)/) || t.match(/iphone/i) || t.match(/ipad/i) || t.match(/ipod/i) || t.match(/blackberry/i) || t.match(/bada/i)) && e) {
                if (-1 !== document.body.className.indexOf("is-touch")) return;
                document.body.className.length ? document.body.className += " is-touch" : document.body.className = "is-touch", app.vars.touch = !0, touch = !0
            } else {
                if (-1 !== document.body.className.indexOf("no-touch")) return;
                document.body.className.length ? document.body.className += " no-touch" : document.body.className = "no-touch"
            }
            Modernizr.touch && (app.vars.isTouchDevice = !0)
        }, this.getViewport = function(t) {
            var e, i;
            return void 0 !== window.innerWidth ? (e = window.innerWidth, i = window.innerHeight) : void 0 !== document.documentElement && void 0 !== document.documentElement.clientWidth && 0 != document.documentElement.clientWidth ? (e = document.documentElement.clientWidth, i = document.documentElement.clientHeight) : (e = document.getElementsByTagName("body")[0].clientWidth, i = document.getElementsByTagName("body")[0].clientHeight), "width" == t ? e : i
        }, this.reinit = function(t) {
            $.each(this.modules, function(t, e) {
                "function" == typeof e.reinit && e.reinit()
            })
        }
    },
    global_nav_height = 0,
    global_info_height = 0,
    $win = $(window),
    $doc = $(document),
    $html = $("html"),
    $body = $("body"),
    $navigation = $(".navigation"),
    $win_w, $win_h, $navigation_height, $win_scroll_top, $win_scroll_height, touch;
$(function() {
    app.init(), $win.on("resize.app orientationchange.app", function() {
        app.resize()
    })
}), app.obj.logo = function(t, e, i) {
    var n, o, s, a = {},
        r = t,
        l = r.find(".navigation__logo__icon"),
        c = r.find(".navigation__logo__circular"),
        d = r.find(".navigation__logo__path-group"),
        u = r.find(".navigation__logo__path"),
        h = !e,
        p = i ? -1 : 0,
        m = !h,
        f = function() {
            o = new TimelineMax({
                repeat: p,
                paused: h
            }), o.to(d, 1, {
                rotation: "360",
                ease: Cubic.easeInOut
            }), o.to(u, 1, {
                drawSVG: "10%,93%",
                ease: Cubic.easeInOut
            }, "-=1"), o.to(u, 1, {
                drawSVG: "93%",
                ease: Cubic.easeInOut
            }, "+=0"), s = new TimelineMax({
                repeat: p,
                paused: h
            }), s.to(c, 2, {
                rotation: "360",
                ease: Linear.easeNone
            })
        };
    a.loadingStart = function() {
        m = !0, g(), v()
    }, a.loadingStop = function() {
        o.pause(), s.pause(), m && (TweenMax.to(d, 1, {
            rotation: "360",
            ease: Sine.easeOut,
            onComplete: function() {
                o.seek(0)
            }
        }), TweenMax.to(u, 1, {
            drawSVG: "93%",
            ease: Sine.easeOut
        }), TweenMax.to(c, 1, {
            rotation: "360",
            ease: Sine.easeOut
        })), m = !1
    };
    var g = function() {
            o.restart()
        },
        v = function() {
            s.restart()
        };
    return function(t) {
        n || (TweenMax.set(c, {
            transformOrigin: "50% 50%"
        }), TweenMax.set(d, {
            transformOrigin: "50% 50%"
        }), TweenMax.set(u, {
            drawSVG: "93%"
        }), TweenMax.from(l, 1, {
            opacity: "0",
            ease: Sine.easeIn
        }), f(), n = !0)
    }(), a
};
var breakPoints = {
        mobile: 320,
        mobileLandscape: 480,
        untilTablet: 739,
        tablet: 740,
        desktopAd: 810,
        tabletLandscape: 906,
        desktop: 980,
        desktopEx: 1025,
        wide: 1200,
        full: 1300
    },
    scrollController, site_dev;
site.prototype = {
    init: function() {
        var t = this;
        t.addListener(), location.href.indexOf(".devlocal") >= 0 && (site_dev = !0, $html.addClass("showDebug")), location.href.indexOf(".xip.io") > 0 && location.search.indexOf("debug") >= 0 && eruda.init(), scrollController = new ScrollMagic.Controller, scrollController.scrollTo(function(t, e) {
            var i, n, o = 1.3,
                s = Power3.easeInOut;
            e && (i = e.callback || !1, o = e.duration || o, n = e.target || !1), n && (t = n.offset ? n.offset().top : n), TweenMax.to(window, o, {
                scrollTo: {
                    y: t,
                    autoKill: !1
                },
                ease: s,
                onComplete: i
            })
        }), t.htmlParams(), $(".navigation-sub").length && $html.addClass("page--navigation-sub");
        var e = $(".content_wrap"),
            i = $(".navigation-sub"),
            n = t.contentHeightCalc(e);
        e.css({
            height: n + "px",
            transform: "translateY(" + n + "px) translateZ(0)"
        }).addClass("prepared"), $(".footer__wrapper").css("margin-top", "100vh"), $(".contents").prepend(e).css("visibility", "visible"), i.addClass("navigation-sub--hidden").appendTo($(".navigation__wrapper")), e.children(".content").css({
            transform: "translateY(-" + (n - n / 15) + "px)"
        }), setTimeout(function() {
            e.css({
                height: n + "px",
                transform: "none"
            }), e.children(".content").css({
                transform: "translateY(0px)"
            }), setTimeout(function() {
                $win.scrollTop(0), $(".contents > .content_wrap, .contents .content, .footer__wrapper").removeAttr("style"), e.removeClass("prepared")
            }, 990)
        }, 10), t.pagePrepare(), setTimeout(function() {
            t.pageIn(!0)
        }, 1e3)
    },
    htmlParams: function() {
        Modernizr.mq("(max-width: " + (app.vars.breakPoints.desktop - 1) + "px)") ? $html.addClass("touch-test until-desktop").removeClass("no-touch-test") : $html.removeClass("touch-test until-desktop").addClass("no-touch-test"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.mobileLandscape - 1) + "px)") ? $html.addClass("until-mobileLandscape") : $html.removeClass("until-mobileLandscape"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.tablet - 1) + "px)") ? $html.addClass("until-tablet") : $html.removeClass("until-tablet"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.desktop - 1) + "px)") ? $html.addClass("until-desktop") : $html.removeClass("until-desktop"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.desktopEx - 1) + "px)") ? $html.addClass("until-desktopEx") : $html.removeClass("until-desktopEx"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.tabletLandscape - 1) + "px)") ? $html.addClass("until-tabletLandscape") : $html.removeClass("until-tabletLandscape"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.wide - 1) + "px)") ? $html.addClass("until-wide") : $html.removeClass("until-wide"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.full - 1) + "px)") ? $html.addClass("until-full") : $html.removeClass("until-full"), Modernizr.mq("(max-width: " + (app.vars.breakPoints.design - 1) + "px)") ? $html.addClass("until-design") : $html.removeClass("until-design"), Modernizr.mq("(min-width: " + app.vars.breakPoints.tablet + "px)") ? $html.addClass("from-tablet") : $html.removeClass("from-tablet"), Modernizr.mq("(min-width: " + app.vars.breakPoints.desktop + "px)") ? $html.addClass("from-desktop") : $html.removeClass("from-desktop")
    },
    resize: function() {
        this.htmlParams(), void 0 !== scrollController && void 0 !== scrollController.update && ($('[style*="z-index: -10000"]').css("height", "auto"), scrollController.update(!0)), clearTimeout(this.timer_resize), $html.hasClass("page--show") && $html.addClass("page--resize"), this.timer_resize = setTimeout(function() {
            $html.removeClass("page--resize")
        }, 100)
    },
    contentHeightCalc: function(t) {
        var e = $win.innerHeight();
        return $(".from-desktop .js-infobar").length > 0 ? e -= $(".js-infobar").height() : $(".block--landingintro--infobar", t).removeClass("block--landingintro--infobar"), e
    },
    addListener: function() {
        var t = this;
        $("a:internal").not(".gallery__item").not("[href*=#]").unbind().on({
            click: function() {
                var e = $(this),
                    i = e.parents(".navigation__container");
                return i.length && i.find("a").removeClass("active").filter(e).addClass("active"), app.modules._history.allowStateChange(e.attr("href")) && t.pageSwitch(e.attr("href")), !1
            }
        })
    },
    pageSwitch: function(t, e) {
        var i = this,
            n = t.split("/").pop().split("?").shift(),
            o = e || !1;
        i.vars.scrolltop = o ? o.scrollTop : 0, $html.hasClass("page--nav-open") && $(".navigation__toggle").trigger("click"), n == i.vars.history.urls[i.vars.history.index - 1] ? i.vars.history.index-- : (i.vars.history.index++, i.vars.history.urls.push(n)), this.$navigation.hasClass("hidden") && ($(".navigation-sub").addClass("navigation-sub--hidden"), this.$navigation.removeClass("hidden")), this.$loopoffices.removeClass("hidden active"), $html.removeClass("page--offices"), $body.addClass("loading"), app.modules.navigation.loadingStart(), app.modules._history.loadPage(t, ".bodywrap", "site", "pageSwitch"), $.each(app.modules, function(t, e) {
            "function" == typeof e.onPageSwitch && e.onPageSwitch()
        })
    },
    pageLoaded: function(t) {
        var e = this;
        clearInterval(e.vars.pageLoading), e.vars.pageLoading = setInterval(function() {
            e.vars.ready && (e.vars.ready = !1, clearInterval(e.vars.pageLoading), clearTimeout(e.vars.pageReady), e.vars.pageReady = setTimeout(function() {
                e.vars.ready = !0
            }, 2e3), e.pageSwitchEnd(t))
        }, 10)
    },
    pageSwitchEnd: function(t) {
        var e = this;
        $win.scrollTop();
        $(".content_wrap--current").addClass("js-old_content");
        var i = $("<div></div>").append($(t)),
            n = $(".content_wrap", i),
            o = $(".navigation-sub", i),
            s = e.contentHeightCalc(n);
        n.find(".footer__wrapper").remove(), n.css({
            height: s + "px",
            transform: "translateY(" + s + "px) translateZ(0)"
        }).addClass("prepared"), $("a", e.$navigation).removeClass("active").filter('[href="' + $(".navigation .navigation__container li a.active", i).attr("href") + '"]').addClass("active"), $html.removeClass("page--navigation-sub-show"), o.length ? setTimeout(function() {
            $html.addClass("page--navigation-sub")
        }, 1e3) : $html.removeClass("page--navigation-sub"), console.log(s + " , " + e.vars.scrolltop), $(".navigation__wrapper > .navigation-sub").addClass("js-old_content"), $(".contents").prepend(n), o.addClass("navigation-sub--hidden").appendTo($(".navigation__wrapper")), n.children(".content").css({
            transform: "translateY(-" + (s - s / 9.5) + "px)",
            top: -e.vars.scrolltop + "px"
        }), n.css({
            overflow: "hidden"
        }), setTimeout(function() {
            n.css({
                height: s + "px",
                transform: "none"
            }), n.children(".content").css({
                transform: "translateY(0px) translateZ(0)"
            }), setTimeout(function() {
                $(".bodywrap--black").length > 0 ? (console.log("remove"), $(".bodywrap").removeClass("bodywrap--black"), $(".navigation").removeClass("navigation--black"), $(".loopoffices__trigger").removeClass("loopoffices__trigger--black"), $(".navigation__scroll").removeClass("navigation__scroll--black")) : n.find(".video-hero").length > 0 && (console.log("add"), $(".bodywrap").addClass("bodywrap--black"), $(".navigation").addClass("navigation--black"), $(".loopoffices__trigger").addClass("loopoffices__trigger--black"), $(".navigation__scroll").addClass("navigation__scroll--black"))
            }, 600), setTimeout(function() {
                $win.scrollTop(e.vars.scrolltop), $(".contents > .content_wrap").removeAttr("style"), n.children(".content").removeAttr("style"), n.removeClass("prepared")
            }, 990), setTimeout(function() {
                $(".js-old_content").remove()
            }, 990)
        }, 10), $.each(app.modules, function(t, e) {
            "function" == typeof e.onPageSwitchEnd && e.onPageSwitchEnd()
        }), setTimeout(function() {
            $.each(app.modules, function(t, e) {
                "function" == typeof e.onPageSwitchDone && e.onPageSwitchDone()
            })
        }, 1e3), e.pagePrepare(), app.modules.site.addListener(), setTimeout(function() {
            $("*[data-bg], *[data-src]").lazyLoadXT({
                forceLoad: !0,
                visibleOnly: !1
            })
        }, 700), setTimeout(function() {
            e.pageIn(!1)
        }, 1400)
    },
    pagePrepare: function() {
        $html.addClass("page--prepare"), $.each(app.modules, function(t, e) {
            "function" == typeof e.onPagePrepare && e.onPagePrepare()
        }), $(".js-landing").length > 0 && $html.addClass("page--landing")
    },
    pageIn: function(t) {
        $.each(app.modules, function(t, e) {
            "function" == typeof e.onPageIn && e.onPageIn()
        }), $("*[data-bg], *[data-src]").lazyLoadXT({
            forceLoad: !0,
            visibleOnly: !1
        }), $win.trigger("resize"), $html.addClass("page--in"), $html.removeClass("page--prepare"), $(".js-landing").length <= 0 && $html.removeClass("page--landing"), verge.inViewport($(".content_wrap--new div.lazy")) || this.pageShow()
    },
    pageShow: function() {
        $(".content_wrap").addClass("content--current--done"), $(".content_wrap ~ *:not(.footer__wrapper)").remove(), setTimeout(function() {
            $(".contents").removeClass("contents--fixed"), $(".content_wrap--new").addClass("content--current--done"), $(".content_wrap--new .content").addClass("content--current").removeClass("content--new"), $(".content_wrap--new").addClass("content_wrap--current").removeClass("content_wrap--new"), setTimeout(function() {
                $("body").removeClass("loading"), app.modules.navigation.loadingStop()
            }, 700), setTimeout(function() {}, 1e3), $(".navigation-sub--hidden").removeClass("navigation-sub--hidden"), setTimeout(function() {
                $.each(app.modules, function(t, e) {
                    "function" == typeof e.onPageShow && e.onPageShow()
                }), $html.removeClass("page--in")
            }, 400), setTimeout(function() {
                $html.addClass("page--ready"), $html.addClass("page--done")
            }, 100), $html.addClass("page--show"), $(".js-landing").length > 0 || $(".video-hero").length > 0 ? $html.addClass("page--landing") : $html.removeClass("page--landing")
        }, 300)
    }
}, app.modules.site = new site, _history.prototype = {
    init: function() {
        this.addListener(), "scrollRestoration" in history && (history.scrollRestoration = "manual")
    },
    addListener: function() {
        var t = this;
        $win.bind("statechange", function() {
            if (0 == t.historyLog.length && (document.location.href = History.getState().url), t.historyLog.length > 0 && 0 == t.vars.contentChanged) {
                t.relativeUrl(window.location.href);
                t.vars.userClicked = !0, t.vars.stateChanged = !0;
                var e = t.vars.historyLogIndex - 1;
                e < 0 && (e = 0);
                var i = t.historyLog[e];
                console.log(i), app.modules[i.module][i.moduleFunction](window.History.getState().hash, i), t.vars.stateChanged = !1
            }
        })
    },
    loadPage: function(t, e, i, n) {
        if (t instanceof jQuery) var o = t.attr("href");
        else var o = t;
        if (!1 === this.allowStateChange(o)) return !1;
        if (!window.History.enabled) return document.location.href = o, !1;
        var s = this,
            a = $win.scrollTop();
        console.log("loadPage:" + a), $.ajax({
            type: "GET",
            url: o,
            data: "",
            success: function(t) {
                var r = $("<i/>" + s.documentHtml(t)),
                    l = r.find(".document-body:first"),
                    c = (r.find("title").html(), l.find(e).filter(":first")),
                    d = c.html() || r.html();
                if (console.log("pageLoaded"), !d) return document.location.href = o, !1;
                if (s.vars.module = i, s.updateTitle(s.documentTitle(t)), s.vars.contentChanged = !0, s.vars.historyLogIndex < 0) {
                    var u = {
                        url: s.vars.startUrl,
                        module: i,
                        moduleFunction: n,
                        scrollTop: a
                    };
                    s.historyLog.push(u), s.vars.historyLogIndex = 0
                }
                var h = {
                    url: o,
                    module: i,
                    moduleFunction: n,
                    scrollTop: a
                };
                s.historyLog.push(h), s.vars.historyLogIndex++, s.pushState(o, s.documentTitle(t)), s.vars.contentChanged = !1, app.modules[i].pageLoaded(d), s.tracking(o)
            },
            error: function(t, e, i) {
                return document.location.href = o, !1
            }
        })
    },
    simulateStateChange: function(t, e, i, n) {
        var o = t.attr("href");
        if (!window.History.enabled) return document.location.href = o, !1;
        var s = this;
        s.vars.module = e, s.updateTitle(n), s.vars.contentChanged = !0;
        var a = {
            url: o,
            module: e,
            moduleFunction: i,
            scrollTop: $win.scrollTop()
        };
        s.historyLog.push(a), s.vars.historyLogIndex++, s.pushState(o, n), s.vars.contentChanged = !1, app.modules[e].pageLoaded(null), s.tracking(o)
    },
    documentHtml: function(t) {
        return String(t).replace(/<\!DOCTYPE[^>]*>/i, "").replace(/<(html|head|body|title|meta|script)([\s\>])/gi, '<div class="document-$1"$2').replace(/<\/(html|head|body|title|meta|script)\>/gi, "</div>")
    },
    documentTitle: function(t) {
        var t = t.match(/<title[^>]*>([^<]+)<\/title>/);
        return null === t ? "" : t[1]
    },
    pushState: function(t, e) {
        var i = this;
        return !0 !== i.vars.stateChanged && (window.History.pushState(null, e, t), i.vars.stateChanged = !1), !1
    },
    tracking: function(t) {
        "undefined" != typeof ga && (ga("set", {
            page: this.relativeUrl(t),
            title: document.title.replace("<", "&lt;").replace(">", "&gt;").replace(" & ", " &amp; ")
        }), ga("send", "pageview"))
    },
    relativeUrl: function(t) {
        var e = location.protocol + "//" + location.host,
            i = t.replace(e, "").replace("./", "/");
        return "/" != i.charAt(0) && (i = "/" + i), i
    },
    allowStateChange: function(t) {
        var e = this;
        return 1 == e.vars.userClicked ? (e.vars.userClicked = !1, !0) : (this.relativeUrl(t) != this.relativeUrl(window.location.href) || 1 == this.vars.allowStateChange) && (e.vars.allowStateChange = !1, !0)
    },
    updateTitle: function(t) {
        document.title = t;
        try {
            document.getElementsByTagName("title")[0].innerHTML = document.title.replace("<", "&lt;").replace(">", "&gt;").replace(" & ", " &amp; ")
        } catch (t) {}
    }
}, app.modules._history = new _history, $doc.ready(function() {
    $doc.on("focus", ".input input", function() {
        $(this).addClass("done")
    }).on("blur", ".input input", function() {
        $(this).val().length < 1 && $(this).removeClass("done")
    })
}), navigation.prototype = {
    constructor: navigation,
    initView: function() {
        var t = this;
        t.logo = new app.obj.logo(t.$a, !0, !0)
    },
    initPlugins: function() {
        var t = this;
        $doc.on("click.navigation", ".navigation__toggle", function() {
            $html.hasClass("page--nav-open") ? t.navClose() : t.navOpen(), $html.toggleClass("page--nav-open")
        }), t.$navigation_sub.appendTo(t.$navigation_wrap)
    },
    initListeners: function() {
        var t = this;
        t.currentPos = $win.scrollTop();
        var e = 0;
        $win.bind("scroll.nav resize.nav orientationchange.nav", function() {
            var i = $(".js-infobar"),
                n = i.length && $body.hasClass("no-touch") ? i.height() : 0,
                o = ($(".navigation-sub"), t.$navigation.height() + n);
            t.currentPos = $win.scrollTop(), t.currentPos > o ? t.currentPos > e ? (e <= o && t.currentPos > o && (t.$navigation.addClass("noanim"), t.$offices.addClass("noanim")), t.$navigation.addClass("hidden fixed"), t.$offices.addClass("hidden fixed"), e <= o && t.currentPos > o && setTimeout(function() {
                t.$navigation.removeClass("noanim"), t.$offices.removeClass("noanim")
            }, 10)) : (t.$navigation.removeClass("hidden"), t.$navigation.addClass("fixed"), t.$offices.removeClass("hidden"), t.$offices.addClass("fixed")) : t.currentPos <= n && (t.$navigation.removeClass("hidden fixed"), t.$offices.removeClass("hidden fixed")), e = t.currentPos, t.subnavScroll()
        })
    },
    navOpen: function() {
        this.scrollY = $win.scrollTop()
    },
    navClose: function() {
        var t = this;
        $win.scrollTop(t.scrollY)
    },
    loadingStart: function() {
        this.logo.loadingStart()
    },
    loadingStop: function() {
        this.logo.loadingStop()
    },
    subnavScroll: function() {
        var t = this,
            e = $win.innerHeight(),
            i = $body.prop("scrollHeight") - e,
            n = $win.scrollTop();
        t.$scroll.css("transform", "scaleX(" + n / i + ") translateZ(0)")
    },
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.navigation = new navigation($(".navigation")), social.prototype = {
    constructor: social,
    initView: function() {
        this.initialized || (this.initListeners(), this.initialized = !0, this.follow = {
            twitter: "https://twitter.com/followloop",
            facebook: "http://www.facebook.com/follow.loop",
            instagram: "http://www.instagram.com/followloop",
            linkedin: "http://www.linkedin.com/company/loop-new-media-gmbh",
            xing: "http://www.xing.com/companies/agenturloopnewmediagmbh",
            behance: "http://www.behance.net/followloop",
            pinterest: "http://www.pinterest.com/followloop/",
            vimeo: "http://www.vimeo.com/followloop",
            github: "http://www.github.com/followloop",
            foursquare: "http://www.foursquare.com/v/loop/4bfa7a325317a59391ab027f"
        })
    },
    onPageIn: function() {
        this.initView()
    },
    onPageSwitch: function() {
        $(this.selector).off("click.social"), this.initialized = !1
    },
    initPlugins: function() {},
    initListeners: function() {
        $(this.selector).off("click").on("click.social", function(t) {
            var e, i = document.title,
                n = $(t.currentTarget);
            if (!n.attr("href") || n.attr("href").length < 1) {
                t.preventDefault(), n.hasClass("icon--social-facebook") ? e = "https://www.facebook.com/sharer/sharer.php?u=" : n.hasClass("icon--social-twitter") ? e = "https://twitter.com/share?text=" + i + "&url=" : n.hasClass("icon--social-google") && (e = "https://plus.google.com/share?url="), e += location.href;
                window.open(e, "Share", "width=800, height=600")
            }
        })
    },
    init: function() {
        this.initView(), this.initPlugins()
    }
}, app.modules.social = new social, socialhub.prototype = {
    constructor: socialhub,
    initView: function() {},
    initPlugins: function() {
        var t = this;
        $(this.selector).each(function() {
            var e = $(this),
                i = $(t.filter, e);
            if (e.data("that", t), e.data("filter", i), e.data("params", {}), !e.data("grid")) {
                $("[data-filter]", i).off().on("click.filter", function(i) {
                    e.data("params", {
                        filter: $(this).data("filter")
                    }), console.log(e.data("params")), t.loadMore(e, !0)
                });
                var n = $(".socialhub__wrap", e).isotope({
                    itemSelector: ".socialhub__item",
                    layoutMode: "packery",
                    percentPosition: !0,
                    stagger: 20,
                    stamp: $(".socialhub__head", e),
                    transitionDuration: 0
                });
                n.on("layoutComplete", function() {
                    $(".socialhub__item:not(.socialhub__item--show) .socialhub__item__inner", e).each(function(t, e) {
                        if (!touch && !$(this).hasClass("no-anim")) {
                            var i = ($(e), new ScrollMagic.Scene({
                                triggerElement: e,
                                triggerHook: "onEnter",
                                offset: function() {
                                    return 20 + 80 * Math.random()
                                }()
                            }).setClassToggle(e, "tween--show").addTo(scrollController));
                            app.modules.parallax.tweens.push(i)
                        }
                    }), $(".socialhub__item:not(.socialhub__item--show)", e).addClass("socialhub__item--show")
                }).one("layoutComplete", function() {
                    e.addClass("socialhub--show")
                }).isotope(), e.data("grid", n);
                var o = new ScrollMagic.Scene({
                    triggerElement: $(".socialhub__more", e)[0],
                    triggerHook: "onEnter",
                    offset: 50
                }).on("enter", function(i) {
                    console.log("load more"), t.loadMore(e)
                }).addTo(t.scrollController);
                t.scenes.push(o)
            }
        })
    },
    loadMore: function(t, e) {
        var i = t.data("that");
        if (t.data("reset", void 0 !== e), !t.data("loading") && t.data("url")) {
            t.data("loading", !0), t.addClass("socialhub--loading");
            var n = t.data("params"),
                o = {
                    CRAFT_CSRF_TOKEN: window.csrfTokenValue
                };
            n.offset_reset = t.data("reset"), n = Object.assign({}, n, o), jQuery.ajax({
                context: t,
                url: t.data("url"),
                type: "GET",
                data: n,
                dataType: "json",
                contentType: "application/json",
                success: i.onResponse,
                error: function() {
                    console.log("error"), t.data("loading", "")
                }
            })
        }
    },
    onResponse: function(t) {
        var e = this,
            i = e.data("that");
        if (e.data("loading", !1), e.data("url", t.more_url), t && t.items) {
            var n = t.items;
            e.data("reset") && e.data("grid").isotope("remove", $(".socialhub__item", $(".socialhub__wrap", e)));
            for (var o = 0; o < n.length; o++) {
                var s = n[o],
                    a = i.$item_tpl.clone(),
                    r = 2 == o || 4 == o ? "big" : 3 == o || 5 == o ? "medium" : "small";
                r = s.size, a.addClass("socialhub__item--" + s.network).addClass("socialhub__item--" + r), $(".socialhub__item__date", a).text(s.date), $(".socialhub__item__date", a).attr("href", s.url), $(".socialhub__item__user__name", a).text(s.user), $(".socialhub__item__user__img", a).attr("data-bg", s.profile), void 0 !== s.desc && $(".socialhub__item__text", a).html(s.desc), void 0 !== s.img ? $(".socialhub__item__content", a).attr("data-bg", s.img) : a.addClass("socialhub__item--no-img"), e.data("grid").isotope().append(a).isotope("appended", a), $("*[data-bg]", a).lazyLoadXT(), i.dots($(".socialhub__item__text p", a))
            }
        }
    },
    done: function(t) {
        console.log("-- DONE --")
    },
    dots: function(t) {
        t.each(function() {
            var t = $(this);
            t.dotdotdot({
                ellipsis: "...",
                watch: "window",
                callback: function(e, i) {
                    e || t.addClass("no-height")
                }
            });
            setTimeout(function() {
                t.trigger("update")
            }, 30)
        })
    },
    initListeners: function() {
        var t = this;
        $doc.off("click.socialhub-hover").on("click.socialhub-hover", t.item, function(e) {
            var i = $(this);
            $(t.item, t.$el).not(i).removeClass("is-hover"), i.toggleClass("is-hover")
        })
    },
    onPageSwitchDone: function() {
        $(this.selector).each(function() {
            var t = $(this);
            t.data("grid") && (t.data("grid").isotope("destroy"), t.data("grid", ""))
        })
    },
    onPageSwitch: function() {
        for (var t = 0; t < this.scenes.length; t++) this.scenes[t].destroy();
        this.scenes = []
    },
    onPageIn: function() {
        this.initPlugins()
    },
    init: function() {
        this.initView(), this.initListeners()
    }
}, app.modules.socialhub = new socialhub, labs.prototype = {
    constructor: labs,
    initView: function() {},
    initPlugins: function() {
        var t = this;
        $(this.selector).each(function() {
            var e = $(this);
            if (e.data("that", t), e.data("params", {}), !e.data("grid")) {
                var i = e.parents(".labs-overview:not(.labs-overview--intro)");
                if (i.length) {
                    var n = $(".labs-overview__inner", i).isotope({
                        itemSelector: ".labs-overview__item",
                        layoutMode: "packery",
                        percentPosition: !0,
                        stagger: 20,
                        transitionDuration: 0
                    });
                    n.on("layoutComplete", function() {}).one("layoutComplete", function() {}).isotope(), e.data("grid", n)
                }
            }
        })
    },
    loadMore: function(t, e) {
        var i = t.data("that");
        if (t.data("reset", void 0 !== e), !t.data("loading") && t.data("url")) {
            t.data("loading", !0), t.addClass("labs--loading");
            var n = t.data("params"),
                o = {
                    CRAFT_CSRF_TOKEN: window.csrfTokenValue
                };
            n.offset_reset = t.data("reset"), n = Object.assign({}, n, o), jQuery.ajax({
                context: t,
                url: t.data("url"),
                type: "GET",
                data: n,
                dataType: "jsonp",
                contentType: "application/json",
                jsonpCallback: "labsResult",
                success: i.onResponse,
                error: function() {
                    console.log("error"), t.data("loading", "")
                }
            })
        }
    },
    onResponse: function(t) {
        var e = this,
            i = e.data("that"),
            n = $(i.holder, e);
        if (e.data("loading", !1), e.data("url", t.more_url), t.filter && e.data("filter") && app.modules.filter.filtersUpdate(e.data("filter"), t.filter), e.data("reset") && (e.data("swiper") ? e.data("swiper").removeAllSlides() : n.empty()), t && t.items)
            for (var o = t.items, s = 0; s < o.length; s++) {
                var a = o[s],
                    r = i.$item_tpl.clone();
                $(".day", r).text(a.date.day), $(".month", r).text(a.date.month), $(".bg", r).attr("data-bg", a.img), $(".subheadline", r).text(a.subheadline), $("h3", r).text(a.headline), $(".desc", r).text(a.desc), r.attr("href", a.url), e.data("swiper") ? (r.addClass("swiper-slide slide--hidden"), e.data("swiper").appendSlide(r[0].outerHTML), $("[data-bg], [data-src]", $(e.data("swiper").container[0])).lazyLoadXT({
                    checkDuplicates: !1
                }), e.data("swiper").updateVisibleSlides(e.data("swiper"))) : n.append(r), app.modules.site.addListener(), $("*[data-bg]", r).lazyLoadXT()
            }
    },
    done: function(t) {
        console.log("-- DONE --")
    },
    initListeners: function() {},
    onPageSwitch: function() {
        for (var t = 0; t < this.scenes.length; t++) this.scenes[t].destroy();
        this.scenes = []
    },
    onPageIn: function() {
        this.initPlugins(), this.initListeners()
    },
    onPageShow: function() {},
    init: function() {
        this.initView()
    }
}, app.modules.labs = new labs, footer.prototype = {
    constructor: footer,
    initView: function() {
        var t = this;
        if (!this.initialized) {
            var e = this.$footer.find(".svg_logo");
            e.length && (t.logo = new app.obj.logo(e))
        }
    },
    initPlugins: function() {
        var t = this;
        this.initialized || $win.bind("scroll", function() {
            t.parallax()
        })
    },
    initListeners: function() {
        this.initialized
    },
    resize: function() {
        $("html.until-desktop").length || touch || this.parallax()
    },
    parallax: function() {
        var t, e, i = this,
            n = $win.height(),
            o = i.$wrapper.outerHeight(),
            s = $win.scrollTop(),
            a = $body.height() - n;
        if ($("html.until-desktop").length || touch) i.$footer.removeAttr("style"), i.$bg.removeAttr("style"), t = s + n, e = this.$footer_header.offset().top - 20;
        else {
            var r = o + Math.min(0, a - s - o);
            if (Math.abs(r) < i.$wrapper.outerHeight()) {
                var l = Math.floor(-.8 * r * .5),
                    c = Math.floor(-.9 * r * .5);
                i.$footer.css("transform", "translate(0px, " + l + "px)"), i.$bg.css("transform", "translate(0px, " + c + "px)"), i.$video.css("visibility", "visible"), i.$wrapper.addClass("footer__wrapper--visible");
                var d = i.$footer.position();
                t = this.$footer_header.position().top, e = d.top - 10, e = Math.abs(d.top) - 10
            } else i.$video.css("visibility", "hidden"), i.$wrapper.removeClass("footer__wrapper--visible")
        }
        t < e && this.loading ? this.loading = !1 : t > e && !this.loading && (this.loading = !0, i.logo && i.logo.loadingStart())
    },
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins(), this.initialized = !0
    }
}, app.modules.footer = new footer, slider.prototype = {
    constructor: slider,
    initPlugins: function initPlugins() {
        var that = this;
        $(this.selector).each(function() {
            var $el = $(this),
                mobile = $el.hasClass("js-slider--mobile"),
                dir_horiz = $("html.until-desktopEx").length,
                direction = !$el.hasClass("js-slider--vertical") || dir_horiz ? "horizontal" : "vertical",
                cols_2 = $el.filter(".js-slider--cols-2").length && $("html.until-tabletLandscape").length,
                loadmore = $el.data("slider-loadmore"),
                space = "horizontal" == direction ? 15 : 0;
            if ($("html.until-tablet").length || cols_2 || !mobile) {
                if (($el.hasClass("swiper-container-vertical") && dir_horiz || $el.hasClass("swiper-container-horizontal") && !dir_horiz) && that.sliderDestroy($el), !$el.data("swiper")) {
                    $("> *:first-child", $el).addClass("swiper-wrapper"), $("> *:first-child > *", $el).addClass("swiper-slide");
                    var swiperOptions = {
                        type: "Fiat",
                        model: "500",
                        color: "white"
                    };
                    if ($el.hasClass("statement__outer")) {
                        var swiper = new Swiper($el[0], {
                            pagination: $(".swiper-pagination", $el)[0],
                            paginationClickable: !0,
                            autoHeight: $el.hasClass("js-slider--autoheight"),
                            direction: direction,
                            spaceBetween: space,
                            slidesPerView: cols_2 ? 2 : 1,
                            breakpoints: {
                                700: {
                                    slidesPerView: 1,
                                    spaceBetween: space
                                }
                            },
                            onInit: function(t) {
                                that.updateVisibleSlides(t)
                            },
                            onTouchStart: function(t) {
                                $(t.container[0]).addClass("swiper--move")
                            },
                            onTouchEnd: function(t) {
                                $(t.container[0]).removeClass("swiper--move")
                            },
                            onTransitionStart: function(t) {
                                that.updateVisibleSlides(t)
                            },
                            onTransitionEnd: function onTransitionEnd(swiper) {
                                var $container = $(swiper.container[0]);
                                $win.trigger("scroll"), loadmore && swiper.isEnd && (func = eval("app.modules." + loadmore), func($el)), $(".statement__pagination .current").text(swiper.activeIndex + 1)
                            }
                        });
                        $(".statement__pagination__btn--next").unbind("click"), $(".statement__pagination__btn--prev").unbind("click"), $(".statement__pagination .max").text($(".statement__outer .swiper-slide").length), $(".statement__pagination__btn--next").on("click", function() {
                            var t = $("body").data("swiper-outer"),
                                e = t.activeIndex + 1;
                            t.slideTo(e)
                        }), $(".statement__pagination__btn--prev").on("click", function() {
                            var t = $("body").data("swiper-outer"),
                                e = t.activeIndex - 1;
                            t.slideTo(e)
                        })
                    } else var swiper = new Swiper($el[0], {
                        pagination: $(".swiper-pagination", $el)[0],
                        paginationClickable: !0,
                        autoHeight: $el.hasClass("js-slider--autoheight"),
                        direction: direction,
                        spaceBetween: space,
                        slidesPerView: cols_2 ? 2 : 1,
                        breakpoints: {
                            700: {
                                slidesPerView: 1,
                                spaceBetween: space
                            }
                        },
                        onInit: function(t) {
                            that.updateVisibleSlides(t)
                        },
                        onTouchStart: function(t) {
                            $(t.container[0]).addClass("swiper--move")
                        },
                        onTouchEnd: function(t) {
                            $(t.container[0]).removeClass("swiper--move")
                        },
                        onTransitionStart: function(t) {
                            that.updateVisibleSlides(t)
                        },
                        onTransitionEnd: function onTransitionEnd(swiper) {
                            var $container = $(swiper.container[0]);
                            $win.trigger("scroll"), loadmore && swiper.isEnd && (func = eval("app.modules." + loadmore), func($el))
                        }
                    });
                    if (swiper.updateVisibleSlides = that.updateVisibleSlides, $el.data("swiper", swiper), $el.hasClass("statement__outer")) {
                        var attr = $("body").data("swiper-text");
                        if ("undefined" !== (void 0 === attr ? "undefined" : _typeof(attr)) && !1 !== attr) {
                            var swiper_text = $("body").data("swiper-text");
                            swiper.params.control = swiper_text, swiper_text.params.control = swiper
                        } else $("body").data("swiper-outer", swiper)
                    } else if ($el.hasClass("statement__texts__wrap")) {
                        var attr = $("body").data("swiper-outer");
                        if ("undefined" !== (void 0 === attr ? "undefined" : _typeof(attr)) && !1 !== attr) {
                            var swiper_outer = $("body").data("swiper-outer");
                            swiper.params.control = swiper_outer, swiper_outer.params.control = swiper
                        } else $("body").data("swiper-text", swiper)
                    }
                }
                that.updateVisibleSlides($el.data("swiper"))
            } else $el.data("swiper") && that.sliderDestroy($el)
        })
    },
    updateVisibleSlides: function(t) {
        var e = $(t.container[0]),
            i = $(".swiper-slide", e),
            n = t.params.slidesPerView,
            o = i.filter(function(e) {
                return e >= t.activeIndex && e < t.activeIndex + n
            });
        i.not(o).addClass("slide--hidden"), o.removeClass("slide--hidden"), i.length <= n ? e.addClass("swiper-pagination--hidden") : e.removeClass("swiper-pagination--hidden")
    },
    sliderDestroy: function(t) {
        t.data("swiper").destroy(), t.removeClass("swiper-container-vertical swiper-container-horizontal").data("swiper", ""), $(".swiper-slide, .swiper-wrapper", t).removeAttr("style"), $(".swiper-wrapper", t).removeClass("swiper-wrapper"), $(".swiper-slide", t).removeClass("swiper-slide")
    },
    initListeners: function() {},
    resize: function() {
        this.initPlugins()
    },
    onPageSwitch: function() {
        $(this.selector).each(function() {
            var t = $(this);
            t.data("swiper") && (t.data("swiper").destroy(), t.data("swiper", ""))
        })
    },
    onPageIn: function() {
        this.initPlugins(), this.initListeners()
    }
}, app.modules.slider = new slider, swiper.prototype = {
    constructor: swiper,
    initPlugins: function() {
        var t = this;
        $(this.selector).each(function() {
            var e = $(this),
                i = e.data("swiper-delay") || 0,
                n = e.data("swiper");
            setTimeout(function() {
                var i = e.data("swiper-config") ? e.data("swiper-config") : {
                        buttons: !1,
                        cols: !1
                    },
                    o = e.hasClass("js-swiper--mobile"),
                    s = i.until ? i.until : "tablet";
                if ($("html.until-" + s).length || !o) {
                    var a = $("html.until-desktopEx").length || !i.direction || "horizontal" == i.direction ? "horizontal" : "vertical";
                    if (n && a != n.params.direction && t.swiperDestroy(e), n) console.log("-- swiper update --"), n.update();
                    else {
                        var r, l, c, d = i.space ? i.space : 0,
                            u = i.cols,
                            h = {},
                            p = e.hasClass("gallery__outer") ? "auto" : 1,
                            m = e.data("swiper-slide-initial") || 0,
                            f = e.parent();
                        if (i.pagination && (r = $(".swiper-pagination", f).length ? $(".swiper-pagination", f) : $('<div class="swiper-pagination swiper-pagination--' + i.pagination + '"></div>')), i.buttons)
                            if (!0 === i.buttons) {
                                var g = e;
                                l = $(".swiper-button-prev", g).length ? $(".swiper-button-prev", g) : $('<div class="swiper-button-prev"></div>'), c = $(".swiper-button-next", g).length ? $(".swiper-button-next", g) : $('<div class="swiper-button-next"></div>')
                            } else {
                                var g = $(i.buttons);
                                l = $(".nav-arrow--prev", g).length ? $(".nav-arrow--prev", g) : $('<div class="nav-arrow--prev"></div>'), c = $(".nav-arrow--next", g).length ? $(".nav-arrow--next", g) : $('<div class="nav-arrow--next"></div>')
                            }
                        if (u)
                            for (var v in u) h[app.vars.breakPoints[v]] = {
                                slidesPerView: u[v]
                            }, p = u[v];
                        $("> *:first-child", e).addClass("swiper-wrapper"), $("> *:first-child > *", e).addClass("swiper-slide"), i.pagination && !$(".swiper-pagination", f).length && e.append(r), !0 !== i.buttons || $(".swiper-button-prev", e).length || e.append(l), !0 !== i.buttons || $(".swiper-button-next", e).length || e.append(c);
                        var _ = !!$(".swiper-slide", e).is("a") && 0,
                            w = new Swiper(e[0], {
                                pagination: r,
                                prevButton: l,
                                nextButton: c,
                                paginationClickable: !0,
                                initialSlide: m,
                                autoHeight: i.autoheight ? i.autoheight : !!e.hasClass("js-swiper--autoheight"),
                                direction: a,
                                spaceBetween: d,
                                slidesPerView: p,
                                autoplay: !!i.autoplay && i.autoplay,
                                breakpoints: h,
                                parallax: !!i.parallax && i.parallax,
                                speed: i.speed ? i.speed : 300,
                                onInit: function(i) {
                                    $(i.container[0]);
                                    t.updateVisibleSlides(i), void 0 !== l && void 0 !== c && t.markNavButtons(l, c);
                                    var n = setInterval(function() {
                                        e.find(".swiper-slide:first-child img").length && e.find(".swiper-slide:first-child img").hasClass("lazy-loaded") && (i.update(), clearInterval(n))
                                    }, 100)
                                },
                                onTouchStart: function(t) {
                                    $(t.container[0]).addClass("swiper--move")
                                },
                                onTouchMove: function(t) {
                                    _ >= 0 && 2 == ++_ && e.addClass("swiper--moving")
                                },
                                onTouchEnd: function(t) {
                                    $(t.container[0]).removeClass("swiper--move"), _ >= 0 && (_ = 0, e.removeClass("swiper--moving"))
                                },
                                onTransitionStart: function(e) {
                                    t.updateVisibleSlides(e)
                                },
                                onTransitionEnd: function(e) {
                                    var i = $(e.container[0]);
                                    t.lazy(i), $(".slide--hidden .video-playing", i).each(function() {
                                        $(this)[0].videoPause()
                                    })
                                },
                                onSlideChangeEnd: function(t) {
                                    e.data("swiper-slide-initial", t.activeIndex)
                                }
                            });
                        e.data("swiper", w), n = w
                    }
                    t.updateVisibleSlides(n)
                } else n && t.swiperDestroy(e)
            }, i)
        })
    },
    swiperDestroy: function(t) {
        var e = (t.parent(), t.data("swiper"));
        e && e.destroy && e.destroy(), t.removeClass("swiper-container-vertical swiper-container-horizontal").data("swiper", ""), $(".swiper-slide, .swiper-wrapper", t).removeAttr("style"), $(".swiper-wrapper", t).removeClass("swiper-wrapper"), $(".swiper-slide", t).removeClass("swiper-slide swiper-slide-active swiper-slide-prev swiper-slide-next slide--hidden")
    },
    updateVisibleSlides: function(t) {
        var e = $(t.container[0]),
            i = $(".swiper-slide", e),
            n = $(".swiper-count", e),
            o = t.params.slidesPerView,
            s = i.filter(function(e) {
                return e >= t.activeIndex && e < t.activeIndex + o
            });
        i.not(s).addClass("slide--hidden"), s.removeClass("slide--hidden"), n.text(Math.ceil((t.activeIndex + 1) / o) + " / " + Math.ceil(i.length / o)), i.length <= o ? e.addClass("swiper-pagination--hidden") : e.removeClass("swiper-pagination--hidden")
    },
    lazy: function(t) {
        $(".swiper-slide [data-bg]:not(.lazy-loaded),[data-src]:not(.lazy-loaded)", t).lazyLoadXT({
            checkDuplicates: !1
        })
    },
    markNavButtons: function(t, e) {
        setTimeout(function() {
            t.addClass("is-loaded"), e.addClass("is-loaded")
        }, 800)
    },
    onPageSwitchEnd: function() {
        this.initPlugins()
    },
    initListeners: function() {},
    resize: function() {
        var t = this;
        setTimeout(function() {
            t.initPlugins()
        }, 100)
    },
    init: function() {
        this.initListeners(), this.initPlugins()
    }
}, app.modules.swiper = new swiper, textmask.prototype = {
    constructor: textmask,
    initView: function() {
        $(this.selector).not(".textmask--prepared").each(function() {
            var t = $(this);
            t.addClass("textmask"), setTimeout(function() {
                t.addClass("textmask--prepared"), t.parents(".block").addClass("block--intro-initialized")
            }, 0)
        })
    },
    initPlugins: function() {},
    initListeners: function() {},
    move: function(t, e, i) {
        $(this.selector).not(".textmask--initialized").each(function() {
            var n = $(this),
                o = n.find(".textmask__row"),
                s = 0;
            n.addClass("textmask--initialized"), o.each(function() {
                var n = $(this);
                setTimeout(function() {
                    n.addClass("textmask__row--" + t).removeClass("textmask__row--" + e)
                }, s + 50), s += i
            })
        })
    },
    onPageSwitchEnd: function() {
        var t = this;
        this.initView(), setTimeout(function() {
            t.move("done", "bottom", 0)
        }, 700)
    },
    init: function() {
        var t = this;
        this.initView(), setTimeout(function() {
            t.move("done", "bottom", 0)
        }, 0)
    }
}, app.modules.textmask = new textmask, parallax.prototype = {
    constructor: parallax,
    initView: function() {
        var t = this;
        enquire.register("screen and (min-width:1025px)", {
            match: function() {
                scrollController && ($(".block--landingintro, .block--intro, .block--hero").each(function(e, i) {
                    if (!$(this).hasClass("no-anim")) {
                        var n = $(".block__bg", $(i)),
                            o = $(".block__content", $(i)),
                            s = ($("h1", $(i)), function() {
                                return $(i).outerHeight()
                            }),
                            a = new ScrollMagic.Scene({
                                duration: s,
                                triggerElement: i,
                                triggerHook: "onLeave",
                                offset: 0
                            }).setTween(TweenMax.to(n, 1, {
                                css: {
                                    transform: "translateY(" + .2 * s() + "px)"
                                },
                                ease: Linear.easeNone
                            })).addTo(scrollController);
                        t.tweens.push(a);
                        var r = new ScrollMagic.Scene({
                            duration: s,
                            triggerElement: i,
                            triggerHook: "onLeave",
                            offset: 0
                        }).setTween(TweenMax.to(o, 1, {
                            css: {
                                transform: "translateY(" + .025 * s() + "px)"
                            },
                            ease: Linear.easeNone
                        })).addTo(scrollController);
                        t.tweens.push(r);
                        var l = new ScrollMagic.Scene({
                            duration: .5 * s(),
                            triggerElement: i,
                            triggerHook: "onLeave",
                            offset: .5 * s()
                        }).setTween(TweenMax.to(o, 1, {
                            css: {
                                transform: "translateY(" + -.05 * s() + "px)",
                                opacity: 0
                            },
                            ease: Linear.easeNone
                        })).addTo(scrollController);
                        t.tweens.push(l)
                    }
                }), $(".image-parallax").each(function(e, i) {
                    if (!$(this).hasClass("no-anim")) {
                        var n = $(i),
                            o = $(".block__bg", n),
                            s = function() {
                                return $win.height() + n.outerHeight()
                            },
                            a = function() {
                                return Math.floor(o.outerHeight() - n.outerHeight())
                            },
                            r = new ScrollMagic.Scene({
                                duration: s,
                                triggerElement: i,
                                triggerHook: "onEnter",
                                offset: 0
                            }).setTween(TweenMax.fromTo(o, 1, {
                                css: {
                                    transform: "translateY(" + -1 * a() + "px)"
                                }
                            }, {
                                css: {
                                    transform: "translateY(" + .25 * a() + "px)"
                                },
                                delay: 0,
                                ease: Linear.easeNone
                            })).addTo(scrollController);
                        t.tweens.push(r)
                    }
                }), $(".js-parallaxtext").each(function(e, i) {
                    var n = $(i),
                        o = n.find(".js-parallaxtext-item"),
                        s = function() {
                            return $win.height() + n.outerHeight()
                        },
                        a = (new TimelineMax).add([TweenMax.fromTo(o.eq(0), 1, {
                            css: {
                                transform: "translateY(45%)"
                            }
                        }, {
                            css: {
                                transform: "translateY(-20%)"
                            },
                            delay: 0,
                            ease: Linear.easeNone
                        }), TweenMax.fromTo(o.eq(1), 1, {
                            css: {
                                transform: "translateY(40%)"
                            }
                        }, {
                            css: {
                                transform: "translateY(-15%)"
                            },
                            delay: 0,
                            ease: Linear.easeNone
                        }), TweenMax.fromTo(o.eq(2), 1, {
                            css: {
                                transform: "translateY(55%)"
                            }
                        }, {
                            css: {
                                transform: "translateY(-35%)"
                            },
                            delay: 0,
                            ease: Linear.easeNone
                        }), TweenMax.fromTo(o.eq(3), 1, {
                            css: {
                                transform: "translateY(45%)"
                            }
                        }, {
                            css: {
                                transform: "translateY(-30%)"
                            },
                            delay: 0,
                            ease: Linear.easeNone
                        })]),
                        r = new ScrollMagic.Scene({
                            duration: s,
                            triggerElement: i,
                            triggerHook: "onEnter",
                            offset: 0
                        }).setTween(a).addTo(scrollController);
                    t.tweens.push(r)
                }))
            },
            unmatch: function() {
                if (t.tweens.length > 0) {
                    $(".image-parallax .block__bg").each(function() {
                        $(this).css("transform", "")
                    });
                    for (var e = 0; e < t.tweens.length; e++) t.tweens[e].destroy();
                    t.tweens = []
                }
            }
        }), $(".gallery__item, .socialhub__item__inner, .card, .figures__item, .images__item, .teaser-button, .screens__item, .coltext--colored").each(function(e, i) {
            if (!touch && !$(t).hasClass("no-anim")) {
                var n = ($(i), new ScrollMagic.Scene({
                    triggerElement: i,
                    triggerHook: "onEnter",
                    offset: function() {
                        return 20 + 80 * Math.random()
                    }()
                }).setClassToggle(i, "tween--show").addTo(scrollController));
                t.tweens.push(n)
            }
        })
    },
    onPageSwitchEnd: function() {
        this.initView()
    },
    onPageSwitch: function() {
        for (var t = 0; t < this.tweens.length; t++) this.tweens[t].destroy();
        this.tweens = []
    },
    initPlugins: function() {},
    initListeners: function() {},
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.parallax = new parallax, gallery.prototype = {
    constructor: gallery,
    initView: function() {
        var t = this;
        $(this.selector).not(".initialized").each(function() {
            var e, i, n, o = $(this).addClass("initialized"),
                s = t.selector.split(",");
            for (var a in s) o.hasClass(s[a].substr(1)) && (t.sel = s[a].split("--")[0], e = $(".gallery__opener", o), i = $(t.sel + "__items", o), n = $(t.sel + "__item", i));
            n.each(function() {
                $(this).bind("click.zoom", function(e) {
                    t.zoomOpen($(this))
                })
            }), e.bind("click.zoom", function(e) {
                t.zoomOpen(n.eq(0))
            })
        })
    },
    zoomOpen: function(t) {
        var e = this;
        if (!this.overlay) {
            var i = (t.parent(), $(e.sel + "__item", t.parent()));
            $('<div class="gallery__zoom__items"></div>');
            this.overlay = !0, this.zoom_index = i.index(t), this.zoom_length = i.length, this.$zoom_inner = $('<div class="gallery__zoom__inner"></div>'), this.$zoom_items = $('<div class="gallery__zoom__items"></div>'), this.$zoom_pages = $('<div class="gallery__zoom__pages"></div>'), this.$overlay = $('<div class="gallery__zoom"></div>'), i.each(function() {
                var t = $(this),
                    i = $("[data-url]", t),
                    n = $("<div></div>").attr("data-bg", i.attr("data-url")),
                    o = $('<div class="gallery__zoom__item"></div>');
                o.append(n).append($("<span></span>")), e.$zoom_items.append(o)
            }), this.$zoom_item = $(".gallery__zoom__item", this.$zoom_items), this.$zoom_items.css("width", 100 * this.zoom_length + "%"), this.$zoom_inner.append(this.$zoom_items), this.$overlay.append(this.$zoom_inner), this.$overlay.append(this.$zoom_pages), this.$overlay.append('<div class="gallery__zoom__nav"><div class="gallery__zoom__nav--prev"></div><div class="gallery__zoom__nav--next"></div></div>'), this.$overlay.append('<div class="gallery__zoom__rotate"><i><span></span></i></div>'), this.$overlay.append('<div class="gallery__zoom__close"><i></i></div>'), $body.append(this.$overlay), $("[data-bg]", this.$overlay).lazyLoadXT({
                visibleOnly: !1,
                checkDuplicates: !1,
                forceLoad: !0
            }), this.zoomSlide(0), setTimeout(function() {
                $html.addClass("gallery--show"), e.$overlay.addClass("gallery__zoom--show")
            }, 30), $(".gallery__zoom__close", this.$overlay).bind("click.zoomClose", function(t) {
                e.zoomClose()
            }), $(".gallery__zoom__nav > div", this.$overlay).bind("click.zoomSlide", function(t) {
                e.zoomSlide($(this).hasClass("gallery__zoom__nav--next") ? 1 : -1)
            }), $(".gallery__zoom__nav > div", this.$overlay).bind("mouseenter", function(t) {
                e.zoomNavHover($(this).hasClass("gallery__zoom__nav--next") ? "next" : "prev")
            }), $(".gallery__zoom__nav > div", this.$overlay).bind("mouseleave", function(t) {
                e.$zoom_items.removeClass("gallery__zoom__items--prev").removeClass("gallery__zoom__items--next")
            }), $body.bind("keydown.zoom", function(t) {
                console.log("kk"), 37 == t.keyCode ? e.zoomSlide(-1) : 39 == t.keyCode && e.zoomSlide(1)
            }), this.scrollY = $win.scrollTop(), this.$overlay.swipe({
                threshold: 1,
                swipeStatus: function(t, i, n, o, s, a, r, l) {
                    switch (i) {
                        case "start":
                            var c = $("html.from-tablet").length ? touch ? .75 : 1 : .5;
                            e.mousedown = !0, e.xStart = e.getPointerEvents(t).pageX, e.xMove = 0, e.xDiff = (e.$zoom_items.position().left + e.$zoom_items.outerWidth() / e.zoom_length * e.zoom_index) * c, e.xMove = e.getPointerEvents(t).pageX - e.xStart + e.xDiff, setTimeout(function() {
                                $(".gallery__zoom__item div:not(.lazy-hidden)").lazyLoadXT({
                                    checkDuplicates: !1
                                })
                            }, 100);
                            break;
                        case "move":
                            e.xMove = e.getPointerEvents(t).pageX - e.xStart + e.xDiff, e.xDir = e.getPointerEvents(t).pageX - e.xStart;
                            break;
                        case "end":
                            e.mousedown = !1, e.zoomSlide(e.xDir < 0 ? 1 : -1);
                            break;
                        case "cancel":
                            e.mousedown = !1, e.zoomSlide(0)
                    }
                    if (e.mousedown) {
                        var d = e.$zoom_items.outerWidth(),
                            u = d / e.zoom_length,
                            h = 100 * (e.xMove - e.zoom_index * u) / d,
                            p = 50 * e.xMove / -u;
                        e.$overlay.removeClass("drag-slide").addClass("dragging"), e.$zoom_items.css({
                            transform: "translateX(" + h + "%)"
                        }), $("> div", e.$zoom_item_active).css({
                            transform: "translateX(" + (0 + p) + "%)"
                        }), $("> span", e.$zoom_item_active).css({
                            opacity: .8 * Math.abs(p / 50)
                        }), $("> div", e.$zoom_item_next).css({
                            transform: "translateX(" + (-50 + p) + "%)"
                        }), $("> span", e.$zoom_item_next).css({
                            opacity: .8 * (1 - p / 50)
                        }), $("> div", e.$zoom_item_prev).css({
                            transform: "translateX(" + (50 + p) + "%)"
                        }), $("> span", e.$zoom_item_prev).css({
                            opacity: .8 * (1 - -p / 50)
                        })
                    }
                }
            }), e.scrollTop = $win.scrollTop()
        }
    },
    onTouchStart: function(t) {
        var e = this;
        $(t.target).parents(".gallery__zoom__close").length || (t.stopPropagation(), t.stopImmediatePropagation(), t.preventDefault());
        var i = this.$zoom_items.offset().left;
        this.pointerStartDirX = this.getPointerEvent(t).pageX, this.pointerStartDirY = this.getPointerEvent(t).pageY, this.pointerStartPosX = this.getPointerEvent(t).pageX - i, this.posX = this.getPointerEvent(t).pageX - this.pointerStartPosX, this.dirX = this.getPointerEvent(t).pageX - this.pointerStartDirX, this.dirY = this.getPointerEvent(t).pageY - this.pointerStartDirY, this.mousedown = !0, clearInterval(this.int), this.int = setInterval(function() {
            e.move()
        }, 0)
    },
    onTouchMove: function(t) {
        $(t.target).parents(".gallery__zoom__close").length || (t.stopPropagation(), t.stopImmediatePropagation(), t.preventDefault()), this.posX = this.getPointerEvent(t).pageX - this.pointerStartPosX, this.dirX = this.getPointerEvent(t).pageX - this.pointerStartDirX, this.dirY = this.getPointerEvent(t).pageY - this.pointerStartDirY, this.move()
    },
    move: function() {
        if (this.mousedown && !this.moving && (this.moving = !0), this.moving) {
            var t = this.$zoom_items.outerWidth(),
                e = t / this.zoom_length,
                i = this.posX * (this.posX < 0 ? 100 : 75) / t,
                n = e * (this.zoom_length - 1) + this.posX,
                o = 50 * this.dirX / -e;
            n < 0 && (i -= 25 * n / t), this.$zoom_items.css({
                transform: "translateX(" + i + "%)"
            }), this.$overlay.addClass("dragging"), $("> div", this.$zoom_item_active).css({
                transform: "translateX(" + (0 + o) + "%)"
            }), $("> span", this.$zoom_item_active).css({
                opacity: Math.abs(o / 50)
            }), $("> div", this.$zoom_item_next).css({
                transform: "translateX(" + (-50 + o) + "%)"
            }), $("> span", this.$zoom_item_next).css({
                opacity: 1 - o / 50
            }), $("> div", this.$zoom_item_prev).css({
                transform: "translateX(" + (50 + o) + "%)"
            }), $("> span", this.$zoom_item_prev).css({
                opacity: 1 - -o / 50
            })
        }
    },
    onTouchEnd: function(t) {
        $(t.target).parents(".gallery__zoom__close").length || (t.stopPropagation(), t.stopImmediatePropagation(), t.preventDefault()), this.moving && (this.$overlay.removeClass("gallery__zoom--dragging"), this.moving = !1, this.mousedown = !1, this.$overlay.addClass("drag-slide"), this.dirX > 0 ? this.zoomSlide(-1) : this.dirX < 0 && this.zoomSlide(1))
    },
    getPointerEvent: function(t) {
        return t.originalEvent.targetTouches ? t.originalEvent.targetTouches[0] : t
    },
    getPointerEvents: function(t) {
        return t.targetTouches ? t.targetTouches[0] : t
    },
    zoomNavHover: function(t) {
        this.$zoom_items.addClass("gallery__zoom__items--" + t)
    },
    zoomSlide: function(t) {
        var e = this;
        e.mousedown = !1, e.$overlay.removeClass("dragging").addClass("drag-slide"), 0 == e.xMove && e.$overlay.removeClass("drag-slide"), this.zoomSlideActive = !0, this.zoom_index += t, this.zoom_index > this.zoom_length - 1 && (this.zoom_index = this.zoom_length - 1), this.zoom_index < 0 && (this.zoom_index = 0), this.$overlay.removeClass("gallery__zoom--first").removeClass("gallery__zoom--last"), this.$overlay.addClass(0 == this.zoom_index ? "gallery__zoom--first" : this.zoom_index == this.zoom_length - 1 ? "gallery__zoom--last" : ""), this.$zoom_item_active = this.$zoom_item.eq(this.zoom_index), this.$zoom_item_prev = this.$zoom_item.filter(":eq(" + (this.zoom_index - 1) + ")"), this.$zoom_item_next = this.$zoom_item.filter(":eq(" + (this.zoom_index + 1) + ")"), this.$zoom_item.removeClass("gallery__zoom__item--active"), this.$zoom_item.removeClass("gallery__zoom__item--prev").removeClass("gallery__zoom__item--next"), this.$zoom_item_active.addClass("gallery__zoom__item--active"), this.$zoom_item_next.addClass("gallery__zoom__item--next"), this.$zoom_item_prev[0] != this.$zoom_item_next[0] ? this.$zoom_item_prev.addClass("gallery__zoom__item--prev") : this.$zoom_item_prev = !1, this.$zoom_items.css("transform", "translateX(" + 100 / this.zoom_length * -this.zoom_index + "%)"), this.$zoom_pages.html("<span>" + (this.zoom_index + 1) + "</span>/<span>" + this.zoom_length + "</span>"), setTimeout(function() {
            $(".gallery__zoom__item div:not(.lazy-hidden)").lazyLoadXT({
                checkDuplicates: !1
            })
        }, 100), setTimeout(function() {
            e.zoomSlideActive = !1
        }, 900)
    },
    zoomClose: function() {
        var t = this;
        this.overlay && (this.overlay = !1, this.$overlay.unbind("click.zoomClose"), this.$overlay.unbind("touchstart.zoom touchmove.zoom touchend.zoom"), this.$overlay.unbind("mousedown.zoom mousemove.zoom mouseup.zoom"), $(".gallery__zoom__close", this.$overlay).unbind("click.zoomClose"), $(".gallery__zoom__nav > div", this.$overlay).unbind("click.zoomSlide mouseenter mouseleave"), $body.unbind("keydown.zoom"), $html.removeClass("gallery--show"), this.$overlay.removeClass("gallery__zoom--show"), this.$overlay.swipe("destroy"), setTimeout(function() {
            t.$overlay.hide().remove()
        }, 600), touch || $win.scrollTop(this.scrollY))
    },
    initPlugins: function() {},
    initListeners: function() {
        var t = this;
        t.scrollTop = $win.scrollTop(), $win.bind("scroll.zoom", function() {
            $win.scrollTop() != t.scrollTop && t.moving
        })
    },
    onPageSwitch: function() {
        $win.unbind("scroll.zoom"), this.zoomClose()
    },
    onPageIn: function() {
        this.initView()
    },
    onPageShow: function() {},
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.gallery = new gallery, subheadline.prototype = {
    constructor: subheadline,
    initView: function() {
        var t = this;
        this.tweens.length < 1 && $(this.selector).each(function(e, i) {
            var n = new ScrollMagic.Scene({
                triggerElement: i,
                triggerHook: "onEnter",
                offset: "100px"
            }).setClassToggle(i, "tween--show").addTo(scrollController);
            t.tweens.push(n)
        })
    },
    onPageSwitch: function() {
        for (var t = 0; t < this.tweens.length; t++) this.tweens[t].destroy();
        this.tweens = []
    },
    initPlugins: function() {},
    initListeners: function() {},
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.subheadline = new subheadline, videoInline.prototype = {
    constructor: videoInline,
    initView: function() {
        var t = this;
        setTimeout(function() {
            $(t.selector).each(function(e, i) {
                var n = $(this);
                if (!n.data("video-inline")) {
                    var o, s = n.parent(),
                        a = n.hasClass("video-inline--autoplay"),
                        r = t.$video.clone(),
                        l = $(".video-inline__button", s),
                        c = $(".video-inline__mute", s),
                        d = l.length ? l : t.$video_button.clone();
                    r[0].onplaying = function(t) {
                        $(this).parent().data("playing", !0).parent().addClass("video-inline--playing")
                    }, r[0].onpause = function(t) {
                        $(this).parent().data("playing", !1).parent().removeClass("video-inline--playing")
                    };
                    var u = function() {
                        t.isVisible(n) && "visible" == n.css("visibility") ? (s.addClass("video-inline--visible"), o || (o = !0, r.attr("src", n.attr("data-video")), a && r.attr("autoplay", ""), t.videoMuted(n, r), n.append(r)), !a || touch || s.hasClass("video-inline--playing") || s.hasClass("video-inline--clicked") || $("html.from-tablet").length && (t.videoPlaying(r[0]) || t.videoPlay(n))) : (s.hasClass("video-inline--playing") && t.videoPause(n), s.removeClass("video-inline--visible"))
                    };
                    d.insertBefore(n), n.data("video-control", u), n.data("video-inline", r[0]), r.off().on("contextmenu", function(t) {
                        return !1
                    }), $win.bind("scroll.video-inline resize.video-inline orientationchange.video-inline", n.data("video-control")), a && s.addClass("video-inline--autoplay"), s.bind("mousedown touchstart", function(e) {
                        t.win_y = $win.scrollTop()
                    }), s.bind("mouseup touchend", function(e) {
                        e.preventDefault();
                        var i = $win.scrollTop();
                        t.win_y == i && (s.toggleClass("video-inline--clicked"), t.videoToggle(n))
                    }), c.bind("click", function(e) {
                        e.preventDefault(), e.stopPropagation(), n.toggleClass("video-inline--muted"), t.videoMuted(n, r)
                    })
                }
            }), t.initialized || (t.initialized = !0, setTimeout(function() {
                $win.trigger("scroll.video-inline")
            }, 100))
        }, 250)
    },
    videoToggle: function(t, e) {
        var i = this;
        t.parent().hasClass("video-inline--playing") ? i.videoPause(t) : ($(".video-inline--playing .video-inline:not(.video-inline--autoplay)").not(t).each(function(t) {
            i.videoPause($(this))
        }), i.videoPlay(t))
    },
    videoPlay: function(t) {
        try {
            t.data("playing") || t.data("video-inline").play()
        } catch (t) {
            console.log("Video error:" + t.stack)
        }
    },
    videoPlaying: function(t) {
        return t.currentTime > 0 && !t.paused && !t.ended && t.readyState > 2
    },
    videoPause: function(t) {
        try {
            t.data("playing") && t.data("video-inline").pause()
        } catch (t) {
            console.log("Video error:" + t.stack)
        }
    },
    videoMuted: function(t, e) {
        t.hasClass("video-inline--muted") ? (e.attr("muted", ""), e.prop("muted", !0)) : (e.removeAttr("muted"), e.prop("muted", !1))
    },
    onPageSwitch: function() {
        $(this.selector).each(function(t, e) {
            $(this).data("video-inline") && $(this).data("video-inline").pause()
        })
    },
    onPageSwitchEnd: function() {
        $(this.selector).each(function(t, e) {
            $(this).data("video-inline") && !$(this).parent().hasClass("footer__video") && ($win.unbind("scroll.video-inline resize.video-inline orientationchange.video-inline", $(this).data("video-control")), $(this).data("video-inline", ""))
        })
    },
    onPageShow: function() {
        this.initView()
    },
    initPlugins: function() {},
    initListeners: function() {},
    isVisible: function(t) {
        var e = t[0].getBoundingClientRect();
        return (e.height > 0 || e.width > 0) && e.bottom >= 0 && e.right >= 0 && e.top <= (window.innerHeight || document.documentElement.clientHeight) && e.left <= (window.innerWidth || document.documentElement.clientWidth)
    },
    init: function() {}
}, app.modules.videoInline = new videoInline, slider.prototype = {
    constructor: slider,
    initPlugins: function initPlugins() {
        var that = this;
        $(this.selector).each(function() {
            var $el = $(this),
                mobile = $el.hasClass("js-slider--mobile"),
                dir_horiz = $("html.until-desktopEx").length,
                direction = !$el.hasClass("js-slider--vertical") || dir_horiz ? "horizontal" : "vertical",
                cols_2 = $el.filter(".js-slider--cols-2").length && $("html.until-tabletLandscape").length,
                loadmore = $el.data("slider-loadmore"),
                space = "horizontal" == direction ? 15 : 0;
            if ($("html.until-tablet").length || cols_2 || !mobile) {
                if (($el.hasClass("swiper-container-vertical") && dir_horiz || $el.hasClass("swiper-container-horizontal") && !dir_horiz) && that.sliderDestroy($el), !$el.data("swiper")) {
                    $("> *:first-child", $el).addClass("swiper-wrapper"), $("> *:first-child > *", $el).addClass("swiper-slide");
                    var swiperOptions = {
                        type: "Fiat",
                        model: "500",
                        color: "white"
                    };
                    if ($el.hasClass("statement__outer")) {
                        var swiper = new Swiper($el[0], {
                            pagination: $(".swiper-pagination", $el)[0],
                            paginationClickable: !0,
                            autoHeight: $el.hasClass("js-slider--autoheight"),
                            direction: direction,
                            spaceBetween: space,
                            slidesPerView: cols_2 ? 2 : 1,
                            breakpoints: {
                                700: {
                                    slidesPerView: 1,
                                    spaceBetween: space
                                }
                            },
                            onInit: function(t) {
                                that.updateVisibleSlides(t)
                            },
                            onTouchStart: function(t) {
                                $(t.container[0]).addClass("swiper--move")
                            },
                            onTouchEnd: function(t) {
                                $(t.container[0]).removeClass("swiper--move")
                            },
                            onTransitionStart: function(t) {
                                that.updateVisibleSlides(t)
                            },
                            onTransitionEnd: function onTransitionEnd(swiper) {
                                var $container = $(swiper.container[0]);
                                $win.trigger("scroll"), loadmore && swiper.isEnd && (func = eval("app.modules." + loadmore), func($el)), $(".statement__pagination .current").text(swiper.activeIndex + 1)
                            }
                        });
                        $(".statement__pagination__btn--next").unbind("click"), $(".statement__pagination__btn--prev").unbind("click"), $(".statement__pagination .max").text($(".statement__outer .swiper-slide").length), $(".statement__pagination__btn--next").on("click", function() {
                            var t = $("body").data("swiper-outer"),
                                e = t.activeIndex + 1;
                            t.slideTo(e)
                        }), $(".statement__pagination__btn--prev").on("click", function() {
                            var t = $("body").data("swiper-outer"),
                                e = t.activeIndex - 1;
                            t.slideTo(e)
                        })
                    } else var swiper = new Swiper($el[0], {
                        pagination: $(".swiper-pagination", $el)[0],
                        paginationClickable: !0,
                        autoHeight: $el.hasClass("js-slider--autoheight"),
                        direction: direction,
                        spaceBetween: space,
                        slidesPerView: cols_2 ? 2 : 1,
                        breakpoints: {
                            700: {
                                slidesPerView: 1,
                                spaceBetween: space
                            }
                        },
                        onInit: function(t) {
                            that.updateVisibleSlides(t)
                        },
                        onTouchStart: function(t) {
                            $(t.container[0]).addClass("swiper--move")
                        },
                        onTouchEnd: function(t) {
                            $(t.container[0]).removeClass("swiper--move")
                        },
                        onTransitionStart: function(t) {
                            that.updateVisibleSlides(t)
                        },
                        onTransitionEnd: function onTransitionEnd(swiper) {
                            var $container = $(swiper.container[0]);
                            $win.trigger("scroll"), loadmore && swiper.isEnd && (func = eval("app.modules." + loadmore), func($el))
                        }
                    });
                    if (swiper.updateVisibleSlides = that.updateVisibleSlides, $el.data("swiper", swiper), $el.hasClass("statement__outer")) {
                        var attr = $("body").data("swiper-text");
                        if ("undefined" !== (void 0 === attr ? "undefined" : _typeof(attr)) && !1 !== attr) {
                            var swiper_text = $("body").data("swiper-text");
                            swiper.params.control = swiper_text, swiper_text.params.control = swiper
                        } else $("body").data("swiper-outer", swiper)
                    } else if ($el.hasClass("statement__texts__wrap")) {
                        var attr = $("body").data("swiper-outer");
                        if ("undefined" !== (void 0 === attr ? "undefined" : _typeof(attr)) && !1 !== attr) {
                            var swiper_outer = $("body").data("swiper-outer");
                            swiper.params.control = swiper_outer, swiper_outer.params.control = swiper
                        } else $("body").data("swiper-text", swiper)
                    }
                }
                that.updateVisibleSlides($el.data("swiper"))
            } else $el.data("swiper") && that.sliderDestroy($el)
        })
    },
    updateVisibleSlides: function(t) {
        var e = $(t.container[0]),
            i = $(".swiper-slide", e),
            n = t.params.slidesPerView,
            o = i.filter(function(e) {
                return e >= t.activeIndex && e < t.activeIndex + n
            });
        i.not(o).addClass("slide--hidden"), o.removeClass("slide--hidden"), i.length <= n ? e.addClass("swiper-pagination--hidden") : e.removeClass("swiper-pagination--hidden")
    },
    sliderDestroy: function(t) {
        t.data("swiper").destroy(), t.removeClass("swiper-container-vertical swiper-container-horizontal").data("swiper", ""), $(".swiper-slide, .swiper-wrapper", t).removeAttr("style"), $(".swiper-wrapper", t).removeClass("swiper-wrapper"), $(".swiper-slide", t).removeClass("swiper-slide")
    },
    initListeners: function() {},
    resize: function() {
        this.initPlugins()
    },
    onPageSwitch: function() {
        $(this.selector).each(function() {
            var t = $(this);
            t.data("swiper") && (t.data("swiper").destroy(), t.data("swiper", ""))
        })
    },
    onPageIn: function() {
        this.initPlugins(), this.initListeners()
    }
}, app.modules.slider = new slider, countup.prototype = {
    constructor: countup,
    initView: function() {},
    initPlugins: function() {
        var t = this;
        $(this.selector).each(function(e, i) {
            var n = $(this),
                o = new ScrollMagic.Scene({
                    triggerElement: i,
                    triggerHook: "onEnter",
                    offset: 50
                }).on("enter", function() {
                    n.data("countup").start()
                }).addTo(t.scrollController);
            t.scenes.push(o)
        })
    },
    initListeners: function() {},
    onPagePrepare: function() {
        $(this.selector).each(function() {
            var t = $(this),
                e = parseFloat(t.text()),
                i = t.text().split("."),
                n = i[1] ? i[1].length : 0;
            t.data("countup", new CountUp(t[0], 0, e, n))
        })
    },
    onPageSwitch: function() {
        $(this.selector).each(function() {
            $(this)
        });
        for (var t = 0; t < this.scenes.length; t++) this.scenes[t].destroy();
        this.scenes = []
    },
    onPageIn: function() {
        this.initPlugins(), this.initListeners()
    },
    onPageShow: function() {},
    init: function() {
        this.initView()
    }
}, app.modules.countup = new countup, showmore.prototype = {
    constructor: showmore,
    initView: function() {},
    initPlugins: function() {
        var t = this;
        $(this.selector).each(function(e, i) {
            var n = $(this),
                o = ($(t.selector + "__item", n), $(t.selector + "__button", n)),
                s = n.data(t.selector_name + "-items");
            console.log(s), o.unbind("click").bind("click.showmore", function(e) {
                e.preventDefault(), $(t.selector + "__item:lt(" + s + ")", n).removeClass(t.selector_name + "__item"), $(t.selector + "__item", n).length || o.addClass(t.selector_name + "__button--hidden")
            })
        })
    },
    initListeners: function(t) {},
    onPagePrepare: function() {},
    onPageSwitch: function() {},
    onPageIn: function() {
        this.initPlugins(), this.initListeners()
    },
    onPageShow: function() {},
    init: function() {
        this.initView()
    }
}, app.modules.showmore = new showmore, filter.prototype = {
    constructor: filter,
    initView: function() {
        var t = this;
        $(this.selector).not(".initialized").each(function() {
            var t = $(this).addClass("initialized"),
                e = $(".filter__options:eq(0)", t).clone();
            $("li:eq(0)", e).addClass("active")
        }), t.filterSet()
    },
    onPageSwitchEnd: function() {
        this.initView()
    },
    onPageSwitch: function() {
        $(this.selector + " .filter__option").off("click.filter")
    },
    setFilter: function(t) {
        var e = this,
            i = $(t.currentTarget),
            n = i.parents(e.selector),
            o = i.parent(),
            s = $(".filter__option", o),
            a = [],
            r = n.data("target"),
            l = $(".filter__options", n).index(o),
            c = $(".teaser--big .teaser__items"),
            d = $(".teaser--big .teaser__item, .teaser__item--big").addClass("teaser__item--big"),
            u = c.parents(".block"),
            h = $(".teaser--small .teaser__items");
        this.setFilterText(i), i.addClass("filter__option--selected"), s.not(i).removeClass("filter__option--selected"), $(".filter__options .filter__option--selected", n).each(function() {
            a.push($(this).data("value"))
        }), $(r).addClass("is-change"), setTimeout(function() {
            "" == a.join("") ? ($(".filter__option--disabled", n).removeClass("filter__option--disabled"), $(r + "[data-filter-hidden]").removeAttr("data-filter-hidden"), u.removeClass("is-empty"), d.prependTo(c)) : ($(r).addClass("is-change").each(function(t, e) {
                var i = $(this),
                    n = i.data("filter");
                if (i.attr("data-filter-hidden", "1"), n) {
                    for (var o = 0, t = 0; t < n.length; t++)("" == a[t] || n[t].indexOf("|" + a[t] + "|") >= 0) && o++;
                    o == t && i.removeAttr("data-filter-hidden")
                }
            }), u.addClass("is-empty"), d.prependTo(h), $(".filter__options:not(:eq(" + l + ')) .filter__option:not([data-value=""])', n).each(function(t, e) {
                var i = $(this),
                    n = i.data("value");
                i.addClass("filter__option--disabled"), $(r + '[data-filter*="|' + n + '|"]:not([data-filter-hidden])').length && i.removeClass("filter__option--disabled")
            })), setTimeout(function() {
                $(r).removeClass("is-change")
            }, 30), $('[style*="z-index: -10000"]').css("height", "auto"), app.modules.swiper.resize()
        }, 250)
    },
    setFilterText: function(t) {
        var e = t.parent(),
            i = t.prop("scrollHeight"),
            n = $("li", e).index(t);
        e.css("width", $("span", t).outerWidth() + "px").css("height", i + "px").css("transform", "translateY(-" + i * n + "px) translateZ(0)").removeClass("filter__options--hover")
    },
    clickFilter: function(t) {
        var e = $(t.currentTarget);
        e.parent().hasClass("filter__options--hover") ? this.setFilter(t) : this.filterOpen(e)
    },
    initPlugins: function() {},
    initListeners: function() {
        var t = this;
        touch ? $doc.on("click.filter", ".filter__option", function(e) {
            t.clickFilter(e)
        }) : $doc.on("mouseenter.filter", ".filter__option", function(e) {
            t.filterOpen($(e.currentTarget))
        }).on("mouseleave.filter", ".filter__options", function(e) {
            t.filterClose($(e.currentTarget))
        }).on("click.filter", ".filter__option", function(e) {
            t.clickFilter(e)
        })
    },
    resize: function() {
        this.filterSet()
    },
    filterSet: function() {
        var t = this;
        $(t.selector + " .filter__option--selected").each(function() {
            t.setFilterText($(this))
        })
    },
    filterOpen: function(t) {
        var e = t.parent();
        e.addClass("filter__options--hover"), e.css("width", $("span", $(".filter__option:first-child", e)).outerWidth() + "px"), e.css("height", e.prop("scrollHeight") + ($html.hasClass("until-mobileLandscape") ? 30 : 0) + "px")
    },
    filterClose: function(t) {
        var e = $(".filter__option--selected", t);
        t.removeClass("filter__options--hover"), t.css("width", $(".filter__option--selected span", t).outerWidth() + "px"), t.css("height", e.prop("scrollHeight") + "px")
    },
    init: function() {
        this.initListeners(), this.initView(), this.initPlugins()
    }
}, app.modules.filter = new filter, smoothScroll.prototype = {
    constructor: smoothScroll,
    initView: function() {},
    initPlugins: function() {
        function t() {
            E.keyboardSupport && p("keydown", s)
        }

        function e() {
            if (!D && document.body) {
                D = !0;
                var e = document.body,
                    i = document.documentElement,
                    n = window.innerHeight,
                    o = e.scrollHeight;
                if (H = document.compatMode.indexOf("CSS") >= 0 ? i : e, z = e, t(), top != self) I = !0;
                else if (o > n && (e.offsetHeight <= n || i.offsetHeight <= n)) {
                    var s = document.createElement("div");
                    s.style.cssText = "position:absolute; z-index:-10000; top:0; left:0; right:0; height:" + H.scrollHeight + "px", document.body.appendChild(s);
                    var a;
                    S = function() {
                        a || (a = setTimeout(function() {
                            V || (s.style.height = "0", s.style.height = H.scrollHeight + "px", a = null)
                        }, 500))
                    }, setTimeout(S, 10), p("resize", S);
                    var r = {
                        attributes: !0,
                        childList: !0,
                        characterData: !1
                    };
                    if (T = new U(S), T.observe(e, r), H.offsetHeight <= n) {
                        var l = document.createElement("div");
                        l.style.clear = "both", e.appendChild(l)
                    }
                }
                E.fixedBackground || V || (e.style.backgroundAttachment = "scroll", i.style.backgroundAttachment = "scroll")
            }
        }

        function i() {
            T && T.disconnect(), m(nt, o), m("mousedown", a), m("keydown", s), m("resize", S), m("load", e)
        }

        function n(t, e, i) {
            if (g(e, i), 1 != E.accelerationMax) {
                var n = Date.now(),
                    o = n - B;
                if (o < E.accelerationDelta) {
                    var s = (1 + 50 / o) / 2;
                    s > 1 && (s = Math.min(s, E.accelerationMax), e *= s, i *= s)
                }
                B = Date.now()
            }
            if (A.push({
                    x: e,
                    y: i,
                    lastX: e < 0 ? .99 : -.99,
                    lastY: i < 0 ? .99 : -.99,
                    start: Date.now()
                }), !q) {
                var a = t === document.body;
                W(function n(o) {
                    for (var s = Date.now(), r = 0, l = 0, c = 0; c < A.length; c++) {
                        var d = A[c],
                            u = s - d.start,
                            h = u >= E.animationTime,
                            p = h ? 1 : u / E.animationTime;
                        E.pulseAlgorithm && (p = C(p));
                        var m = d.x * p - d.lastX >> 0,
                            f = d.y * p - d.lastY >> 0;
                        r += m, l += f, d.lastX += m, d.lastY += f, h && (A.splice(c, 1), c--)
                    }
                    a ? L.enabled && window.scrollBy(r, l) : (r && (t.scrollLeft += r), l && (t.scrollTop += l)), L.update(), e || i || (A = []), A.length ? W(n, t, 1e3 / E.frameRate + 1) : q = !1
                }, t, 0), q = !0
            }
        }

        function o(t) {
            D || e();
            var i = t.target,
                o = c(i);
            if (!o || t.defaultPrevented || t.ctrlKey) return !0;
            if (f(z, "embed") || f(i, "embed") && /\.pdf/i.test(i.src) || f(z, "object") || i.shadowRoot) return !0;
            var s = -t.wheelDeltaX || t.deltaX || 0,
                a = -t.wheelDeltaY || t.deltaY || 0;
            if (X && (t.wheelDeltaX && _(t.wheelDeltaX, 120) && (s = t.wheelDeltaX / Math.abs(t.wheelDeltaX) * -120), t.wheelDeltaY && _(t.wheelDeltaY, 120) && (a = t.wheelDeltaY / Math.abs(t.wheelDeltaY) * -120)), s || a || (a = -t.wheelDelta || 0), 1 === t.deltaMode && (s *= 40, a *= 40), !E.touchpadSupport && v(a)) return !0;
            Math.abs(s) > 1.2 && (s *= E.stepSize / 120), Math.abs(a) > 1.2 && (a *= E.stepSize / 120), n(o, s, a), t.preventDefault(), r()
        }

        function s(t) {
            var e = t.target,
                i = t.ctrlKey || t.altKey || t.metaKey || t.shiftKey && t.keyCode !== N.spacebar;
            document.body.contains(z) || (z = document.activeElement);
            var o = /^(textarea|select|embed|object)$/i,
                s = /^(button|submit|radio|checkbox|file|color|image)$/i;
            if (t.defaultPrevented || o.test(e.nodeName) || f(e, "input") && !s.test(e.type) || f(z, "video") || b(t) || e.isContentEditable || i) return !0;
            if ((f(e, "button") || f(e, "input") && s.test(e.type)) && t.keyCode === N.spacebar) return !0;
            if (f(e, "input") && "radio" == e.type && Y[t.keyCode]) return !0;
            var a, l = 0,
                d = 0,
                u = c(z),
                h = u.clientHeight;
            switch (u == document.body && (h = window.innerHeight), t.keyCode) {
                case N.up:
                    d = -E.arrowScroll;
                    break;
                case N.down:
                    d = E.arrowScroll;
                    break;
                case N.spacebar:
                    a = t.shiftKey ? 1 : -1, d = -a * h * .9;
                    break;
                case N.pageup:
                    d = .9 * -h;
                    break;
                case N.pagedown:
                    d = .9 * h;
                    break;
                case N.home:
                    d = -u.scrollTop;
                    break;
                case N.end:
                    var p = u.scrollHeight - u.scrollTop - h;
                    d = p > 0 ? p + 10 : 0;
                    break;
                case N.left:
                    l = -E.arrowScroll;
                    break;
                case N.right:
                    l = E.arrowScroll;
                    break;
                default:
                    return !0
            }
            n(u, l, d), t.preventDefault(), r()
        }

        function a(t) {
            z = t.target
        }

        function r() {
            clearTimeout(k), k = setInterval(function() {
                R = {}
            }, 1e3)
        }

        function l(t, e) {
            for (var i = t.length; i--;) R[F(t[i])] = e;
            return e
        }

        function c(t) {
            var e = [],
                i = document.body,
                n = H.scrollHeight;
            do {
                var o = R[F(t)];
                if (o) return l(e, o);
                if (e.push(t), n === t.scrollHeight) {
                    var s = u(H) && u(i),
                        a = s || h(H);
                    if (I && d(H) || !I && a) return l(e, G())
                } else if (d(t) && h(t)) return l(e, t)
            } while (t = t.parentElement)
        }

        function d(t) {
            return t.clientHeight + 10 < t.scrollHeight
        }

        function u(t) {
            return "hidden" !== getComputedStyle(t, "").getPropertyValue("overflow-y")
        }

        function h(t) {
            var e = getComputedStyle(t, "").getPropertyValue("overflow-y");
            return "scroll" === e || "auto" === e
        }

        function p(t, e) {
            window.addEventListener(t, e, !1)
        }

        function m(t, e) {
            window.removeEventListener(t, e, !1)
        }

        function f(t, e) {
            return (t.nodeName || "").toLowerCase() === e.toLowerCase()
        }

        function g(t, e) {
            t = t > 0 ? 1 : -1, e = e > 0 ? 1 : -1, j.x === t && j.y === e || (j.x = t, j.y = e, A = [], B = 0)
        }

        function v(t) {
            if (t) return O.length || (O = [t, t, t]), t = Math.abs(t), O.push(t), O.shift(), clearTimeout(P), P = setTimeout(function() {
                window.localStorage && (localStorage.SS_deltaBuffer = O.join(","))
            }, 1e3), !w(120) && !w(100)
        }

        function _(t, e) {
            return Math.floor(t / e) == t / e
        }

        function w(t) {
            return _(O[0], t) && _(O[1], t) && _(O[2], t)
        }

        function b(t) {
            var e = t.target,
                i = !1;
            if (-1 != document.URL.indexOf("www.youtube.com/watch"))
                do {
                    if (i = e.classList && e.classList.contains("html5-video-controls")) break
                } while (e = e.parentNode);
            return i
        }

        function y(t) {
            var e, i, n;
            return t *= E.pulseScale, t < 1 ? e = t - (1 - Math.exp(-t)) : (i = Math.exp(-1), t -= 1, n = 1 - Math.exp(-t), e = i + n * (1 - i)), e * E.pulseNormalize
        }

        function C(t) {
            return t >= 1 ? 1 : t <= 0 ? 0 : (1 == E.pulseNormalize && (E.pulseNormalize /= y(1)), y(t))
        }

        function x(t) {
            for (var e in t) M.hasOwnProperty(e) && (E[e] = t[e])
        }
        var z, T, S, k, P, L = this,
            M = {
                frameRate: 150,
                animationTime: 400,
                stepSize: 100,
                pulseAlgorithm: !0,
                pulseScale: 4,
                pulseNormalize: 1,
                accelerationDelta: 50,
                accelerationMax: 3,
                keyboardSupport: !0,
                arrowScroll: 50,
                touchpadSupport: !1,
                fixedBackground: !0,
                excluded: ""
            },
            E = M,
            V = !1,
            I = !1,
            j = {
                x: 0,
                y: 0
            },
            D = !1,
            H = document.documentElement,
            O = [],
            X = /^Mac/.test(navigator.platform),
            N = {
                left: 37,
                up: 38,
                right: 39,
                down: 40,
                spacebar: 32,
                pageup: 33,
                pagedown: 34,
                end: 35,
                home: 36
            },
            Y = {
                37: 1,
                38: 1,
                39: 1,
                40: 1
            },
            A = [],
            q = !1,
            B = Date.now(),
            F = function() {
                var t = 0;
                return function(e) {
                    return e.uniqueID || (e.uniqueID = t++)
                }
            }(),
            R = {};
        window.localStorage && localStorage.SS_deltaBuffer && (O = localStorage.SS_deltaBuffer.split(","));
        var W = function() {
                return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(t, e, i) {
                    window.setTimeout(t, i || 1e3 / 60)
                }
            }(),
            U = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver,
            G = function() {
                var t;
                return function() {
                    if (!t) {
                        var e = document.createElement("div");
                        e.style.cssText = "height:10000px;width:1px;", document.body.appendChild(e);
                        var i = document.body.scrollTop;
                        document.documentElement.scrollTop;
                        window.scrollBy(0, 3), t = document.body.scrollTop != i ? document.body : document.documentElement, window.scrollBy(0, -3), document.body.removeChild(e)
                    }
                    return t
                }
            }(),
            K = window.navigator.userAgent,
            Z = /Edge/.test(K),
            Q = /chrome/i.test(K) && !Z,
            J = /safari/i.test(K) && !Z,
            tt = /mobile/i.test(K),
            et = /Windows NT 6.1/i.test(K) && /rv:11/i.test(K),
            it = (Q || J || et) && !tt;
        it = !1, $("html.mac").length || $("body.is-touch").length || (it = !0), console.log("smoothScroll:" + it);
        var nt;
        "onwheel" in document.createElement("div") ? nt = "wheel" : "onmousewheel" in document.createElement("div") && (nt = "mousewheel"), nt && it && (p(nt, o), p("mousedown", a), p("load", e)), x.destroy = i, window.SmoothScrollOptions && x(window.SmoothScrollOptions), "function" == typeof define && define.amd ? define(function() {
            return x
        }) : "object" == ("undefined" == typeof exports ? "undefined" : _typeof(exports)) ? module.exports = x : window.SmoothScroll = x
    },
    update: function() {
        app.modules.footer.parallax()
    },
    onPageSwitch: function() {
        this.enabled = !1
    },
    onPageSwitchEnd: function() {
        this.enabled = !0
    },
    initListeners: function() {},
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.smoothScroll = new smoothScroll, offices.prototype = {
    constructor: offices,
    initView: function() {},
    initPlugins: function() {},
    initListeners: function() {
        var t = this;
        $doc.on("click", this.trigger, function() {
            t.openOffices(t.selector)
        }), $win.on("scroll", function() {
            t.closeOffices(t.selector)
        }), $("body.is-touch " + t.selector + " .loopoffices__inner ul li").off().on("click", function() {
            $("body.is-touch " + t.selector + " .loopoffices__inner ul li").removeClass("active"), $(this).addClass("active")
        })
    },
    openOffices: function(t) {
        var e = this;
        $(t).toggleClass("active"), $html.toggleClass("page--offices"), $html.hasClass("page--offices") ? (this.localTime(), this.timer = setInterval(function() {
            e.localTime()
        }, 60)) : e.closeOffices(e.selector)
    },
    closeOffices: function(t) {
        $(t).removeClass("active"), $html.removeClass("page--offices"), clearInterval(this.timer)
    },
    localTime: function() {
        var t = this;
        $(t.list).each(function() {
            var t = $(this),
                e = "Europe/Berlin";
            switch (t.parent().find(".city").text()) {
                case "New York City":
                    e = "America/New_York";
                    break;
                case "Sydney":
                    e = "Australia/Sydney";
                    break;
                case "Copenhagen":
                    e = "Europe/Copenhagen"
            }
            var i = {
                    timeZone: e,
                    hour: "numeric",
                    minute: "numeric"
                },
                n = new Intl.DateTimeFormat([], i);
            if (n = n.format(new Date), n = n.split(" "), n.length > 1) {
                var o = n[0];
                o.length < 5 && (o = "0" + o), t.html(o + "<span>" + n[1] + "</span>")
            } else {
                n = n[0].split(":");
                var s = Number(n[0]),
                    a = Number(n[1]),
                    r = "AM";
                s > 12 ? (s -= 12, r = "PM") : s > 11 ? r = "PM" : s < 1 && (s = 12), a < 10 && (a = "0" + a), s < 10 && (s = "0" + s), t.html(s + ":" + a + "<span>" + r + "</span>")
            }
        })
    },
    onPageSwitch: function() {},
    onPageIn: function() {
        this.initView()
    },
    onPageShow: function() {},
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.offices = new offices, infobar.prototype = {
    constructor: infobar,
    initView: function() {
        var t = Cookies.get("closeInfobar"),
            e = Cookies.get("cookieDisclaimer");
        void 0 !== t && $(this.selector + ":not(" + this.cookies + ")").remove(), void 0 === e || 1 != Number(e) && 0 != Number(e) || $(this.cookies).remove(), $(this.selector + "," + this.cookies).length && $html.addClass("page--infobar"), touch && $win.innerWidth() < 980 && this.$chatbutton.css("bottom", $(this.selector).height()), this.initPlugins()
    },
    initPlugins: function() {},
    initListeners: function() {
        var t = this;
        $doc.on("click", this.close + "," + this.accept, function(e) {
            var i = $(e.target);
            t.closeInfobar(t.selector, i)
        }), touch && $win.innerWidth() < 980 && setTimeout(function() {
            t.closeInfobar(t.selector + ":not(" + t.cookies + ")"), this.$chatbutton.css("bottom", 0)
        }, 15e3)
    },
    closeInfobar: function(t, e) {
        var i = this,
            n = e ? e.parents(i.selector) : $(t),
            o = n.filter(i.cookies).length,
            s = e && e.filter(i.accept).length ? 1 : 0;
        n.addClass("is-hidden"), e && (o ? (Cookies.set("cookieDisclaimer", s, {
            expires: 1825
        }), Cookies.set("cookieDisclaimer", s, {
            expires: 1825,
            domain: "agentur-loop.com"
        }), s && includeGTM()) : (Cookies.set("closeInfobar", 0), Cookies.set("closeInfobar", 0, {
            domain: "agentur-loop.com"
        }))), this.$chatbutton.css("bottom", 0), setTimeout(function() {
            i.$offices.removeClass("loopoffices--infobar"), n.remove(), $(this.selector).length > 0 && this.$chatbutton.addClass("slidden-out").css("bottom", $(this.selector).height())
        }, 1e3), $(".block--landingintro--infobar").removeClass("block--landingintro--infobar")
    },
    onPageSwitch: function() {},
    onPageIn: function() {},
    onPageShow: function() {},
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.infobar = new infobar, contactOffices.prototype = {
    constructor: contactOffices,
    initPlugins: function() {
        var t = this;
        $(t.selector + "__trigger").on("click", function(e) {
            t.openOffice($(this).data("office"))
        })
    },
    onPageIn: function() {
        this.initPlugins()
    },
    openOffice: function(t) {
        var e = $(this.selector + "__item.open"),
            i = $(this.selector + '__item[data-office="' + t + '"]');
        e.data("office") != i.data("office") && (e.length && e.removeClass("open").slideUp(600, "easeOutExpo"), $(this.selector + '__item[data-office="' + t + '"]').addClass("open").slideDown(600, "easeOutExpo")), $("html, body").animate({
            scrollTop: $(this.selector).offset().top + $(this.selector).outerHeight()
        }, 600)
    }
}, onScreen.prototype = {
    constructor: onScreen,
    initView: function() {
        var t = this;
        $(this.selector).each(function() {
            var e = $(this),
                i = new ScrollMagic.Scene({
                    triggerElement: e[0],
                    triggerHook: .85
                }).setClassToggle(e[0], "is-on-screen").addTo(scrollController);
            t.tweens.push(i)
        })
    },
    onPageIn: function() {
        this.initView()
    },
    onPageSwitch: function() {
        for (var t = 0; t < this.tweens.length; t++) this.tweens[t].destroy();
        this.tweens = []
    },
    initPlugins: function() {},
    initListeners: function() {},
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.onScreen = new onScreen, scrollto.prototype = {
    constructor: scrollto,
    initPlugins: function() {
        var t = this;
        $doc.on("click.scrollto", this.trigger, function(e) {
            var i = $(e.currentTarget),
                n = i.attr("href") || i.data("href");
            (n.indexOf("#") >= 0 || n.indexOf(".") >= 0) && (e.preventDefault(), t.scrollTo(n))
        })
    },
    scrollTo: function(t) {
        scrollController.scrollTo($(t).offset().top - 30)
    },
    init: function() {
        this.initPlugins()
    }
}, app.modules.scrollto = new scrollto, landing.prototype = {
    constructor: landing,
    initView: function() {},
    initPlugins: function(t) {
        var e = this;
        $(this.selector).not(".initialized").each(function() {
            e.$el = $(this).addClass("initialized"), e.config = e.$el.data("config"), e.img_path = e.config.path, e.all_imgs = e.config.imgs, e.$imgs = $(".landing__imgs", e.$el), e.$imgs_items_active, e.$hover = $(".landing__text__hover", e.$el), e.$hover_items = $("> span", e.$hover), e.$active = $(".is-active", e.$hover), e.len = e.$hover_items.length, e.index = 0, e.imgs_index = 0, e.imgs = [], e.imgs_preload = e.config.preload || !1, e.imgs_total = e.config.total, e.timer, e.timerImgs, e.timerImgLoad, e.initialized, e.index = 0;
            var i = 0,
                n = e.$hover_items.filter(e.states.active);
            e.$hover_items.each(function() {
                var t = $(this),
                    n = t.width();
                n > i && (i = n, e.$placeholder = t)
            }), e.$placeholder.addClass("is-placeholder").css("width", n), e.imgLoad(), setTimeout(function() {
                $(e.selector).addClass(e.states.visible)
            }, t)
        })
    },
    imgLoad: function() {
        var t = this,
            e = String(t.imgs.length);
        if (clearTimeout(t.timerImgLoad), t.imgs.length < t.imgs_total)
            if (!t.imgs_preload || t.imgs.length < t.imgs_preload) {
                var i = t.img_path + t.all_imgs[e],
                    n = new Image;
                n.onload = function() {
                    $(t.img_tpl.split("###img###").join(i)).appendTo(t.$imgs);
                    t.imgs.push(n), t.imgLoad()
                }, n.src = i
            } else t.timerImgLoad = setTimeout(function() {
                t.imgLoad()
            }, 100)
    },
    initListeners: function() {
        var t = this;
        $doc.on(touch ? "touchstart.landing" : "mouseenter.landing", ".landing__text__hover > span", function() {
            t.onEnter()
        }).on(touch ? "touchend.landing, mouseup.landing" : "mouseleave.landing", ".landing__text__hover > span", function() {
            t.onLeave()
        })
    },
    count: function(t) {
        var e = this;
        if (e.$el.removeClass(e.states.init), t && (e.index = e.index < e.len - 1 ? e.index + 1 : 0), e.setText(e.index), !t) {
            e.$imgs_items = $(".landing__img", e.$imgs);
            var i = e.$imgs_items.length;
            e.$imgs_items_active || (e.$imgs_items_active = e.$imgs_items.eq(0)), e.$imgs_items.removeClass(e.states.prev), e.$imgs_items_active.addClass(e.states.prev), clearInterval(e.timerImgs), e.timerImgs = setInterval(function() {
                e.$imgs_items = $(".landing__img", e.$imgs), i = e.$imgs_items.length, e.imgs_index = e.$imgs_items.index(e.$imgs_items_active) + 1, e.imgs_index >= i && (e.imgs_index = 0), e.$imgs_items.removeClass(e.states.active), e.$imgs_items_active = e.$imgs_items.eq(e.imgs_index).addClass(e.states.active).removeClass(e.states.prev)
            }, 40)
        }
        clearTimeout(e.timer), e.timer = setTimeout(function() {
            e.count(!0)
        }, e.speed)
    },
    setText: function(t) {
        var e = this;
        e.index = t, e.$hover.attr("data-active", e.index >= e.len - 1 ? "last" : e.index), e.$hover_items.removeClass(e.states.active), e.$active = e.$hover_items.eq(e.index).addClass(e.states.active)
    },
    onEnter: function() {
        var t = this;
        t.imgs_preload = !1, t.$imgs_items = $(".landing__img", t.$imgs), clearTimeout(t.timer), t.$imgs_items.length > 0 ? (t.$el.addClass(t.states.hover).addClass(t.states.init), $("html").addClass(t.states.hover_body), t.$imgs_items.removeClass(t.states.prev), t.count()) : t.timer = setTimeout(function() {
            t.onEnter()
        }, 100)
    },
    onLeave: function() {
        var t = this;
        t.setText(0), t.$el.removeClass(t.states.hover), $("html").removeClass(t.states.hover_body), clearTimeout(t.timer), clearInterval(t.timerImgs)
    },
    onPageSwitch: function() {},
    onPageSwitchEnd: function() {
        this.initPlugins(600)
    },
    onPagePrepare: function() {},
    onPageIn: function() {},
    onPageShow: function() {},
    init: function() {
        this.initListeners(), this.initPlugins(1e3)
    }
}, app.modules.landing = new landing, teaser.prototype = {
    constructor: teaser,
    initView: function() {},
    initPlugins: function() {
        var t = this;
        $(this.selector).each(function(e, i) {
            var n = $(this);
            if (!n.data("initialized")) {
                var o = $(".teaser__vid", n).data("video");
                if (o) {
                    var s, a = $(".teaser__vid", n),
                        r = t.$video.clone();
                    n.data("initialized", !0), r.attr("src", o), a.append(r);
                    var l = r[0];
                    l.muted = !0, l.onplaying = function(t) {
                        $(this).parent().addClass("is-playing")
                    }, l.onpause = function(t) {
                        $(this).parent().removeClass("is-playing")
                    }, n.on("mouseenter", function(t) {
                        clearTimeout(s), n.hasClass("is-playing") || (l.currentTime = 0, l.play())
                    }), n.on("mouseleave", function(t) {
                        n.hasClass("is-playing") && l.pause(), s = setTimeout(function() {
                            l.pause()
                        }, 400)
                    })
                }
            }
        })
    },
    initListeners: function() {},
    onPagePrepare: function() {},
    onPageSwitch: function() {},
    onPageIn: function() {
        this.initPlugins()
    },
    onPageShow: function() {},
    init: function() {}
}, app.modules.teaser = new teaser, teaser_button.prototype = {
    constructor: teaser_button,
    initView: function() {},
    initPlugins: function() {
        var t = this;
        $(this.selector).each(function(e, i) {
            var n = $(this);
            if (!n.data("initialized")) {
                var o = $(".teaser-button__vid", n).data("video");
                if (o) {
                    var s, a = $(".teaser-button__vid", n),
                        r = t.$video.clone();
                    n.data("initialized", !0), r.attr("src", o), a.append(r);
                    var l = r[0];
                    l.muted = !0, l.onplaying = function(t) {
                        $(this).parent().addClass("is-playing")
                    }, l.onpause = function(t) {
                        $(this).parent().removeClass("is-playing")
                    }, n.on("mouseenter", function(t) {
                        clearTimeout(s), n.hasClass("is-playing") || (l.currentTime = 0, l.play())
                    }), n.on("mouseleave", function(t) {
                        n.hasClass("is-playing") && l.pause(), s = setTimeout(function() {
                            l.pause()
                        }, 400)
                    })
                }
            }
        })
    },
    initListeners: function() {},
    onPagePrepare: function() {},
    onPageSwitch: function() {},
    onPageIn: function() {
        this.initPlugins()
    },
    onPageShow: function() {},
    init: function() {}
}, app.modules.teaser_button = new teaser_button, form.prototype = {
    constructor: form,
    initView: function() {
        Dropzone.autoDiscover = !1, "undefined" == typeof csrfTokenName && (window.csrfTokenName = "abc", window.csrfTokenValue = "123")
    },
    onPageIn: function() {},
    onPageSwitchEnd: function() {
        this.initPlugins()
    },
    initPlugins: function() {
        var t = this;
        $(t.selector).not(".initialized").each(function() {
            var e = $(this).addClass("initialized"),
                i = e.data("upload-url"),
                n = e.find(".svg_logo");
            n.length && (t.button_logo = new app.obj.logo(n, !1, !0)), $(t.classes.select, e).each(function() {
                var e = $(this),
                    i = e.prop("selectedIndex"),
                    n = $('<div class="' + t.classes.select_options.substring(1) + '"></div>');
                n.html(e.html().split("option").join("div").split("value=").join("data-value=")), n.insertAfter(e), n.find("> div:eq(" + i + ")").addClass("is-active")
            });
            var o = new Object;
            o[csrfTokenName] = csrfTokenValue, $(t.classes.upload, e).each(function() {
                var n = $(this),
                    s = new Dropzone(n[0], {
                        url: i,
                        thumbnailWidth: 40,
                        thumbnailHeight: 40,
                        createImageThumbnails: !1,
                        maxFiles: 1,
                        parallelUploads: 20,
                        previewTemplate: '<div class="dz-preview dz-file-preview">\t\t\t\t\t\t\t\t\t\t\t<div class="dz-details">\t\t\t\t\t\t\t\t\t\t\t\t<img data-dz-thumbnail />\t\t\t\t\t\t\t\t\t\t\t\t<div class="dz-filename"><span data-dz-name></span></div>\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t<div class="dz-data">\t\t\t\t\t\t\t\t\t\t\t\t<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\t\t\t\t\t\t\t\t\t\t\t\t<div class="dz-size" data-dz-size></div>\t\t\t\t\t\t\t\t\t\t\t\t<div class="dz-remove" data-dz-remove></div>\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t</div>',
                        autoQueue: !0,
                        previewsContainer: $(".form__item__upload__list", n)[0],
                        clickable: $(".form__item__upload__button", n)[0],
                        params: o,
                        init: function() {
                            this.on("success", function(t, i) {
                                "object" === (void 0 === t ? "undefined" : _typeof(t)) && e.append($('<input readOnly type="hidden" name="uploads[]" value="' + i.id + '">'))
                            }).on("sending", function(e) {
                                n.addClass(t.states.loading)
                            }).on("complete", function(e) {
                                n.removeClass(t.states.loading)
                            }), this.cleanUp = function() {
                                this.removeAllFiles(!0)
                            }
                        }
                    });
                e.data("dropzone") ? e.data("dropzone").push(s) : e.data("dropzone", [s])
            })
        })
    },
    selectOpen: function(t) {
        t.stopPropagation(), $(this.classes.select_options + ".is-active").removeClass("is-active"), $(t.currentTarget).find(this.classes.select_options).addClass("is-active")
    },
    selectTrigger: function(t) {
        var e = $(t.currentTarget),
            i = e.parent().parent().find("select"),
            n = e.index();
        console.log(n), i.prop("selectedIndex", n), i.trigger("change")
    },
    selectChange: function(t) {
        var e = $(t.currentTarget),
            i = e.prop("selectedIndex"),
            n = e.next();
        console.log("change:" + i), n.removeClass("is-active").find("> div").removeClass("is-active").eq(i).addClass("is-active"), setTimeout(function() {
            n.removeClass("is-active")
        }, 10)
    },
    selectClose: function(t) {
        $(this.classes.select_options + ".is-active").removeClass("is-active")
    },
    formReset: function(t) {
        console.log($(t.currentTarget)), $(t.currentTarget).removeClass("form--validate").find(".not-empty").removeClass("not-empty")
    },
    formSubmit: function(t) {
        var e = this,
            i = t.hasClass("form") ? t : t.parents(".form"),
            n = i.data("sending"),
            o = $(e.classes.upload + "." + e.states.loading, i).length,
            s = $(":input", i).serialize(),
            a = new Object;
        a.formData = s, a[csrfTokenName] = csrfTokenValue;
        var r = i.attr("action") || i.data("action"),
            l = i.attr("method") || i.data("method"),
            c = i.data("redirect");
        if (n || o) return !1;
        i.addClass("form--validate");
        var d = i.find("input:not(:valid):not([type=hidden])");
        if (d.length) {
            var u = d.eq(0).offset().top;
            return u - $navigation_height < $win.scrollTop() && scrollController.scrollTo(u - $navigation_height - 100), !1
        }
        i.removeClass("form--validate").addClass("form--sending"), e.button_logo && e.button_logo.loadingStart(), i.data("sending", !0), $.ajax({
            xhr: function() {
                return new window.XMLHttpRequest
            },
            url: r,
            type: l,
            data: a,
            dataType: "json",
            success: function(t) {
                var e = i.data("dropzone");
                if (console.log(t), "success" == t.status) {
                    if (i.addClass("form--submitted"), i[0].reset(), e)
                        for (var n = 0; n < e.length; n++) e[n].cleanUp();
                    if (c) app.modules.site.pageSwitch(c);
                    else {
                        var o = i.parents(".infobox__content__slide");
                        o.length && setTimeout(function() {
                            o.find(".infobox__content__slide__back").trigger("click")
                        }, 6e3)
                    }
                }
            },
            error: function(t) {
                console.log(t), i.data("sending", "")
            }
        }).done(function() {
            i.data("sending", "").removeClass("form--sending")
        })
    },
    formSubmitHandler: function(t) {
        t.preventDefault(), this.formSubmit($(t.currentTarget))
    },
    initListeners: function() {
        var t = this;
        $doc.on("mousedown.form-item-select-close", t.selectClose.bind(this)), $doc.on("mousedown.form-item-select", t.selector + " .form__item__select", t.selectOpen.bind(this)), $doc.on("mousedown.form-item-select", "html.from-tablet " + t.selector + " .form__item__select select", function(t) {
            t.preventDefault()
        }), $doc.on("click.form-item-select-options", t.selector + " " + t.classes.select_options + " > div", t.selectTrigger.bind(this)), $doc.on("change.form-select", t.selector + " .form__item select", t.selectChange.bind(this)), $doc.on("click.button-full", t.selector + " .button-full, " + t.selector + " .infobox__button", t.formSubmitHandler.bind(this)), $doc.on("keyup.input", "input, textarea", function(t) {
            var e = $(t.currentTarget);
            "" != e.val() ? e.addClass("not-empty") : e.removeClass("not-empty")
        }), $doc.on("reset.form", t.selector, t.formReset.bind(this))
    },
    init: function() {
        this.initView(), this.initListeners(), this.initPlugins()
    }
}, app.modules.form = new form, infobox.prototype = {
    constructor: infobox,
    initView: function() {},
    initListeners: function() {
        var t = this;
        $doc.on("click.infobox-button", this.slides + " " + this.slide + ":first-child " + this.button, function(e) {
            e.preventDefault();
            var i = $(e.currentTarget),
                n = i.parent().find(t.button).index(i),
                o = i.parents(t.slides);
            t.slideSelect(o, n)
        }), $doc.on("click.infobox-back", this.slides + " " + this.back, function(e) {
            var i = $(e.currentTarget),
                n = i.parents(t.slides);
            t.slideSelect(n, !1)
        })
    },
    slideSelect: function(t, e) {
        if (!1 !== e) t.attr("data-slide", e + 2);
        else {
            var i = t.find(this.slide + ":nth-child(" + t.attr("data-slide") + ") .form");
            i[0].reset(), t.removeAttr("data-slide"), setTimeout(function() {
                i.removeClass("form--submitted")
            }, 500)
        }
    },
    init: function() {
        this.initListeners()
    }
}, app.modules.infobox = new infobox, svginline.prototype = {
    constructor: svginline,
    initView: function() {},
    initPlugins: function() {
        inlineSVG.init({
            svgSelector: ".svg-inline",
            initClass: "js-inlinesvg"
        }, function() {
            console.log("All SVGs inlined")
        })
    },
    initListeners: function() {},
    onPagePrepare: function() {},
    onPageSwitch: function() {},
    onPageIn: function() {
        this.initPlugins()
    },
    onPageShow: function() {},
    init: function() {}
}, app.modules.svginline = new svginline, chatbutton.prototype = {
    constructor: chatbutton,
    initView: function() {
        var t = this,
            e = this.$el;
        e.length > 0 && $.ajax({
            url: e.data("url"),
            type: "GET",
            dataType: "json",
            contentType: "application/json",
            success: function(i) {
                t.active_items = i.items.filter(function(t) {
                    return !0 === t.active
                });
                var n = t.active_items,
                    o = t.createButton(n[t.index]);
                e.append(o), setTimeout(function() {
                    $(".chatbutton__link").first().removeClass("slidden-out"), t.startInterval()
                }, 1500)
            },
            error: function(t) {
                console.log("error")
            }
        })
    },
    createButton: function(t) {
        var e = "",
            i = "",
            n = "";
        if (t.style.indexOf("#") >= 0) {
            if (n = "cls" + t.text.toLowerCase().replace(/[^a-zA-Z0-9]+/g, "-"), $("#" + n).length < 1) {
                var o = function(t, e) {
                    var i = !1;
                    "#" == t[0] && (t = t.slice(1), i = !0);
                    var n = parseInt(t, 16),
                        o = (n >> 16) + e;
                    o > 255 ? o = 255 : o < 0 && (o = 0);
                    var s = (n >> 8 & 255) + e;
                    s > 255 ? s = 255 : s < 0 && (s = 0);
                    var a = (255 & n) + e;
                    return a > 255 ? a = 255 : a < 0 && (a = 0), (i ? "#" : "") + (a | s << 8 | o << 16).toString(16)
                }(t.style, -15);
                i = '\n\t\t\t\t\t<style id="' + n + '">\n\t\t\t\t\t.' + n + " {\n\t\t\t\t\t\tbackground: " + t.style + ";\n\t\t\t\t\t}\n\t\t\t\t\t.no-touch ." + n + ":hover {\n\t\t\t\t\t\tbackground: " + o + " !important;\n\t\t\t\t\t}\n\t\t\t\t\t</style>\n\t\t\t\t"
            }
        } else e = "chatbutton__link--" + t.style;
        return "\n\t\t\t" + i + "\n\t\t\t<a " + ("intercom" == t.style ? 'id="js-intercom-button" href="#"' : 'href="' + t.link + '"') + " " + (t.target ? 'target="' + t.target + '"' : "") + '  class="chatbutton__link ' + e + " " + n + ' slidden-out">\n\t\t\t\t' + (t.logo ? '<img src="' + t.logo + '">' : '<span class="icon icon--social-' + t.style + " " + (t.icon_larger ? "icon--larger" : "") + '"></span>') + '\n\t\t\t\t<span class="text">' + t.text + '</span>\n\t\t\t\t<div class="chatbutton__line"></div>\n\t\t\t</a>\n\t\t'
    },
    startInterval: function() {
        var t = this,
            e = this.$el;
        setInterval(function() {
            var i = t.active_items;
            t.index === i.length - 1 ? t.index = 0 : t.index++;
            var n = i[t.index],
                o = t.createButton(n);
            e.append(o), setTimeout(function() {
                $(".chatbutton__link").first().addClass("slidden-away"), $(".chatbutton__link").last().removeClass("slidden-out"), setTimeout(function() {
                    $(".chatbutton__link").first().remove()
                }, 300)
            }, 1e3)
        }, 12e3)
    },
    init: function() {
        this.initView()
    }
}, app.modules.chatbutton = new chatbutton, checklist.prototype = {
    constructor: checklist,
    initView: function() {
        $(".js-checklist").each(function() {
            var t = $(this);
            new ScrollMagic.Scene({
                triggerElement: t.get(0),
                triggerHook: .7,
                offset: 0
            }).setClassToggle(t.get(0), "active").addTo(scrollController)
        })
    },
    init: function() {
        this.initView()
    },
    onPageSwitchEnd: function() {
        this.initView()
    }
}, app.modules.checklist = new checklist, process.prototype = {
    constructor: process,
    states: {
        line_icon: {
            line: {
                selector: ".line",
                initial: {
                    d: "M102.001,102v0.297"
                },
                end: {
                    d: "M102.3231,56v84.247"
                }
            },
            whitedot_totop: {
                selector: ".whitedot--totop",
                initial: {
                    d: "M108.955,102.296c0.002,3.84-3.11,6.956-6.953,6.956c0,0,0,0-0.001,0c-3.84,0-6.955-3.111-6.955-6.954c0,0,0-0.001,0-0.002c0-3.84,3.114-6.954,6.954-6.954c0,0,0,0,0.001,0C105.842,95.342,108.955,98.457,108.955,102.296L108.955,102.296"
                },
                end: {
                    d: "M108.955,58.25c0.002,3.84-3.109,6.956-6.953,6.956c0,0,0,0-0.001,0c-3.84,0-6.955-3.111-6.955-6.954c0,0,0-0.001,0-0.002c0-3.84,3.114-6.954,6.954-6.954c0,0,0,0,0.001,0C105.842,51.296,108.955,54.411,108.955,58.25L108.955,58.25"
                }
            },
            whitedot_tobot: {
                selector: ".whitedot--tobot",
                initial: {
                    d: "M108.955,102.297c0.002-3.841-3.11-6.955-6.953-6.955c0,0,0,0-0.001,0c-3.84,0-6.955,3.112-6.955,6.953c0,0,0,0.001,0,0.002c0,3.841,3.112,6.955,6.953,6.955c0,0,0.001,0,0.002,0C105.842,109.252,108.955,106.139,108.955,102.297L108.955,102.297"
                },
                end: {
                    d: "M108.955,146.342c0.002-3.841-3.109-6.955-6.953-6.955c0,0,0,0-0.001,0c-3.84,0-6.955,3.112-6.955,6.953c0,0,0,0.001,0,0.002c0,3.842,3.112,6.955,6.953,6.955c0,0,0.001,0,0.002,0C105.842,153.297,108.955,150.184,108.955,146.342L108.955,146.342"
                }
            }
        },
        star_icon: {
            stardot_1: {
                selector: ".stardot--1",
                initial: {
                    d: "M108.955,102c0-3.841-3.113-6.955-6.953-6.955c0,0-0.001,0-0.002,0c-3.841-0.001-6.955,3.112-6.955,6.953c0,0.001,0,0.001,0,0.002c0,3.84,3.113,6.954,6.954,6.954c0,0,0,0,0.001,0C105.839,108.953,108.954,105.84,108.955,102"
                },
                end: {
                    d: "M69.639,80.661c0-3.841-3.113-6.955-6.953-6.955c0,0-0.001,0-0.002,0c-3.841-0.001-6.955,3.112-6.955,6.953c0,0.001,0,0.001,0,0.002c0,3.84,3.113,6.954,6.954,6.954c0,0,0,0,0.001,0C66.523,87.614,69.638,84.501,69.639,80.661"
                }
            },
            stardot_2: {
                selector: ".stardot--2",
                initial: {
                    d: "M108.955,102c0-3.841-3.111-6.955-6.954-6.955c0,0,0,0-0.001,0c-3.84,0-6.954,3.112-6.955,6.953c0,0,0,0.001,0,0.002c0,3.841,3.113,6.954,6.954,6.954H102C105.842,108.956,108.955,105.841,108.955,102L108.955,102"
                },
                end: {
                    d: "M108.273,58.251c0-3.841-3.111-6.955-6.953-6.955c0,0,0,0-0.001,0c-3.84,0-6.954,3.112-6.955,6.953c0,0,0,0.001,0,0.002c0,3.84,3.113,6.954,6.954,6.954h0.001C105.16,65.206,108.273,62.091,108.273,58.251L108.273,58.25"
                }
            },
            stardot_3: {
                selector: ".stardot--3",
                initial: {
                    d: "M108.954,102c0.002-3.841-3.111-6.955-6.953-6.955c0,0,0,0-0.002,0c-3.84,0-6.953,3.113-6.953,6.954V102c0,3.84,3.113,6.954,6.953,6.954l0,0C105.839,108.953,108.954,105.841,108.954,102C108.954,102.001,108.954,102,108.954,102"
                },
                end: {
                    d: "M146.91,80.661c0.002-3.841-3.111-6.955-6.953-6.955c0,0,0,0-0.002,0c-3.84,0-6.953,3.113-6.953,6.954v0.001c0,3.84,3.113,6.954,6.953,6.954l0,0C143.795,87.614,146.91,84.502,146.91,80.661C146.91,80.662,146.91,80.661,146.91,80.661"
                }
            },
            stardot_4: {
                selector: ".stardot--4",
                initial: {
                    d: "M108.954,101.999c0.002,3.842-3.111,6.955-6.953,6.955c0,0,0,0-0.002,0c-3.84,0-6.953-3.111-6.953-6.953c0,0,0,0,0-0.002c0-3.84,3.113-6.953,6.953-6.953l0,0C105.839,95.046,108.954,98.159,108.954,101.999L108.954,101.999"
                },
                end: {
                    d: "M146.91,123.932c0.002,3.842-3.111,6.955-6.953,6.955c0,0,0,0-0.002,0c-3.84,0-6.953-3.112-6.953-6.953c0,0,0,0,0-0.002c0-3.84,3.113-6.953,6.953-6.953l0,0C143.795,116.979,146.91,120.092,146.91,123.932L146.91,123.932"
                }
            },
            stardot_5: {
                selector: ".stardot--5",
                initial: {
                    d: "M108.955,102c0,3.84-3.111,6.955-6.954,6.955c0,0,0,0-0.001,0c-3.84,0-6.954-3.111-6.955-6.953V102c0-3.84,3.113-6.955,6.954-6.955H102C105.842,95.045,108.955,98.16,108.955,102L108.955,102"
                },
                end: {
                    d: "M108.273,146.342c0,3.84-3.111,6.955-6.953,6.955c0,0,0,0-0.001,0c-3.84,0-6.954-3.111-6.955-6.953v-0.002c0-3.84,3.113-6.955,6.954-6.955h0.001C105.16,139.387,108.273,142.502,108.273,146.342L108.273,146.342"
                }
            },
            stardot_6: {
                selector: ".stardot--6",
                initial: {
                    d: "M108.955,101.999c0,3.842-3.113,6.955-6.953,6.955c0,0-0.001,0-0.002,0c-3.841,0.002-6.955-3.111-6.955-6.951c0-0.002,0-0.002,0-0.004c0-3.84,3.113-6.953,6.954-6.953c0,0,0,0,0.001,0C105.839,95.046,108.954,98.159,108.955,101.999L108.955,101.999"
                },
                end: {
                    d: "M69.639,123.932c0,3.842-3.113,6.955-6.953,6.955c0,0-0.001,0-0.002,0c-3.841,0.002-6.955-3.111-6.955-6.951c0-0.002,0-0.002,0-0.004c0-3.84,3.113-6.953,6.954-6.953c0,0,0,0,0.001,0C66.523,116.979,69.638,120.092,69.639,123.932L69.639,123.932"
                }
            },
            starline_horizontal: {
                selector: ".starline--horizontal",
                initial: {
                    x1: "101.318",
                    y1: "100",
                    x2: "101.318",
                    y2: "102"
                },
                end: {
                    x1: "101.318",
                    y1: "58.251",
                    x2: "101.318",
                    y2: "145.748"
                }
            },
            starline_updown: {
                selector: ".starline--updown",
                initial: {
                    x1: "100.377",
                    y1: "101.091",
                    x2: "103.623",
                    y2: "102.908"
                },
                end: {
                    x1: "62.684",
                    y1: "80.661",
                    x2: "139.955",
                    y2: "123.932"
                }
            },
            starline_downup: {
                selector: ".starline--downup",
                initial: {
                    x1: "103.568",
                    y1: "101.122",
                    x2: "100.432",
                    y2: "102.878"
                },
                end: {
                    x1: "139.955",
                    y1: "80.661",
                    x2: "62.684",
                    y2: "123.932"
                }
            }
        },
        infinite_icon: {
            infinitedot_left: {
                selector: ".infinitedot--left",
                initial: {
                    d: "M72.404,102.486c0,3.627-2.94,6.565-6.567,6.565c-3.628,0-6.568-2.938-6.568-6.565s2.94-6.567,6.567-6.567C69.464,95.918,72.404,98.859,72.404,102.486L72.404,102.486"
                },
                end: {
                    d: "M72.404,122.73c0,3.627-2.94,6.566-6.567,6.566c-3.628,0-6.568-2.939-6.568-6.566s2.94-6.567,6.567-6.567C69.464,116.162,72.404,119.104,72.404,122.73L72.404,122.73"
                }
            },
            infiniteline_downup: {
                selector: ".infiniteline--downup",
                initial: {
                    x1: "66.211",
                    y1: "102.479",
                    x2: "139.528",
                    y2: "102.391"
                },
                end: {
                    x1: "65.837",
                    y1: "81.865",
                    x2: "138.811",
                    y2: "122.729"
                }
            },
            infinitedot_right: {
                selector: ".infinitedot--right",
                initial: {
                    d: "M145.377,102c0-3.627-2.939-6.567-6.566-6.567s-6.567,2.94-6.567,6.567s2.94,6.568,6.567,6.568S145.377,105.627,145.377,102L145.377,102"
                },
                end: {
                    d: "M145.377,81.865c0-3.627-2.939-6.567-6.566-6.567s-6.568,2.94-6.568,6.567s2.941,6.568,6.568,6.568S145.377,85.492,145.377,81.865L145.377,81.865"
                }
            },
            infiniteline_right: {
                selector: ".infiniteline--right",
                initial: {
                    x1: "139.557",
                    y1: "102.375",
                    x2: "139.557",
                    y2: "102.375"
                },
                end: {
                    x1: "138.435",
                    y1: "81.897",
                    x2: "138.678",
                    y2: "123.006"
                }
            },
            infiniteline_updown: {
                selector: ".infiniteline--updown",
                initial: {
                    x1: "139.369",
                    y1: "102.27",
                    x2: "66.192",
                    y2: "102.323"
                },
                end: {
                    x1: "138.81",
                    y1: "81.865",
                    x2: "65.838",
                    y2: "122.729"
                }
            },
            infiniteline_left: {
                selector: ".infiniteline--left",
                initial: {
                    x1: "66.091",
                    y1: "102.267",
                    x2: "66.091",
                    y2: "102.267"
                },
                end: {
                    x1: "66.212",
                    y1: "122.697",
                    x2: "65.97",
                    y2: "81.589"
                }
            }
        },
        cube_icon: {
            cubeline_left: {
                selector: ".cubeline--left",
                initial: {
                    x1: "99.338",
                    y1: "101.92",
                    x2: "99.338",
                    y2: "101.92"
                },
                end: {
                    x1: "62.38",
                    y1: "81.225",
                    x2: "99.338",
                    y2: "101.92"
                }
            },
            cubeline_right: {
                selector: ".cubeline--right",
                initial: {
                    x1: "136.293",
                    y1: "81.225",
                    x2: "135.929",
                    y2: "81.429"
                },
                end: {
                    x1: "136.293",
                    y1: "81.225",
                    x2: "99.338",
                    y2: "101.92"
                }
            },
            cubedot: {
                selector: ".cubedot",
                initial: {
                    d: "M105.99,102c0-3.674-2.979-6.652-6.653-6.652c-3.673,0-6.652,2.978-6.652,6.652l0,0c0,3.674,2.978,6.652,6.652,6.652C103.012,108.652,105.99,105.674,105.99,102"
                },
                end: {
                    d: "M69.033,81.471c0-3.674-2.979-6.652-6.652-6.652c-3.673,0-6.652,2.978-6.652,6.652l0,0c0,3.674,2.978,6.652,6.652,6.652C66.055,88.123,69.033,85.145,69.033,81.471"
                }
            }
        }
    },
    initView: function() {
        var t = this,
            e = new Snap("#line_icon"),
            i = new Snap("#star_icon"),
            n = new Snap("#infinite_icon"),
            o = new Snap("#cube_icon"),
            s = !1;
        $(".js-process-item").each(function() {
            var a = $(this);
            new ScrollMagic.Scene({
                triggerElement: a.get(0),
                triggerHook: .6,
                offset: 0
            }).setClassToggle(a.get(0), "active").on("start", function() {
                if (a.find("#line_icon").length > 0 && !s) {
                    var r = t.states.line_icon;
                    setTimeout(function() {
                        for (var t in r) {
                            var i = r[t];
                            e.select(i.selector).animate(i.end, 400)
                        }
                    }, 600)
                }
                if (a.find("#star_icon").length > 0 && !s) {
                    var l = t.states.star_icon;
                    for (var c in l) {
                        var d = l[c];
                        i.select(d.selector).animate(d.end, 400)
                    }
                }
                if (a.find("#infinite_icon").length > 0 && !s) {
                    var u = t.states.infinite_icon;
                    for (var h in u) {
                        var p = u[h];
                        n.select(p.selector).animate(p.end, 400)
                    }
                }
                if (a.find("#cube_icon").length > 0 && !s) {
                    var m = t.states.cube_icon;
                    for (var f in m) {
                        var g = m[f];
                        o.select(g.selector).animate(g.end, 400)
                    }
                }
            }).on("leave", function() {
                s = !0, setTimeout(function() {
                    if (a.find("#line_icon").length > 0) {
                        var r = t.states.line_icon;
                        for (var l in r) {
                            var c = r[l];
                            e.select(c.selector).animate(c.initial, 0)
                        }
                    }
                    if (a.find("#star_icon").length > 0) {
                        var d = t.states.star_icon;
                        for (var u in d) {
                            var h = d[u];
                            i.select(h.selector).animate(h.initial, 0)
                        }
                    }
                    if (a.find("#infinite_icon").length > 0) {
                        var p = t.states.infinite_icon;
                        for (var m in p) {
                            var f = p[m];
                            n.select(f.selector).animate(f.initial, 0)
                        }
                    }
                    if (a.find("#cube_icon").length > 0 && !s) {
                        var g = t.states.cube_icon;
                        for (var v in g) {
                            var _ = g[v];
                            o.select(_.selector).animate(_.initial, 0)
                        }
                    }
                    s = !1
                }, 300)
            }).addTo(scrollController)
        })
    },
    init: function() {
        this.initView()
    },
    onPageSwitchEnd: function() {
        this.initView()
    }
}, app.modules.process = new process, videoHero.prototype = {
    constructor: videoHero,
    initView: function() {
        var t = this,
            e = $(t.selector).find("video"),
            i = e.get(0);
        setTimeout(function() {
            i.play(), e.addClass("loaded")
        }, 1300)
    },
    init: function() {
        this.initView()
    },
    onPageSwitchEnd: function() {
        this.initView()
    }
}, app.modules.videoHero = new videoHero;
//# sourceMappingURL=maps/scripts.min.js.map