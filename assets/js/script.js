var modal = document.querySelector(".costum-modal");
var triggers = document.querySelectorAll(".trigger");
var closeButton = document.querySelector(".costum-close-button");
var batal = document.querySelector(".costum-model-close");

function toggleModal() {
	modal.classList.toggle("costum-show-modal");
	if ($(".costum-modal").hasClass("costum-show-modal")) {
		$("body").css("position", "fixed");
	} else {
		$("body").css("position", "static");
	}
}

$(".costum-modal").click(function () {
	// toggleModal();
	// console.log("ok");
});

$(".costum-model-close").click(function () {
	toggleModal();
});

for (var i = 0, len = triggers.length; i < len; i++) {
	triggers[i].addEventListener("click", toggleModal);
}
closeButton?.addEventListener("click", toggleModal);
// window.addEventListener("click", windowOnClick);
// batal.addEventListener("click", batalFunc);

var pathname = window.location.pathname;
var url = window.location.href;
var origin = window.location.origin;

(function () {
	$("." + window.segment)
		.parents()
		.addClass("active");
	// console.log($("." + window.segment).parents());
})();
