<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?> 

    <?=  $form->field($model,'date')->widget(DateControl::className(),
    [
        // 'displayFormat' => 'dd.mm.yyyy',
        'ajaxConversion' => true,
        'widgetOptions' => [
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'language' => 'ru'
            ]
        ]
    ])?>

     <?= $form->field($model, 'active')->checkbox([ 'value' => '1', 'checked ' => true])?>

 
    <div class="form-group">
     
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
