<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\i18n\Formatter;

$this->title = 'Главная страница';


?>


<h1 class="bg-primary">Новости: </h1>
<div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php if (empty($posts)): ?>
                <p>Список новостей пуст</p>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <div>
                        <h2> <?= Html::encode("{$post->name}") ?> </h2>
                        <h5> <?= Html::encode("{$post->content}") ?> </h5>
                        <p> Дата: <?= Yii::$app->formatter->asDate($post->date,'dd.MM.yyyy') ?> </p>
                    </div>
                    <hr>
                <?php endforeach; ?>

                <?php endif; ?>
        </div>
    </div>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>