
(function($)
{

	$.fn.error = function(opts)
	{

		$(this).each(function()
		{
			$(this).cdialog({title:T('error')});
		})		
		
		return this;
	}

})(jQuery);