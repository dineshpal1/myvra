setTimeout(function () {
  showHideLoader();
}, 100);

function showHideLoader(f) {
	if(typeof f == 'undefined' || f==0) {
		jQuery('.preLoader').fadeOut('slow', function() {
			jQuery(this).hide();
		});	
	} else {
		jQuery('.preLoader').fadeOut('slow', function() {
			jQuery(this).show();
		});	
	}
}

function showFieldErrors(property, arrAllErrors, argRegister = null) {
    var arrError = [];
    if (arrAllErrors) {
        $.each(arrAllErrors, function (key) {
            arrError.push(key);
        });

    }

    if (arrError) {
        $(property).each(function (index, value) {
            if ($.inArray($(this).attr('name'), arrError) != '-1') {
                $(this).addClass('hasErrors');
                $('#' + $(this).attr('name') + (argRegister && argRegister != null ? argRegister : '') + '_error').addClass('d-block');
                $('#' + $(this).attr('name') + (argRegister && argRegister != null ? argRegister : '') + '_error').html(arrAllErrors[$(this).attr('name')]);
                $('#' + $(this).attr('name') + '_error').addClass('d-block');
                $('#' + $(this).attr('name') + '_error').show();
                $(this).focus();
            } else {
                $('#' + $(this).attr('name') + (argRegister && argRegister != null ? argRegister : '') + '_error').removeClass('d-block');
                $('#' + $(this).attr('name') + (argRegister && argRegister != null ? argRegister : '') + '_error').html();
            	$('#' + $(this).attr('name') + '_error').removeClass('d-block');
                $('#' + $(this).attr('name') + '_error').hide();
                $(this).removeClass('hasErrors');
                $('#' + $(this).attr('name') + '_error').html('');
            }
        });
    }
}

function removeAllFieldsErrors(property, argRegister = null) {
    $('#err_toastr' + argRegister).addClass('d-none').removeClass('d-block');
    $(property).each(function () {
        $(this).removeClass('hasErrors');
        $('#' + $(this).attr('name') + (argRegister && argRegister != null ? argRegister : '') + '_error').removeClass('d-block');
        $('#' + $(this).attr('name') + (argRegister && argRegister != null ? argRegister : '') + '_error').html();
    });
}

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
            showHideLoader(1);
        },
        success: function (res) {
            showHideLoader();
            callback(res, null);
        }, error: function (data) {
            showHideLoader();
            callback(null, data);
        }
    });
}

jQuery(document).ready(function () {
    jQuery('#btn_login').click(function (e) {
    	var form_id = 'frm_login';
    	var form = jQuery("#" + form_id);
        var url = form.attr('action');
        var data = form.serialize();

        var data = new FormData(form[0]);

        removeAllFieldsErrors('.login-page', '_login');
        
        ajaxRequest(url, data, 'POST', function (res, err) {
            var arrError = {};

            if (res) {
                if(typeof res.errors != 'undefined') { 
	                jQuery.each(res.errors, function (key, value) {
	                	arrError[key] = value;
	                });

	                if (arrError) {
	                    showFieldErrors('.login-page', arrError, '_login');
	                }
	            } else {

                    if (res.isIncorrectCredentials) {
                        showMessage('_login', 'error', res.message[0]);
                    } else {
                    	window.location.href = '/home';
                    	return false;
                    }     
                }           
            }
        });
    });


    jQuery('#btn_register').click(function (e) {
        var form_id = 'frm_register';
        var form = jQuery("#" + form_id);
        var url = form.attr('action');
        var data = form.serialize();

        var data = new FormData(form[0]);

        removeAllFieldsErrors('.register-page', '_register');
        
        ajaxRequest(url, data, 'POST', function (res, err) {
            var arrError = {};

            if (res) {
                if(typeof res.errors != 'undefined') { 
                    jQuery.each(res.errors, function (key, value) {
                        arrError[key] = value;
                    });

                    if (arrError) {
                        showFieldErrors('.register-page', arrError, '_register');
                    }
                }

                if (res.isRegistered) {
                    //showMessage('_register', 'success', res.message[0]);
                    window.location.href = '/register';
                    return false;
                }         
            }
        });
    });

    jQuery('#btn_forgot_password').click(function (e) {
        var form_id = 'frm_forgot_password';
        var form = jQuery("#" + form_id);
        var url = form.attr('action');

        var data = new FormData(form[0]);

        removeAllFieldsErrors('.forgot-page', '_forgot');
        
        ajaxRequest(url, data, 'POST', function (res, err) {
            var arrError = {};

            if (res) {
                if(typeof res.errors != 'undefined') { 
                    jQuery.each(res.errors, function (key, value) {
                        arrError[key] = value;
                    });

                    if (arrError) {
                        showFieldErrors('.forgot-page', arrError, '_forgot');
                    }
                }

                if (res.isForgotPassword) {
                    showMessage('_forgot', 'success', res.message[0]);
                }
                if (!res.isForgotPassword) {
                    showMessage('_forgot', 'error', res.message[0]);
                }
            }
        });
    });

    jQuery('#country_id').change(function(e) {
        var cid = jQuery(this).val();
        if(cid) {
            ajaxRequest('states/'+cid, null, 'GET', function (res, err) {
                if(res)
                {
                    //var res = JSON.parse(res);
                    jQuery("#state_id").empty();
                    jQuery("#state_id").append('<option>Select State</option>');
                    jQuery.each(res.data, function(key, value) {
                        jQuery("#state_id").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
            });
        }
    });

    $('#btn_refresh_captcha').click(function(){
      $.ajax({
         type:'GET',
         url:'refreshCaptcha',
         success:function(data){
            $(".captcha").html(data.captcha);
         }
      });
    });
});



function showMessage(c, t, msg=null) {
    if(t == 'success') {
        $('#err_toastr' + c).removeClass('alert-danger');
        $('#err_toastr' + c).addClass('alert-success');
    } else {
        $('#err_toastr' + c).removeClass('alert-success');
        $('#err_toastr' + c).addClass('alert-danger');
    }
	if($('#err_toastr' + c).hasClass('d-block')) {
        $('#err_toastr' + c).removeClass('d-block');
		$('#err_toastr' + c).addClass('d-none');
		$('#err_toastr' + c).html('');
	}

	if($('#err_toastr' + c).hasClass('d-none')) {
		$('#err_toastr' + c).removeClass('d-none');
		$('#err_toastr' + c).addClass('d-block');
		$('#err_toastr' + c).html(msg);
    }
    
    // Function to Login forgot reset Page


}

$(document).on('click', '#adminloginbtn', function (e) {
//    alert('hii');
    var form_id = $(this).attr('form_id');
    var form = $("#" + form_id);
    var url = form.attr('action');
    var data = new FormData($("#" + form_id)[0]);
    console.log(data)
    removeAllFieldsErrors('.admin-page', '_login');
    ajaxRequest(url, data, 'post', function (res, err) {
        var arrError = {};

            if (res) {
                if(typeof res.errors != 'undefined') { 
                    jQuery.each(res.errors, function (key, value) {
                        arrError[key] = value;
                    });

                    if (arrError) {
                        showFieldErrors('.admin-page', arrError, '_login');
                    }
                }

                if (res.isForgotPassword) {
                    showMessage('_login', 'success', res.message[0]);
                }
                if (!res.isForgotPassword) {
                    showMessage('_login', 'error', res.message[0]);
                }
            }
    });
});
