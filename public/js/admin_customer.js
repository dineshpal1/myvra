
//Function to Ajax Request
function ajaxRequest(url, data, method, callback) {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery.ajax({
        url: url,
        method: method,
        data: data,
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(".preLoader").show();
            console.log('Ajax started');
        },
        success: function (res) {
            $(".preLoader").hide();
            console.log('Ajax Ended');
            callback(res, null);
        }, error: function (data) {
            $(".preLoader").hide();
            console.log('Ajax Ended');
            callback(null, data);
        }
    });

    // callback(null, 'err');
}

//function to get table data
function getTableData(url, id, isTable = null) {

    console.log(url, 'get data url');
    console.log(id, 'table id');
    // console.log(isTable,'dsdssds')
    ajaxRequest(url, [], 'get', function (res, err) {
        // console.log(res, 'res');
        if (isTable) { // when not a table
            $("#" + id).html(res.html);

        } else {// when need to apend in a table
            $("#" + id + ' tbody').html(res.label);
        }
    });
}

//function to render html returned from function in element 
function renderAjaxContent(url, element, param = null, param2=null ,isValue = null) {
    console.log(url,'url');
    console.log(element,'elemnt');
    console.log(param,'param');
    url = url + (param ? '/' + param : '');       
    url = url  +(param2?'/'+param2:'');
    console.log(url)
    ajaxRequest(url, [], 'get', function (res, err) {
        if (isValue) {//is there is some value in isvalue param we will set value of element
            $(element).val(res.html);
        } else {
            $(element).html(res.html);  
        }
    });
    return true;
}

// For Delete Function

function deleteRequest(url, id, tableContentUrl = null, tableId = null, contentId = null, page = null, customerId = null) {
    console.log(id, 'delete id');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true,
        confirmButtonColor: '#e1000a',
        cancelButtonColor: 'gray'
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: false
    }).then((result) => {
        if (result.value) {
            var data = new FormData();
            data.append("id", id);
            console.log(id)
            ajaxRequest(url, data, "post", function (res, err) {

                if (res.success == true) {

                    if (contentId) {
                        getTableData(tableContentUrl, tableId, '1');
                    } else {
                        getTableData(tableContentUrl, tableId);
                    }
                    toastr.error('Data Deleted Successfully!!');

                } else {

                    toastr.warning('Somthing Wrong!!');
                }
            });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your Record has been deleted.',
                'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your Record is safe :)',
                'error'
            )
        }
    })

}

//function for multiple check

function applyAction(url = null, action = null, tableContentUrl = null, tableId = null) {
    console.log(url);
    console.log(action);
    var allVals = [];
    $(".sub_chk:checked").each(function () {
        allVals.push($(this).attr('data-id'));
    });
    console.log(allVals)

    if (allVals.length <= 0) {
        toastr.warning('Please Check atleast one Record!!')
    } else {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true,
            confirmButtonColor: '#e1000a',
            cancelButtonColor: 'gray'
        });
        swalWithBootstrapButtons.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Save`,
            confirmButtonColor: `#e1000a`,
            denyButtonText: `Don't save`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var check = swalWithBootstrapButtons.fire('Saved!', '', 'success')

                // if (check == true) {
                var join_selected_values = allVals.join(",");
                console.log(join_selected_values);
                var data = new FormData();
                data.append('ids', join_selected_values);
                data.append('action', action)
                ajaxRequest(url, data, 'post', function (res, err) {
                    console.log(data);
                    if (res) {
                        jQuery.each(res.errors, function (key, value) {
                            if (res.success == false) {
                            } else if (res.success == true) {
                                toastr.success('Data has been updated');
                                getTableData(tableContentUrl, tableId, '1');
                            }
                        });
                    }
                });
            } else if (result.isDenied) {
                swalWithBootstrapButtons.fire('Changes are not saved', '', 'info')
            }
            $('.master').prop('checked', false);
            $('.sub_chk').prop('checked', false);
        })

    }
}

