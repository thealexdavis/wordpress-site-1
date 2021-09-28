jQuery(document).ready(function($) {
	
	// setTargets();
	// 
	// setTimeout(function(){
	// 	setTargets();
	// }, 1000);
	// 
	// function setTargets(){
	// 	$('.entry-content-page a').each(function() {
	// 		thisLink = $(this).attr("href");
	// 		if (thisLink.includes("https") || thisLink.includes("http")){
	// 		   var a = new RegExp('/' + window.location.host + '/');
	// 		   if (!a.test(this.href)) {
	// 			  $(this).attr("target","_blank");
	// 		   }
	// 	   }
	// 	});
	// }
	
	//CAREERS FILTERS
	$( "#careers_filter select" ).change(function() {
		filterCareers();
	});
	function filterCareers(){
		deptFilter = $("#departmentfilter").val();
		locFilter = $("#locationsfilter").val();
		if(deptFilter !== "all"){
			$("h3.jobtitle").hide();
			$("h3.jobtitle[data-dept='"+deptFilter+"']").show();
		} else {
			$("h3.jobtitle").show();
		}
		$( ".job" ).each(function( index ) {
			$(this).hide();
			canShow = false;
			if(deptFilter == "all" && locFilter == "all"){
				canShow = true;
			} else if(deptFilter !== "all" && locFilter !== "all"){
				if ($(this).data("dept") == deptFilter && $(this).data("loc") == locFilter){
					canShow = true;
				}
			} else if(deptFilter !== "all"){
				if ($(this).data("dept") == deptFilter){
					canShow = true;
				}
			} else if(locFilter !== "all"){
				if ($(this).data("loc") == locFilter){
					canShow = true;
				}
			}
			if (canShow){
				$(this).show();
			}
		});
	}
	
	
	$( "header#header .search a, #search_frame a.search_close, #search_frame .bgclick" ).click(function(e) {
		e.preventDefault();
		$("#search_frame").fadeToggle("fast");
	});
	$( "#mobile_nav ul li.menu-item-has-children>a" ).click(function(e) {
		e.preventDefault();
		$(this).parent("li").children("ul.sub-menu").slideToggle("fast");
		$(this).parent("li").toggleClass("expanded");
	});
	$( "ul#menu-main-nav li.menu-item-has-children>a" ).click(function(e) {
		e.preventDefault();
	});	
	$( "header#header button.hamburger" ).click(function() {
		$("#mobile_nav").toggleClass("active");
		$(this).toggleClass("is-active");
		$("html,body").toggleClass("fixed");
	});
	$('.fl-testimonials.custom').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		appendDots: $(".slide-m-dots"),
	    prevArrow: $(".slide-m-prev"),
	    nextArrow: $(".slide-m-next"),
		// prevArrow:"<div class='a-left control-c prev slick-prev'><img src='/wp-content/themes/optimaderm/img/left-orange.svg'></div>",
		// nextArrow:"<div class='a-right control-c next slick-next'><img src='/wp-content/themes/optimaderm/img/right-orange.svg'></div>",
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false
			  }
			}
		]
	});
	desktopArrow = true;
	tabletArrow = true;
	mobileArrow = true;
	if(parseInt($('.providers_list .carousel').data("count")) < 4){
		maxCountDesktop = parseInt($('.providers_list .carousel').data("count"));
		if(parseInt($('.providers_list .carousel').data("count")) < 3){
			maxCountTablet = parseInt($('.providers_list .carousel').data("count"));
		} else {
			maxCountTablet = 3;
		}
	} else {
		maxCountDesktop = 4;	
		maxCountTablet = 3;
	}
	if(maxCountDesktop < 4){
		desktopArrow = false;
	}
	if(maxCountTablet < 3){
		tabletArrow = false;
	}
	if(parseInt($('.providers_list .carousel').data("count")) == 1){
		mobileArrow = false;
	}
	$('.providers_list .carousel').slick({
		infinite: true,
		slidesToShow: maxCountDesktop,
		slidesToScroll: maxCountDesktop,
		dots: false,
		prevArrow: $(".slide-m-prev"),
		nextArrow: $(".slide-m-next"),
		arrows: desktopArrow,
		// prevArrow:"<div class='a-left control-c prev slick-prev'><img src='/wp-content/themes/optimaderm/img/left-orange.svg'></div>",
		// nextArrow:"<div class='a-right control-c next slick-next'><img src='/wp-content/themes/optimaderm/img/right-orange.svg'></div>",
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				  arrows: tabletArrow,
				slidesToShow: maxCountTablet,
				slidesToScroll: maxCountTablet,
				infinite: true
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				  arrows: mobileArrow,
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
	});
	carouselArrows();
	$( window ).resize(function() {
		carouselArrows();
	});
	function carouselArrows(){
		if (document.body.clientWidth >= 1024){
			if(desktopArrow == true){
				sliderControls = true;
			} else {
				sliderControls = false;
			}
		} else if (document.body.clientWidth >= 600){
			if(tabletArrow == true){
				sliderControls = true;
			} else {
				sliderControls = false;
			}
		} else {
			if(mobileArrow == true){
				sliderControls = true;
			} else {
				sliderControls = false;
			}
		}
		if(sliderControls == true){
			$(".providers_list .slider-controls").show();
		} else {
			$(".providers_list .slider-controls").hide();
		}
	}
	if($("#provider_results")[0]){
		providerResults = $("#provider_results").html();
	}
	//LOCATIONS FILTERS
	$( "#location_filters select" ).change(function() {
		filterLocations();
	});
	//PROVIDER FILTERS
	$( "#provider_filters select" ).change(function() {
		filterProviders();
	});
	function filterProviders(){
		$("#provider_results").html(providerResults);
		servicesVal = $("select#services").val();
		locationsVal = $("select#location").val();
		genderVal = $("select#gender").val();
		$("#provider_results h4").remove();
		$( "#provider_results .tile" ).each(function( index ) {
			thisServices = $(this).data("services").split(",");
			thisGender = $(this).data("gender").split(",");
			thisLocations = $(this).data("locations").split(",");
			if(thisServices.includes(servicesVal) && thisGender.includes(genderVal) && thisLocations.includes(locationsVal)){
				$(this).addClass("active");
			} else {
				$(this).removeClass("active").remove();
			}
		});
		if($( "#provider_results .tile.active" ).length == 0){
			$("#provider_results").append('<h4>No providers match your filter critera. Please adjust filters and try again.</h4>');
		}
	}
	$("header#header").headroom();
});