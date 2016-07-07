<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ColRequest */

$this->title = 'Col Requests';
for($i=0; $i<count($model->req_update); $i++){
  if($model->req_update[$i]['req_update_date']!=""){
                    $times2 = date('Y-m-d', $model->req_update[$i]['req_update_date']->sec);
                }else{
                    $times2 = "";
                }

                 $arrayName[$i] = array('req_update_date' => $times2,
                    'req_update_detail' => $model->req_update[$i]['req_update_detail'],
                    'req_update_user' => $model->req_update[$i]['req_update_user']);
}
$model->req_update = $arrayName;
?>
<div class="col-request-update">


    <?= $this->render('_form_update_progress_out', [
        'model' => $model,
        'curl' => $curl,
    ]) ?>

</div>
