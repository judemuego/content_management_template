
var delete_func = null;
var record_id = null;


toastr.options.positionClass = 'toast-bottom-right';

var scion = {
    record: {
        delete(url, id, success, error) {
            $('#deleteMessage').modal('show');
            return {
                yes: function() {
                    $.get(url+"/"+id, { "_token": "{{csrf_token()}}" })
                    .done(function(response) {
                        if(typeof(success) != "undefined"){
                            success();
                        }
                        $('#deleteMessage').modal('hide');
                        toastr.success(response);
                    })
                    .fail(function() {
                        if(typeof(error) != "undefined"){
                            error();
                        }
                    });
                }
            }
        },
        add(url, form_data, success, error) {
            $.post(url, form_data)
            .done(function(response) {
                if(typeof(success) != "undefined"){
                    success(response);
                }
                toastr.success('Record Saved!');
            })
            .fail(function(response) {
                if(typeof(error) != "undefined"){
                    error();
                }
                
                for (field in response.responseJSON.errors) {
                    $('#'+field).nextAll().remove();
                    $('#'+field).after('<span class="error-message">'+response.responseJSON.errors[field][0]+'</span>');
                }

                toastr.error(response.responseJSON.message);
            });
        },
        update(url, id, form_data, success, error) {
            $.post(url+"/"+id, form_data)
            .done(function(response) {
                if(typeof(success) != "undefined"){
                    success();
                }
                toastr.success(response);
            })
            .fail(function() {
                if(typeof(error) != "undefined"){
                    error();
                }
                toastr.error('Error');
            });
        },
        get() {
            
        }
    },
    deleteMessage(id) {

        // scion.record.delete()
    },
    create: {
        random(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }

            return result;
        }
    }
}