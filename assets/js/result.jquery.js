
(function($)
{

	$.fn.result = function(opts)
	{
		var settings = $.extend({
			'first': 0
		},opts);
		
		var me = $(this);

		var resetColors = function()
		{
			me.find('#checkup input,#votelist td').css( 'background-color', '' );
		}
		
		var getFingerprint = function()
		{
			var data = {
				name: me.find('#checkup input[name=name]').val(),
				surname: me.find('#checkup input[name=surname]').val(),
				signature: me.find('#checkup input[name=signature]').val()
			};

			$.post( T('root') + 'vote/fingerprint', data, function( e )
			{
				$('#checkup input[name=fingerprint]')
					.val( e )
					.css( 'background-color', '#EFFF63' );
					
				me
					.find('#votelist td:contains(' + e + ')')
					.css( 'background-color', '#EFFF63' );
				
				setTimeout( resetColors, 3000 );
			})
		}

		$(this)
			.find('#checkup button')
			.on( 'click', getFingerprint );
		
		return this;
	};

})(jQuery);



