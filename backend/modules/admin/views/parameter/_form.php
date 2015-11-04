<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Parameter */
/* @var $form kartik\widgets\ActiveForm */
?>

<div class="parameter-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>
    <?php echo $form->errorSummary($models); ?>
    <div class="row">
        <div class="col-md-12">
            <!-- Tabular Input -->
            <?php
            DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 99, // the maximum times, an element can be added (default 999)
                'min' => 1,
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $models[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'name',
                    'code',
                    'type',
                    'status',
                    'sort',
                ],
            ]);
            ?>
            <div id="panel-option-values" class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-building"></i>&nbsp;&nbsp;Parameters
                    <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Company</button>
                    <div class="clearfix"></div>
                </div>
                <div class="dynamicform_wrapper">
                    <table class="table table-bordered table-striped margin-b-none">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Sort</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="container-items">
                            <?php foreach ($models as $i => $model): ?>
                                <tr class="item">
                                    <?php
                                    // necessary for update action.
                                    if (!$modelDetail->isNewRecord) {
                                        echo Html::activeHiddenInput($model, "[{$i}]id");
                                    }
                                    ?>
                                    <td>
                                        <?= $form->field($model, "[{$i}]name", ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                                    </td>
                                    <td>
                                        <?= $form->field($model, "[{$i}]code", ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                                    </td>
                                    <td>
                                        <?= $form->field($model, "[{$i}]type", ['showLabels' => false])->textInput(['maxlength' => true]) ?>
                                    </td>
                                    <td>
                                        <?= $form->field($model, "[{$i}]status", ['showLabels' => false])->checkbox() ?>
                                    </td>
                                    <td>
                                        <?= $form->field($model, "[{$i}]sort", ['showLabels' => false])->input('number') ?>
                                    </td>                                    
                                    <td><button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </tbody>
            <?php DynamicFormWidget::end(); ?>
            </table>
        </div>
    </div>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
