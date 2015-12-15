
(function($)
{

	$.fn.lang = function(opts)
	{
		var me = $(this);
		
		var loadLanguage = function()
		{
			var lang = {lang: $(this).attr('alt') };
			
			$.post( ROOT + 'misc/lang', lang, function( e )
			{
				if( e == 'ok' )
				{
					window.location.reload();
				}
			});
		}

		$(this)
			.find( 'img' )
			.on( 'click', loadLanguage );
		
		return this;
	};

})(jQuery);