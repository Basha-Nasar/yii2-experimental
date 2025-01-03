<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-olive">
        <div class="card-header">
            <h3 class="card-title">Add Category</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'name_ar')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'desc_en')->textarea(['rows' => 2]) ?>
                </div>

                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'desc_ar')->textarea(['rows' => 2]) ?>
                </div>
                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'img_en')->fileInput() ?>
                </div>
                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'img_ar')->fileInput() ?>
                </div>
                <div class="col-12 col-md-6">
                    <?= $form->field($model, 'status')->dropDownList(
                        [
                            "0" => "Active",
                            "1" => "InActive",
                        ],
                        ["class" => "form-control"]
                    ) ?>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn bg-olive']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>