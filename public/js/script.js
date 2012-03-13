$(document).ready(function()
{
    $('#cardName').autocomplete(
    {
        source:    '/priceNameSearch.php',
        minLength: 2
    });

    $('#textCardName').autocomplete(
    {
        source:     '/textNameSearch.php',
        minLength:  2
    });

    $('#doTextSearch').live('click', function(e)
	{
		doTextSearch(e);
	});
	$('#textSearchForm').live('submit', function(e)
	{
		doTextSearch(e);
	});

    $('#doPriceSearch').live('click', function(e)
	{
		doPriceSearch(e);
	});
	$('#priceSearchForm').live('submit', function(e)
	{
		doPriceSearch(e);
	});

    $('#doPriceAlert').live('click', function(e)
	{
		doPriceAlert(e);
	});
	$('#priceAlertForm').live('submit', function(e)
	{
		doPriceAlert(e);
	});


    $('#doCardAdd').live("click", function()
    {
        if($('#cardName').val() == '')
        {
            $('#error').append('<h1 class="error">Please enter a card name.</h1>');
            $('#error').fadeOut(5000, "linear");
        }

        else
        {
            var selector = $('#cardOwner').val();
            selector = $('#' + selector);

            // Get the card's value.
            var uri = 'http://magically/pricedata/' + encodeURIComponent($('#cardName').val()) + '/' + $('#cardType').val() + '/json';

            var cardPrices = $.getJSON(uri, function(data)
            {
                
            });

            // Add the cards to the list.
            selector.append("<li>hello</li>");

            // Add this card's value to the comparison array.

            // Update the trade comparison.

            selector.listview('refresh');
        }
    });
});

function doTextSearch(event)
{
	if($('#textCardName').val() != '')
    {
    	$('#textData').html('Loading card\'s text...');

       url = '/textdata/' + encodeURIComponent($('#textCardName').val()) + '/html';

       $('#textData').load(url, function()
       {
       });
	}

   	else
   	{
		$('#textData').html('<h1 class="error">Please enter a card name.</h1>');
    }

    event.preventDefault();
    return false;
}

function doPriceSearch(event)
{
	if($('#cardName').val() != '')
    {
    	$('#priceData').html('Loading price data...');

       url = '/pricedata/' + encodeURIComponent($('#cardName').val()) + '/' + encodeURIComponent($('#cardType').val()) + '/0/0/html';

    	$('#priceData').load(url, function()
		{
    		$('.inlinesparkline').sparkline('html', {type: 'line', lineColor: 'blue', width: '100%', height: '10%', spotRadius: '2.5', lineWidth: '2'});
		});
	}

   	else
   	{
   		$('#priceData').html('<h1 class="error">Please enter a card name.</h1>');
   	}

	event.preventDefault();
	return false;
}


function doPriceAlert(event) {
	if($('#emailAddress').val() == '')
    {
    	$('#alertStatus').html('<h1 class="error">Please enter an email address.</h1>');
    }

    else if($('#cardName').val() == '')
    {
    	$('#alertStatus').html('<h1 class="error">Please enter a card name.</h1>');
    }

    else if($('#price').val() == '')
    {
    	$('#alertStatus').html('<h1 class="error">Please enter a price.</h1>');
    }

    else
    {
    	uri = '/alerts/' + encodeURIComponent($('#emailAddress').val()) + '/' + encodeURIComponent($('#cardName').val())
       	    + '/' + encodeURIComponent($('#cardType').val()) + '/' + encodeURIComponent($('#priceDirection').val()) + '/' + encodeURIComponent($('#price').val());

        $('#alertStatus').load(uri, function()
        {
        });
	}

	event.preventDefault();
	return false;
}
