<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameGuess */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Game Guesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-guess-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_member',
            'pos_number',
            'date_created',
            'date_updated',
            'fullname',
            'email:email',
            'phone',
            'identity_number',
            'identity_date_created',
            'answer_one',
            'answer_two',
            'status',
        ],
    ]) ?>

</div>
