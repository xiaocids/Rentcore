<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Parameter */

$this->title = 'View Parameter :'.$type;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Parameters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parameter-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Delete All'), ['delete', 'type' => $type], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        
        <?php echo Html::a(Yii::t('backend', 'Back'), ['index'], ['class' => 'btn btn-default pull-right']) ?>
    </p>
    
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            'name',
            'code',
            'type',
            'status',
            // 'sort',

            [
                'class' => 'kartik\grid\ActionColumn',
                
            ]
        ],
    ]); ?>

</div>