// function to show the field errors
function showFieldErrors(parent, property, arrAllErrors, argRegister = null) {
    console.log(arrAllErrors, 'errors');
    var arrError = [];
    if (arrAllErrors) {
        $.each(arrAllErrors, function (key) {
            arrError.push(key);
        });

    }


    $(parent).find(property).each(function (index, value) {
        if ($.inArray($(this).attr('id'), arrError) != '-1') {
            console.log(arrError);
            $(this).addClass('hasErrors');
            $('#' + $(this).attr('id') + (argRegister && argRegister != null ? argRegister : '') + '_error').html(arrAllErrors[$(this).attr('id')][0]);

            $('#' + $(this).attr('id') + (argRegister && argRegister != null ? argRegister : '') + '_error').show();
            $(this).focus();
        } else {
            $('#' + $(this).attr('id') + (argRegister && argRegister != null ? argRegister : '') + '_error').hide();
            $(this).removeClass('hasErrors');
            $('#' + $(this).attr('id') + (argRegister && argRegister != null ? argRegister : '') + '_error').html('');

        }
    });
    // }
}

//funcion to remove errors from all fields
function removeAllFieldsErrors(property) {
    $(property).each(function () {
        $(this).removeClass('hasErrors');
        $(this).siblings('.hasTextErrors').html('');


    });
}

function jqueryDatepicker(id) {
    $('#' + id).datepicker({
        autoclose: true,
        maxDate: new Date(),
        format: 'dd-mm-yyyy',

    });
}
// For Amin login
$(document).on('click', '#adminloginbtn', function (e) {

    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(url)

    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;

                if (res.success == false) {
                    if (res.isIncorrectCredentials == true) {
                        toastr.error('Incorrect');
                    };
                } else if (res.success == true) {
                    window.location.assign('dashboard')
                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

// for forgot password

$(document).on('click', '#frgtbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;

                if (res.success == false) {
                    toastr.error('Email not Matched !!');
                } else if (res.success == true) {
                    toastr.success('Email of Reset Password link has been sent to Your Email')
                    setTimeout(() => {
                        window.location.assign('/admin/login')
                    }, 1000);

                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

// for reset password
$(document).on('click', '#resetpasswordbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;

                if (res.success == false) {
                    if (res.invalidUrl == true) {
                        toastr.error(res.toasterMessage);
                    }
                } else if (res.success == true) {
                    toastr.success(res.toasterMessage);
                    setTimeout(() => {
                        window.location.assign('dashboard');

                    }, 1000);

                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

// for country
$(document).on('click', '#countrybtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;

                if (res.success == false) {
                    // if (res.invalidUrl == true) {
                    //     toastr.error(res.toasterMessage);
                    // }
                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/country');
                    }, 1000);

                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});
// for state
$(document).on('click', '#statebtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;

                if (res.success == false) {
                    // if (res.invalidUrl == true) {
                    //     toastr.error(res.toasterMessage);
                    // }
                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/state');
                    }, 1000);
                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

//for brand
$(document).on('click', '#brandbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;
                if (res.success == false) {
                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/brand');
                    }, 1000);
                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});
//for measure unit
$(document).on('click', '#measureunitbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;
                if (res.success == false) {
                } else if (res.success == true) {

                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/measure_unit');
                    }, 1000);


                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

function filter(url, id, istable = null, sortBy = null, sortOrder = null, search = null) {

    url = url + '/' + (sortBy ? sortBy : 'created_at') + '/' + (sortOrder ? sortOrder : 'desc') + '/' + search;
    getTableData(url, id, istable);
}


//for Item class
$(document).on('click', '#itemclassbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;
                if (res.success == false) {
                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/item_class');
                    }, 1000);
                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

//for Customer
$(document).on('click', '#customerbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;
                if (res.success == false) {
                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/customer');
                    }, 1000);

                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});
//for Change Password
$(document).on('click', '#changpassbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;
                if (res.success == false) {
                    if (res.isMatch == false) {
                        toastr.error('Old Password not Matched');
                    }
                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/dashboard');
                    }, 1000);

                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

//for vendor
$(document).on('click', '#vendorbtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;
                if (res.success == false) {

                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                        var url = window.location.origin;
                        window.location.assign(url + '/admin/vendor');
                    }, 1000);

                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});

//for vendor item
$(document).on('click', '#vendoritembtn', function (e) {
    e.preventDefault();
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data);
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};
        console.log(res)
        if (res) {

            jQuery.each(res.errors, function (key, value) {
                arrError[key] = value;
                if (res.success == false) {

                } else if (res.success == true) {
                    toastr.success(res.tosatrMessage);
                    setTimeout(() => {
                       // var url = window.location.origin;
                        window.location.assign(res.url);
                    }, 1000);

                }
            });
            // console.log(arrError)
            if (arrError) {
                showFieldErrors(('#' + form_id), '.form-control', arrError);
            }
        }
    });
});


