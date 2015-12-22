
(function($)
{
	// custom Dialog
	
	$.fn.cdialog = function( opts )
	{
		var options = {
			title: $(this).attr('title'),
			minWidth: 500,
			minHeight: 300,
			width: $(window).width() * 0.6,
			height: $(window).height() * 0.8,
			hide: { effect: "explode", duration: 200 },
			modal: true,
			close: function(e, ui){
				$(this).dialog('destroy').remove();
			}
		};
		
		return $(this).each(function()
		{
			for( i in opts )
			{
				options[i] = opts[i];
			}

			$(this).dialog( options );
		});
		
	};

})(jQuery);