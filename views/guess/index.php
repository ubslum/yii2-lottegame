<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\web\Controller;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectBusinessIdeaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dự đoán trúng thưởng';
$this->params['breadcrumbs'][] = $this->title;
$js = file_get_contents(__DIR__ . '/index.js');
$this->registerJs($js);
$this->registerCss("
label { width: 100%; }
.scratch_container {
  position: relative;
  margin: 0 auto;
  max-width: 1024px;
}
.my-cppkkkklass{
    display: none !important;
    }

//.btnNext{
//    display: none;
//}
.bg { 
        /* The image used */
//        background-image: url(\"/images/bg-sc.png\");

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 105%;
        padding: 15px 0;
//        color: white;
    }
//label{
//    color: white;
//}

");
?>
<section class="page-section bg" id="about">
    <div class="container relative">
        <!--        <h2 class="section-title font-alt align-left mb-70 mb-sm-40">Câu hỏi trắc nghiệm</h2>-->
        <div class="section-text">
            <div class="lotte-game-index">
                <?php $form = ActiveForm::begin(); ?>
                <?php
                $items = [];
                $items[] = ['label' => 'form' , 'content' => Yii::$app->controller->renderPartial('_guess', array('searchModel' => $searchModel, 'dataProvider' => $dataProvider,'model' => $model,'form' => $form)),];
                $items[] = ['label' => 'form' , 'content' => Yii::$app->controller->renderPartial('_form', array('searchModel' => $searchModel, 'dataProvider' => $dataProvider,'model' => $model,'form' => $form)),];
                ?>
                <?=
                Tabs::widget([
                    'items' => $items,
                    'options' => ['tag' => 'div'],
                    'itemOptions' => ['tag' => 'div'],
                    'headerOptions' => ['class' => 'my-cppkkkklass'],
                    'clientOptions' => ['collapsible' => false],
                ]);
                ?>
                <?php ActiveForm::end(); ?>
                <div style="display: block; width: 100%; text-align: center; margin: 8px 0;">
                    <!--                    <a class="btn btn-default btnPrevious" style="margin: 20px; display: none; text-decoration: none;" >Trở lại</a>-->
                    <a class="btn btn-default btnNext" style="margin: 20px; text-decoration: none;" >Thông tin khách hàng dự thưởng</a>
                </div>
            </div>
        </div>
    </div>
</section>