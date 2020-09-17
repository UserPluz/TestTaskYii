<?php

namespace app\models;

use Yii;

use kartik\datecontrol\Module;

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
    // public $active;
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
            ['date', 'date', 'format' => 'dd.mm.yyyy'],
            [['date'], 'default', 'value' => date("Y-m-d")],
            [['name'], 'string', 'max' => 255],
            [['active'],'boolean'],
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
            'active' => 'Отображать на главной странице'
        ];
    }

    public function afterFind() {
        parent::afterFind ();
        $this->date = Yii::$app->formatter->asDate($this->date);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) 
        {
           
             if($this->date == date("Y-m-d"))
             {
                 return true;
             }

             $this->date = Yii::$app->formatter->asDate($_POST['Post']['date'], 'php:Y-m-d');
             return true;
        }
        return false;
       
    }
}
