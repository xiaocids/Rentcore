<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Parameter */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Parameter',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Parameters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parameter-create">

    <?php echo $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
