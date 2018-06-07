<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameScratchCard */

$this->title = 'Create Game Scratch Card';
$this->params['breadcrumbs'][] = ['label' => 'Game Scratch Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-scratch-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
