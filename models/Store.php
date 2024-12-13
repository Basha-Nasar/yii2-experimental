<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stores".
 *
 * @property int $id
 * @property string $code
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $desc_en
 * @property string|null $img_ar
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 *
 * @property StoreCategory[] $storeCategories
 */
class Store extends \yii\db\ActiveRecord
{


    public $category_ids = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'status'], 'required'],
            [['desc_en', 'desc_ar'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            ['category_ids', 'each', 'rule' => ['integer']],
            [['code', 'name_en', 'name_ar', 'img_ar', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_ids' => Yii::t('app', 'Categories'),
            'code' => Yii::t('app', 'Code'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_ar' => Yii::t('app', 'Name Ar'),
            'desc_en' => Yii::t('app', 'Desc En'),
            'desc_ar' => Yii::t('app', 'Desc Ar'),
            'img_en' => Yii::t('app', 'Img En'),
            'img_ar' => Yii::t('app', 'Img Ar'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
        ];
    }

    /**
     * Gets query for [[StoreCategories]].
     *
     * @return \yii\db\ActiveQuery|StoreCategoryQuery
     */

    public function getStoreCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id'])
            ->viaTable('store_categories', ['store_id' => "id"]);
    }



    /**
     * {@inheritdoc}
     * @return StoreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StoreQuery(get_called_class());
    }
}
