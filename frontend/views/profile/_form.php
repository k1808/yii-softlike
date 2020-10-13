<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'birth_date')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'country_id')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'city_id')->textInput() ?>
        </div>
    </div>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'qty_orders')->textInput() ?>

    <?php // $form->field($model, 'total_income')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
