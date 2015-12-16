

// http://stackoverflow.com/a/18234317

if (!String.prototype.printf)
{
    String.prototype.printf = function()
    {
        var str = this.toString();
        if (!arguments.length)
            return str;
        var args = typeof arguments[0],
            args = (("string" == args || "number" == args) ? arguments : arguments[0]);
        for (arg in args)
            str = str.replace(RegExp("\\{" + arg + "\\}", "gi"), args[arg]);
        return str;
    }
}


function Cell( id, name, value, type, order )
{
	this.id			= id;
	this.name		= name;
	this.value		= value;
	this.type		= type ? type : 'text';
	this.order		= order;
	this.html		= {
		readwrite	: '<td class="{id}{order}">{value}</td>',
		newcell		: '<td class="{id} new">{value}</td>'
	}

	Cell.cell_definition[type].apply( this, arguments );	// upside down heritage ;)

	return this;
}

Cell.prototype.render = function( tpl )
{
	switch( tpl )
	{
		case "cell" :
		default :
			return this.html.readwrite.printf({ id:this.id, name:this.name, value:this.value, order:this.order });
			break;
			
		case "new" :
			return this.html.newcell.printf({ id:this.id, name:this.name, value:this.value, order:this.order });
	}
}

Cell.cell_definition = {};

Cell.register = function( name, funct )
{
	Cell.cell_definition[name] = funct;	
}

Cell.register('text', function()
{
	this.html.readwrite = '<td class="{id}"><input type="text" name="{id}{order}" value="{value}"/></td>';
	this.html.newcell = '<td class="{id}"><input type="text" name="{id}" value="{value}" class="new"/></td>';
})
/*
Cell.register('email', function()
{
	this.html.readwrite = '<td class="{id}"><input type="email" name="{id}{order}" value="{value}"/></td>';
	this.html.newcell = '<td class="{id}"><input type="email" name="{id}" value="{value}" class="new"/></td>';
})
*/

(function($){

	$.fn.spreadsheet=function( opt )
	{
		dataValidation = function()
		{
			if( typeof opt.data != "object" ) return false;
			if( ! opt.data.structure ) return false;
			if( typeof opt.data.structure != "object" ) return false;
			if( ! opt.data.data ) return false;
			if( typeof opt.data.data != "object" ) return false;
			
			return true;
		}
		
		genSpreadsheet = function()
		{
			if( ! dataValidation() ) return T('error_malformed_data');

			var header = '', body = '', footer = '';
			var numcol = opt.data.structure.length;

			header = '<tr class="title">';

			for( var i=0 ; i<opt.data.structure.length ; i++ )
			{
				header += '<td class="' + opt.data.structure[i].id + '">';
				header += opt.data.structure[i].name;
				header += '</td>';
			}
			header += '<td class="admin">&nbsp;</td>';
			header += '</tr>';

			for( var i=0 ; i<opt.data.data.length ; i++)
			{
				body += '<tr class="ID' + i + '">';
				
				for( var j=0 ; j<opt.data.data[i].length ; j++ )
				{
					body += new Cell(
						opt.data.structure[j].id,
						opt.data.structure[j].name,
						opt.data.data[i][j],
						opt.data.structure[j].type,
						i
					).render();
				}

				body += '<td class="admin"><input type="button" name="' + i + '" value="[-]" class="button delrow" /></td>';
				body += '</tr>';
			}
		
			footer = '<tr class="new">';

			for( var i=0 ; i<opt.data.structure.length ; i++ )
			{
				footer += new Cell(
					opt.data.structure[i].id,
					opt.data.structure[i].name,
					opt.data.structure[i].options.default,
					opt.data.structure[i].type,
					i
				).render('new');
			}
			footer += '<td class="admin"><input type="button" name="addrow" value="[+]" class="button addrow" /></td></tr>';

			return '<table class="qo-table readwrite">			\
					<thead>' + header + '</thead>						\
					<tbody>' + body + '</tbody>						\
					<tfoot>' + footer + '</tfoot>					\
				</table>';
		}
		
		addrow = function()
		{
			var html, name, type = '';

			var cells = $('.qo-table tfoot td>*').toArray();
			
			for( var i=0 ; i<cells.length ; i++ )
			{
				if( $(cells[i]).hasClass('addrow') ) break; // don't copy the cell which contains the [delete] button
				
				id = $(cells[i]).attr('name');
				type = $(cells[i]).attr('type');
				value =  $(cells[i]).val();
				
				html += new Cell( id, "", value, type, i ).render();
				
				// reset cell
				$(cells[i]).parent().replaceWith( new Cell( id, "", opt.data.structure[i].options.default, type, i ).render('new') );
			}

			lastID = $('.qo-table tbody tr:last-of-type');
			if( lastID.length )
			{
				lastID = parseInt( lastID.attr('class').replace('ID','') );
				lastID = ( typeof lastID=="number" ? lastID+1 : 0 );
			}
			else lastID = 0;

			html += '<td class="admin"><input type="button" name="' + lastID + '" value="[-]" class="button delrow" /></td>';

			$('.qo-table tbody').append( '<tr class="ID'+ lastID + '">' + html + '</tr>' );
			setColor();
		}
				
		delrow = function()
		{
			if( confirm(T('confirm_row-delete')) )
			{
				id = $(this).attr('name');
				$('.ID' + id).remove();
			}
		}
		
		setColor = function()
		{
			$('.qo-table td').removeClass('impair pair');
			$('.qo-table tr').each(function(){
				i = 0;
				$(this).find('td').each(function(){
					$(this).addClass( (i++%2?'pair':'impair') )	
				});
			})
		}
				
		save = function()
		{
			spreadsheet = [];

			var rows = self.find('tbody tr').toArray();

			for( var i=0 ; i<rows.length ; i++ )
			{
				cells = $(rows[i]).find('td>*:not(.delrow)').toArray();

				row = [];
				
				for( var j=0 ; j<cells.length ; j++ )
				{
					type=$(cells[j]).attr('type');
					value=(type=='checkbox' ? ($(cells[j]).is(':checked')?'on':'off') : $(cells[j]).val() );
					row.push(value);
				}
				spreadsheet.push( row );
			}

			opt.data.data = spreadsheet;
		}

		render = function()
		{
			self.html( genSpreadsheet() );
			setColor();
			
			self.delegate('.delrow', 'click', delrow);
			self.delegate('.addrow', 'click', addrow);
			$('body').delegate('.save','click', save);
		}
		
		destroy = function()
		{
			self.undelegate('.delrow', 'click');
			self.undelegate('.addrow', 'click');
			$('body').undelegate('.save','click');
			
			self.html('');
		}
		
		var self = $(this);

		var opt=$.extend({
			data:		null,
			destroy:	false
		},opt);

		if( opt.destroy )
		{
			destroy();
			return $(this);
		}
				
		render();
		
		return $(this);
	}

}(jQuery))




