<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Parameter */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Parameter',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Parameters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="parameter-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
