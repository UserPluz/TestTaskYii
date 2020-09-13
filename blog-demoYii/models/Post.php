<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property string|null $content
 * @property string|null $date
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','content'],'required'],
            [['name','content'],'string'],
            [['date'],'date','format'=> 'php:Y-m-d'],
            [['date'],'default','value' => date('Y-m-d')],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Загловок',
            'content' => 'Содержание',
            'date' => 'Дата',
        ];
    }
}
