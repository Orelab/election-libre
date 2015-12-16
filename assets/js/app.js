
var T = function( key )
{
	return JSON.parse( $('#translations').html() )['js_'+key];
}


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


