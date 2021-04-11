 var cSound = document.createElement('audio');
     cSound.setAttribute('src', 'audio/alert.ogg');

$(document).ready(function() {
	var interval = setInterval(function() {
		$.ajax({
			url: 'scripts/php/shedule_admin.php',
			success: function(data) {
				$('#messages').html(data.html);
				if (typeof(count) != 'undefined' && window.count < data.count)
					{
					cSound.play();
						alert("Someone has sheduled a cab");
					}
				else if (typeof(count) != 'undefined' && window.count > data.count)
					{
					cSound.play();
						alert("Someone has cancel their shedule");
					}
					window.count = data.count;
			}
		});
	}, 1000);
});