jQuery( document ).ready( function( $ )
{

	function getSettings()
	{
		var length = Cookies.get('pwgenWEB_length');
		if( length !== undefined )
		{
			$( '#length' ).val( length );
		}

		var numerals = Cookies.get('pwgenWEB_numerals');
		if( numerals === undefined || numerals == 1 )
		{
			$( '#numerals' ).attr( 'checked', 'checked' );
		}
		else
		{
			$( '#numerals' ).removeAttr( 'checked' );
		}

		var capitalize = Cookies.get('pwgenWEB_capitalize');
		if( capitalize === undefined || capitalize == 1 )
		{
			$( '#capitalize' ).attr( 'checked', 'checked' );
		}
		else
		{
			$( '#capitalize' ).removeAttr( 'checked' );
		}

		var symbols = Cookies.get('pwgenWEB_symbols');
		if( symbols === undefined || symbols == 1 )
		{
			$( '#symbols' ).attr( 'checked', 'checked' );
		}
		else
		{
			$( '#symbols' ).removeAttr( 'checked' );
		}

		getPassword();
	}

	function getPassword()
	{
		$( '#pwgen-notify' ).html( '' );

		$( '.pwgen-button' ).prop( 'disabled', 'disabled');

		var length = $( '#length' ).val();
		Cookies.set('pwgenWEB_length', length, { expires: 365 });

		var capitalize = 0;
		if ($('#capitalize').is(':checked'))
		{
			capitalize = 1;
		}
		Cookies.set('pwgenWEB_capitalize', capitalize, { expires: 365 });

		var numerals = 0;
		if ($('#numerals').is(':checked'))
		{
			numerals = 1;
		}
		Cookies.set('pwgenWEB_numerals', numerals, { expires: 365 });

		var symbols = 0;
		if ($('#symbols').is(':checked'))
		{
			symbols = 1;
		}
		Cookies.set('pwgenWEB_symbols', symbols, { expires: 365 });

		var data = {
			length: length,
			capitalize: capitalize,
			numerals: numerals,
			symbols: symbols,
		};

		$.ajax({
			url: 'https://corenominal.org/wp-json/corenominal/pwgen',
			type: 'GET',
			dataType: 'json',
			data: data,
		})
		.done(function( data ) {
			$( '#password' ).val( data.password );
			$( '.pwgen-button' ).removeProp( 'disabled' );
			$( '#password' ).addClass( 'success' );
			setTimeout(function() {
				$( '#password' ).removeClass( 'success' );
			}, 500);
		})
		.fail(function() {
			console.log( "Error. Oops." );
		});
	}

	getSettings();
	

	$( document ).on( 'click', '#generate', function(e)
	{
		e.preventDefault();
		getPassword();
	});

	var clipboard = new Clipboard( '#copy' );

	clipboard.on('success', function(e)
	{
		alert  = '<div class="alert alert-success">';
		alert += '<i class="fa fa-check" aria-hidden="true"></i> Password copied to clipboard!'
		alert += '</div>';
		$( '#pwgen-notify' ).html( alert );

		e.clearSelection();
	});

	clipboard.on('error', function(e) {
		alert  = '<div class="alert alert-error">';
		alert += '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Browser feature not available, use Ctrl+c instead.'
		alert += '</div>';
		$( '#pwgen-notify' ).html( alert );
	});

	$( document ).on('keyup paste change focus click input', '#password', function(e)
	{
		e.preventDefault();
		var password = $( this ).val().trim();
		if( password === '' )
		{
			$( '#copy' ).prop( 'disabled', 'disabled');
		}
		else
		{
			$( '#copy' ).removeProp( 'disabled' );
		}
	});

});