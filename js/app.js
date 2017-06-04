function deleteUser(id) {
    //alert('test');
    $.ajax({
        type: 'post',
        url: '../deluser.php',
        data: { UserID: id },
        success: delOkay,
    });
}

function delOkay(data) {
    $("table tbody#users").html('' + data);
}

function vote(id , typeOfVote) {
    $.ajax({
        type: 'post',
        url: '../templates/vote.php',
        dataType: 'JSON',
        data: { MassageID: id, typeOfVote: typeOfVote},
        success: voteOkay
    });
}

function voteOkay(data) {
    if(data.loggedIn == true) {
        const voteCount = data.voteCount;
        const reviewID  = data.reviewID;

        if (data.voteType == 1) {
            $("span#upvotenum-" + reviewID).html('' + voteCount);
        } else {
            $("span#downvotenum-" + reviewID).html('' + voteCount);
        }

        if (data.voteType2 != -2) {

            const voteCount2 = data.voteCount2;

            if (data.voteType2 == 1) {
                $("span#upvotenum-" + reviewID).html('' + voteCount2);
            } else {
                $("span#downvotenum-" + reviewID).html('' + voteCount2);
            }
        }

    } else {
        showpopup();
    }
}

function checkLogin(form)
{
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;

    if(email == '') {
        alert("חובה למלא אימייל");
    } else if(pass == '') {
        alert("חובה למלא סיסמא");
    } else {
        form.submit();
    }
}


$(document).ready(function()
{
    $("#show_login").click(function(){
        showpopup();
    });
    $("#close_login").click(function(){
        hidepopup();
    });
});

function showpopup()
{
    $("#loginform").fadeIn();
    $("#loginform").css({"visibility":"visible","display":"block"});
    this.withHeaderText = function($string){
        $("#loginform").html(+$string);
    }
}

function hidepopup()
{
    $("#loginform").fadeOut();
    $("#loginform").css({"visibility":"hidden","display":"none"});
}

$.fn.extend({
    print: function () {
        var frameName = 'printIframe';
        var doc = window.frames[frameName];
        if (!doc) {
            $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
            doc = window.frames[frameName];
        }
        doc.document.body.innerHTML = this.html();
        doc.window.print();
        return this;
    }
})

function addReview(massage) {
    var token = document.getElementById('token').value;
    var movieID = document.getElementById('movieID').value;
    $.ajax({
        type: 'post',
        url: '../templates/AddReview.php',
        data:{  massage: massage,
            token : token,
            MovieID : movieID,
        },
        success: reviewSuccess
    });
}

function reviewSuccess(data) {
    $("div#reviews").html('' + data);
    $("textarea#reviewArea").value = '';
}

function deleteReview(reviewID) {
    $.ajax({
        type: 'post',
        url: '../alterReview.php',
        data:{  reviewID: reviewID},
        success: reviewDelSuccess
    });
}

function reviewDelSuccess(data){
    if(data != 1) {
        $("div#reviews2").html('' + data);
    } else {
        $("div#reviews2").html('' + '<span style="color:red">אין ביקורות באתר</span>');
    }
}
