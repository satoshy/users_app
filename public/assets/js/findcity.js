$(document).ready(function(){
    $('#city').tokenInput('/user/findcity',
       { 
        queryParam: "city",
        contentType: "json",
        noResultsText: "Nothin' found.",
     }); 
});