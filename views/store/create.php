<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Store $model */

$this->title = Yii::t('app', 'Create Store');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-create">

    <?= $this->render('_form', [
        'model' => $model,
        'categories'  => $categories
    ]) ?>

</div>