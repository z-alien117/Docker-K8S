function openModal(url, btn, text){
    disable_btn(btn);
    $.get(url, function (response){
        $('#DynamicModal').html(response.view);
        $('#largeModal').modal('show');
        enable_btn(btn, text);
        // console.log(response);
    })
}

function openModalAsync(url, btn, text) {
    return new Promise(resolve => {
        disable_btn(btn);
        $.get(url, function (response) {
            $('#DynamicModal').html(response.view);
            $('#largeModal').modal('show');
            enable_btn(btn, text);
            resolve('resolved');
        });
    })
}

function hideModal(){
    $('#largeModal').modal('hide');
}

function enable_btn(btn, text) {
    btn.prop('disabled', false);
    btn.html(text);
}

function disable_btn(btn) {
    btn.prop('disabled', true);
    btn.html('<i class="fas fa-spinner fa-spin"></i> Wait...');
}