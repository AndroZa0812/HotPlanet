
<link rel="stylesheet" type="text/css" href="../css/main.css">
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
                            <a href="#" class="btn btn-default stat-item">
                                <i class="fa fa-thumbs-up icon"></i>2
                            </a>
                            <a href="#" class="btn btn-default stat-item">
                                <i class="fa fa-thumbs-down icon"></i>12
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>