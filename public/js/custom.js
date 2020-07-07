function parseError(jsonstring) {
    var msg = '';
    var jsonResponse = jsonstring.responseJSON;
    if (jsonResponse){
        jsonResponse = jsonResponse.message;
        jsonResponse = jsonResponse.split('#');
        msg = '<ul>';
        $.each(jsonResponse,function (i,v) {
            msg += '<li>'+v+'</li>';
        });
        msg += '</ul>';
    }
    return msg;
}