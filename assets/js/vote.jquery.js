
(function($)
{

	$.fn.vote = function(opts)
	{
		var settings = $.extend({
			'first': 0
		},opts);
		
		var me = $(this);

		var formOK = function()
		{
			var a = me
				.find('fieldset:visible')
				.find('input[type="text"],input[type="email"],textarea,select')
				.not('.new')
				.serializeArray();

			for( var i=0 ; i<a.length ; i++ )
			{
				if( a[i].value == "" )
				{
					alert( T('error_empty_field') );
					return false;
				}
			}
			return true;
		}
		
		var nextStep = function()
		{
			if( formOK() )
			{
				var url = T('root') + $(this).attr('class');
				var data = me.find('input').serialize();

				$.post( url, data, function( e )
				{
					$('#vote').html( e );
				});
			}
		}
		
		var sendMail = function( e )
		{
			e.preventDefault();
			
			var mail = prompt( T('enter_email') );
			
			if( ! /\S+\@\S+\.\S+/.test(mail) )
			{
				alert( T('error_invalid_email') );
				return;
			}

			$.post( T('root') + 'vote/sendmail/', {email:mail}, function(e)
			{
				if( e == 'ok' )
					alert( T('confirm_renew_invitation') );
					else
					alert( e );
			});
		}

		$(this)
			.delegate( 'aside>button', 'click', nextStep );
		
		$(this)
			.delegate( '#identify aside a', 'click', sendMail );
		
		return this;
	};

})(jQuery);



