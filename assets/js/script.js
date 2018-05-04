function resizeHeaderOnScroll() {
	const distanceY = window.pageYOffset || document.documentElement.scrollTop, shrinkOn = 50, headerEl = document
			.getElementById('target');

	if (distanceY > shrinkOn) {
		headerEl.classList.add("header_s");
	} else {
		headerEl.classList.remove("header_s");
	}
}

window.addEventListener('scroll', resizeHeaderOnScroll);

function initMap() {
	if (!document.getElementById('map')) {
		return;
	}
	var uluru = {
		lat : 48.8609185,
		lng : 2.3404709
	};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom : 13,
		center : uluru,
		disableDefaultUI : true
	});
	var marker = new google.maps.Marker({
		position : uluru,
		map : map
	});
}

$('#galleryModal').on('show.bs.modal', function(event) {
	var button = $(event.relatedTarget) 
	var source = button.data('source') 
	var title = button.data('title') 
	var modal = $(this)
	modal.find('.modal-title').text(title)
	modal.find('.modal-body img').attr('src', source);
})
