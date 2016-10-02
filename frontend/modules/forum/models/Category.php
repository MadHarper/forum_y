<?php

namespace frontend\modules\forum\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $posts
 * @property string $slug
 * @property boolean $active
 * @property string $desc
 *
 * @property Themes[] $themes
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'posts'], 'integer'],
            [['active'], 'boolean'],
            [['desc'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'posts' => 'Posts',
            'slug' => 'Slug',
            'active' => 'Active',
            'desc' => 'Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThemes()
    {
        return $this->hasMany(Themes::className(), ['category_id' => 'id']);
    }

    public function getChilds()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }
}
