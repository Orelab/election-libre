
(function($)
{

	$.fn.radio = function(opts)
	{

		var settings = $.extend({
			'first': 0
		},opts);
		
		var radioClick = function()
		{
			console.log('click');

			var prev = $(this).prev();
			
			if( prev.is('input')  )
			{
				var name = prev.attr('name');
				
				$('body input[name=' + name + ']').prop( 'checked', false );
				prev.prop( 'checked', true );
			}
		}

		$(this).delegate( 'span', 'click', radioClick );

		return this;
	};

})(jQuery);