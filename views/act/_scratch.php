<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameScratchCard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game-scratch-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_member')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pos_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <!--?= //Html::submitButton('Cào ngay', ['class' => 'btn btn-success']) ?-->
        <?= Html::a('Cào ngay', '#cao-ngay', ['class' => 'btn btn-success', 'id' => 'reg-begin']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="scratch_container">
    <div class="scratch_viewport">
        <!-- result picture -->
        <canvas id="js-scratch-canvas"></canvas>
    </div>
</div>
