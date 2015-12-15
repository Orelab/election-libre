
(function($)
{

	$.fn.admin = function()
	{
		var done = function( e )
		{
			if( e.statusText == 'OK' )
				alert( e.responseText );
				else
				alert( 'Sorry, an error occured.' );
				
			if( e.responseText.indexOf('deleted') > -1 )
			{
				window.location.reload();
			}
				
			if( e.responseText.indexOf('cleared') > -1 )
			{
				window.location.reload();
			}
		}
		
		var clearAll = function()
		{
			$.ajax({
				url: 'admin/clear',
				type: 'post',
				complete: done
			});
		}

		var deleteOne = function()
		{
			var id = $(this).attr('class').replace('delete ','');
			
			$.ajax({
				url: 'admin/delete',
				type: 'post',
				data: {id:id},
				complete: done
			});
		}

		var sendInvitations = function()
		{
			var id = $(this).attr('class').replace('send ','');
			
			$.ajax({
				url: 'admin/invitation',
				type: 'post',
				data: {id:id},
				complete: done
			});
		}

		$(this).find('.clear').on( 'click', clearAll );
		$(this).find('.delete').on( 'click', deleteOne );
		$(this).find('.send').on( 'click', sendInvitations );

		return this;
	}

})(jQuery);


