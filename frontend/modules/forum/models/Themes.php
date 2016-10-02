<?php

namespace frontend\modules\forum\models;

use Yii;

/**
 * This is the model class for table "themes".
 *
 * @property integer $category_id
 * @property integer $user_id
 * @property string $title
 * @property boolean $fixed
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $visible
 * @property boolean $closed
 * @property integer $posts
 * @property integer $id
 *
 * @property Post[] $posts0
 * @property Category $category
 * @property User $user
 */
class Themes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'themes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'posts'], 'integer'],
            [['title'], 'string'],
            [['fixed', 'visible', 'closed'], 'boolean'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'fixed' => 'Fixed',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'visible' => 'Visible',
            'closed' => 'Closed',
            'posts' => 'Posts',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllPosts()
    {
        return $this->hasMany(Post::className(), ['theme_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
