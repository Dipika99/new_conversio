$(document).ready(function() {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    //validation regex
	var email_pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    var phone_pattern =  /^[0-9]{8,10}$/;
    var domain_name_pattern = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+$/

    $(".next").click(function(e) {
        if (!checkValidation()) {
            return;
        }
        if($(this).hasClass('submit')){
        	submitForm();
        	return;
        }
        current_fs = $(this).parents().closest("fieldset");
        next_fs = $(this).parents().closest("fieldset").next();

        //Add Class Active
        var next_index = $("fieldset").index(next_fs);
        showTab(current_fs, next_fs, next_index);	
    });


    $(".steps").click(function(e) {
    	if (!checkValidation()) {
            return;
        }        
        var current_index = $('.steps').index(this);
        current_fs = $('fieldset:visible');
        next_fs = $("fieldset").eq(current_index);
        showTab(current_fs, next_fs, current_index);
    });

    function showTab(current_fs, next_fs, next_index) {   
        $("#progressbar li").eq(next_index).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });            },
            duration: 600
        });
    }

    function checkValidation() {
        let allAreFilled = true;

        document.getElementById("msform").querySelectorAll("[required]").forEach(function(i) {

            $(i).parent().find('span.text-danger').remove();
            $(i).removeClass('is-invalid');
            
            var field_name = $(i).attr('name').replace("_", " ").replace("id", "");

            if ($(i).is(':visible')) {           

	            if (!i.value) {
                    allAreFilled = false;
                    $(i).addClass('is-invalid');
                    $("<span class='text-danger'>The "+field_name+" field is required.</span>").insertAfter(i);
	            }

	            if(i.type == "email" && i.value){
	            	if(!email_pattern.test(i.value)){
	            		allAreFilled = false;
	            		$(i).parent().find('span.text-danger').remove();
                        $(i).addClass('is-invalid');
  						$("<span class='text-danger'>The email format is not valid.</span>").insertAfter(i);
	           
	            	}
	            }

                if($(i).attr('name') == "password" && i.value){
                    if(i.value.length<5){
                        allAreFilled = false;
                        $(i).parent().find('span.text-danger').remove();
                        $(i).addClass('is-invalid');
                        $("<span class='text-danger'>The password must be at least 5 characters.</span>").insertAfter(i);
               
                    }
                }

                if($(i).attr('name') == "domain_name" && i.value){
                    if(!domain_name_pattern.test(i.value)){
                        allAreFilled = false;
                        $(i).parent().find('span.text-danger').remove();
                        $(i).addClass('is-invalid');
                           $("<span class='text-danger'>The doamin name format is not valid.</span>").insertAfter(i);
               
                    }
                }

                if($(i).attr('name') == "password_confirmation" && i.value && $('input[name="password"]').val()){

                    if($('input[name="password"]').val()!=i.value){
                        allAreFilled = false;
                        $(i).parent().find('span.text-danger').remove();
                        $(i).addClass('is-invalid');
                           $("<span class='text-danger'>The confirm password does not match.</span>").insertAfter(i);
               
                    }
                }

	            if (i.type === "radio") {
	                let radioValueCheck = false;
	                document.getElementById("msform").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
	                    if (r.checked) radioValueCheck = true;
	                });

	                allAreFilled = radioValueCheck;
	                if (!allAreFilled) {
                        $(i).addClass('is-invalid');
	                    $("<span class='text-danger'>This field is required.</span>").insertAfter(i);
	                }	                
	            }
        	}
        });
        
        var phone = $('input[name="phone"]');

        if (phone.is(':visible') && phone.val()) {
            if(!phone_pattern.test(phone.val())){

                allAreFilled = false;
                phone.parent().find('span.text-danger').remove();
                phone.addClass('is-invalid');
                $("<span class='text-danger'>The phoner format is not valid.</span>").insertAfter(phone);
       
            }
        }

        return allAreFilled;
    };

    function submitForm(){
    	$('#msform').submit();
    }

    $(".previous").click(function(){    
    if (!checkValidation()) {
        return;
    }

    current_fs = $(this).parents().closest("fieldset");
    next_fs = $(this).parents().closest("fieldset").prev();
    
    //Add Class Active
    var next_index = $("fieldset").index(next_fs);
    showTab(current_fs, next_fs, next_index);    
    });

    // $('.radio-group .radio').click(function(){
    // 	$(this).parent().find('.radio').removeClass('selected');
    // 	$(this).addClass('selected');
    // });
});