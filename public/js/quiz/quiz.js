function shuffle(o) {
    for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}

function startQuiz() {

    var questsN = [];
    var nm = 0;
    $('.quizquestions .qItem').each(function() {
        questsN.push(nm);
        nm++;
    });
    totalq = nm;
    shuffle(questsN);

    var qNum = 0;
    var corr = 0;
    var corrcount = 0;

    function question() {
        $('.bNext').hide();
        $('.bFinish').hide();
        var clickCheck = 0;
        $('.quizquestions .qItem').hide();
        $('.quizquestions .qItem:eq(' + questsN[qNum] + ')').show();
        corr = parseInt($('.quizquestions .qItem:eq(' + questsN[qNum] + ')').attr('cor'));
        $('.quizquestions .qItem .answers .answ').click(function() {
            if (clickCheck == 0) {
                var ind = $(this).index() + 1;
                if (ind == corr) {
                    $(this).css({ 'background-color': '#c3e879' });
                    corrcount++;
                } else {
                    $(this).css({ 'background-color': '#f7aeae' });
                    $(this).parent().find('.answ:eq(' + (corr - 1) + ')').css({ 'background-color': '#c3e879' });
                }

                if ((qNum + 1) < totalq) {
                    $('.bNext').css('display', 'inline');
                } else {
                    $('.bFinish').css('display', 'inline');
                }

            }
            clickCheck++;
        });

    }
    question();

    $('.bNext').click(function() {
        qNum++;
        question();
    });

    $('.bFinish').click(function() {
        endQuiz();
    });

    timer();

    var tmr;
    var secs = 60;
    var min = 0; // 4
    function timer() {

        var secsT = "";
        tmr = setInterval(function() {
            if (secs > 0) {
                secs--;
            } else {
                secs = 59;
                if (min > 0) {
                    min--;
                } else if (min == 0) {
                    clearInterval(tmr);
                    min = 0;
                    secs = 0;
                    endQuiz();
                }
            }
            if (secs < 10) {
                secsT = "0" + secs;
            } else {
                secsT = secs;
            }
            $('.timer').html("0" + min + ":" + secsT);
        }, 1000);
        console.log(secsT);
    };

    function endQuiz() {
        clearInterval(tmr);
        console.log(corrcount + " " + totalq);
        var perc = Math.round((100 / totalq) * corrcount);
        console.log(perc);
        var url = "/quizend/" + perc;
        location.href = url;
    }

}


startQuiz();