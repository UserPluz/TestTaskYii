<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
// use kartik\datecontrol\DateControl;

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?> 

    <?php echo $form->field($model, 'date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ввод даты...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd.mm.yyyy',
       'todayHighlight' => true,
        // 'todayBtn' => true,
           ]
    ])?>

     <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'active')->checkbox([ 'value' => '1', 'checked ' => true])?>

 
    <div class="form-group">
     
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
