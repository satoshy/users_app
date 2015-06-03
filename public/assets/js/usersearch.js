$(document).ready(function(){
function findname(){
    $('#signup').submit(function() {

    var form_data= $( this ).serialize();

    var username = $("#username").val();
    if (username == "") {
        $('#username').focus();
        return false;
    } 
    else
    {
        $.ajax({
            type:'POST',
            url: '/user/findname',
            data: form_data,
            dataType: 'json',
            success: function( response ){
                console.log(response);
            }
            
        });
    }
    });
}

//'X-CSRF-Token': $('input[name="_token"]').val()*/