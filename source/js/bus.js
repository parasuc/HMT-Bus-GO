(function($) {

	function doActions() {

		$('#stopName').autocomplete({source: './ajax/ajax.StopList.php'});

		NProgress.configure({
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
			NProgress.start();
		});
		$(document).on('pjax:complete', function() {
			NProgress.done();
			doActions();
		});
	});

})(jQuery);