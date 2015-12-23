

var T = function( key )
{
	if( typeof data_from_server === 'undefined' )
	{
		// as data_from_server is a global var, it should happen only once...
		data_from_server = JSON.parse( $('#translations').html() );
	}
	return data_from_server['js_'+key];
}



$.ajaxPrefilter(function(options, originalOptions, jqXHR)
{
	if( options.data instanceof FormData )
	{
		options.data.append( T('csrf_name'), T('csrf_hash') );
	}
	else if( options.data )
	{
		options.data += '&' + T('csrf_name') + '=' + T('csrf_hash');
	}
	else
	{
		options.data = T('csrf_name') + '=' + T('csrf_hash');
	}
});



$(document).ready(function()
{
	$('#lang').lang();

	$('#manage').manage();

	$('#choices').candidate();

	$('#electors').elector();

	$('#vote').vote();

	$('#dashboard').admin();

	$('*[title]').tooltip();

	$('body').radio();

	$('#result').result();

	$.datetimepicker.setLocale( T( 'lang' ) );
	$('input[type=datetime]').datetimepicker({ dayOfWeekStart: 1 });

});


