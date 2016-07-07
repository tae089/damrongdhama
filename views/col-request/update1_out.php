<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ColRequest */

$this->title = 'Col Requests';

?>
<div class="col-request-update">

   

    <?= $this->render('_form_update_out', [
        'model' => $model,
    ]) ?>

</div>
