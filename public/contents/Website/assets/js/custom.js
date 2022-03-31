$(function(){
        /*--------------------------
	 Global Variable
	---------------------------- */
    var patsala = $(window);
    var page = $('html, body');

          /*--------------------------
    scroll to top active
    ---------------------------- */
    $(".scrolltop").on('click', function(){
        $("html,body").animate({
            scrollTop:0
        }, 1000)
    });

    /*--------------------------
     Menu Scroll Fix Function
    ---------------------------- */
    patsala.on('scroll',function(){
        if (patsala.scrollTop() > 700) {
             $('.menu_part').addClass('animated slideInDown fix')
          } else {
              $('.menu_part').removeClass('animated slideInDown fix ')
          }
    })

    patsala.on('scroll',function(){
        if (patsala.scrollTop() > 700) {
             $('.menu_part').addClass('none_menu')
          } else {
              $('.menu_part').removeClass('none_menu')
          }
    });

     $('.banner_slide').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.banner_slide2').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.banner_out_slider').owlCarousel({
        loop:true,
        margin:0,
        navText:['<i class="fas fa-angle-left arrow_lft_bn1"></i>','<i class="fas fa-angle-right arrow_rt_bn1"></i>'],
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.banner_slide_3').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
         navText:['<i class="fas fa-angle-left arrow_lft_bn"></i>','<i class="fas fa-angle-right arrow_rt_bn"></i>'],
        smartSpeed:1000,
         stagePadding: 350,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

       $('.blog_slide').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
             992:{
                items:4
            },
            1000:{
                items:4
            }
        }
    });

    $('.slide_big_awards').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        navText:['<i class="fas fa-angle-left arrow_lft_ad"></i>','<i class="fas fa-angle-right arrow_rt_ad"></i>'],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });



     $('.releted_product_slide').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:2
            },
                992:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });

    $('.slide_case').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:2
            },
                992:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });

     $('.cata_gory_slide').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        navText:['<i class="fas fa-angle-left arrow_lft_bn11"></i>','<i class="fas fa-angle-right arrow_rt_bn11"></i>'],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
                992:{
                items:4
            },
            1000:{
                items:4
            }
        }
    });

    $('.slide_wining_awards').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:2
            },
                992:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });

     $('.fundraise_aravi_prev_slide').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:2
            },
                992:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });
    $('.client_feed_slide').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:2
            },
                992:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });

     $('.parthner_slide').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    $('.releted_product_slide_2').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        navText:['<i class="fas fa-angle-left arrow_lft_lv"></i>','<i class="fas fa-angle-right arrow_rt_lv"></i>'],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1000:{
                items:4
            }
        }
    });

    $('.releted_product_slide_3').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        navText:['<i class="fas fa-angle-left arrow_lft_lv1"></i>','<i class="fas fa-angle-right arrow_rt_lv1"></i>'],
        smartSpeed:1000,
        autoplay:true,
        mouseDrag:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1000:{
                items:4
            }
        }
    });



     $('.venobox').venobox();

    /* zoom js paluging js */
    var urls = [
        'images/zoom_rice1.jpg',
        'images/rice_item2.jpg',
        'images/rice_item3.jpg',
        'images/rice_item4.jpg',
        'images/rice_item5.jpg',
    ];
    var options = {
        //thumbLeft:true,
        //thumbRight:true,
        //thumbHide:true,
        //width:300,
        //height:500,
    };
    $('#el').zoomy(urls,options);

    /*  this is for input group */
    $(".quantity_form_input input[type='number']").InputSpinner();


    $('.counter').counterUp({
        delay: 10,
        time: 8000,
    });

})
