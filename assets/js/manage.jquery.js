
(function($)
{

	$.fn.manage = function(opts)
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
					alert( T('error_malformed_data') );
					return false;
				}
			}
			return true;
		}
		
		
		var richText = function()
		{
			if( me.find('fieldset:visible .richtext').length )
			{
				tinymce.init({
					selector: '.richtext',
					theme: 'modern',
					language: 'fr_FR',
					menubar: false,
					height: 350
				});
			}
		}
				

		
		//-- add the goPrev button
		
		var goPrev = function()
		{
			$(me).find('fieldset').hide(),
			$(this).parents('fieldset').prev('fieldset').show();
		}

		$(this)
			.find('fieldset .prev')
			.on('click',goPrev);


		
		//-- add the goNext button
		
		var goNext = function()
		{
			if( formOK() )
			{
				$(me).find('fieldset').hide(),
				$(this).parents('fieldset').next('fieldset').show();
				richText();
			}
		}

		$(this)
			.find('fieldset .next')
			.on('click',goNext);


		
		//-- register the complete form
		
		var register = function()
		{
			if( formOK() )
			{
				var data = me
					.find('input,textarea,select')
					.not('.new')
					.serializeArray();
				
				$.post( T('root') + 'manage/save', data, function(e)
				{
					alert( e );
				});
			}
		}

		$(this)
			.find('fieldset .save')
		//	.one('click',register);
			.on('click',register);



		//-- hide all and show the first

		$(this)
			.children('fieldset')
			.hide()
			.eq( settings.first )
			.show();
		
		
		return this;
	};

})(jQuery);