<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Store $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-12 col-md-6">
            <?= $form->field($model, 'category_ids')->dropDownList($categories, [
                "multiple" => true,
                "prompt" => "Select Category",
            ]) ?>
        </div>

        <div class="col-12 col-md-6">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-12 col-md-6">
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-12 col-md-6">
            <?= $form->field($model, 'name_ar')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-12 col-md-6">
            <?= $form->field($model, 'desc_en')->textarea(['rows' => 6]) ?>
        </div>

        <div class="col-12 col-md-6">
            <?= $form->field($model, 'img_ar')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-12 col-md-6">
            <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>