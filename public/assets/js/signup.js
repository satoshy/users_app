$(document).ready(function(){
	$("#signup").submit(function() {
    	var form_data= $( this ).serialize();
    
        $.ajax({
            url: '/auth/signup',
            type: 'POST',
            data: form_data,
            dataType: 'json',
            success: function( response ){
                console.log(response);
        	}
    });
});
});