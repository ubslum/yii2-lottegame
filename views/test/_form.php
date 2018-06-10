<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameScratchCardB */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game-scratch-card-b-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_member')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pos_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_created')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_date_created')->textInput() ?>

    <?= $form->field($model, 'reward')->textInput() ?>

    <?= $form->field($model, 'reward_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
