
(function($)
{

	$.fn.candidate = function(opts)
	{
		var settings = $.extend({
			'cname': 'candidate',
			'start': 1,
			'min': 2,
			'max': 20
		},opts);
		


		$(this).each(function()
		{
			$(this).append('<div class="candidates"></div>');
			
			var me = $(this);

			var container = me.find('.candidates');			
			
			var counter = settings.start;
			
			var addCandidate = function()
			{
				if( counter > settings.max ) return;
				
				container.append('<textarea name="' + settings.cname + counter++ + '"></textarea>');
			}
			
			var removeCandidate = function()
			{
				if( counter-1 <= settings.min ) return;
				
				container.children().last().remove();
				counter--;
			}
			
			addCandidate();
			addCandidate();
			
			$('<button>+</button>').appendTo(me).on('click', addCandidate);
			$('<button>-</button>').appendTo(me).on('click', removeCandidate);
		})		
		
		return this;
	}

})(jQuery);