<?php

//use kartik\grid\GridView;
//use kartik\widgets\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel ubslum\lottegame\models\GameScratchCardBSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách trúng thưởng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-scratch-card-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            [
//                'attribute' => 'date_created_vn',
//                'value' => 'date_created_vn',
////                'xlFormat' => "mmm\\-dd\\, \\-yyyy",
//                'format' => 'raw',
//                'label' => "Ngày tháng",
//                'filter' => DatePicker::widget([
//                    'model' => $searchModel,
//                    'name' => 'GameScratchCardSearch[date_created]',
//                    'value' => ArrayHelper::getValue($_POST, "GameScratchCardSearch.date_created"),
//                    'pluginOptions' => [
//                        'format' => 'dd-mm-yyyy',
//                        'autoclose' => true,
//                    ]
//                ]),
////            'filterType' => GridView::FILTER_DATE,
////                'filterWidgetOptions' => [
////                    'pluginOptions' => [
////                        'format' => 'yyyy-mm-dd',
////                        'todayHighlight' => true
////                    ]
////                ],
//
//            ],
            ['attribute' => 'date_created', 'value' => 'date_created', 'format' => 'raw', 'filter' => DatePicker::widget(['model' => $searchModel, 'attribute' => 'date_created', 'dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']])],
//            'id_member',
//            'pos_number',
            'fullname',
            'email',
            'identity_number',
//            'reward_details',
            [
                'attribute' => 'reward_details',
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'value' => function ($data) {
                    $tmp = json_decode($data->reward_details);
                    return $tmp->name . ' - ' . $tmp->points . ' điểm thưởng'; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            // 'fullname',
            // 'email:email',
            // 'phone',
            // 'identity_number',
            // 'identity_date_created',
            // 'reward',
            // 'reward_details:ntext',
            // 'status',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
