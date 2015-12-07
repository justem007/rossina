//Notificacoes
function notifyOk(message){
    $('.bottom-right').notify({
        message: { text: message}
    }).show();
}
function notifyError(error) {
    message = "";
    if (error.data != null)
        if (error.data.message != null)
            message += error.data.message;
    if (message == "")
        if (error.statusText != null)
            message = "Error: " + error.statusText;
    if (message == "")
        if (typeof error == "string")
            message = error;
    $('.bottom-right').notify({
        message: {text: message},
        type: 'danger',
    }).show();
    $('#loading').css('display', 'none');
};