<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameGuess */

$this->title = 'Create Game Guess';
$this->params['breadcrumbs'][] = ['label' => 'Game Guesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-guess-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
