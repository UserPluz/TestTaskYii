<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


Html::encode('HI');

$this->title = $post->name;
\yii\web\YiiAsset::register($this);
?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
    <h5> <?= Html::encode("{$post->content}") ?> </h5>
    <p> Дата: <?= Yii::$app->formatter->asDate($post->date,'dd.MM.yyyy') ?> </p>

    </div>

    

</div>
