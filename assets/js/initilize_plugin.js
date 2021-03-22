$(document).ready(function() {
	$(".dropify").dropify();
});

$("[data-select-category=true]").select2({
	placeholder: "Select an Industry",
	maximumSelectionLength: 3,
	tags: true
});

$("[data-select-user=true]").select2({
	placeholder: "Select a user",
	tags: true
});
