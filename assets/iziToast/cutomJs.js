function error(tittle, isi) {
    
    iziToast.error({
    timeout: 3100,
    position: 'topRight',
    title: tittle,
    message: isi,
    });

}

function success(tittle, isi) {
    
    iziToast.success({
    timeout: 3100,
    position: 'topRight',
    title: tittle,
    message: isi,
    });

}

function warning(tittle, isi) {

    iziToast.warning({
    timeout: 3100,
    position: 'topRight',
    title: tittle,
    message: isi,
    });
    
}

function info(tittle, isi) {
    iziToast.info({
    timeout: 3100,
    position: 'topRight',
    title: tittle,
    message: isi,
    });
}