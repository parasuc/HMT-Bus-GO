(function($) {

	$(window).load(function() {
		$('#mask').fadeOut('slow');
		setTimeout(function() {
			$('#container').fadeIn('slow');
		}, 1000);
	});

})(jQuery);