
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
					alert('Veuillez remplir tous les champs.');
					return false;
				}
			}
			return true;
		}
		
		var nextStep = function()
		{
			if( formOK() )
			{
				var url = ROOT + $(this).attr('class');
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
			
			var mail = prompt( 'Veuillez saisir votre adresse email :' );
			
			if( ! /\S+\@\S+\.\S+/.test(mail) )
			{
				alert( 'Merci de saisir une adresse email correcte.' );
				return;
			}

			$.post( ROOT + 'vote/sendmail/', {email:mail}, function(e)
			{
				if( e == 'ok' )
					alert( 'Nous vous avons envoyé une nouvelle invitation '
							+ 'contenant vos identifiants. Veuillez consulter '
							+ 'votre boite aux lettres électronique.' );
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



