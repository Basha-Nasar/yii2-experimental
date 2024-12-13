<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $desc_en
 * @property string|null $desc_ar
 * @property string|null $img_en
 * @property string|null $img_ar
 * @property string $status
 * @property int|null $show_in_home
 * @property int|null $sort_order
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 *
 * @property StoreCategory[] $storeCategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc_en', 'desc_ar'], 'string'],
            [['status'], 'required'],
            [['show_in_home', 'sort_order'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name_en', 'name_ar', 'img_en', 'img_ar', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_en' => Yii::t('app', 'Name En'),
            'name_ar' => Yii::t('app', 'Name Ar'),
            'desc_en' => Yii::t('app', 'Desc En'),
            'desc_ar' => Yii::t('app', 'Desc Ar'),
            'img_en' => Yii::t('app', 'Img En'),
            'img_ar' => Yii::t('app', 'Img Ar'),
            'status' => Yii::t('app', 'Status'),
            'show_in_home' => Yii::t('app', 'Show In Home'),
            'sort_order' => Yii::t('app', 'Sort Order'),
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
        return $this->hasMany(Store::class, ['id' => 'store_id'])
            ->viaTable('store_categories', ['category_id' => "id"]);
    }



    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
