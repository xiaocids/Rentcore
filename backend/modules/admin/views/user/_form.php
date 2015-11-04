<?php

use common\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->field($model, 'username') ?>
            <?php echo $form->field($model, 'email') ?>
            <?php echo $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->field($model, 'status')->label(Yii::t('backend', 'Active'))->checkbox() ?>
            <?php echo $form->field($model, 'roles')->checkboxList($roles) ?>
        </div>
    </div>
    <div class="row">
 	<div class="col-md-12">
        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
