$(document).ready(function() {
$('#table')	.DataTable(
{
	language : {
		processing : "Traitement en cours...",
		search : "Rechercher&nbsp;:",
		lengthMenu : "Afficher _MENU_ &eacute;l&eacute;ments",
		info : "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
		infoEmpty : "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
		infoFiltered : "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
		infoPostFix : "",
		loadingRecords : "Chargement en cours...",
		zeroRecords : "Aucun &eacute;l&eacute;ment &agrave; afficher",
		emptyTable : "Aucune donnée disponible dans le tableau",
		paginate : {
			first : "Premier",
			previous : "Pr&eacute;c&eacute;dent",
			next : "Suivant",
			last : "Dernier"
		},
		aria : {
			sortAscending : ": activer pour trier la colonne par ordre croissant",
			sortDescending : ": activer pour trier la colonne par ordre décroissant"
			},
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
	$('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse')
			.on('mousewheel DOMMouseScroll', function(e) {
				var e0 = e.originalEvent, delta = e0.wheelDelta || -e0.detail;
				this.scrollTop += (delta < 0 ? 1 : -1) * 30;
				e.preventDefault();
			});

	$('#delete').on('show.bs.modal',function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var source = button.data('source')
		var modal = $(this)
		var src_txt;
		if (source == "contacts-del") {
			src_txt = "contact";
			modal.find('.modal-body form').attr('action', 'contact_delete');
		}else if(source == "messages-del"){
			src_txt = "message";
			modal.find('.modal-body form').attr('action', 'message_delete');
		}else if(source == "services-del"){
			src_txt = "service";
			modal.find('.modal-body form').attr('action', 'service_delete');
		}		
		modal.find('.modal-title').text('soupprimer le '+src_txt+' n° ' + id + ' ?')
		modal.find('.modal-body #id').val(id)
	}).on('hidden.bs.modal', function (e) {
		 $(this).find('.modal-body form').arrt = "";
	});

	$('#edit_contact').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var source = button.data('source') // Extract info from data-*
		// attributes
		var modal = $(this);
		if (source == "contacts-add") {
			modal.find('.modal-title').text("Ajouter un nouveau contact");
			$.getJSON("get_message/id/" + id, function(resp) {
				$.each(resp.data, function(key, value) {
					$.each(value, function(key, value) {
						modal.find('.modal-body #' + key).val(value);
					});
				});
			});
		} else if (source == "contacts-edit") {
			modal.find('.modal-title').text("Modifier le contact");
			modal.find('.modal-body #id').val(id);
			modal.find('.modal-body form').append("<input id='id' type='hidden' name='values[id]'>");
			$.getJSON("get_contact/id/" + id, function(resp) {
				$.each(resp.data, function(key, value) {
					$.each(value, function(key, value) {
						modal.find('.modal-body #' + key).val(value);
					});
				});
			});
		} else if(source == "message-read") {
			modal.find('.modal-title').text("Message n° "+id);
			modal.find('.modal-body').append("<textarea name='message' id='message' class='form-control' style='height: 200px;''>");
			modal.find('.modal-footer .btn-primary').hide();
			$.getJSON("get_message/id/" + id, function(resp) {
				$.each(resp.data, function(key, value) {
					$.each(value, function(key, value) {
						modal.find('.modal-body #' + key).val(value);
					});
					$.get( "set_read/id/"+id, function( resp ) {
					    console.log( "as_red: "+resp );
					});
				});
			});
		}else {
			modal.find('.modal-title #n_msg').text(id);
		}
	}).on('hidden.bs.modal', function (e) {
		 $(this).find('#message').remove();
		 $(this).find('#id').remove();
		 $(this).find('.modal-footer .btn-primary').show();
		 $(this).find('#nom_prenom').val("");
		 $(this).find('#email').val("");
		 $(this).find('#tel').val("");
		 $(this).find('#societe').val("");
	});
	$('#edit_service').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var id = button.data('id') // Extract info from data-* attributes
		var source = button.data('source') // Extract info from data-*
		// attributes
		var modal = $(this);
		if (source == "service-add") {
			modal.find('.modal-title').text("Ajouter un nouveau service");
		} else if (source == "service-edit") {
			modal.find('.modal-title').text("Modifier le service");
			modal.find('.modal-body #id').val(id);
			modal.find('.modal-body form').append("<input id='id' type='hidden' name='values[id]'>");
			$.getJSON("get_service/id/" + id, function(resp) {
				$.each(resp.data, function(key, value) {
					$.each(value, function(key, value) {
						if(key=="image"){
							modal.find('.modal-body #' + key).attr('src', 'assets/img/uploads/services/'+value);
							modal.find('.modal-body #' + key).attr('style', 'max-width:100px;');
						}else{
							modal.find('.modal-body #' + key).val(value);							
						}
					});
				});
			});
		} else {
			modal.find('.modal-title #n_msg').text(id);
		}
	}).on('hidden.bs.modal', function (e) {
		 $(this).find('.modal-body #image').attr('src', '');
		 $(this).find('.modal-body #image').attr('style', 'display:none;');
		 $(this).find('.modal-body #title').val('');
		 $(this).find('.modal-body #text').val('');
		 $(this).find('#id').remove();
	});
})(jQuery); // End of use strict
