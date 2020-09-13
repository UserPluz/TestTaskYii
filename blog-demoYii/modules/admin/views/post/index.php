<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(".addBtn { margin-right: 10px; }");
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php if (empty($dataProvider->models)): ?>
        <p>
           <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>
   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showOnEmpty' => false,
        'emptyText' => 'Таблица пуста.',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'ID',
                'attribute' => 'id'
            ],
            [
                'header' => 'Заголовок',
                'attribute' => 'name'
            ],
            [
                'header' => 'Содержание',
                'attribute' => 'content'
                
            ],
            [
                'header' => 'Дата',
                'attribute' => 'date',
                'format' =>  ['date', 'dd.MM.Y'],
            ],

            
            ['class' => 'yii\grid\ActionColumn',
             'header' => 'Действия',
             'template' => '{add}{view} {update} {delete}',
             'contentOptions' => ['style' => 'letter-spacing: 10px;'],
             'buttons' => [
                  'delete' => function($url,$model){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                        'class' => '',
                        'data' => [
                            'confirm' => 'Удалить элемент?',
                            'method' => 'post',
                        ],
                    ]);
                },
                 'add' => function()
                 {
                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create'],['class' => 'addBtn']);
                 }
                ],
            ],
        ],
    ]); ?>


</div>
