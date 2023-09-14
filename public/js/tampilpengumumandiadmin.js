$(document).ready(function () {
	// $(".view").on("click", function () {
	// 	var src = $(this).data("image");
	// 	var alt = $(this).data("alt");

	// 	$(".popup_image").attr("src", src);
	// 	$(".popup_image").attr("alt", alt);
	// });
	// $("#tampilPengumumanModal").modal("show");
	$('.accordion-profile-dpm .card-header button').click( function () {
		$(this).find('.col i').toggleClass('fa-chevron-circle-up fa-chevron-circle-right');
	});
});
