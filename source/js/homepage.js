/*!
 *	HMT Bus GO -- 华农校巴查询程序
 *
 *	@author CRH380A-2722 <609657831@qq.com>
 *	@copyright 2016-2017 CRH380A-2722
 *	@license MIT
 *	@note 首页JavaScript
 */

(function($) {
	$(window).load(function() {
		$("#mask").fadeOut("slow");
		setTimeout(function() {
			$("#container").fadeIn("slow");
		}, 1000);

		$('#start-btn').on('click', function() {
			$('#introduction, #start').fadeOut('slow');
			setTimeout(function() {
				$('#mode-hint, #modes').fadeIn('slow');
			}, 500);
		});

		$('#home').on('click', function() {
			$('#mode-hint, #modes').fadeOut('slow');
			setTimeout(function() {
				$('#introduction, #start').fadeIn('slow');
			}, 500);
		});
	});
})(jQuery);
