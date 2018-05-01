$(document).ready(function() {
	$('#dataTable').DataTable({
	    language: {
	        processing:     "Traitement en cours...",
	        search:         "Rechercher&nbsp;:",
	        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
	        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
	        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
	        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
	        infoPostFix:    "",
	        loadingRecords: "Chargement en cours...",
	        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
	        emptyTable:     "Aucune donnée disponible dans le tableau",
	        paginate: {
	            first:      "Premier",
	            previous:   "Pr&eacute;c&eacute;dent",
	            next:       "Suivant",
	            last:       "Dernier"
	        },
	        aria: {
	            sortAscending:  ": activer pour trier la colonne par ordre croissant",
	            sortDescending: ": activer pour trier la colonne par ordre décroissant"
	        },
	        data:           data,
            deferRender:    true,
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true,
            "autoWidth": 	false
	    }
	});
});

(function($) {
	"use strict"; // Start of use strict
	// Configure tooltips for collapsed side navigation
	$('.navbar-sidenav [data-toggle="tooltip"]')
			.tooltip(
					{
						template : '<div class="tooltip navbar-sidenav-tooltip" role="tooltip" style="pointer-events: none;"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
					})
	// Toggle the side navigation
	$("#sidenavToggler")
			.click(
					function(e) {
						e.preventDefault();
						$("body").toggleClass("sidenav-toggled");
						$(".navbar-sidenav .nav-link-collapse").addClass(
								"collapsed");
						$(
								".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level")
								.removeClass("show");
					});
	// Force the toggled class to be removed when a collapsible nav link is
	// clicked
	$(".navbar-sidenav .nav-link-collapse").click(function(e) {
		e.preventDefault();
		$("body").removeClass("sidenav-toggled");
	});
	// Prevent the content wrapper from scrolling when the fixed side navigation
	// hovered over
	$(
			'body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse')
			.on('mousewheel DOMMouseScroll', function(e) {
				var e0 = e.originalEvent, delta = e0.wheelDelta || -e0.detail;
				this.scrollTop += (delta < 0 ? 1 : -1) * 30;
				e.preventDefault();
			});
	// Configure tooltips globally
	$('[data-toggle="tooltip"]').tooltip()
	// Smooth scrolling using jQuery easing
	$(document).on('click', 'a.scroll-to-top', function(event) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop : ($($anchor.attr('href')).offset().top)
		}, 1000, 'easeInOutExpo');
		event.preventDefault();
	});
})(jQuery); // End of use strict
