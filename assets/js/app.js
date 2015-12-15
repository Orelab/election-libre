

$(document).ready(function()
{
	ROOT = $('#js-site-root').html();
	
	$('#lang').lang();
	$('#manage').manage();
	$('#choices').candidate();
	$('#electors').elector();
	$('#vote').vote();
	$('#dashboard').admin();
	$('*[title]').tooltip();
	$('body').radio();
	$('#result').result();

	$.datetimepicker.setLocale( 'fr' );
	$('input[type=datetime]').datetimepicker({ dayOfWeekStart: 1 });

});



