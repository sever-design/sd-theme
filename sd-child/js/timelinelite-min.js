var _gsScope="undefined"!=typeof module&&module.exports&&"undefined"!=typeof global?global:this||window;(_gsScope._gsQueue||(_gsScope._gsQueue=[])).push(function(){"use strict";_gsScope._gsDefine("TimelineLite",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var r=function(t){e.call(this,t),this._labels={},this.autoRemoveChildren=!0===this.vars.autoRemoveChildren,this.smoothChildTiming=!0===this.vars.smoothChildTiming,this._sortChildren=!0,this._onUpdate=this.vars.onUpdate;var i,r,s=this.vars;for(r in s)i=s[r],h(i)&&-1!==i.join("").indexOf("{self}")&&(s[r]=this._swapSelfInParams(i));h(s.tweens)&&this.add(s.tweens,0,s.align,s.stagger)},s=1e-10,a=i._internals,n=r._internals={},o=a.isSelector,h=a.isArray,l=a.lazyTweens,_=a.lazyRender,u=_gsScope._gsDefine.globals,m=function(t){var e,i={};for(e in t)i[e]=t[e];return i},d=function(t,e,i){var r,s,a=t.cycle;for(r in a)s=a[r],t[r]="function"==typeof s?s.call(e[i],i):s[i%s.length];delete t.cycle},f=n.pauseCallback=function(){},c=function(t){var e,i=[],r=t.length;for(e=0;e!==r;i.push(t[e++]));return i},p=r.prototype=new e;return r.version="1.18.0",p.constructor=r,p.kill()._gc=p._forcingPlayhead=p._hasPause=!1,p.to=function(t,e,r,s){var a=r.repeat&&u.TweenMax||i;return e?this.add(new a(t,e,r),s):this.set(t,r,s)},p.from=function(t,e,r,s){return this.add((r.repeat&&u.TweenMax||i).from(t,e,r),s)},p.fromTo=function(t,e,r,s,a){var n=s.repeat&&u.TweenMax||i;return e?this.add(n.fromTo(t,e,r,s),a):this.set(t,s,a)},p.staggerTo=function(t,e,s,a,n,h,l,_){var u,f,p=new r({onComplete:h,onCompleteParams:l,callbackScope:_,smoothChildTiming:this.smoothChildTiming}),T=s.cycle;for("string"==typeof t&&(t=i.selector(t)||t),o(t=t||[])&&(t=c(t)),0>(a=a||0)&&((t=c(t)).reverse(),a*=-1),f=0;t.length>f;f++)(u=m(s)).startAt&&(u.startAt=m(u.startAt),u.startAt.cycle&&d(u.startAt,t,f)),T&&d(u,t,f),p.to(t[f],e,u,f*a);return this.add(p,n)},p.staggerFrom=function(t,e,i,r,s,a,n,o){return i.immediateRender=0!=i.immediateRender,i.runBackwards=!0,this.staggerTo(t,e,i,r,s,a,n,o)},p.staggerFromTo=function(t,e,i,r,s,a,n,o,h){return r.startAt=i,r.immediateRender=0!=r.immediateRender&&0!=i.immediateRender,this.staggerTo(t,e,r,s,a,n,o,h)},p.call=function(t,e,r,s){return this.add(i.delayedCall(0,t,e,r),s)},p.set=function(t,e,r){return r=this._parseTimeOrLabel(r,0,!0),null==e.immediateRender&&(e.immediateRender=r===this._time&&!this._paused),this.add(new i(t,0,e),r)},r.exportRoot=function(t,e){null==(t=t||{}).smoothChildTiming&&(t.smoothChildTiming=!0);var s,a,n=new r(t),o=n._timeline;for(null==e&&(e=!0),o._remove(n,!0),n._startTime=0,n._rawPrevTime=n._time=n._totalTime=o._time,s=o._first;s;)a=s._next,e&&s instanceof i&&s.target===s.vars.onComplete||n.add(s,s._startTime-s._delay),s=a;return o.add(n,0),n},p.add=function(s,a,n,o){var l,_,u,m,d,f;if("number"!=typeof a&&(a=this._parseTimeOrLabel(a,0,!0,s)),!(s instanceof t)){if(s instanceof Array||s&&s.push&&h(s)){for(n=n||"normal",o=o||0,l=a,_=s.length,u=0;_>u;u++)h(m=s[u])&&(m=new r({tweens:m})),this.add(m,l),"string"!=typeof m&&"function"!=typeof m&&("sequence"===n?l=m._startTime+m.totalDuration()/m._timeScale:"start"===n&&(m._startTime-=m.delay())),l+=o;return this._uncache(!0)}if("string"==typeof s)return this.addLabel(s,a);if("function"!=typeof s)throw"Cannot add "+s+" into the timeline; it is not a tween, timeline, function, or string.";s=i.delayedCall(0,s)}if(e.prototype.add.call(this,s,a),(this._gc||this._time===this._duration)&&!this._paused&&this._duration<this.duration())for(f=(d=this).rawTime()>s._startTime;d._timeline;)f&&d._timeline.smoothChildTiming?d.totalTime(d._totalTime,!0):d._gc&&d._enabled(!0,!1),d=d._timeline;return this},p.remove=function(e){if(e instanceof t){this._remove(e,!1);var i=e._timeline=e.vars.useFrames?t._rootFramesTimeline:t._rootTimeline;return e._startTime=(e._paused?e._pauseTime:i._time)-(e._reversed?e.totalDuration()-e._totalTime:e._totalTime)/e._timeScale,this}if(e instanceof Array||e&&e.push&&h(e)){for(var r=e.length;--r>-1;)this.remove(e[r]);return this}return"string"==typeof e?this.removeLabel(e):this.kill(null,e)},p._remove=function(t,i){e.prototype._remove.call(this,t,i);var r=this._last;return r?this._time>r._startTime+r._totalDuration/r._timeScale&&(this._time=this.duration(),this._totalTime=this._totalDuration):this._time=this._totalTime=this._duration=this._totalDuration=0,this},p.append=function(t,e){return this.add(t,this._parseTimeOrLabel(null,e,!0,t))},p.insert=p.insertMultiple=function(t,e,i,r){return this.add(t,e||0,i,r)},p.appendMultiple=function(t,e,i,r){return this.add(t,this._parseTimeOrLabel(null,e,!0,t),i,r)},p.addLabel=function(t,e){return this._labels[t]=this._parseTimeOrLabel(e),this},p.addPause=function(t,e,r,s){var a=i.delayedCall(0,f,r,s||this);return a.vars.onComplete=a.vars.onReverseComplete=e,a.data="isPause",this._hasPause=!0,this.add(a,t)},p.removeLabel=function(t){return delete this._labels[t],this},p.getLabelTime=function(t){return null!=this._labels[t]?this._labels[t]:-1},p._parseTimeOrLabel=function(e,i,r,s){var a;if(s instanceof t&&s.timeline===this)this.remove(s);else if(s&&(s instanceof Array||s.push&&h(s)))for(a=s.length;--a>-1;)s[a]instanceof t&&s[a].timeline===this&&this.remove(s[a]);if("string"==typeof i)return this._parseTimeOrLabel(i,r&&"number"==typeof e&&null==this._labels[i]?e-this.duration():0,r);if(i=i||0,"string"!=typeof e||!isNaN(e)&&null==this._labels[e])null==e&&(e=this.duration());else{if(-1===(a=e.indexOf("=")))return null==this._labels[e]?r?this._labels[e]=this.duration()+i:i:this._labels[e]+i;i=parseInt(e.charAt(a-1)+"1",10)*Number(e.substr(a+1)),e=a>1?this._parseTimeOrLabel(e.substr(0,a-1),0,r):this.duration()}return Number(e)+i},p.seek=function(t,e){return this.totalTime("number"==typeof t?t:this._parseTimeOrLabel(t),!1!==e)},p.stop=function(){return this.paused(!0)},p.gotoAndPlay=function(t,e){return this.play(t,e)},p.gotoAndStop=function(t,e){return this.pause(t,e)},p.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var r,a,n,o,h,u,m=this._dirty?this.totalDuration():this._totalDuration,d=this._time,f=this._startTime,c=this._timeScale,p=this._paused;if(t>=m)this._totalTime=this._time=m,this._reversed||this._hasPausedChild()||(a=!0,o="onComplete",h=!!this._timeline.autoRemoveChildren,0===this._duration&&(0===t||0>this._rawPrevTime||this._rawPrevTime===s)&&this._rawPrevTime!==t&&this._first&&(h=!0,this._rawPrevTime>s&&(o="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:s,t=m+1e-4;else if(1e-7>t)if(this._totalTime=this._time=0,(0!==d||0===this._duration&&this._rawPrevTime!==s&&(this._rawPrevTime>0||0>t&&this._rawPrevTime>=0))&&(o="onReverseComplete",a=this._reversed),0>t)this._active=!1,this._timeline.autoRemoveChildren&&this._reversed?(h=a=!0,o="onReverseComplete"):this._rawPrevTime>=0&&this._first&&(h=!0),this._rawPrevTime=t;else{if(this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:s,0===t&&a)for(r=this._first;r&&0===r._startTime;)r._duration||(a=!1),r=r._next;t=0,this._initted||(h=!0)}else{if(this._hasPause&&!this._forcingPlayhead&&!e){if(t>=d)for(r=this._first;r&&t>=r._startTime&&!u;)r._duration||"isPause"!==r.data||r.ratio||0===r._startTime&&0===this._rawPrevTime||(u=r),r=r._next;else for(r=this._last;r&&r._startTime>=t&&!u;)r._duration||"isPause"===r.data&&r._rawPrevTime>0&&(u=r),r=r._prev;u&&(this._time=t=u._startTime,this._totalTime=t+this._cycle*(this._totalDuration+this._repeatDelay))}this._totalTime=this._time=this._rawPrevTime=t}if(this._time!==d&&this._first||i||h||u){if(this._initted||(this._initted=!0),this._active||!this._paused&&this._time!==d&&t>0&&(this._active=!0),0===d&&this.vars.onStart&&0!==this._time&&(e||this._callback("onStart")),this._time>=d)for(r=this._first;r&&(n=r._next,!this._paused||p);)(r._active||r._startTime<=this._time&&!r._paused&&!r._gc)&&(u===r&&this.pause(),r._reversed?r.render((r._dirty?r.totalDuration():r._totalDuration)-(t-r._startTime)*r._timeScale,e,i):r.render((t-r._startTime)*r._timeScale,e,i)),r=n;else for(r=this._last;r&&(n=r._prev,!this._paused||p);){if(r._active||d>=r._startTime&&!r._paused&&!r._gc){if(u===r){for(u=r._prev;u&&u.endTime()>this._time;)u.render(u._reversed?u.totalDuration()-(t-u._startTime)*u._timeScale:(t-u._startTime)*u._timeScale,e,i),u=u._prev;u=null,this.pause()}r._reversed?r.render((r._dirty?r.totalDuration():r._totalDuration)-(t-r._startTime)*r._timeScale,e,i):r.render((t-r._startTime)*r._timeScale,e,i)}r=n}this._onUpdate&&(e||(l.length&&_(),this._callback("onUpdate"))),o&&(this._gc||(f===this._startTime||c!==this._timeScale)&&(0===this._time||m>=this.totalDuration())&&(a&&(l.length&&_(),this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[o]&&this._callback(o)))}},p._hasPausedChild=function(){for(var t=this._first;t;){if(t._paused||t instanceof r&&t._hasPausedChild())return!0;t=t._next}return!1},p.getChildren=function(t,e,r,s){s=s||-9999999999;for(var a=[],n=this._first,o=0;n;)s>n._startTime||(n instanceof i?!1!==e&&(a[o++]=n):(!1!==r&&(a[o++]=n),!1!==t&&(o=(a=a.concat(n.getChildren(!0,e,r))).length))),n=n._next;return a},p.getTweensOf=function(t,e){var r,s,a=this._gc,n=[],o=0;for(a&&this._enabled(!0,!0),s=(r=i.getTweensOf(t)).length;--s>-1;)(r[s].timeline===this||e&&this._contains(r[s]))&&(n[o++]=r[s]);return a&&this._enabled(!1,!0),n},p.recent=function(){return this._recent},p._contains=function(t){for(var e=t.timeline;e;){if(e===this)return!0;e=e.timeline}return!1},p.shiftChildren=function(t,e,i){i=i||0;for(var r,s=this._first,a=this._labels;s;)s._startTime>=i&&(s._startTime+=t),s=s._next;if(e)for(r in a)a[r]>=i&&(a[r]+=t);return this._uncache(!0)},p._kill=function(t,e){if(!t&&!e)return this._enabled(!1,!1);for(var i=e?this.getTweensOf(e):this.getChildren(!0,!0,!1),r=i.length,s=!1;--r>-1;)i[r]._kill(t,e)&&(s=!0);return s},p.clear=function(t){var e=this.getChildren(!1,!0,!0),i=e.length;for(this._time=this._totalTime=0;--i>-1;)e[i]._enabled(!1,!1);return!1!==t&&(this._labels={}),this._uncache(!0)},p.invalidate=function(){for(var e=this._first;e;)e.invalidate(),e=e._next;return t.prototype.invalidate.call(this)},p._enabled=function(t,i){if(t===this._gc)for(var r=this._first;r;)r._enabled(t,!0),r=r._next;return e.prototype._enabled.call(this,t,i)},p.totalTime=function(){this._forcingPlayhead=!0;var e=t.prototype.totalTime.apply(this,arguments);return this._forcingPlayhead=!1,e},p.duration=function(t){return arguments.length?(0!==this.duration()&&0!==t&&this.timeScale(this._duration/t),this):(this._dirty&&this.totalDuration(),this._duration)},p.totalDuration=function(t){if(!arguments.length){if(this._dirty){for(var e,i,r=0,s=this._last,a=999999999999;s;)e=s._prev,s._dirty&&s.totalDuration(),s._startTime>a&&this._sortChildren&&!s._paused?this.add(s,s._startTime-s._delay):a=s._startTime,0>s._startTime&&!s._paused&&(r-=s._startTime,this._timeline.smoothChildTiming&&(this._startTime+=s._startTime/this._timeScale),this.shiftChildren(-s._startTime,!1,-9999999999),a=0),(i=s._startTime+s._totalDuration/s._timeScale)>r&&(r=i),s=e;this._duration=this._totalDuration=r,this._dirty=!1}return this._totalDuration}return 0!==this.totalDuration()&&0!==t&&this.timeScale(this._totalDuration/t),this},p.paused=function(e){if(!e)for(var i=this._first,r=this._time;i;)i._startTime===r&&"isPause"===i.data&&(i._rawPrevTime=0),i=i._next;return t.prototype.paused.apply(this,arguments)},p.usesFrames=function(){for(var e=this._timeline;e._timeline;)e=e._timeline;return e===t._rootFramesTimeline},p.rawTime=function(){return this._paused?this._totalTime:(this._timeline.rawTime()-this._startTime)*this._timeScale},r},!0)}),_gsScope._gsDefine&&_gsScope._gsQueue.pop()(),function(t){"use strict";var e=function(){return(_gsScope.GreenSockGlobals||_gsScope).TimelineLite};"function"==typeof define&&define.amd?define(["TweenLite"],e):"undefined"!=typeof module&&module.exports&&(require("./TweenLite.js"),module.exports=e())}();