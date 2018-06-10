<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel ubslum\lottegame\models\GameGuessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dự đoán trúng thưởng - danh sách';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-guess-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'date_created', 'value' => 'date_created', 'format' => 'raw', 'filter' => DatePicker::widget(['model' => $searchModel, 'attribute' => 'date_created', 'dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']])],
//            'id_member',
//            'pos_number',
            'fullname',
            'email',
            'identity_number',
            'answer_one',
            'answer_two',
            // 'fullname',
            // 'email:email',
            // 'phone',
            // 'identity_number',
            // 'identity_date_created',
            // 'answer_one',
            // 'answer_two',
            // 'status',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
