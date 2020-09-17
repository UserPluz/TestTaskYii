<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\i18n\Formatter;
use yii\helpers\Url;

$this->title = 'Главная страница';


?>


<h1 class="bg-primary">Новости: </h1>
<div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <?php if (empty($posts)): ?>
                <p>Список новостей пуст</p>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post">
                        <h2 class="post-title mr"> <?= Html::encode("{$post->name}") ?> </h2>
                        <h5 class="post-content mr"> <?= Html::encode("{$post->content}") ?> </h5>
                        <p class="post-date mr"> Дата: <?= Yii::$app->formatter->asDate($post->date,'dd.MM.yyyy') ?> </p>
                        <a class="post-show-link mr" href="<?= Url::to(['/site/news','url' => $post->url])?>">Перейти</a>
                    </div>
                    <hr>
                <?php endforeach; ?>

                <?php endif; ?>
        </div>
    </div>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>