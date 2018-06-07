<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameScratchCard */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Game Scratch Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-scratch-card-view">

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
            'fullname',
            'email:email',
            'phone',
            'identity_number',
            'identity_date_created',
            'status',
        ],
    ]) ?>

</div>
