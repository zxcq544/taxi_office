/**
 * Created by eduard on 28.05.15.
 */

(function ($) {
	live_func = typeof(jQuery(window).live) == 'function' ? 'live' : 'on';
	Drupal.behaviors.test_calls = {
		attach: function (context, settings) {

			$('#edit-container button')[live_func]('click', function () {
				var number = $(this).attr('number');
				$.ajax({
								 url        : 'http://localhost:1337/test-calls',
								 type       : 'POST',
								 dataType   : 'jsonp',
								 data       : {call: $(this).val(),number:number},
								 crossDomain: true,
								 success    : function (data) {
									 console.log(data.response);
								 }
							 });
			})
		}
	}
})(jQuery)
