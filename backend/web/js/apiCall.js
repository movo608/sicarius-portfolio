$(document).ready(function() {
	
	setInterval(function() {
		$.post('api', function(data) {

			console.log(data);

			$('.message-label a.dropdown-toggle').html('Administration (' + data.substring(1, 2) + ') <span class="caret"></span>');
			$('.messages a').html('Messages ('+ data.substring(1, 2) +')');

		});	
	}, 1000);

});