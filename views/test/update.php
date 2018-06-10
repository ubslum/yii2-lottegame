<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameScratchCardB */

$this->title = 'Update Game Scratch Card B: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Game Scratch Card Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="game-scratch-card-b-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
