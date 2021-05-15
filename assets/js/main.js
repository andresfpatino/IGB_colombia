jQuery(document).ready(function ($) {
    
    if( $('#form-field-marca').length > 0 ) {
        $('#form-field-marca').select2({
            'placeholder': 'Marca en la que estás interesado '
        });
    }
	
	// Blog
	$('.igb-blog-list').slick({
		dots: true,
		arrows: false,
		autoplay: true,
  		autoplaySpeed: 7000,
		speed: 1000,
		slidesToShow: 3,
		slidesToScroll: 3,
		respondTo : 'window',
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 520,
				settings: {
					slidesToShow: 1,
					slidesToShow: 1
				}
			}
		]
	});
		

	// Lineas producto
	$('.lineas_igb').slick({
		dots: true,
		arrows: true,
		prevArrow: '<img class="fa angle-left" src="/wp-content/uploads/2020/12/arrow-top.svg">',
		nextArrow: '<img class="fa angle-right" src="/wp-content/uploads/2020/12/arrow-top.svg">',
		autoplay: false,
		autoplaySpeed: 4000,
		speed: 1000,
		infinite: false,
		slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
		respondTo : 'window',
		responsive: [
			{
				breakpoint: 680,
				settings: {
					slidesToShow: 1,
					slidesToShow: 1,
					arrows: true
				}
			}
		]
	});

	// Gallery products
	$('.prod_gallery-wrap').slick({
		dots: true,
		arrows: true,
		prevArrow: '<img class="fa angle-left" src="/wp-content/uploads/2020/12/arrow-top.svg">',
		nextArrow: '<img class="fa angle-right" src="/wp-content/uploads/2020/12/arrow-top.svg">',
		autoplay: false,
		autoplaySpeed: 7000,
		speed: 1000,
		slidesToShow: 1,
		slidesToScroll: 1
	});
	
	// Tabs style products
	$(".produc-style-tabs .tab_content").hide(); 
	$(".produc-style-tabs li:first").addClass("active").show(); 
	$(".produc-style-tabs .tab_content:first").show(); 

	$(".produc-style-tabs li").click(function() {
		$(".produc-style-tabs li").removeClass("active"); 
		$(this).addClass("active"); 
		$(".produc-style-tabs .tab_content").hide();
		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn();
		return false;
	});
	
});

