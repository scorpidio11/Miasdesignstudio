/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
CUSTOM JS
/////////////////////////////

1.  navbar functionality
2.  lightbox init
3.  portfolio filter
4.  scroll to
5.  google map
6.  close mobile menu ontap/onclick
7.  mobile menu icon
8.  enable swipe on mobile for testimonials
9.  page loader
10. animations
*/

/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
1. NAVBAR FUNCTIONALITY
/////////////////////////////
*/


$(document).on('ready', function() {

    /**
     * This object controls the nav bar. Implement the add and remove
     * action over the elements of the nav bar that we want to change.
     *
     * @type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
     */
    var myNavBar = {

        flagAdd: true,

        elements: [],

        init: function(elements) {
            this.elements = elements;
        },

        add: function() {
            if (this.flagAdd) {
                for (var i = 0; i < this.elements.length; i++) {
                    document.getElementById(this.elements[i]).className += " fixed-theme";
                }
                this.flagAdd = false;
            }
        },

        remove: function() {
            for (var i = 0; i < this.elements.length; i++) {
                document.getElementById(this.elements[i]).className =
                    document.getElementById(this.elements[i]).className.replace(/(?:^|\s)fixed-theme(?!\S)/g, '');
            }
            this.flagAdd = true;
        }

    };

    /**
     * Init the object. Pass the object the array of elements
     * that we want to change when the scroll goes down
     */
    myNavBar.init([
        "header",
        "header-container",
        "brand"
    ]);

    /**
     * Function that manage the direction
     * of the scroll
     */

    function offSetManager() {

        var yOffset = 0;
        var currYOffSet = window.pageYOffset;

        if (yOffset < currYOffSet) {
            myNavBar.add();
        } else if (currYOffSet == yOffset) {
            myNavBar.remove();
        }

    }

    /**
     * bind to the document scroll detection
     */

    window.onscroll = function(e) {
        offSetManager();
    }

    /**
     * We have to do a first detectation of offset because the page
     * could be load with scroll down set.
     */

    offSetManager();
});


/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
2. LIGHTBOX INIT
/////////////////////////////
*/


$('.lightbox-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-fade',
    fixedContentPos: true,
    closeBtnInside: true,
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
    }
});



/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
3. PORTFOLIO FILTER
/////////////////////////////
*/


$(function() {
    var selectedClass = "";
    $(".fil-cat").on('click', function() {
        selectedClass = $(this).attr("data-rel");
        $(".gallery").fadeTo(500, 0.5);
        $(".gallery li").not("." + selectedClass).fadeOut().removeClass('scale-anm');
        setTimeout(function() {
            $("." + selectedClass).fadeIn().addClass('scale-anm');
            $(".gallery").fadeTo(200, 1);
        }, 00);

    });
});

$('.portfolio-filter button').on('click', function() {
    $('.portfolio-filter button').removeClass('selected');
    $(this).addClass('selected');
});


/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
4. SCROLL-TO
/////////////////////////////
*/


$('a[href*="#"]:not([href="#"])').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});


/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
5. GOOGLE MAP
/////////////////////////////
*/


jQuery(document).on('ready', function($){
    //set your google maps parameters
    var $latitude = 40.770455,
        $longitude = -73.966449,
        $map_zoom = 15;

    //google map custom marker icon - .png fallback for IE11
    var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
    var $marker_url = ( is_internetExplorer11 ) ? 'images/map-marker.png' : 'images/map-marker.png';
        
    //define the basic color of your map, plus a value for saturation and brightness
    var $main_color = '#2d313f',
        $saturation= -20,
        $brightness= 5;

    //we define here the style of the map
    var style= [
    {
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "stylers": [
            {
                "color": "#131314"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "color": "#131313"
            },
            {
                "lightness": 7
            }
        ]
    },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "lightness": 25
            }
        ]
    }
];
        
    //set google map options
    var map_options = {
        center: new google.maps.LatLng($latitude, $longitude),
        zoom: $map_zoom,
        panControl: false,
        zoomControl: false,
        mapTypeControl: false,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        styles: style,
    }
    //inizialize the map
    var map = new google.maps.Map(document.getElementById('google-container'), map_options);
    //add a custom marker to the map                
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng($latitude, $longitude),
        map: map,
        visible: true,
        icon: $marker_url,
    });

    //add custom buttons for the zoom-in/zoom-out on the map
    function CustomZoomControl(controlDiv, map) {
        //grap the zoom elements from the DOM and insert them in the map 
        var controlUIzoomIn= document.getElementById('cd-zoom-in'),
            controlUIzoomOut= document.getElementById('cd-zoom-out');
        controlDiv.appendChild(controlUIzoomIn);
        controlDiv.appendChild(controlUIzoomOut);

        // Setup the click event listeners and zoom-in or out according to the clicked element
        google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
            map.setZoom(map.getZoom()+1)
        });
        google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
            map.setZoom(map.getZoom()-1)
        });
    }

    var zoomControlDiv = document.createElement('div');
    var zoomControl = new CustomZoomControl(zoomControlDiv, map);

    //insert the zoom div on the top left of the map
    map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
});


/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
6. CLOSE MOBILE MENU ONTAP/ONCLICK
/////////////////////////////
*/

$(function() {
    $('.nav a').on('click', function(){ 
        if($('.navbar-toggle').css('display') !='none'){
            $(".navbar-toggle").trigger( "click" );
        }
    });
});

/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
7. MOBILE MENU ICON
/////////////////////////////
*/

$(document).on('ready', function () {
              $(".navbar-toggle").on("click", function () {
                    $(this).toggleClass("active");
              });
        });


/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
8. ENABLE SWIPE ON MOBILE FOR TESTIMONIALS
/////////////////////////////
*/

$('.carousel').bcSwipe({ threshold: 50 });

/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
9. PAGE LOADER
/////////////////////////////
*/

jQuery(window).on('load', function() {
    jQuery(".loader-container").delay(1500).fadeOut(600);
    jQuery("#intro-loader").delay(2000).fadeOut(600);
});

/*
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
10. AOS ANIMATIONS
/////////////////////////////
*/

AOS.init({
  duration: 1000,
})
