var chatSound = document.createElement('audio');
     chatSound.setAttribute('src', 'audio/msg.ogg');


$(document).ready(function() {
	var interval = setInterval(function() {
		$.ajax({
			url: 'scripts/php/chat.php',
			success: function(data) {
				$('#chat').html(data.html);
			if (typeof(count) != 'undefined' && window.count < data.count)
					{
		
                chatSound.play();
				alert("new message");
					}
					window.count = data.count;
			}
		});
	}, 1000);
});