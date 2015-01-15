$(document).ready(function () {
$(".sidebar_help").mouseenter(function () {
	$(".sidebar_help").animate({right:0},"fast");
});
$(".sidebar_help").mouseleave(function () {
	$(".sidebar_help").animate({right:-75},"slow");
});

});
