<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameScratchCardB */

$this->title = 'Create Game Scratch Card B';
$this->params['breadcrumbs'][] = ['label' => 'Game Scratch Card Bs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-scratch-card-b-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
