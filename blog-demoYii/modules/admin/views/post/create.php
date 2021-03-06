<?php

use yii\helpers\Html;
// require __DIR__ . '/../vendor/autoload.php';

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Добавление новости';
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
