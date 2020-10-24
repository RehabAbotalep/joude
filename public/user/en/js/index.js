// Sticky Header


$(window).load(function() {
    $(".preloader").fadeOut(150);
});

$(function() {
    $('.in_code_form input').keyup(function(e) {
        if ($(this).val().length == $(this).attr('maxlength'))
            $(this).next(':input').focus()
    })
});



$(function() {


    $(".remember").click(function() {
        $(this).parent(".input_job").parent(".ininput_newblog").parent("form").find(".in_form_blog_mail").fadeToggle();
        return false;
    });

    $('.top').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1200);
        return false;
    });

    //popuplogout
    $('.logout').click(function() {
        $('.pops_detail1').addClass('shows_detail_pop');
        $('.md-overlay').addClass('shows_overlay');
        return false;
    });
    $('.md-overlay').click(function() {
        $('.md-overlay').removeClass('shows_overlay');
        $('.pops_detail').removeClass('shows_detail_pop');
        return false;
    });
    //popuplogout

});

$(document).ready(function() {

    $(document).scroll(function() {

        var top = $(document).scrollTop();

        if (top > 300) {
            $(".top").addClass("top_show");
            $(".head-bar").addClass("head-sticky");
        } else if (top < 300) {
            $(".top").removeClass("top_show");
            $(".head-bar").removeClass("head-sticky");
        }


    });
});


$(document).ready(function() {
    var owl = $('.carousel_slider');
    owl.owlCarousel({
        rtl: false,
        margin: 0,
        items: 1,
        nav: true,
        loop: true,
        lazyLoad: true,
        autoplay: true,
        dots: false,
        autoplayTimeout: 5000,
        smartSpeed: 1100,
        autoplayHoverPause: true,
        //mouseDrag: false,
        //touchDrag: false,
    })
})

$(document).ready(function() {
    var owl = $('.carousel_persons');
    owl.owlCarousel({
        rtl: false,
        margin: 20,
        nav: false,
        loop: true,
        lazyLoad: true,
        autoplay: true,
        dots: true,
        autoplayTimeout: 5000,
        smartSpeed: 1100,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            570: {
                items: 2
            },
            1000: {
                items: 3
            },
            2000: {
                items: 3
            }
        }
    })
})
$(document).ready(function() {
    var owl = $('.pricing-carousel');
    owl.owlCarousel({
        rtl: false,
        margin: 20,
        nav: false,
        loop: true,
        lazyLoad: true,
        autoplay: true,
        dots: true,
        autoplayTimeout: 5000,
        smartSpeed: 1100,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            550: {
                items: 2
            },
            1000: {
                items: 3
            },
            2000: {
                items: 3
            }
        }
    })
})
$(document).ready(function() {
    var owl = $('.owl-clients');
    owl.owlCarousel({
        margin: 10,
        nav: false,
        loop: true,
        lazyLoad: false,
        autoplay: true,
        dots: true,
        autoplayTimeout: 5000,
        smartSpeed: 1100,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 2
            },
            550: {
                items: 2
            },
            720: {
                items: 3
            },
            992: {
                items: 4
            },
            1170: {
                items: 4
            },
        }
    })
});



var list = $("nav>ul li > div > a"); //Liste de tout les liens
//Gestion du clique sur le boutton des trois bars afin d'afficher le menu dans les support avec un width <769
$("nav > a").click(function(event) {
    $("nav>ul").slideToggle();
    return false;
});

//Gestion des cliques sur les liens avec élimination du comportement par défaut du a dans le cas où il existe un sous menu
list.click(function(event) {
    var submenu = this.parentNode.getElementsByTagName("ul").item(0);
    //S'il existe un sous menu sinon c'est un lien terminal
    if (submenu != null) {
        event.preventDefault();
        $(submenu).slideToggle();
    }
});
//Gestion du resize de la fenetre pour eliminer le style ajouté par la méthode .slideToggle()

$(window).resize(function() {
    if ($(window).width() > 1150) {
        $("nav > ul, nav > ul  li  ul").removeAttr("style");
        $("nav").addClass("style0");
    }
});

// if ($(window).width() < 1150) {
//     $("nav ul li a").click(function(event) {
//         $("nav>ul").slideToggle();
//         return false;
//     });


// }


//var sectionTop = $('.e7saia_counter').offset().top - $('.e7saia_counter').height();

//count on scroll
$(document).ready(function() {
    $(window).scroll(function() {
        var sectionTop = $('.e7saia_counter').offset().top;
        if ($(this).scrollTop() >= sectionTop) {
            counterStart()
        }
    })
})

//counter
function counterStart() {
    $('.counter').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({ countNum: $this.text() }).animate({
            countNum: countTo
        }, {
            duration: 4000,
            easing: 'linear',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
                //alert('finished');
            }

        });
    });
}

$(function() {
    $('html, body').animate({ scrollTop: $('.slider_block_pages').offset().top }, 'slow');
});