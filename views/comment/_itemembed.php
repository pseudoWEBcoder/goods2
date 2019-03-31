<?php


/* @var $this yii\web\View */
/* @var $model app\models\Comment */

?>

<article class="row">
    <div class="col-md-2 col-sm-2 hidden-xs">
        <figure class="thumbnail">
            <img class="img-responsive" src="img/no_avatar.svg">
            <figcaption class="text-center">username</figcaption>
        </figure>
    </div>
    <div class="col-md-10 col-sm-10">
        <div class="panel panel-default arrow left">
            <div class="panel-body">
                <header class="text-left">
                    <!-- <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>-->
                    <time class="comment-date text-muted" datetime=" <?= date('d.m.Y h:i:s', $model->time) ?>"><i
                                class="fa fa-clock-o"></i> <?= date('d.m.Y h:i:s', $model->time) ?></time>
                </header>
                <div class="comment-post">
                    <p><?= $model->text ?></p>
                </div>
                <!-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>-->
            </div>
        </div>
    </div>
</article>