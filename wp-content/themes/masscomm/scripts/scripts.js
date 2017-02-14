$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip({html: true}); 

	if ($(window).width() >= 1000) {
		$('header#main_header .bottom_header #primary_navigation ul.primary-menu').css('display', 'block');
	}
	else {
		$('header#main_header .bottom_header #primary_navigation ul.primary-menu').css('display', 'none');
	}

	$(window).resize(function () {
		var win = $(this);

		$('.c-hamburger').removeClass('is-active');
		$('header#main_header .bottom_header #primary_navigation').removeClass('menu-on');
		$('header#main_header .bottom_header #primary_navigation ul.primary-menu').removeClass('menu-toggle-on');
		
		if (win.width() >= 1000){
			$('header#main_header .bottom_header #primary_navigation ul.primary-menu').css('display', 'block');
		}else{
			$('header#main_header .bottom_header #primary_navigation ul.primary-menu').css('display', 'none');
		}
	});
	
	$(window).scroll(function(){
		var offset = 800,
		//footerHeight = $('footer').height() + 80,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1000;
		//grab the "back to top" link
		$back_to_top = $('.back_to_top-button');
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('button_visible') : $back_to_top.removeClass('button_visible fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('fade-out');
		}
	});

	$('a.smooth-scroll[href^="#"]').on('click',function (e) {
		e.preventDefault();
		var target = this.hash;
		var $target = $(target);
		if(target == '#accordion') {
		// do nothing
		} else if(target.length == 0) {
			$('html,body').animate({
			scrollTop: 0
			}, 1200);
		} else {
			$('html, body').stop().animate({
			'scrollTop': $target.offset().top - 150
			}, 1200, 'swing');
		}
	});
  
	$(function() {
		$('.lazy-image').lazy();
	});

	$(function () {
		var resizeTimer;
		updateDivHeight();
		setTimeout(updateDivHeight, 1250);
		$(window).on('resize', function(e) {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function() {updateDivHeight();}, 250);
		});
		
		function updateDivHeight() {
			$("footer#main_footer #top_footer .top-content .top-menu h4").css('height', 'auto');
			
			var maxHeight = 0;

			$("footer#main_footer #top_footer .top-content .top-menu h4").each(function(){
			   if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
			});

			$("footer#main_footer #top_footer .top-content .top-menu h4").height(maxHeight);
			
			
			$("footer#main_footer #top_footer .events .event-slider .owl-item").css('height', 'auto');
			$("footer#main_footer #top_footer .events .info-slider").css('height', 'auto');
			
			var maxHeight3 = 0;

			$("footer#main_footer #top_footer .events .event-slider .owl-item").each(function(){
			   if ($(this).height() > maxHeight3) { maxHeight3 = $(this).height(); }
			});

			$("footer#main_footer #top_footer .events .event-slider .owl-item").height(maxHeight3);
			$("footer#main_footer #top_footer .events .info-slider .owl-item .info-item").height($("footer#main_footer #top_footer .events #footer-event-slider-container").height());
			$("footer#main_footer #top_footer .events .info-slider").height($("footer#main_footer #top_footer .events #footer-event-slider-container").height());
			
			$(".main_content#frontpage .section.alumni_stories #alumni_stories_list .alumni_story_item .story_content").css('height', 'auto');

			var maxHeight5 = 0;

			$(".main_content#frontpage .section.alumni_stories #alumni_stories_list .alumni_story_item .story_content").each(function(){
			   if ($(this).height() > maxHeight5) { maxHeight5 = $(this).height(); }
			});

			$(".main_content#frontpage .section.alumni_stories #alumni_stories_list .alumni_story_item .story_content").height(maxHeight5);

			$(".main_content#news-page .inner_content .article .news_item .news_content").css('height', 'auto');

			var maxHeight6 = 0;

			$(".main_content#news-page .inner_content .article .news_item .news_content").each(function(){
			   if ($(this).height() > maxHeight6) { maxHeight6 = $(this).height(); }
			});

			$(".main_content#news-page .inner_content .article .news_item .news_content").height(maxHeight6);
		}
	});
	
	$('.owl-carousel#hero-owl-carousel').owlCarousel({loop:true,margin:0,nav:true,autoplay:true,autoplayTimeout:8000,autoplayHoverPause:true,animateOut: 'fadeOut',animateIn: 'fadeIn',responsive:{0:{items:1},600:{items:1},1000:{items:1}}});
	$('.event-slider#footer-event-slider').owlCarousel({loop:true,margin:0,nav:false,autoplay:true,autoplayTimeout:14000,autoplayHoverPause:true,animateOut: 'fadeOut',animateIn: 'fadeIn',responsive:{0:{items:1},600:{items:1},1000:{items:1}}});
	$('.owl-carousel#footer-info-owl-carousel').owlCarousel({loop:true,margin:0,nav:true,autoplay:true,autoplayTimeout:6000,autoplayHoverPause:true,animateOut: 'fadeOut',animateIn: 'fadeIn',responsive:{0:{items:1},600:{items:1},1000:{items:1}}});
	$('.owl-carousel#footer-owl-carousel').owlCarousel({loop:true,margin:0,nav:true,autoplay:true,autoplayTimeout:8000,autoplayHoverPause:true,animateOut: 'fadeOut',animateIn: 'fadeIn',responsive:{0:{items:1},600:{items:1},1000:{items:1}}});
	
	$("footer#main_footer #top_footer .events .event-slider .event-item").css('display', 'block');
});

(function() {
	"use strict";
	var toggles = document.querySelectorAll(".c-hamburger");
	for (var i = toggles.length - 1; i >= 0; i--) {
		var toggle = toggles[i];
		toggleHandler(toggle);
	};
	function toggleHandler(toggle) {
		toggle.addEventListener( "click", function(e) {
			e.preventDefault();
			if (this.classList.contains("is-active") === true) {
				this.classList.remove("is-active");
				$('header#main_header .bottom_header').css('display', 'none');
				$('header#main_header .bottom_header #primary_navigation ul.primary-menu').slideUp('fast');
				$('header#main_header .bottom_header #primary_navigation ul.primary-menu').removeClass('menu-toggle-on');
				$('header#main_header .bottom_header #primary_navigation').removeClass('menu-on');
			} else{
				this.classList.add("is-active");
				$('header#main_header .bottom_header').css('display', 'block');
				$('header#main_header .bottom_header #primary_navigation').addClass('menu-on');
				$('header#main_header .bottom_header #primary_navigation ul.primary-menu').addClass('menu-toggle-on');
				$('header#main_header .bottom_header #primary_navigation ul.primary-menu').slideDown('medium');
			}
			
		});
	}
})();

function init() {
	window.addEventListener('scroll', function(e){
		var distanceY = window.pageYOffset || document.documentElement.scrollTop,
		shrinkOn = 800,
		header = document.querySelector("header#main_header");
		if ($(window).width() >= 1000) {
			if (distanceY > shrinkOn) {
				classie.add(header,"scrolled");
				$(".main_content").css('padding-top', $("header#main_header").height() + 'px');
			} else {
				if (classie.has(header,"scrolled")) {
					classie.remove(header,"scrolled");
					$(".main_content").css('padding-top', '0');
				}
			}
		}
	});
}
window.onload = init();

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}

$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
		val = Math.round(val * 4) / 4;
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 13;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}