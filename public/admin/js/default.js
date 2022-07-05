$(document).ready(function()
{

	$('.date').datepicker({  
		format: 'mm-dd-yyyy'
    });

    //
	$('.bdprice').click(function()
	{
		if($(this).is(":checked"))
		{
			$bdprice = $(this).val();

			//
			if( $bdprice == 1 )
			{
				$('.itemPrice').show();
				//$('.itemPrice input').attr('disabled', false);
			}
			else
			{
				$('.itemPrice').hide();
				//$('.itemPrice input').attr('disabled', true);
			}
		}
	});

	//
	var radioValue = $("input[name='break_down_price']:checked").val();
    if( radioValue == 1 )
	{
		$('.itemPrice').show();
		//$('.itemPrice input').attr('disabled', false);
	}
	else
	{
		$('.itemPrice').hide();
		//$('.itemPrice input').attr('disabled', true);
	}

})
