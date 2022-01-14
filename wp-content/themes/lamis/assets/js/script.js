$(window).on('load', function(){
	new WOW().init({offset: 1000}); 
});

$(document).ready(function() {

	const data = $('[data-num]');
	let numbers = false;
	// Анимация счетчика цифр	
	$(window).scroll(function(){
		if ($('.rs-numbers').length > 0) {
			var offset = $('.rs-numbers').offset().top - 3 * $('.rs-numbers').height();
			if ($(this).scrollTop() > offset && !numbers) {
				numbersAnimate(data);
				numbers = true;
			}
		}  		
	});
	// Галерея masonry
	if ($('.rs-gallery__container').length > 0) {
		$('.rs-gallery__container').masonry({
			itemSelector: '.rs-gallery__item',
			gutter: '.rs-gallery__gutter-size'
		});
	}	
	// Появления характеристики товаров
	$('.rs-product__button-order span')
	.on('mouseenter', function(e) {
		$(".rs-product__tab-price").addClass("active");
	})
	.on('mouseout', function(e) {
		$(".rs-product__tab-price").removeClass("active");
	});

	$('.rs-product__button-characters span')
	.on('mouseenter', function(e) {
		$(".rs-product__tab-characters").addClass("active");
	})
	.on('mouseout', function(e) {
		$(".rs-product__tab-characters").removeClass("active");
	});
	// Слайдер изображений товара
	$('.rs-product__slider').slick({		
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		buttons: false,
		fade: true,
		cssEase: 'linear'
	});
	$(".rs-miniature__item").on("click", function() {
		$(".rs-miniature__item").removeClass("active");
		$(this).addClass("active");
		var slideno = $(this).data('slide');
   		$('.rs-product__slider').slick('slickGoTo', slideno - 1);
	});
	// Красивый селект для сортировки
	if($('.rs-category__sort select').length > 0) {
		$('.rs-category__sort select').niceSelect();
	}	
	// Слайдеры брендов
	$('.rs-brands__slider-1').slick({
		speed: 4000,
		autoplay: true,
		autoplaySpeed: 0,
		centerMode: true,
		cssEase: 'linear',
		slidesToShow: 1,
		slidesToScroll: 1,
		variableWidth: true,
		infinite: true,
		initialSlide: 1,
		arrows: false,
		buttons: false
	});
	$('.rs-brands__slider-2').slick({
		speed: 4000,
		autoplay: true,
		autoplaySpeed: 0,
		centerMode: true,
		cssEase: 'linear',
		slidesToShow: 1,
		slidesToScroll: -1,
		variableWidth: true,
		infinite: true,
		initialSlide: 1,
		arrows: false,
		buttons: false,
		rtl: true
	});
	// Анимация сервисов
	$(function() {  
		$('.rs-services__item')
		.on('mouseenter', function(e) {
			var parentOffset = $(this).offset(),
			relX = e.pageX - parentOffset.left,
			relY = e.pageY - parentOffset.top;
			$(this).find('span').css({top:relY, left:relX})
		})
		.on('mouseout', function(e) {
			var parentOffset = $(this).offset(),
			relX = e.pageX - parentOffset.left,
			relY = e.pageY - parentOffset.top;
			$(this).find('span').css({top:relY, left:relX})
		})
		.on('click', function(e) {
			var parentOffset = $(this).offset(),
			relX = e.pageX - parentOffset.left,
			relY = e.pageY - parentOffset.top;
			$(this).find('span').css({top:relY, left:relX})
		});
	});
	// Изменение высоты хедера при скролле
	$(window).on("scroll", function() {
		if ($(this).scrollTop() > 200) {
			$(".rs-menu-form__container").addClass("rs-menu-form__container-scroll");
		}
		else {
			$(".rs-menu-form__container").removeClass("rs-menu-form__container-scroll");
		}
	});
	// Поиск
	$(".rs-menu-form__icon-search").on("click", function() {
		if ($(this).hasClass("active")) {
			$(".rs-menu-form__search").removeClass("active");
			$(this).removeClass("active");
		}
		else {
			$(".rs-menu-form__search").addClass("active");
			$(this).addClass("active");
		}
	});
	// Меню бургер
	$(".rs-menu-form__burger").on("click", function() {
		if ($(this).hasClass("active")) {
			$(this).removeClass("active");
			$(".rs-menu-form__menu-mobile").removeClass("active");
		}
		else {
			$(this).addClass("active");
			$(".rs-menu-form__menu-mobile").addClass("active");
		}
	});
	// Главный слайдер
	$('.rs-slider__slider').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
		autoplaySpeed: 5000,
	});
	// Табы мобильного меню
	$(".tabs__item:not(.tabs__item-link)").on("click", function() {
		var tab = $(this).attr("data-tab");
		$(".tabs__item").removeClass("active");
		$(this).addClass("active");
		$(".tabs-container__item").each(function() {
			if($(this).attr("data-tab") == tab) {
				$(this).addClass("active");
			}
			else {
				$(this).removeClass("active");
			}
		});
	});
	// Слайдер лидеры продаж
	$('.rs-sales__container').slick({
		dots: true,
		arrows: false,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4,
		autoplay: true,
		autoplaySpeed: 4000,
		responsive: [
		{
			breakpoint: 1480,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false
			}
		},
		]
	});

});


function numbersAnimate(data) {
	data.each(function(index, item) {
		var text = $(item).data('text') ? ' ' + $(item).data('text') : ''
		$({ Counter: 0 }).animate({ Counter: $(item).data('num') }, {
			duration: 1000,
			easing: 'swing',
			step: function () {
				$(item).find('span').text(Math.floor(this.Counter).toLocaleString() + text);
			},
			done: function () {
				$(item).find('span').text(Math.floor(this.Counter).toLocaleString() + text);
			},
		});
	});
}