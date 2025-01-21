/*!
* Lettering script
*/
(function($){
	function injector(t, splitter, klass, after) {
		var text = t.text()
		, a = text.split(splitter)
		, inject = '';
		if (a.length) {
			$(a).each(function(i, item) {
				inject += '<span class="'+klass+(i+1)+'" aria-hidden="true">'+item+'</span>'+after;
			});
			t.attr('aria-label',text)
			.empty()
			.append(inject)

		}
	}
	var methods = {
		init : function() {

			return this.each(function() {
				injector($(this), '', 'char char', '');
			});
		},
		words : function() {

			return this.each(function() {
				injector($(this), ' ', 'word word', ' ');
			});
		},
		lines : function() {
			return this.each(function() {
				var r = "eefec303079ad17405c889e092e105b0";
				// Because it's hard to split a <br/> tag consistently across browsers,
				// (*ahem* IE *ahem*), we replace all <br/> instances with an md5 hash
				// (of the word "split").  If you're trying to use this plugin on that
				// md5 hash string, it will fail because you're being ridiculous.
				injector($(this).children("br").replaceWith(r).end(), r, 'line', '');
			});
		}
	};
	$.fn.lettering = function( method ) {
		// Method calling logic
		if ( method && methods[method] ) {
			return methods[ method ].apply( this, [].slice.call( arguments, 1 ));
		} else if ( method === 'letters' || ! method ) {
			return methods.init.apply( this, [].slice.call( arguments, 0 ) ); // always pass an array
		}
		$.error( 'Method ' +  method + ' does not exist on jQuery.lettering' );
		return this;
	};
})(jQuery);


/* Page titles Glitch*/

!function(e) {
    "undefined" == typeof module ? this.charming = e : module.exports = e
}(function(e, n) {
    "use strict";
    n = n || {};
    var t = n.tagName || "span"
      , o = null != n.classPrefix ? n.classPrefix : "char"
      , r = 1
      , a = function(e) {
        for (var n = e.parentNode, a = e.nodeValue, c = a.length, l = -1; ++l < c; ) {
            var d = document.createElement(t);
            o && (d.className = o + r,
            r++),
            d.appendChild(document.createTextNode(a[l])),
            n.insertBefore(d, e)
        }
        n.removeChild(e)
    };
    return function c(e) {
        for (var n = [].slice.call(e.childNodes), t = n.length, o = -1; ++o < t; )
            c(n[o]);
        e.nodeType === Node.TEXT_NODE && a(e)
    }(e),
    e
});

const getRandomNumber = (min, max) => (Math.random() * (max - min) + min);

//animateTitles();
function animateTitles(title) {

  //const title = document.querySelector('body.inner-page #page-top-image .section-title');
  // charming(title);
  jQuery(title).lettering('words').children("span").lettering();
  
  const titleLetters = Array.from(title.querySelectorAll('span.char'));

  TweenMax.set(titleLetters, {opacity: 0});
  TweenMax.staggerTo(titleLetters, 0.8, {
    ease: Expo.easeOut,
    startAt: {rotationX: -100, z: -1000},
    opacity: 1,
    rotationX: 0,
    z: 0
  }, 0.1);


  const glitch = (el,cycles) => {
    if ( cycles === 0 || cycles > 3 ) return;
    TweenMax.set(el, {
      x: getRandomNumber(-10,10), 
      y: getRandomNumber(-10,10),
      color: ['#444','#7fc34a','#7fc34a','#ccc'][cycles-1]
    });
    setTimeout(() => {
      TweenMax.set(el, {x: 0, y: 0, color: '#000'});
      glitch(el, cycles-1);
    }, getRandomNumber(20,100));
  };

  const loop = (startAt) => {
    this.timeout = setTimeout(() => {
        const titleLettersShuffled = titleLetters.sort((a,b) => 0.5 - Math.random());
        const lettersSet = titleLettersShuffled.slice(0, getRandomNumber(1,titleLetters.length+1));
        for (let i = 0, len = lettersSet.length; i < len-1; ++i) {
          glitch(lettersSet[i], 3);
        }
        loop();
    }, startAt || getRandomNumber(500, 3000));
  }
  loop(1500);
}
/* end page titles Glitch*/

