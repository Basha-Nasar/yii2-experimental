<?php

use yii\helpers\Html;
use yii\web\View;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Store $model */
/** @var yii\widgets\ActiveForm $form */

\hail812\adminlte3\assets\PluginAsset::register($this)->add('select');
?>

<div class="store-form accent-olive">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-olive">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">


                <div class="row">
                    <div class="col-12 col-md-6">
                        <?= $form->field($model, 'category_ids')->dropDownList($categories, [
                            "multiple" => true,
                            "prompt" => "Select Category",
                            "class" => "select2 accent-olive",
                            "data-placeholder" => "Select a State",
                            "data-dropdown-css-class" => "select2-olive",
                            "style" => "width: 100%;"
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
                        <?= $form->field($model, 'desc_ar')->textarea(['rows' => 6]) ?>
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
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn bg-olive']) ?>
            </div>
        </form>
    </div>


    <?php ActiveForm::end(); ?>


</div>

<?php
$this->registerJs("

 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  
 });
", View::POS_END);
?>