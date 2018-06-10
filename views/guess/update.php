<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameGuess */

$this->title = 'Update Game Guess: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Game Guesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="game-guess-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
