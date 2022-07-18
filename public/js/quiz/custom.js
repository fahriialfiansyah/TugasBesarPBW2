$('.questionlist .questionname').click(function() {
    var ind = $(this).parent().parent().index();
    $('.questionlist .questiondetails').hide();
    $('.questionlist .questionItem:eq(' + ind + ') .questiondetails').show();
});

$('.deletecat').click(function() {
    $catvar = $(this).attr('catvar').valueOf();
    $catname = $(this).attr('catname').valueOf();
    $('#deletecat').find('.popup .catname').html($catname);
    $('#deletecat').find('.popup .yes').attr('href', 'delete-category/' + $catvar);
    $('#deletecat').css({
        'visibility': 'visible',
        'opacity': 1
    });
});
$('.deletecat .popup .no').click(function() {
    $('#deletecat').css({
        'visibility': 'hidden',
        'opacity': 0
    });
});

$('.deletequest').click(function() {
    $id = $(this).attr('qid').valueOf();
    $catid = $(this).attr('catid').valueOf();
    $qname = $(this).attr('qname').valueOf();
    $('#deletequest').find('.popup .questtitle').html("'" + $qname + "'");
    $('#deletequest').find('.popup .yes').attr('href', 'delete-question/' + $catid + "/" + $id);
    $('#deletequest').css({
        'visibility': 'visible',
        'opacity': 1
    });
});
$('.deletequest .popup .no').click(function() {
    $('#deletequest').css({
        'visibility': 'hidden',
        'opacity': 0
    });
});

$('.quiz .playBtn').click(function() {
    $('.quiz .inro').hide();
    $('.quiz .quizstart').show();
});