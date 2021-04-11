		  var aSound = document.createElement('audio');
     aSound.setAttribute('src', 'audio/alert.ogg');

$(document).ready(function() {
	var interval = setInterval(function() {
		$.ajax({
			url: 'scripts/php/quick_cab_admin.php',
			success: function(data) {
				$('#messages').html(data.html);
				if (typeof(count) != 'undefined' && window.count < data.count)
					{
					aSound.play();
						alert("Someone needs a cab");
					}
					window.count = data.count;
			}
		});
	}, 1000);
});