
(function($)
{

	$.fn.admin = function()
	{
		var done = function( e )
		{
			if( e.statusText == 'OK' )
				alert( e.responseText );
				else
				alert( T('error') );
				
			if( e.responseText.indexOf('deleted') > -1 )
			{
				window.location.reload();
			}
				
			if( e.responseText.indexOf('cleared') > -1 )
			{
				window.location.reload();
			}
		}
		
		
		//-- Delete All
		
		var clearAll = function()
		{
			$.ajax({
				url: 'admin/clear',
				type: 'post',
				complete: done
			});
		}
		$(this).find('.clear').on( 'click', clearAll );



		//-- delete one election

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
		$(this).find('.delete').on( 'click', deleteOne );



		//-- send the invitations again

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
		$(this).find('.send').on( 'click', sendInvitations );



		//-- administrate the candidates, electors or votes

		var getView = function( e )
		{
			e.preventDefault();
		
			var uri = $(this).attr('href');
			
			$.post( T('root') + uri, null, function(e)
			{
				$(e).cdialog();
			});
		}
		$(this).find('a[href^="manage"]').on( 'click', getView );

		return this;
	}

})(jQuery);


