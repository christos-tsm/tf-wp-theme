(function ($) {
	$(document).ready(function () {
		/** Floating label */
		$('.input-container-with-label input:not([type="checkbox"]), .input-container-with-label textarea').on("focus", function () {
			let placeholder = $(this).parent().parent().find(".placeholder");
			placeholder.addClass("placeholder--active");
		});
		$('.input-container-with-label input:not([type="checkbox"]), .input-container-with-label textarea').on("blur", function () {
			let placeholder = $(this).parent().parent().find(".placeholder");
			if ($(this).val() === "") {
				placeholder.removeClass("placeholder--active");
			}
		});
		/** Header on scroll */
		window.onscroll = function () {
			scrollFunction();
		};
		function scrollFunction() {
			if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
				$(".site-header").addClass("site-header--scrolled");
			} else {
				$(".site-header").removeClass("site-header--scrolled");
			}
		}
		/** Single Tours Page */
		if ($('input[name="tour-date"]').length) {
			$('input[name="tour-date"]').pickadate({
				// format: "dd/mm/yyyy",
				min: true,
				onStart: function () {
					// var queryString = window.location.search;
					// var urlParams = new URLSearchParams(queryString);
					// var drop_off_date = urlParams.get("drop-off-date");
					// if (drop_off_date) return;
					var date = new Date();
					this.set("select", [date.getFullYear(), date.getMonth(), date.getDate() + 2]);
				},
				onClose: function () {
					// if (!$(".header-form--active .form__row--bottom").is(":visible")) {
					// $(".header-form--active .form__row--bottom").addClass("form__row--visible");
					// }
				},
			});
		}
		/** Display Cars Section */
		$("#check-prices").on("click", function () {
			$(".book-cars").removeClass("section--inactive");
		});
		/** Display Extras Section */
		$(".section-content__car > a").on("click", function () {
			const totalPrice = $("#price");
			const selectedPrice = $(this).parent().find(".selected-price").text();
			totalPrice.text(selectedPrice);
			$('input[name="car"]').val($(this).parent().find(".car-details h3").text());
			$('input[name="total-price"]').val(totalPrice.text());
			$(".section-content__car").removeClass("selected-car").addClass("inactive-car");
			$(this).parent().removeClass("inactive-car").addClass("selected-car");
			$(".book-extras").removeClass("section--inactive");
			$(".total-price").removeClass("section--inactive");
			$('input[name="extra-hours"]').val(0).trigger("change");
			$("#extra-hours-value").text(0);
			$('span[data-operation="minus"]').addClass("handle-value--disabled");
			if ($('input[name="tour-guide"]').is(":checked")) {
				$('input[name="tour-guide"]').prop("checked", false);
			}
		});
		/** Handle Values Change */
		$('input[name="tour-date"]').on("change", function () {
			$('input[name="date"]').val($(this).val());
		});
		$("#add-extra-hours").on("click", function () {
			var currentPrice = parseInt($("#price").text());
			currentPrice += 30;
			$("#price").text(currentPrice);
			$('input[name="total-price"]').val($("#price").text());
		});
		$("#minus-extra-hours").on("click", function () {
			var currentPrice = parseInt($("#price").text());
			currentPrice -= 30;
			$("#price").text(currentPrice);
			$('input[name="total-price"]').val($("#price").text());
		});
		$('input[name="tour-guide"]').on("change", function () {
			var currentPrice = parseInt($("#price").text());
			if ($(this).is(":checked")) {
				currentPrice += 170;
				$("#price").text(currentPrice);
				$('input[name="tour-guide"]').val("Yes");
				$('input[name="total-price"]').val($("#price").text());
			} else {
				currentPrice -= 170;
				$("#price").text(currentPrice);
				$('input[name="tour-guide"]').val("No");
				$('input[name="total-price"]').val($("#price").text());
			}
		});
		$(".add-adults").on("click", function () {
			console.log("add-adults");
			$('input[name="adults-number"]').val(parseInt($("#adults-value").text()) + 1);
		});
		$(".minus-adults").on("click", function () {
			$('input[name="adults-number"]').val(parseInt($("#adults-value").text()) - 1);
		});
		$(".add-children").on("click", function () {
			$('input[name="children-number"]').val(parseInt($("#children-value").text()) + 1);
		});
		$(".minus-children").on("click", function () {
			$('input[name="children-number"]').val(parseInt($("#children-value").text()) - 1);
		});
		$(".add-infants").on("click", function () {
			$('input[name="infants-number"]').val(parseInt($("#infants-value").text()) + 1);
		});
		$(".minus-infants").on("click", function () {
			$('input[name="infants-number"]').val(parseInt($("#infants-value").text()) - 1);
		});
		/** Open Form */
		$(".open-form").on("click", function () {
			$(".book-form").removeClass("section--inactive");
			$('input[name="total-price"]').val($("#price").text());
			$('input[name="adults-number"]').val($('input[name="adults"]').val());
			$('input[name="children-number"]').val($('input[name="children"]').val());
			$('input[name="infants-number"]').val($('input[name="infants"]').val());
			$('input[name="date"]').val($('input[name="tour-date"]').val());
		});
		/** Single tours gallery & video */
		$("#open-gallery").on("click", function () {
			$(".single-tours-gallery > a").trigger("click");
		});
		$("#open-video").on("click", function () {
			$(".single-tours-video").addClass("single-tours-video--active");
			$("body").css("overflow", "hidden");
		});
		$("#close-video").on("click", function () {
			$(".single-tours-video").removeClass("single-tours-video--active");
			$(".single-tours-video iframe").attr("src", $("iframe").attr("src"));
			$("body").css("overflow", "visible");
		});
	});
})(jQuery);
