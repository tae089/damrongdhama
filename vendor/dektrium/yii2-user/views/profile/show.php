<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use dektrium\user\models\User;
use dektrium\user\models\Profile;
/**
 * @var \yii\web\View $this
 * @var \dektrium\user\models\Profile $profile
 */
$rs = Profile::findOne(Yii::$app->user->identity->id);
$photo = $rs->photo;
$name = $rs->name;

if ($photo) {
 $photo_new = $photo;
}else{
    $photo_new =  "/damrongdhama/web/assets/4a957eef/img/avatar5.png";
}

$this->title = empty($profile->name) ? Html::encode($profile->user->username) : Html::encode($profile->name);
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">

  <div class="row">
    <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
         <!-- Profile Image -->
         <div class="box box-primary">
            <div class="box-body box-profile">
             <img src="<?= $photo_new ?>" class="profile-user-img img-responsive img-circle" style="width:214px;height:216;"/>

             <h3 class="profile-username text-center"><?= $this->title ?></h3>

             <hr>
             <ul style="padding: 0; list-style: none outside none;">
           <?php if (!empty($profile->position)): ?>
                        <li><i class="glyphicon glyphicon-heart text-muted"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::encode($profile->position) ?></li>
                    <?php endif; ?>
                    <hr>
            <?php if (!empty($profile->tel)){ ?>
                <li><i class="glyphicon glyphicon-earphone text-muted"></i>&nbsp;&nbsp;<?= Html::a(Html::encode($profile->tel), Html::encode($profile->tel)) ?></li>
            <?php } ?>
            <hr>
            <?php if (!empty($profile->public_email)){ ?>
                <li><i class="glyphicon glyphicon-envelope text-muted"></i>&nbsp;&nbsp;<?= Html::a(Html::encode($profile->public_email), 'mailto:' . Html::encode($profile->public_email)) ?></li>
            <?php } ?>
            <li><i class="glyphicon glyphicon-time text-muted"></i>&nbsp;&nbsp;<?= Yii::t('user', 'Joined on {0, date}', $profile->user->created_at) ?></li>
    </ul>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<div class="col-md-4"></div>


</section>
