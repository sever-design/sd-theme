!function(t){t.fn.extend({stickyMojo:function(e){var n=t.extend({footerID:"",contentID:"",orientation:t(this).css("float")},e),o={el:t(this),stickyLeft:t(n.contentID).outerWidth()+t(n.contentID).offset.left,stickyTop2:t(this).offset().top,stickyHeight:t(this).outerHeight(!0),contentHeight:t(n.contentID).outerHeight(!0),win:t(window),breakPoint:t(this).outerWidth(!0)+t(n.contentID).outerWidth(!0),marg:parseInt(t(this).css("margin-top"),10)};if(function(){var t=[];for(var e in n)if(!n[e])return console.warn(e+": cannot be null. Please consult http://mojotech.com/mojosticky for instructions. Terminating."),void t.push(n[e])}(),!function(){var t=-1;if("Microsoft Internet Explorer"==navigator.appName){var e=navigator.userAgent,n=new RegExp("MSIE ([0-9]{1,}[.0-9]{0,})");null!=n.exec(e)&&(t=parseFloat(RegExp.$1))}switch(!0){case t>=8:return!1;case t>-1:return!0;default:return!1}}())return this.each(function(){o.el.css("left",o.stickyLeft),o.win.scroll(function(){i()}),o.win.resize(function(){o.el.css("left",o.stickyLeft),i()})});function i(){var e=t(n.footerID).offset().top-o.stickyHeight,i=o.win.scrollTop();if(o.stickyTop2-o.marg<i&&o.win.width()>=o.breakPoint?(o.el.css({position:"fixed",top:0}),"left"===n.orientation?t(n.contentID).css("margin-left",o.el.outerWidth(!0)):o.el.css("margin-left",t(n.contentID).outerWidth(!0))):(o.el.css("position","static"),t(n.contentID).css("margin-left","0px"),o.el.css("margin-left","0px")),e<i){var s=e-i;o.el.css({top:s})}}}})}(jQuery);