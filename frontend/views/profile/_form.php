<?php

use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
/* @var $countries common\models\Category */
/* @var $cities common\models\City */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'gender')->dropDownList(['Mr'=>'Mr', 'Mrs'=>'Mrs'],['autofocus' => true]) ?>
            <?= $form->field($model, 'birth_date')->widget(DatePicker::class,[
              'name' => 'check_issue_date',
              'options' => ['placeholder' => 'Select issue date ...'],
              'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
              ]
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'country_id')->widget(Select2::class,['data'=>ArrayHelper::getColumn($countries, 'name')])->label('Country'); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'city_id')->widget(Select2::class,['data'=>ArrayHelper::getColumn($cities, 'name')])->label('City'); ?>
        </div>
    </div>
    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
      'mask' => '+38099-999-9999',
    ]) ?>

    <?php // $form->field($model, 'qty_orders')->textInput() ?>

    <?php // $form->field($model, 'total_income')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
