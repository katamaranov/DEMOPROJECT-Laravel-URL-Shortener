$('.cc').on('click', function () {
    var hiddenField = $('.dopField'),
        val = hiddenField.val();

    hiddenField.val(val != '' ? '' : '');
    $('.hiddenName').toggle();
    let attr = $('.dopField').attr('required');
    typeof attr !== 'undefined' && attr !== false ? $('.dopField').removeAttr('required') : $('.dopField').attr('required', true);
});