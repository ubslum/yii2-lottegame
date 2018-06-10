<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel ubslum\lottegame\models\GameScratchCardBSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Game Scratch Card Bs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-scratch-card-b-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Game Scratch Card B', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_member',
            'pos_number',
            'date_created',
            'date_updated',
            // 'fullname',
            // 'email:email',
            // 'phone',
            // 'identity_number',
            // 'identity_date_created',
            // 'reward',
            // 'reward_details:ntext',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
