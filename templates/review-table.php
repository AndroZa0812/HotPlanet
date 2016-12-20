<link rel="stylesheet" type="text/css" href="../css/main.css" xmlns="http://www.w3.org/1999/html">

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
                            <h6 class="text-muted time">1 minute ago</h6>
                        </div>
                    </div>
                    <div class="post-description">
                        <p><?= $reviews[$i]['info'] ?></p>
                        <div class="stats" align="left">
                            <button type="button" id="upvote" onclick="vote(<?php echo $reviews[$i]['ID'] ?>, 1)" class="btn btn-secondary">
                               <span class="glyphicon glyphicon-thumbs-up"></span>
                                <span id="upvotenum-<?php echo $reviews[$i]['ID']?>"><?= $reviews[$i]['upvotes'] ?></span>
                            </button>
                            <button type="button" id="upvote" onclick="vote(<?php echo $reviews[$i]['ID'] ?>, -1)" class="btn btn-secondary">
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                <span id="downvotenum-<?php echo $reviews[$i]['ID']?>"><?= $reviews[$i]['downvotes'] ?></span>
                            </button>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>