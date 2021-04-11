 var bSound = document.createElement('audio');
     bSound.setAttribute('src', 'audio/HornHonk.ogg');

$(document).ready(function() {
	var interval = setInterval(function() {
		$.ajax({
			url: 'scripts/php/lobby.php',
			success: function(data) {
				$('#lobby').html(data.html);
			if (typeof(count) != 'undefined' && window.count != data.count)
					{
					bSound.play();
						alert("your cab is on its way");
					}
					window.count = data.count;
			}
		});
	}, 1000);
});