<!-- Interface libs -->
<?php

function int_notify($text, $icon)
{
    echo "<script type='text/javascript'>
    	window.onload = function() {
        	$.notify({
            	icon: '$icon',
            	message: '$text',
            },{
                type: 'success',
                delay: 500,
                placement: {
		            from: 'bottom',
		            align: 'right'
	            },
            });
    	};
	</script>";
};

?>