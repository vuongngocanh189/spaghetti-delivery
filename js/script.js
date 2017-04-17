$(document).ready(function(){
     $('.overlay').css({"height":$(window).innerHeight()});
     $('.buy-btn').click(function(){
     	var spg = $(this).attr('value');
     	$('input#spg').val(spg);
     });

    $("#submit").click(function(e) {
    e.preventDefault();
    //ajax get responses for success or failure
    $.ajax({
        dataType: 'JSON',
        url:'sendmail.php',
        type:'POST',
        data: $("#send-order").serialize(),
        beforeSend: function(xhr) {$("#msg").append("<div class='alert alert-info'><i class='fa fa-spinner'></i> Sending...</div>");},
        success: function(response){
            $('#msg').html('');
            var signal = response['signal'];
            var msg = response['msg'];
                if (signal == 'ok') {
                    $('#msg').append("<div class='alert alert-success'><i class='fa fa-check'></i> "+ msg +"</div>");
                    //clear all fields
	                $('input').val(function() {
	                   return this.defaultValue;
	                });
                }else{
                // Failure message
                    $('#msg').append("<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> "+ msg +"</div>");
                }
        },
        error: function(){
            $('#msg').html('');
            $('#msg').append("<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Errors occur. Please try again.</div>");
        }
    });
    });
});