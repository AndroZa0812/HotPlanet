function deleteUser(id) {
    $.ajax({
        type: 'post',
        url: '../deluser.php',
        data: { UserID: id },
        success: delOkay
    });
}

function delOkay(data) {
    // it means: go to the table with the ID of users and then go to the tbody section which is the table body
    $("table#users tbody").html(data);
}

function vote(id , typeOfVote , numOfVotes) {
    $.ajax({
        type: 'post',
        url: '../templates/vote.php',
        dataType: 'JSON',
        data: { MassageID: id, typeOfVote: typeOfVote, test: numOfVotes },
        success: voteOkay
    });
}

function voteOkay(data) {
    const voteCount = data.voteCount;
    const reviewID  = data.reviewID;

    if(data.loggedIn == true) {

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

    }else{
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

function checkRegister(form)
{
    var username = document.getElementById('username').value;
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;
    var pass = document.getElementById('pass').value;
    var age = document.getElementById('age').value;

    if(username == '') {
        alert("חובה להכניס שם משתמש");
    }
    if(firstname == '') {
        alert("חובה למלא שם פרטי");
    }
    else if(lastname == '') {
        alert("חובה למלא שם משפחה");
    }
    else if(email == '') {
        alert("חובה למלא אימייל");
    }else if(pass == '') {
        alert("חובה למלא סיסמא");
    }
    else if(age == '') {
        alert("חובה למלא גיל");
    }
    else {
        form.submit();
    }
}
function checkContact(form)
{
    var info = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var info = document.getElementById('info').value;

    if(firstname == '') {
        alert("חובה למלא שם פרטי");
    }
    else if(lastname == '') {
        alert("חובה למלא שם משפחה");
    }
    else if(info == '') {
        alert("חובה למלא תוכן");
    }
    else {
        form.submit();
    }
}

//$("#addreview").click(function () {
//    var data = $("#addreview :input").serializeArray();
//    $.post()
//})


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

function send(id , typeOfVote , numOfVotes) {
    $.ajax({
        type: 'post',
        url: '../templates/vote.php',
        dataType: 'JSON',
        data: { MassageID: id, typeOfVote: typeOfVote, test: numOfVotes },
        success: voteOkay
    });
}

function insertSessionName($event){
    // var selectedSession = name.value;
    // var MovieName = "";
    // selectedSession = selectedSession.match(/\S+/g) || [];
    // document.getElementById("movieTimeTag").innerHTML = selectedSession[0] + " " + selectedSession[1];
    // for(var i = 2 ; i < selectedSession.length ; i++){
    //     MovieName = MovieName.concat(" " + selectedSession[i]);
    // }
    // document.getElementById("movieNameTag").innerHTML = MovieName;
    // return selectedSession;
    console.log($event.target.value);
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

function RedirectToBuyMovie(movieID) {
    window.location.href = "../buyMovie.php?MovieID=" + movieID.toString();
}