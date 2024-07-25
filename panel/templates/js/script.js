$(document).ready(function () {
	$(".constuct_color_blue").click(function () {
		$(".sidebar-dark").addClass("bg-gradient-primary");
		$(".sidebar-dark").removeClass("bg-gradient-primary-yellow");
		$(".sidebar-dark").removeClass("bg-gradient-primary-red");
		$(".sidebar-dark").removeClass("bg-gradient-primary-shadow");
		$(".sidebar-dark").removeClass("bg-gradient-primary-green");
		$(".sidebar-dark").removeClass("bg-gradient-primary-dark")

	});
	$(".constuct_color_green").click(function () {
		$(".sidebar-dark").addClass("bg-gradient-primary-green");
		$(".sidebar-dark").removeClass("bg-gradient-primary");
		$(".sidebar-dark").removeClass("bg-gradient-primary-yellow");
		$(".sidebar-dark").removeClass("bg-gradient-primary-dark");
		$(".sidebar-dark").removeClass("bg-gradient-primary-red");

	});
	$(".constuct_color_yelllow").click(function () {
		$(".sidebar-dark").addClass("bg-gradient-primary-yellow");
		$(".sidebar-dark").removeClass("bg-gradient-primary");
		$(".sidebar-dark").removeClass("bg-gradient-primary-green");
		$(".sidebar-dark").removeClass("bg-gradient-primary-dark");
		$(".sidebar-dark").removeClass("bg-gradient-primary-red");
	});
	$(".constuct_color_red").click(function () {
		$(".sidebar-dark").addClass("bg-gradient-primary-red");
		$(".sidebar-dark").removeClass("bg-gradient-primary");
		$(".sidebar-dark").removeClass("bg-gradient-primary-yellow");
		$(".sidebar-dark").removeClass("bg-gradient-primary-dark");
		$(".sidebar-dark").removeClass("bg-gradient-primary-green");

	});
	$(".constuct_color_shadow").click(function () {
		$(".sidebar-dark").addClass("bg-gradient-primary-dark");
		$(".sidebar-dark").removeClass("bg-gradient-primary");
		$(".sidebar-dark").removeClass("bg-gradient-primary-yellow");
		$(".sidebar-dark").removeClass("bg-gradient-primary-green");
		$(".sidebar-dark").removeClass("bg-gradient-primary-red");

	});

	let constic;
	constic = 'false';
	$(".terran_const_control").hide(0);

	$(".construct_control__b").click(function () {
		if (constic == 'false') {
			constic = 'true';

			$(".crusix").css("margin-left", "-64px");
			$(".construct_body").css("background", "#F5F5F5");
			$(".crusix").css("background", "#F5F5F5");
			$(".construct_body").addClass("construct_body__open");
			$(".construct_control__b").addClass("construct_control__bopen");
			$(".terran_const_control").show(100);
		} else {
			constic = 'false';
			$(".crusix").css("margin-left", "0px");
			$(".construct_body").css("background", "#FFFFFF");
			$(".crusix").css("background", "#FFFFFF");
			$(".construct_body").removeClass("construct_body__open");
			$(".construct_control__b").removeClass("construct_control__bopen");
			$(".terran_const_control").hide(0);
		}
	});

	$('#datepicker').datepicker({
		uiLibrary: 'bootstrap4'
	});
	$(window).resize(function () {
		if ($(window).width() <= 768) {
			$('#page-top').addClass('sidebar-toggled');
			$('.navbar-nav').addClass('toggled');
		};
	});

})
