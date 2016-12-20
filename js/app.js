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

    if(data.voteType == 1) {
        $("span#upvotenum-" + reviewID).html('' + voteCount);
    } else {
        $("span#downvotenum-" + reviewID).html('' + voteCount);
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

$("#addreview").click(function () {
    var data = $("#addreview :input").serializeArray();
    $.post()
})