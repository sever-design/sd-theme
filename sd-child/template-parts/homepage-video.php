<?php
$videoFileName 		= 'intro-video.mp4';
$videoFileNameWebm	= 'intro-video.webm';
$fileVideo = get_theme_file_path( '/videos/'.$videoFileName );
$fileVideoWebm = get_theme_file_path( '/videos/'.$videoFileNameWebm );

$fullScreen = true;
?>
<div id="homevideo">
	<div class="video <?php if($fullScreen) { echo 'video__full_screen';} else { echo 'video__regular'; } ?>">
		<div class="video__wrapper">
			<?php if ( file_exists( $fileVideo ) ) { ?>
			<video id="video" class="lazy" preload="auto" autoplay="" loop="" muted="" playsinline="" poster=""> <?php // for poster echo get_stylesheet_directory_uri(); /images/do-it-white-logo.svg; ?>
				<source data-src="<?php echo get_stylesheet_directory_uri();?>/videos/<?php echo $videoFileName; ?>" type="video/mp4" controls="false">
				<source data-src="<?php echo get_stylesheet_directory_uri();?>/videos/<?php echo $videoFileNameWebm; ?>" type="video/webm" controls="false">
				<?php /* <source src="<?php echo get_stylesheet_directory_uri();?>/videos/intro-video.webm" type="video/webm" controls="false"> */ ?>
				Your browser does not support the video tag.
			</video>
			<?php } else { ?>
				<span class="no-logo-found">Video file "/videos/<?php echo $videoFileName; ?>" doesnt exist</span>
				<span class="no-logo-found">Video file WebM "/videos/<?php echo $videoFileNameWebm; ?>" doesnt exist</span>
			<?php } ?>
			<div class="content">
				<?php echo do_shortcode('[do_widget id=custom_html-2 title=false wrap=div]'); ?>				
			</div>
		</div>
	</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var videos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var videoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          //video.poster = video.dataset.poster;
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          videoObserver.unobserve(video.target);
        }
      });
    });

    videos.forEach(function(video) {
      videoObserver.observe(video);
    });
  }
});

/*  to test
 **** This combined solution ensures your videos load only when necessary, saving bandwidth and improving page speed, while dynamically playing them when visible in the viewport.

How It Works
Lazy Loading:

Videos are initially observed using lazyLoadObserver.
When a video becomes visible, its data-src attributes are assigned to src for <source> tags.
The video is loaded using video.load() and the lazy class is removed.
Auto-Playing:

Once a video is loaded, it’s observed by the autoPlayObserver.
The video starts playing when it becomes visible and pauses when it leaves the viewport.
Dual Observers:

The lazy load observer handles efficient resource loading.
The auto-play observer ensures videos play dynamically based on visibility.
Usage
Add class="lazy" to your <video> tags.
Use data-src attributes for <source> elements in your videos:

document.addEventListener("DOMContentLoaded", function () {
    var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

    if ("IntersectionObserver" in window) {
        // Observer for lazy loading video sources
        var lazyLoadObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var video = entry.target;

                    // Assign data-src to src for all <source> elements
                    for (var source of video.children) {
                        if (source.tagName === "SOURCE") {
                            source.src = source.dataset.src;
                        }
                    }

                    // Load and remove lazy class
                    video.load();
                    video.classList.remove("lazy");
                    lazyLoadObserver.unobserve(video);

                    // Add to the auto-play observer once loaded
                    autoPlayObserver.observe(video);
                }
            });
        });

        // Observer for auto-playing videos once lazy loaded
        var autoPlayObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.play();
                } else {
                    entry.target.pause();
                }
            });
        });

        // Observe all lazy videos for lazy loading
        lazyVideos.forEach(function (video) {
            lazyLoadObserver.observe(video);
        });
    }
});
*/
</script>