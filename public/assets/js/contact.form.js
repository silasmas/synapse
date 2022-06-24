/**
*
* -----------------------------------------------------------------------------
*
* Template : Bizup - Creative Agency & Portfolio HTML Template
* Author : reacthemes
* Author URI : https://reactheme.com/ 
*
* -----------------------------------------------------------------------------
*
**/

(function($) {
	'use strict';
	// Get the form.
	var form = $('#contact-form');
	var btn = document.querySelector('#btnmsg');

	// Get the messages div.
	var formMessages = $('#form-messages');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();
		btn.setAttribute('disabled', 'true');
		btn.innerHTML ="En cour d'envoi";
		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
			.done(function(response) {
				btn.removeAttribute('disabled');
				btn.innerHTML ='Envoyer';
				if (response.reponse) {
					// Make sure that the formMessages div has the 'success' class.
					$(formMessages).removeClass('error');
					$(formMessages).addClass('success');
					swal({
						title: response.msg,
						icon: 'success'
					});
					// Set the message text.
					$(formMessages).text(response.msg);
					// Clear the form.
					$(form)[0].reset();
					// $('#nom, #email, #phone_number, #message').val('');
				} else {
					swal({
						title: response.msg,
						icon: 'error'
					});
				}
			})
			.fail(function(data) {
				btn.removeAttribute('disabled');
				btn.innerHTML ='Envoyer';
				// Make sure that the formMessages div has the 'error' class.
				$(formMessages).removeClass('success');
				$(formMessages).addClass('error');

				// Set the message text.
				if (data.responseText !== '') {
					$(formMessages).text(data.msg);
				} else {
					$(formMessages).text('Oops! An error occured and your message could not be sent.');
				}
			});
	});
})(jQuery);

(function($) {
	'use strict';
	// Get the form.
	var form = $('#newsletter');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();
		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
			.done(function(response) {
				if (response.reponse) {
					swal({
						title: response.msg,
						icon: 'success'
					});
					// Clear the form.
					$(form)[0].reset();
					// $('#nom, #email, #phone_number, #message').val('');
				} else {
					swal({
						title: response.msg,
						icon: 'error'
					});
				}
			})
			.fail(function(data) {
				// Set the message text.
				if (data.responseText !== '') {
					swal({
						title: response.msg,
						icon: 'error'
					});
				} else {
					swal({
						title: response.msg,
						icon: "Oops! Une erreur s'est produite et votre message n'a pas pu être envoyé."
					});
				}
			});
	});
})(jQuery);

(function($) {
	'use strict';
	// Get the form.
	var form = $('#addUser');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();
		// Serialize the form data.
		var formData = $(form).serialize();
		load('#tab-adduser');
		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
			.done(function(response) {
				load('#tab-adduser');
				if (response.reponse) {
					swal({
						title: response.msg,
						icon: 'success'
					});
					// Clear the form.
					$(form)[0].reset();
					location.reload();
				} else {
					swal({
						title: response.msg,
						icon: 'error'
					});
				}
			})
			.fail(function(data) {
				load('#tab-adduser');
				// Set the message text.
				if (data.responseText !== '') {
					swal({
						title: response.msg,
						icon: 'error'
					});
				} else {
					swal({
						title: response.msg,
						icon: "Oops! Une erreur s'est produite et votre message n'a pas pu être envoyé."
					});
				}
			});
	});
})(jQuery);
(function($) {
	'use strict';
	// Get the form.
	var form = $('#updatUser');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();
		// Serialize the form data.
		var formData = $(form).serialize();
		load('#tab-user');
		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
			.done(function(response) {
				load('#tab-user');
				if (response.reponse) {
					swal({
						title: response.msg,
						icon: 'success'
					});
					// Clear the form.
					$(form)[0].reset();
					//location.reload();
				} else {
					swal({
						title: response.msg,
						icon: 'error'
					});
				}
			})
			.fail(function(data) {
				load('#tab-user');
				// Set the message text.
				if (data.responseText !== '') {
					swal({
						title: response.msg,
						icon: 'error'
					});
				} else {
					swal({
						title: response.msg,
						icon: "Oops! Une erreur s'est produite et votre message n'a pas pu être envoyé."
					});
				}
			});
	});
})(jQuery);
function load(id) {
	$(id).children('.ibox-content').toggleClass('sk-loading');
}
