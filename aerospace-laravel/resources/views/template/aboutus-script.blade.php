<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Tj Aerospace Inc.",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+1 (714) 891-3564",
        "contactType": "customer service",
        "availableLanguage": "English"
      }
    }
 </script>
 <script>
    jQuery(function($){
                            try {
            $('a.wpdm-lightbox').nivoLightbox();
        } catch (e) {
    
        }
    });
 </script>
 <div id="fb-root"></div>
 <!-- Facebook Pixel Code -->
 <noscript>
    <img height="1" width="1" style="display:none" alt="fbpx"
       src="https://www.facebook.com/tr?id=2605899786107015&ev=PageView&noscript=1"/>
 </noscript>
 <!-- DO NOT MODIFY -->
 <!-- End Facebook Pixel Code -->
 <script type="text/javascript">
    var c = document.body.className;
    c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
    document.body.className = c;
 </script>
 <!-- MonsterInsights Scroll Tracking -->
 <script type="text/javascript">
    if ( typeof(jQuery) !== 'undefined' ) {
        jQuery( document ).ready(function(){
            function monsterinsights_scroll_tracking_load() {
                if ( typeof(__gaTracker) !== 'undefined' && __gaTracker && __gaTracker.hasOwnProperty( "loaded" ) && __gaTracker.loaded == true ) {
                    (function(factory) {
                        if (typeof define === 'function' && define.amd) {
                            /* AMD */
                            define(['jquery'], factory);
                        } else if (typeof module === 'object' && module.exports) {
                            /* CommonJS */
                            module.exports = factory(require('jquery'));
                        } else {
                            /* Browser globals */
                            factory(jQuery);
                        }
                    }(function($) {
    
                        /* Scroll Depth */
                        "use strict";
                        var defaults = {
                            percentage: true
                        };
    
                        var $window = $(window),
                            cache = [],
                            scrollEventBound = false,
                            lastPixelDepth = 0;
    
                        /*
                         * Plugin
                         */
    
                        $.scrollDepth = function(options) {
    
                            var startTime = +new Date();
    
                            options = $.extend({}, defaults, options);
    
                            /*
                             * Functions
                             */
    
                            function sendEvent(action, label, scrollDistance, timing) {
    
                                var fieldsArray = {
                                    hitType       : 'event',
                                    eventCategory : 'Scroll Depth',
                                    eventAction   : action,
                                    eventLabel    : label,
                                    eventValue    : 1,
                                    nonInteraction: 1
                                };
    
                                MonsterInsightsObject.sendEvent( fieldsArray );
                                if (arguments.length > 3) {
                                    fieldsArray = {
                                        hitType        : 'timing',
                                        timingCategory : 'Scroll Depth',
                                        timingVar      : action,
                                        timingValue    : timing,
                                        timingLabel    : label,
                                        nonInteraction: 1
                                    };
                                    MonsterInsightsObject.sendEvent( fieldsArray );
                                }
                            }
    
                            function calculateMarks(docHeight) {
                                return {
                                    '25%' : parseInt(docHeight * 0.25, 10),
                                    '50%' : parseInt(docHeight * 0.50, 10),
                                    '75%' : parseInt(docHeight * 0.75, 10),
                                    /* Cushion to trigger 100% event in iOS */
                                    '100%': docHeight - 5
                                };
                            }
    
                            function checkMarks(marks, scrollDistance, timing) {
                                /* Check each active mark */
                                $.each(marks, function(key, val) {
                                    if ( $.inArray(key, cache) === -1 && scrollDistance >= val ) {
                                        sendEvent('Percentage', key, scrollDistance, timing);
                                        cache.push(key);
                                    }
                                });
                            }
    
                            function rounded(scrollDistance) {
                                /* Returns String */
                                return (Math.floor(scrollDistance/250) * 250).toString();
                            }
    
                            function init() {
                                bindScrollDepth();
                            }
    
                            /*
                             * Public Methods
                             */
    
                            /* Reset Scroll Depth with the originally initialized options */
                            $.scrollDepth.reset = function() {
                                cache = [];
                                lastPixelDepth = 0;
                                $window.off('scroll.scrollDepth');
                                bindScrollDepth();
                            };
    
                            /* Add DOM elements to be tracked */
                            $.scrollDepth.addElements = function(elems) {
    
                                if (typeof elems == "undefined" || !$.isArray(elems)) {
                                    return;
                                }
    
                                $.merge(options.elements, elems);
    
                                /* If scroll event has been unbound from window, rebind */
                                if (!scrollEventBound) {
                                    bindScrollDepth();
                                }
    
                            };
    
                            /* Remove DOM elements currently tracked */
                            $.scrollDepth.removeElements = function(elems) {
    
                                if (typeof elems == "undefined" || !$.isArray(elems)) {
                                    return;
                                }
    
                                $.each(elems, function(index, elem) {
    
                                    var inElementsArray = $.inArray(elem, options.elements);
                                    var inCacheArray = $.inArray(elem, cache);
    
                                    if (inElementsArray != -1) {
                                        options.elements.splice(inElementsArray, 1);
                                    }
    
                                    if (inCacheArray != -1) {
                                        cache.splice(inCacheArray, 1);
                                    }
    
                                });
    
                            };
    
                            /*
                             * Throttle function borrowed from:
                             * Underscore.js 1.5.2
                             * http://underscorejs.org
                             * (c) 2009-2013 Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
                             * Underscore may be freely distributed under the MIT license.
                             */
    
                            function throttle(func, wait) {
                                var context, args, result;
                                var timeout = null;
                                var previous = 0;
                                var later = function() {
                                    previous = new Date;
                                    timeout = null;
                                    result = func.apply(context, args);
                                };
                                return function() {
                                    var now = new Date;
                                    if (!previous) previous = now;
                                    var remaining = wait - (now - previous);
                                    context = this;
                                    args = arguments;
                                    if (remaining <= 0) {
                                        clearTimeout(timeout);
                                        timeout = null;
                                        previous = now;
                                        result = func.apply(context, args);
                                    } else if (!timeout) {
                                        timeout = setTimeout(later, remaining);
                                    }
                                    return result;
                                };
                            }
    
                            /*
                             * Scroll Event
                             */
    
                            function bindScrollDepth() {
    
                                scrollEventBound = true;
    
                                $window.on('scroll.scrollDepth', throttle(function() {
                                    /*
                                     * We calculate document and window height on each scroll event to
                                     * account for dynamic DOM changes.
                                     */
    
                                    var docHeight = $(document).height(),
                                        winHeight = window.innerHeight ? window.innerHeight : $window.height(),
                                        scrollDistance = $window.scrollTop() + winHeight,
    
                                        /* Recalculate percentage marks */
                                        marks = calculateMarks(docHeight),
    
                                        /* Timing */
                                        timing = +new Date - startTime;
    
                                    checkMarks(marks, scrollDistance, timing);
                                }, 500));
    
                            }
    
                            init();
                        };
    
                        /* UMD export */
                        return $.scrollDepth;
    
                    }));
    
                    jQuery.scrollDepth();
                } else {
                    setTimeout(monsterinsights_scroll_tracking_load, 200);
                }
            }
            monsterinsights_scroll_tracking_load();
        });
    }
 </script>
 <!-- End MonsterInsights Scroll Tracking -->
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/block-gallery/dist/js/vendors/flickity.min.js'></script>
 <script type='text/javascript'>
    /* <![CDATA[ */
    var wpcf7 = {"apiSettings":{"root":"https:\/\/tjaerospace.com\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"cached":"1"};
    /* ]]> */
 </script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/contact-form-7/includes/js/scripts.js'></script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/drag-and-drop-multiple-file-upload-contact-form-7/assets/js/codedropz-uploader-min.js'></script>
 <script type='text/javascript'>
    /* <![CDATA[ */
    var dnd_cf7_uploader = {"ajax_url":"https:\/\/tjaerospace.com\/wp-admin\/admin-ajax.php","drag_n_drop_upload":{"text":"Drag & Drop Files Here","or_separator":"or","browse":"Browse Files","server_max_error":"The uploaded file exceeds the maximum upload size of your server.","large_file":"Uploaded file is too large","inavalid_type":"Uploaded file is not allowed for file type","max_file_limit":"Note : Some of the files are not uploaded ( Only %count% files allowed )"}};
    /* ]]> */
 </script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/drag-and-drop-multiple-file-upload-contact-form-7/assets/js/dnd-upload-cf7.js'></script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-includes/js/jquery/jquery.form.min.js'></script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js'></script>
 <script type='text/javascript'>
    /* <![CDATA[ */
    var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/tjaerospace.com\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
    /* ]]> */
 </script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js'></script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js'></script>
 <script type='text/javascript'>
    /* <![CDATA[ */
    var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
    /* ]]> */
 </script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js'></script>
 <script type='text/javascript'>
    /* <![CDATA[ */
    var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_62b5c42e2b519aa9a76b2b391755afb6","fragment_name":"wc_fragments_62b5c42e2b519aa9a76b2b391755afb6","request_timeout":"5000"};
    /* ]]> */
 </script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js'></script>
 <script type='text/javascript'>
    /* <![CDATA[ */
    var mailchimp_public_data = {"site_url":"https:\/\/tjaerospace.com","ajax_url":"https:\/\/tjaerospace.com\/wp-admin\/admin-ajax.php","queue_url":"https:\/\/tjaerospace.com\/wp-json\/mailchimp-for-woocommerce\/v1\/queue\/work","queue_should_fire":""};
    /* ]]> */
 </script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/plugins/mailchimp-for-woocommerce/public/js/mailchimp-woocommerce-public.min.js'></script>
 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
 <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery-all.min.js'></script>
 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js'></script>
 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js'></script>
 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js'></script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-content/themes/tjaerospace/assets/js/script.js'></script>
 <script type='text/javascript' src='https://tjaerospace.com/wp-includes/js/wp-embed.min.js'></script>