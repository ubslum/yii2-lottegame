<?php

use kartik\widgets\DatePicker;
use ubslum\lottegame\models\GameScratchCard;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameScratchCard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game-scratch-card-form">

    <?php $form = ActiveForm::begin(); $model->status = GameScratchCard::WIN ?>

    <?= Html::hiddenInput('id_member', '', ['id' => 'id_member']);//mã thành viên ?>
    <?= Html::hiddenInput('pos_n', '', ['id' => 'pos_n']); //số pos ?>
    <?= Html::hiddenInput('id_model', '', ['id' => 'id_model']); //id to update info ?>
    <?= Html::hiddenInput('reward', '', ['id' => 'reward']); //reward ?>
    <?= Html::hiddenInput('reward_details', '', ['id' => 'reward_details']); //reward details ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_date_created')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'dd-mm-yyyy',
            'todayHighlight' => true
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
