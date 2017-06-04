<?php for ($i = 0; $i < count($reviews); $i++): ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8" style="float: right" >
                <div class="panel panel-white post panel-shadow">
                    <div class="post-heading">
                        <div class="pull-right image">
                            <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                        </div>
                        <div class="pull-right meta">
                            <div class="title h5">
                                <a href="#"><b><?= $reviews[$i]['username'] ?></b></a>
                                made a post.
                            </div>
                            <h6 class="text-muted time"><?php echo  getInterval($reviews[$i]['submissionTime']) ?></h6>
                        </div>
                        <div style="margin-right:490px" >
                            <span><?= $reviews[$i]["Movie"]?></span>
                            <button class="btn btn-sm btn-danger" value="Delete Review" onclick="deleteReview(<?php echo $reviews[$i]['ID'] ?>)" >Delete Review</button>
                        </div>
                    </div>
                    <div class="post-description">
                        <p><?= $reviews[$i]['info'] ?></p>
                        <div class="stats" align="left">
                            <button type="button" id="upvote" onclick="vote(<?php echo $reviews[$i]['ID'] ?>, 1)" class="btn btn-secondary likedButton">
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                <span id="upvotenum-<?php echo $reviews[$i]['ID']?>"><?= $reviews[$i]['upvotes'] ?></span>
                            </button>
                            <button type="button" id="downvote" onclick="vote(<?php echo $reviews[$i]['ID'] ?>, -1)" class="btn btn-secondary dislikeButton">
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                <span id="downvotenum-<?php echo $reviews[$i]['ID']?>"><?= $reviews[$i]['downvotes'] ?></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php endfor;
function getInterval($sentTime)
{
    date_default_timezone_set('Asia/Jerusalem');
    $date_1 = date('Y-m-d H:i:s');

    $datetime1 = date_create($date_1);
    $datetime2 = date_create($sentTime);

    $interval = date_diff($datetime1, $datetime2);
    //echo $interval->format("%Y-%m-%d %H:%i:%s ") . " " . $date_1 . " ";
    if ($interval->format('%y') > 0) {
        return "sent " . $interval->format('%y') . " years ago";
    } else if ($interval->format('%m') > 0) {
        return "sent " . $interval->format('%m') . " months ago";
    } else if ($interval->format('%d') > 0) {
        return "sent " . $interval->format('%d') . " days ago";
    } else if ($interval->format('%H') > 0) {
        return "sent " . $interval->format('%h') . " hours ago";
    } else if ($interval->format('%i') > 0) {
        return "sent " . $interval->format('%i') . " minutes ago";
    } else if ($interval->format('%s') > 0) {
        return ("sent " . $interval->format('%s') . " seconds ago");
    } else {
        return 'sent now';
    }
}
?>