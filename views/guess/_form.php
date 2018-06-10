<?php

use kartik\widgets\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ubslum\lottegame\models\GameGuess */
/* @var $form yii\widgets\ActiveForm */
$this->registerCss("
.bg-kh { 
        /* The image used */
        background-image: url(\"/images/bg-kh.png\");

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 105%;
        padding: 15px 8px;
//        color: white;
    }
.thong-tin-khach-hang{
    text-align: center;
}
.thong-tin-khach-hang-ghi-chu{
    width: 100%;
    text-align: center;
    display: block;
}
");
?>

<div class="game-guess-form-info bg-kh">
    <h2 class="thong-tin-khach-hang">THÔNG TIN KHÁCH HÀNG DỰ THƯỞNG</h2>

    <span class="thong-tin-khach-hang-ghi-chu">(Vui lòng cung cấp chính xác để làm căn cứ trao thưởng)</span>

    <?php //$form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identity_date_created')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'dd-mm-yyyy',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'id_member', ['template' => "{label}\n<i class='fa fa-user'>*Xem dãy số trên thẻ thành viên</i>{input}\n{hint}\n{error}"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pos_number', ['template' => "{label}\n<i class='fa fa-user'>*Xem dãy số trên phần đầu hóa đơn</i>{input}\n{hint}\n{error}"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assure')->checkbox(['value' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php //ActiveForm::end(); ?>

</div>
