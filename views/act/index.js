/**
 * Created by shini on 5/17/2017.
 */

$('#reg-begin').click(function(){
    var rs = 0;
    var id = $('#gamescratchcard-id_member').val();
    var pos = $('#gamescratchcard-pos_number').val();

    // alert(id+pos);

    //reg begin
    $.ajax({
        url: "/lottegame/act/ajax-reg-begin",
        data: {'id': id, 'pos': pos},
        dataType: 'JSON',
        beforeSend: function( xhr ) {

        }
    }).done(function( data ) {
        if(data.rs == 'FAIL'){
            alert(data.msg);
            return false;
        }
        if(data.rs == 'OK'){
            $('#id_member').val(id);
            $('#pos_n').val(pos);
            $('#id_model').val(data.id);
            var scratch = new Scratch({
                canvasId: 'js-scratch-canvas',
                imageBackground: '/images/rs.png',
                pictureOver: '/images/cover.png',
                cursor: {
                    // png: 'piece.png',
                    // cur: 'piece.cur',
                    x: '20',
                    y: '17'
                },
                radius: 20,
                nPoints: 100,
                percent: 50,
                callback: function () {
                    $('.btnNext').show();
                },
                pointSize: { x: 3, y: 3},
                sceneWidth: 701,
                sceneHeight: 102
            });
        }

    });
    return FALSE;
});

$('.btnNext').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
    $('.btnNext').hide();
    // var rs = 0;
    // // alert($('.tab-content > .active').find('input'));
    // if(chkQChecked() == 1){
    //
    //
    //     if(typeof  $('.nav-tabs > .active').next('li').html() != 'undefined'){
    //         $('.btnPrevious').show();
    //         $('.btnNext').show();
    //         $('.btnNext').html('Tiếp theo');
    //     }else{
    //         $('.btnPrevious').show();
    //         $('.btnNext').hide();
    //     }
    // }else{
    //     alert("Bạn chưa chọn câu trả lời");
    // }
});
chkQChecked = function(){
    var rs = false;
    $('.tab-content > .active').find('input[type="radio"]').each(function(){
        if($(this).is(":checked")){
            rs = true;
            return true;
        }
    });
    return rs;
};
$('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');

    if(typeof  $('.nav-tabs > .active').prev('li').html() != 'undefined'){
        $('.btnPrevious').show();
        $('.btnNext').show();
        $('.btnNext').html('Tiếp theo');
    }else{
        $('.btnPrevious').hide();
        $('.btnNext').show();
        $('.btnNext').html('Bắt đầu');
    }
});

$( ".question-answer-block input" ).click(function() {
    name = $(this).attr("optquestion"); //question index
    if($('#answers-store').val() == ''){
        var elems = []
    }else{
        var elems = $('#answers-store').val(); //get answers store
        elems = JSON.parse(elems);
    }
    elems[name] = $(this).val();

    $('#answers-store').val(JSON.stringify(elems)); //store array
});

$('body').on('submit', 'form', function() {
    $(this).find('button[type!=\"button\"],input[type=\"submit\"]').attr('disabled',true);
    setTimeout(function(){
        $(this).find('.has-error').each(function(index, element) {
            $(this).parents('form:first').find(':submit').removeAttr('disabled');
        });
    },1000);
});

