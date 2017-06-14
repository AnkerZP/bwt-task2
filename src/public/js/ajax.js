$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$( document ).ready(function() {
    var clear = false;
    isShow();

    $('#saveData').click(function () {
        saveData('#form1','save');
    });

    $('#saveData2').click(function() {
        saveData2('#form2','save2');
        hideForm('form2');
        hideForm('imageLoader');
        showForm('form3');    
    });

    $(function(){
        $("#image").change(
           function(){
               uploadPhoto();
          });
    });

    $("#phone").change(function(){
        var minPhone = 16;
        if( $('#phone').val().length < minPhone ) {
            document.getElementById('phone').value ="";
            return false;
        }
    });

    $(".setVisibility").change(function() {
        if(this.checked == false) {
            var chkVal = parseInt($(this).attr("value"));
            $.ajax({
                url: 'visible',
                type: 'post',
                data: { id: chkVal, status: 'hide' },
            });
        }else{
            var chkVal = $(this).attr("value");
            $.ajax({
                url: 'visible',
                type: 'post',
                data: { id: chkVal, status: 'show' },
            });
        }
    });

    $("#email").keyup(
        function(){
            var re, email, isValid;
            re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            email = $("#email").val();      
            isValid = re.test(email);
            if(isValid == false){
                document.getElementById('isValid').innerHTML ="<p><font color='#a94442'>Incorrect email address, please use the following format: test@site.com.</font></p>";
                clear = true;
            }
            if(isValid == true){
                emailCheck();   
                clear = false;
            }            
        } 
    );

    $("#email").change(
        function(){
            emailCheck();
            clear
            if(clear == true){
                $("#email").val('');
            }
        }
    );

    $("#birthday").keypress(
        function(eventObject){
            var text = document.getElementById("birthday"),
                testText;
            var char = eventObject.which;
            text.onkeyup =  function testKey(){
                var testText = text.value;
                if ((char > 31 && char < 46) || (char == 47) || (char > 57)){
                    text.value = testText.substring(0, testText.length - 1) 
                }
            }
        } 
    );

    $("#birthday").change(function(){
        var lenBr = 10;
        if( $('#birthday').val().length != lenBr ) {
            $("#birthday").val('');  
        } else{
            br = $("#birthday").val();
            date = br.split(".");
            if(!!date[2]){
                if(date[2]>2017){
                    $("#birthday").val('');    
                };
                if(date[2]<1920){
                    $("#birthday").val('');
                }                                       
            }else{
                $("#birthday").val('');    
            }
        }   
    });

    function emailCheck(){
        var email = $("#email").val();
        jQuery.ajax({
            url:     'valid', //url страницы
            type:     "post", //метод отправки
            dataType: "html", //формат данных
            data: {email: email},
            success:function (response) {
                if(response == '"false"'){
                    document.getElementById('isValid').innerHTML ="<p><font color='#a94442'>This email is already exist!</font></p>";
                    clear = true;  
                }else{
                    document.getElementById('isValid').innerHTML ="<p><font color='green'>This Email is valid!</font></p>"; 
                }                     
            }
        });    
    };

    function saveData(formName,urlName){
        var dataSerialize = $(formName).serialize();
        $.ajax({
            method: "post",
            url: urlName,
            data:  dataSerialize,
            success: function(data){
                if (data){
                    var result = jQuery.parseJSON(data);
                    if (result['firstname']){
                          $('.first-error').text(result['firstname']);
                    }else{$('.first-error').text('');};

                    if (result['lastname']){
                          $('.last-error').text(result['lastname']);
                    }else{$('.last-error').text('');};

                    if (result['birthday']){
                          $('.date-error').text(result['birthday']);
                    }else{$('.date-error').text('');};

                    if (result['report']){
                          $('.report-error').text(result['report']);
                    }else{$('.report-error').text('');};

                    if (result['country']){
                          $('.country-error').text(result['country']);
                    }else{$('.country-error').text('');};

                    if (result['phone']){
                          $('.phone-error').text(result['phone']);
                    }else{$('.phone-error').text('');};

                    if (result['email']){
                          $('.email-error').text(result['email']);
                    }else{$('.email-error').text('');};
                }else{
                    hideForm('form1');
                    showForm('form2');
                    showForm('imageLoader');
                }
            }
        });
    };

    function saveData2(formName,urlName){
        var dataSerialize = $(formName).serialize();
        $.ajax({
            method: "post",
            url: urlName,
            data:  dataSerialize,
            success: function(data){
                console.log(data);
            }
        });
    };

    function uploadPhoto(){
        var form = document.forms.namedItem("imageLoader");
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            type: "post",
            dataType: "json",
            contentType: false, // high importance!
            url: 'upload',
            data: formdata, // high importance!
            processData: false, // high importance!
            timeout: 10000
        });
    };

    function hideForm(ajax_form){
        document.getElementById(ajax_form).style.display = 'none';
    };

    function showForm(ajax_form){
        document.getElementById(ajax_form).style.display = 'block';
    };

    function isShow(){
        if($('#isForm1').val() != undefined){
            if($('#isForm1').val() !== null) {
                hideForm('form1');
                showForm('form2');        
                showForm('imageLoader');
            };

            if($('#isForm1').val() == -1){
                hideForm('form2');
                hideForm('imageLoader');
                showForm('form1');
            };
        };
    };
    
});

