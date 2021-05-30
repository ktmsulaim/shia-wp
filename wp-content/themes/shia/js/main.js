$(function () {
    $('.slider').slick({
        infinite: true,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        mobileFirst:true,
        arrows: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                  dots: true,
                  arrows: true,
                }
            }
        ]
    })

    /**
     * ---------------------------------------------------
     * Nave menu
     * ---------------------------------------------------
     */
    const mainNavTop = $('#main-nav').length ? $('#main-nav').offset().top : 0;
    const stickOnTopOffset = $('.stick-on-top').length ? $('.stick-on-top').offset().top : 0;
    const stickOnTopWidth = $('.stick-on-top').width();
    $(window).on('scroll', function(){
        stickyNav();
        stickOnTop();
    });


    function stickyNav() {
        var windowTop = $(window).scrollTop();
        const mainNav = $('#main-nav');
        const navTop = mainNav.offset().top;


        
        
        let scrolled = false;

        if (windowTop >= mainNavTop) {
            if (! mainNav.hasClass('sticky')) {
                mainNav.addClass('sticky');
            }

            scrolled = true;
        } else {
            if (mainNav.hasClass('sticky')) {
                mainNav.removeClass('sticky');
            }

            scrolled = false;
        }

        if (scrolled === true) {
            mainNav.find('.logo>img').css({width: '50px'});
        } else {
            mainNav.find('.logo>img').css({width: '80px'});
        }

    }

    stickyNav();



    function navMenu() {
        const windowWidth = $(window).width();

        
        if (windowWidth >= 992) {
            toggleNavMenu('show');

            if($('#navWrapper').hasClass('mobile-mode')) {
                $('#navWrapper').removeClass('mobile-mode');
            }
            
            $('.dropdown-items li').mouseenter(function () {
                const menuItems = $(this).find('.menu-items').eq(0);
                
                $(this).find('a').eq(0).addClass('active');
                menuItems.removeClass('fadeOutDown').addClass('fadeInUp').css({'display': 'block'})

                if(menuItems.find('.sub').length) {
                    const subMenu = $(this).find('.sub');
                    const menuPos = $(this).offset().left;

                    if((menuPos + subMenu.width()) > windowWidth || menuPos + subMenu.width() + 100 > windowWidth) {
                        subMenu.removeClass('left').addClass('right');
                    } else {
                        subMenu.removeClass('right').addClass('left');
                    }
                    
                }
            }).mouseleave(function () {
                const menuItems = $(this).find('.menu-items').eq(0);
                $(this).find('a').eq(0).removeClass('active');
                menuItems.removeClass('fadeInUp').addClass('fadeOutDown').css({'display': 'none'})
            })
 
        } else {
            mobileNav();
        }
    }

    navMenu();

    function mobileNav() {
        toggleNavMenu('hide');
        const menus = $('#main-nav .menu').html();

        // add dropdown icon if el has ul
        if(menus.length) {
            var menuList = $.parseHTML(menus)[1];
            var listItems = $(menuList).find('li');

            // set max height
            $(menuList).css({'max-height': 'calc(100vh - ' + $('#main-nav').height() + 'px)', 'overflow-y': 'scroll'})


            $.each(listItems, (index, item) => {
                var opened = false;

                if($(item).find('ul').length) {
                    if(!$(item).hasClass('hasChildren')) {
                        $(item).addClass('hasChildren');
                    }

                    // prevent main item from redirect, instead create one in below
                    var linkItem = $(item).find('a').eq(0);
                    var linkItemCopy = linkItem.clone();
                    var subMenu = $(item).find('ul').eq(0);

                    if(!subMenu.find(`a[href="${linkItem.attr('href')}"]`).length) {
                        linkItemCopy.removeClass('dropdown-heading');
                        subMenu.prepend('<li></li>');
                        subMenu.find('li').eq(0).prepend(linkItemCopy);
                        
                        linkItem.attr('href', 'javascript:void(0)');

                    }

                    $(item).find('.menu-items').each(function() {
                        const marginLeft = $(this).parent().offset().left + 30; 
                        $(this).css({marginLeft, 'border-left': '2px dotted #e1e1e1', 'width': `calc(100% - ${marginLeft}px)`});
                    });
                    
                    // subMenu.css({'padding-left': $(item).offset().left + 30 + 'px'})

                    $(item).prepend(`<div class="title"></div>`);
                    $(item).find('.title').append(linkItem).append(`<span class="mdi mdi-chevron-down"></span>`);;

                    $(item).on('click', function(e){
                        e.stopImmediatePropagation();

                        // close other opened menu
                        if(!$(this).parent().hasClass('menu-items')) {
                            $(menuList).find('li.open').each(function(i, el){
                                $(el).removeClass('open').find('ul').slideUp();

                                if(!$(el).hasClass('open')) {
                                    $(el).find('.mdi').eq(0).removeClass('mdi-chevron-up').addClass('mdi-chevron-down');
                                }
                            });
                            
                        }
                        
                        if(!$(this).hasClass('open') && !opened) {
                            opened = true;

                            $(this).addClass('open');
                            $(this).find('ul.menu-items').eq(0).slideDown();
                            $(this).find('.mdi').eq(0).removeClass('mdi-chevron-down').addClass('mdi-chevron-up');
                        } else {
                            opened = false;
                            
                            $(this).removeClass('open');
                            $(this).find('ul.menu-items').eq(0).slideUp();
                            $(this).find('.mdi').eq(0).removeClass('mdi-chevron-up').addClass('mdi-chevron-down');
                        }
                        
                    })
                }
            })
        }

        // insert menu bar
        if(!$('#navWrapper').hasClass('mobile-mode')) {
            $('#navWrapper').addClass('mobile-mode');
        }

        if(!$('#navWrapper .mobile-nav-wrapper').length) {
            $('#navWrapper #search-mobile-nav').append(`<div class="mobile-nav-wrapper">
                <span id="mobile-menu-toggle" class="mdi mdi-menu"></span>
            </div>`);

            if(!$('#navWrapper .mobile-nav-wrapper .dropdown-items').length) {
                $('#navWrapper .mobile-nav-wrapper').append(menuList);
            }

            if(!$('#search-mobile-nav').hasClass('d-flex')) {
                $('#search-mobile-nav').addClass('d-flex');
            }

            var mobileMenu = $('#navWrapper .mobile-nav-wrapper .dropdown-items');
            mobileMenu.hide();
        }

        // show on toggle
        $(document).on('click', '#mobile-menu-toggle', function(e) {
            e.stopImmediatePropagation();
            const dropdownItems = $('#navWrapper .mobile-nav-wrapper .dropdown-items');

            if(!dropdownItems.hasClass('open')) {
                dropdownItems.addClass('open');
                dropdownItems.stop().slideDown();

            } else {
                dropdownItems.removeClass('open');
                dropdownItems.stop().slideUp();
            }
            
            $(this).toggleClass('mdi-close mdi-menu');
            
        });

        
       
    }

    function toggleNavMenu(mode = 'show') {
        var mainNav = $('#main-nav .menu');
        var mobiNav = $('#main-nav .mobile-nav-wrapper');
        
        if(mode == 'show') {
            mainNav.show()

            if(mobiNav.length) {
                mobiNav.hide();
            }
        } else if(mode == 'hide') {
            mainNav.hide();

            if(mobiNav.length) {
                mobiNav.show();
            }
        }
    }

    $(window).resize(navMenu);

    /**
     * ---------------------------------------------------
     * Notification ticker
     * ---------------------------------------------------
     */

    $('.notification-wrapper .notifications').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 4000,
        height: 'auto',
        visible: 4,
        mousePause: true,
        controls: {
            up: '.next',
            down: '.prev',
            toggle: '',
            playText: 'Play',
            stopText: 'Stop'
        },
        callbacks: {
            before: false,
            after: false
        }
    });

    /**
     * ---------------------------------------------------
     * News slider HOME
     * ---------------------------------------------------
     */

     $('#newsSlider').slick({
        dots: true,
        infinite: true,
        speed: 600,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 786,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
    })
    
    /**
     * ---------------------------------------------------
     * News slider HOME
     * ---------------------------------------------------
     */

     $('#studentUnionNews').slick({
        dots: true,
        infinite: true,
        speed: 600,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 568,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    })
    
    /**
     * ---------------------------------------------------
     * Artwork culture slider HOME
     * ---------------------------------------------------
     */

     $('#artworkCultureSlider').slick({
        dots: false,
        infinite: true,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 4000,
    })

    /**
     * ---------------------------------------------------
     * Scroll to smooth
     * ---------------------------------------------------
     */
     function scrollTo(el) {
        if(el && $(el).length) {
            $('html, body').animate({
                scrollTop: $(el).offset().top - 100
            }, 500, 'easeInSine')
        }
    }
    
    $('.scrollTo').click(function(e){
        e.preventDefault();

        const target = $(this).data('target');

        if(target && $(target).length) {
            scrollTo(target)
        } else if($(this).attr('href')) {
            window.location = $(this).attr('href');
        }

    })

    function resetScroll() {
        const hash = window.location.hash;
        if(hash && $(hash).length) {
            scrollTo(hash);
        }
    }

    resetScroll();

     /**
     * ---------------------------------------------------
     * Sticky when on top
     * ---------------------------------------------------
     */
    
     function stickOnTop() {
         if($(window).width() >= 992) {
             const windowTop = $(window).scrollTop();
             const navHeight = $('#main-nav').height();
             const el = $('.stick-on-top');

             if(windowTop + navHeight >= stickOnTopOffset) {
                if(!el.hasClass('sticky')) {
                    el.addClass('sticky');
                }
                el.css({'top': navHeight, 'width': stickOnTopWidth});
             } else {
                if(el.hasClass('sticky')) {
                    el.removeClass('sticky');
                }
             }
         } 
     }

     /**
      * Nav tabs
      */
      $('#search-category-tab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
      })


      /**
       * --------------------------------------------------------
       *  Share button
       * --------------------------------------------------------
       */

      function share() {
          const shareData = $('.share-button');
          if(navigator.canShare) {
              if(shareData.length) {
                  const title = shareData.data('title');
                  const url = shareData.data('url');
                  const text = shareData.data('text');

                  shareData.html(`<button id="shareTrigger" class="button button-1"><span class="mdi mdi-share"></span>Share</button>`);

                  shareData.on('click', '#shareTrigger', function() {
                      navigator.share({
                          title,
                          url,
                          text
                      })
                      .then(() => console.log('Share succesfull!'))
                      .catch(e => console.log('Unable to share!'));
                  })
              }
          }
      }

      share();

       /**
       * --------------------------------------------------------
       *  Go to URL
       * --------------------------------------------------------
       */
      function goToURL(e, url = null) {
          const target = $(this).data('target');
        if(url && url !== null) {
            window.location.href = url;
        } else if(target) {
            window.location.href = target;
        }
      }

      $('.go-to-url').click(goToURL);
})