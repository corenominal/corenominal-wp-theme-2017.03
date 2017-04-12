// For Search UX, sets character position in given element
jQuery.fn.selectRange = function(start, end)
{
    if(typeof end === 'undefined')
    {
        end = start;
    }
    return this.each(function()
    {
        if('selectionStart' in this)
        {
            this.selectionStart = start;
            this.selectionEnd = end;
        }
        else if(this.setSelectionRange)
        {
            this.setSelectionRange(start, end);
        }
        else if(this.createTextRange)
        {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};

(function( $ ) {
    $( window ).load( function(){
        // Open header and main
        $( '#banner' ).addClass( 'open' );
        $( '#main' ).addClass( 'open' );
    })
})( jQuery );

jQuery( document ).ready( function( $ )
{
    // Append burger for mobile navigation to main nav element
    $( '#navigation' ).append( '<button id="burger" class="mobile-only burger">&#x25BC;</button>' );

    // Mobile menu
    $( document ).on( 'click', '.burger', function( e )
    {
        e.preventDefault();
        $( '#burger' ).toggleClass( 'flip' );
        $( '#menu' ).toggleClass( 'open' );
    });

    // FitVids
    $( 'main' ).fitVids();

    // Search UX
    if( $( '#s' ).length > 0 )
    {
        var s = $( '#s' ).val();
        if( s != undefined && s.length > 0 )
        {
            s = s.trim();
            setTimeout(function()
            {
                $( '#s' ).focus();
            }, 500 ); // timeout required for weird Chrome bug
            if( s != '' )
            {
                var sl = s.length;
                $( '#s' ).focus();
                $( '#s' ).selectRange(sl);
            }
            
        }
        else
        {
            $( '#s' ).focus();
        }
    }
    $( '.search-form' ).on( 'submit',function(e)
    {
        var s = $( '#s' ).val().trim();
        if( s === '' )
        {
            $( '#s' ).val('');
            $( '#s' ).focus();
            e.preventDefault();
        }
    });

    // Send to contact page when clicking mailto link on frontpage
    $( document ).on( 'click', 'address .u-email', function( e )
    {
        e.preventDefault();
        window.location.href = "https://corenominal.org/contact";
    });

    // Prevent link titles from wrapping on the external link icon alone
	$('.post h1 a, .post h2 a').html(function()
	{
	    var icon = '[&nearr;]';
        if( $( this ).html().indexOf( '<span>' ) > -1 )
        {
            $( this ).children('span').remove();
            var text = $( this ).html();
            var text_single_word_title = text;
            text = text.trim().split(' ');
            if( text.length > 1 )
            {
                var last = text.pop();
                return text.join(" ") + (text.length > 0 ? ' <span class="nowrap">' + last + ' ' + icon + '</span>' : last);
            }
            else
            {
                return '<span class="nowrap">' + text_single_word_title + ' ' + icon + '</span>';
            }
        }
	});

    // Archives filter
    if( $( '#filter-archives' ).length > 0 )
    {
        setTimeout(function()
        {
            $( '#filter-archives' ).focus();
        }, 100 ); // timeout required for weird Chrome bug
    }
    $( '#filter-archives' ).on('input', function(e)
    {
        var filter = $(this).val().toLowerCase();
        if( filter === '' )
        {
            $( 'li.date' ).show();
            $( 'li.title' ).show();
        }
        else
        {
            $( 'li.title' ).each( function( i )
            {
                var haystack = $( this ).text().toLowerCase();
                if( haystack.indexOf( filter ) === -1 )
                {
                    $( this ).removeClass( 'result' );
                    $( this ).hide();
                }
                else
                {
                    $( this ).addClass( 'result' );
                    $( this ).show();
                }
            });
            $( 'ul.month' ).each( function( i )
            {
                month = $( this );
                var m = month.children('.result').length;
                if( m == 0 )
                {
                    month.hide();
                }
                else
                {
                    month.show();
                }
            });
        }
        var c = $( '.result' ).length;
        if( c === 0 )
        {
            if( $( '#no-results' ).length === 0 )
            {
                $( '.content' ).append( '<p id="no-results" class="search-no-results">Nothing, bupkis, dick, diddly-squat, zilch :(</div>' );
            }
        }
        else
        {
            $( '#no-results' ).remove();
        }
    });

    /**
     * Tag filter
     */
    if( $( '#filter-tags' ).length > 0 )
    {
        setTimeout(function()
        {
            $( '#filter-tags' ).focus();
        }, 100 ); // timeout required for weird Chrome bug
    }
    $( '#filter-tags' ).on('input', function(e)
    {
        var filter = $(this).val().toLowerCase();
        if( filter === '' )
        {
            $( '.tags li' ).show();
        }
        else
        {
            $( '.tags li' ).each( function( i )
            {
                var haystack = $( this ).text().toLowerCase();
                if( haystack.indexOf( filter ) === -1 )
                {
                    $( this ).removeClass( 'tag' );
                    $( this ).hide();
                }
                else
                {
                    $( this ).addClass( 'tag' );
                    $( this ).show();
                }
            });
        }
        var c = $( '.tag' ).length;
        if( c === 0 )
        {
            if( $( '#no-results' ).length === 0 )
            {
                $( '.content' ).append( '<p id="no-results" class="search-no-results">Nothing, bupkis, dick, diddly-squat, zilch :(</div>' );
            }
        }
        else
        {
            $( '#no-results' ).remove();
        }
    });

});
