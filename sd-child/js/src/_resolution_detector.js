let mobile_menu_toggle_screen_size = 1120;
let htmlElement = document.querySelector("html");


function LoadCSS( cssURL, linkID ) {
    // 'cssURL' is the stylesheet's URL, i.e. /css/styles.css
    return new Promise( function( resolve, reject ) {
        var link = document.getElementById( linkID );
        link.rel  = 'stylesheet';
        link.href = cssURL;
        //document.head.appendChild( link );

        link.onload = function() { 
            resolve(); 
            console.log( 'CSS has loaded!' ); 
        };
    } );
}

function getResolution() {
    //htmlElement.classList.add("mystyle");
    console.log("Your screen resolution is: " + screen.width + "x" + screen.height);
    console.log("browser height: ", window.innerHeight, "px");
    console.log("browser width: ", window.innerWidth, "px");

    if( mobile_menu_toggle_screen_size < window.innerWidth ) {

        //assume this is Desktop - any bigger screens above our toggle sreen size        

        LoadCSS('/wp-content/themes/sd-child/css/nav-desktop.css', 'nav-styles').then( function() {
            console.log( 'Desktop menu css loaded.' );
        });
        LoadCSS('/wp-content/themes/sd-child/css/csscritical-dsktop.css', 'critical-css').then( function() {
            console.log( 'Desktop menu css loaded.' );
        });
    } else {

        //assume this is Mobile - any smaller screens below our toggle sreen size

        LoadCSS('/wp-content/themes/sd-child/css/nav-mobile.css','nav-styles').then( function() {
            console.log( 'Mobile menu css loaded.' );
        });
        LoadCSS('/wp-content/themes/sd-child/css/csscritical-mobile.css', 'critical-css').then( function() {
            console.log( 'Desktop menu css loaded.' );
        });
    }
}

window.addEventListener('resize', getResolution);
window.addEventListener('load', getResolution);

