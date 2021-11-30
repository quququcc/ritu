
const host = 'http://www.shangminghuai.com'

function ajax_post(url, allowAsync, formData, successCallback, errorCallback) {
    $.ajax({
        method: 'POST',
        url: url,
        dataType: 'JSON',
        async: allowAsync,
        data: formData,
        success: successCallback,
        error: errorCallback
    });
}

function ajax_get(url, allowAsync, formData, successCallback, errorCallback) {
    $.ajax({
        method: 'GET',
        url: url,
        dataType: 'JSON',
        async: allowAsync,
        data: formData,
        success: successCallback,
        error: errorCallback
    });
}