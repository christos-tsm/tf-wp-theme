(function ($) {
	$(document).ready(function () {
		$(".switch .slider").on("click", function () {
			if ($('input[name="return"]').val() === "0") {
				$('input[name="return"]').val("1");
			} else {
				$('input[name="return"]').val("0");
			}
		});
		$("form.archive-filters").on("submit", function (e) {
			e.preventDefault();
			// all form values here
			const data = Object.fromEntries(new FormData(e.target).entries());
			let adults = parseInt(data.adults);

			$.ajax({
				url: wp_ajax.ajax_url,
				data: { action: "filter", data: data },
				type: "post",
				success: function (res) {
					$(".archive-content").html(res);
					if (data["return"] === "1") {
						$(".selected-price").each(function () {
							const currentPrice = parseInt($(this).text());
							let doubledPrice = currentPrice * 2;
							console.log(currentPrice * 2);
							$(this).text(parseInt($(this).text() * 2));
						});
					}
				},
				error: function (res) {
					console.log(res);
				},
			});
		});
	});
})(jQuery);
