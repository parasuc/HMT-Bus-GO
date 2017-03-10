(function($) {

	function doActions() {

		$('#stopName').autocomplete({source: './ajax/ajax.StopName.php'});

		NProgress.configure({
			showSpinner: false,
			parent: '#progress-embeded',
			speed: 400
		});

	}

	$(document).ready(function() {
		doActions();
		$(document).pjax('a[data-pjax!="no-pjax"]', '#pjax', {
			fragment: '#pjax',
			timeout: 60000
		});
		$(document).on('submit', '#stopSearch', function(e) {
			$.pjax.submit(e, '#pjax', {
				fragment: '#pjax',
				timeout: 60000
			});
		});
		$(document).on('pjax:send', function() {
			$('#navbar-collapse').collapse({toggle: false});
			$('#navbar-collapse').collapse('hide');
			NProgress.start();
		});
		$(document).on('pjax:complete', function() {
			NProgress.done();
			doActions();
		});
	});

})(jQuery);