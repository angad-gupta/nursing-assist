$('document').ready(function() {
    
    $('.numeric').keyup(function() {
        if (this.value.match(/[^0-9.]/g)) {
            this.value = this.value.replace(/[^0-9.]/g, '');
        }
    });
    $('input[type=submit], button[type=submit]').click( function () {
        var form = $(this).parents('form:first');
        if (form.valid()) {
            $(this).attr('disabled', true);
            $(this).prepend('<i class="icon-spinner4 spinner"></i> ');
            form.submit();
        }
    });
    
});