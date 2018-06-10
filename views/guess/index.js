$('.btnNext').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
    $('.btnNext').hide();
});
$('body').on('submit', 'form', function() {
    $(this).find('button[type!=\"button\"],input[type=\"submit\"]').attr('disabled',true);
    setTimeout(function(){
        $(this).find('.has-error').each(function(index, element) {
            $(this).parents('form:first').find(':submit').removeAttr('disabled');
        });
    },1000);
});

