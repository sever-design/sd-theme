/**
 * Create YouTube players from <div> placeholders with IFrame API.
 * Each <div> must have id, width, height and data-video-id attributes to init the player.
 * Start playing the video when iframe is scrolled into view.
 * Pause playing when it is scrolled out of view.
 *
 * Depends on https://github.com/protonet/jquery.inview
 */
(function ($) {
    $.fn.inViewAutoplay = function (options) {
        return this.filter('[id][width][height][data-video-id]').each(function () {
            new YT.Player(this.getAttribute('id'), {
                width: this.getAttribute('width'),
                height: this.getAttribute('height'),
                videoId: this.getAttribute('data-video-id'),
                playerVars: options,
                events: {
                    'onReady': onPlayerReady,
		   'onStateChange': onPlayerRewind
                }
            });

            function onPlayerReady(event) {
                var player = event.target;
		event.target.mute();
                $(player.getIframe()).bind('inview', {player: player}, onPlayerInView);

                if (options.quality) {
                    player.setPlaybackQuality(options.quality);
                }
            }

            function onPlayerRewind(event) {
		var player = event.target;
		if(player.getPlayerState() == 0){
	                player.playVideo();
		}
            }

            function onPlayerInView(event, visible) {
                if (visible == true) {
                    event.data.player.playVideo();
                } else {
                    event.data.player.pauseVideo();
                }
            }
        });
    };

})(window.jQuery || window.Zepto);
