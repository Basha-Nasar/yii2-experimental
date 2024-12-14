<?php

use app\models\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\StoreSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Stores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">
    <p>
        
        
        <?= Html::a(Yii::t('app', '<i class="fa me-3 fa-plus" aria-hidden="true"></i> Create Store'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', '<i class="fa me-3 fa-plus" aria-hidden="true"></i> Create Category'), ['category/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', '<i class="fa me-3 fa-download" aria-hidden="true"></i> Bulk Import Stores'), ['category/create'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', '<i class="fa me-3 fa-download" aria-hidden="true"></i> Bulk Update Stores'), ['category/create'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', '<i class="fa me-3 fa-download" aria-hidden="true"></i> Bulk Import Items'), ['category/create'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'grid-view'], // This wraps the entire GridView
        'tableOptions' => ['class' => 'table text-sm table-sm accent-olive table-striped table-bordered'], // Table classes
        'headerRowOptions' => ['class' => 'bg-olive accent-white'], // Custom class for table header row
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            [
                "attribute" => "category_ids",
                "value" => function ($model) {
                    return join(', ', array_column($model?->storeCategories, 'name_en'));
                }
            ],
            'name_en',
            'name_ar',
            'desc_en:ntext',
            'desc_ar:ntext',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Store $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>