$("body").on("contextmenu", "img", function(e) {
    return false;
});
var audio = document.getElementById("audio");
$('img').attr('draggable', false);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $(window).keydown(function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            // load_list(1);
        }
    });
});
let page;
$(window).on('hashchange', function() {
    if (window.location.hash) {
        page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            load_list(page);
        }
    }
});
$(document).ready(function() {
    $(document).on('click', '.paginasi', function(event) {
        event.preventDefault();
        $('.paginasi').removeClass('active');
        $(this).parent('.paginasi').addClass('active');
        // var myurl = $(this).attr('href');
        page = $(this).attr('halaman').split('page=')[1];
        load_list(page);
    });
});
function main_content(obj){
    $("#content_list").hide();
    $("#content_input").hide();
    $("#" + obj).show();
}
function load_list(page){
    $.get('?page=' + page, $('#content_filter').serialize(), function(result) {
        $('#list_result').html(result);
        main_content('content_list');
    }, "html");
}
function load_input(url){
    $.get(url, {}, function(result) {
        $('#content_input').html(result);
        main_content('content_input');
    }, "html");
}
function handle_open_modal(url,modal,content){
    $.ajax({
        type: "POST",
        url: url,
        success: function (html) {
            $(modal).modal('show');
            $(content).html(html);
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}
function handle_save(tombol, form, url, method){
    $(tombol).submit(function() {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function() {

        },
        success: function(response) {
            if (response.alert == "success") {
                success_toastr(response.message);
                $(form)[0].reset();
                $(tombol).prop("disabled", false);
                if(response.redirect == "input"){
                    load_input(response.route);
                }else if(response.redirect == "reload"){
                    location.reload();
                }else{
                    setTimeout(function() {
                        load_list(1);
                    }, 2000);
                }
            } else {
                error_toastr(response.message);
                setTimeout(function() {
                    $(tombol).prop("disabled", false);
                }, 2000);
            }
        },
    });
}
function handle_confirm(title, confirm_title, deny_title, method, route){
    Swal.fire({
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: confirm_title,
        denyButtonText: deny_title,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: method,
                url: route,
                dataType: 'json',
                success: function(response) {
                    if(response.redirect == "cart"){
                        load_cart(localStorage.getItem("route_cart"));
                    }else if(response.redirect == "reload"){
                        location.reload();
                    }else{
                        load_list(1);
                    }
                    Swal.fire(response.message, '', response.alert)
                }
            });
        } else if (result.isDenied) {
            Swal.fire('Konfirmasi dibatalkan', '', 'info')
        }
    });
}
function handle_upload(tombol, form, url, method){
    $(document).one('submit', form, function(e) {
        let data = new FormData(this);
        data.append('_method', method);
        $(tombol).prop("disabled", true);
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(response) {
                if (response.alert == "success") {
                    success_toastr(response.message);
                    $(form)[0].reset();
                    load_list(1);
                } else {
                    error_toastr(response.message);
                    setTimeout(function() {
                        $(tombol).prop("disabled", false);
                    }, 2000);
                }
            },
        });
        return false;
    });
}
function handle_download(tombol,url){
    $(tombol).prop("disabled", true);
    $(tombol).attr("data-kt-indicator", "on");
    $.get(url, function(result) {
        if (result.alert == "success") {
            // $(download).attr({target: '_blank', href  : result.url, 'download' : result.url});
            // var href = $('.cssbuttongo').attr('href');
            window.open(result.url, '_blank');
            window.open(result.url1, '_blank');
            window.open(result.url2, '_blank');
            Swal.fire({ text: result.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } }).then(function() {
                load_list(1);
            });
        }else{
            Swal.fire({ text: result.message, icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, Mengerti!", customClass: { confirmButton: "btn btn-primary" } });
        }
        $(tombol).prop("disabled", false);
        $(tombol).removeAttr("data-kt-indicator");
    }, "json");
}