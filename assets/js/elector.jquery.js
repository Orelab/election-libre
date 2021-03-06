
(function($)
{

	$.fn.elector = function(opts)
	{
		
		var settings = $.extend({
			obj : {
				'structure':[
					{ id:"name",		name:T('name'),		type:"text", 	options:{default:""}	},
					{ id:"surname",	name:T('surname'),	type:"text", 	options:{default:""}	},
					{ id:"email",		name:T('email'),		type:"text", 	options:{default:""}	},
					{ id:"valid",		name:"valid",			type:"text", 	options:{default:""}	},
				],
				'data': []
			}
		},opts);


		var row_highlight = function()
		{
			if( $(this).find('.valid input').val() == 'false' )
			{
				$(this).addClass('invalid');
			}
		}
		

		$(this).find('#elector-list').spreadsheet({data: settings.obj });


		$(this).each(function()
		{
			var me = $(this);

			$(this).find('input[type=file]').on('change', function(e)
			{
				var progressid = Date.now();

				var data = new FormData();
				data.append( 'elector_list', $(this).get(0).files[0] );
				data.append('PHP_SESSION_UPLOAD_PROGRESS', progressid);
				
				var jqXHR = $.ajax({
					url: T('root') + 'misc/csv2json',
					data: data,
					cache: false,
					contentType: false,
					processData: false,
					timeout: 3600000,	// 1H
					type: 'POST',
					success: function(data)
					{
						settings.obj.data = JSON.parse( data );
						
						$('#elector-list')
							.spreadsheet({destroy:true})
							.spreadsheet({data: settings.obj })
							.find('tbody>tr')
								.each( row_highlight );
					},
					error: function(xhr, str)
					{
						console.log('error');
					}
				});
			});	
		})		

		return this;
	}

})(jQuery);