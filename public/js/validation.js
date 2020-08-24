$('document').ready(function() {
    
    $('.numeric').keyup(function() {
        if (this.value.match(/[^0-9.]/g)) {
            this.value = this.value.replace(/[^0-9.]/g, '');
        }
    });
    
});

function isEmail(email) 
{
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function phoneLength(phone_val)
{
    var len_phone = phone_val.length;
    if(len_phone < 10 ){
        $('.phone_error').html('Phone number must of be of 10 digits minimum');
        gotothen();
    }
    else{
        $('.phone_error').html('');
    }
}
