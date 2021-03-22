$(document).ready(function() {
	const wizard = $("[data-js=wizard]");
	const previousBtn = $("[data-js=previous]");
	const nextBtn = $("[data-js=next]");
	const finishBtn = $("[data-js=finish]");
	const arrows = $("[data-js=arrows]");
	const dots = $("[data-js=dot]");
	const steps = wizard.find("[data-js=step]");

	let currentIndex = 0;

	const move = () => {
		if (currentIndex === steps.length - 1) {
			nextBtn.css("display", "none");
			finishBtn.css("display", "block");
			previousBtn.css("display", "block");
			showPreview();
		} else if (currentIndex === 0) {
			finishBtn.css("display", "none");
			previousBtn.css("display", "none");
			nextBtn.css("display", "block");
			arrows.toggleClass("justify-content-between justify-content-end");
		} else {
			finishBtn.css("display", "none");
			previousBtn.css("display", "block");
			nextBtn.css("display", "block");
			arrows.removeClass("justify-content-end");
			arrows.addClass("justify-content-between");
		}
		steps.removeClass("active");
		dots.removeClass("active");
		$(steps[currentIndex]).addClass("active");
		$(dots[currentIndex]).addClass("active");
	};

	previousBtn.on("click", function() {
		if (currentIndex !== 0) {
			currentIndex--;
			move();
		}
	});

	nextBtn.on("click", function() {
		if (currentIndex !== steps.length - 1) {
			currentIndex++;
			move();
		}
	});

	finishBtn.on("click", function() {
		console.log("finish");
	});

	move();
});

const showPreview = () => {
	const previewElements = $("[data-preview]");
	let html = "";

	$(previewElements).each(function(index, element) {
		const title = $(element).attr("data-preview");
		console.log($(element));

		const elementName = $(element)
			.attr("name")
			.replace(/[\[\]']+/g, "");
		const value = $(`[name=${elementName}]`).val();
		html += `
        <div class="event-preview">
            <div class="title">${title}</div>
            <div class="value">${value}
            </div>
        </div>
    `;
	});

	$(".event-preview-section").html(html);
};
