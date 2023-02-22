(function ($) {
	$(document).ready(function () {
		/** Show / Hide Forms */
		$(".header-form__header-item").on("click", function () {
			let target = $(this).attr("data-target");
			$(".header-form__header-item").removeClass("header-form__header-item--active");
			$(this).addClass("header-form__header-item--active");
			$(".header-form").removeClass("header-form--active");
			$(target).addClass("header-form--active");
			console.log(target);
			if (target === "#form--excursions") {
				$(this).parent().addClass("excursions--active");
			} else {
				$(this).parent().removeClass("excursions--active");
			}
		});
		/** Date pickers & dropdowns */
		$(".transfer-date").pickadate({
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
		$('select[name="to"]').select2();
		$('select[name="from"]').select2();
		$('select[name="pick-up-point"]').select2();
		$('select[name="excursions"]').select2();
		/** Trigger open to date after select "to" is closed */
		$('.header-form--active select[name="to"], .header-form--active select[name="pick-up-point"]').on("change", function () {
			$(".transfer-date").trigger("click");
		});
		/** Handle Value Function ( Adults , Children , Infants inputs ) */
		$(".handle-value").on("click", function () {
			/** Get minus or plus  */
			const op = $(this).attr("data-operation");
			/** Get input to change the value  */
			const hiddenInput = $(this).attr("data-input");
			/** Get the span text to display */
			let displayValue = $(this).attr("data-display-value");
			if (op === "plus") {
				let temp = Number($(`${displayValue}`).text());
				let addTemp = (temp += 1);
				$(`${displayValue}`).text(addTemp);
				$(`${hiddenInput}`).val(addTemp);
				/** Remove disabled minus if any */
				if ($(this).parent().find('span[data-operation="minus"]')) {
					$(this).parent().find('span[data-operation="minus"]').removeClass("handle-value--disabled");
				}
			}
			if (op === "minus") {
				let temp = Number($(`${displayValue}`).text());
				if (hiddenInput === ".header-form--active input[name='adults']" || hiddenInput === "input[name='adults']") {
					if (temp > 1) {
						console.log(hiddenInput === ".header-form--active input[name='adults']");
						let addTemp = (temp -= 1);
						$(`${displayValue}`).text(addTemp);
						$(`${hiddenInput}`).val(addTemp);
						if (temp <= 1) {
							$(this).addClass("handle-value--disabled");
						}
					}
				} else if (temp > 0) {
					let addTemp = (temp -= 1);
					$(`${displayValue}`).text(addTemp);
					$(`${hiddenInput}`).val(addTemp);
					if (temp === 0) {
						$(this).addClass("handle-value--disabled");
					}
				}
			}
		});

		/** Display form row after input date has changed */
		$(".transfer-date").on("change", function () {
			$(".header-form--active .form__row--bottom").addClass("form__row--visible");
		});
	});
})(jQuery);
