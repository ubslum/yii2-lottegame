<?php
    use ubslum\lottegame\models\GameGuess;
    use yii\helpers\Html;
$this->registerCss("
.bg-guess { 
        /* The image used */
        background-image: url(\"/images/bg-guess-a.png\");

        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 105%;
        padding: 15px 8px;
        color: white;
    }
.row select{
    border-radius: 18px;
}
.bg-guess select{
    border: solid white;
    color: black;
    border-radius: 18px;
}
.game-guess-form h2{
    text-align: center;
}
.game-guess-form h3{
    text-align: center;
}
.game-guess-form h4{
    text-align: center;
}
");
?>

<div class="game-guess-form">
    <div class="row bg-guess">
        <div class="col-md-12 col-xs-12">
            <h2>Câu hỏi 1: Dự đoán 4 đội vào bán kết WORLD CUP 2018</h2>
        </div>
        <div class="col-md-12 col-xs-12">
            <h3>Câu trả lời của bạn</h3>
        </div>
        <div class="col-md-3 col-xs-12">
            <h4>Đội 1:</h4> <?php echo Html::dropDownList('aone[]', 0, GameGuess::getTeamWC(), ['class' => 'form-control']) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <h4>Đội 1:</h4> <?php echo Html::dropDownList('aone[]', 0, GameGuess::getTeamWC(), ['class' => 'form-control']) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <h4>Đội 1:</h4> <?php echo Html::dropDownList('aone[]', 0, GameGuess::getTeamWC(), ['class' => 'form-control']) ?>
        </div>
        <div class="col-md-3 col-xs-12">
            <h4>Đội 1:</h4> <?php echo Html::dropDownList('aone[]', 0, GameGuess::getTeamWC(), ['class' => 'form-control']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <h2>Câu hỏi 2: Dự đoán đội vô địch WORLD CUP 2018</h2>
        </div>
        <div class="col-md-12 col-xs-12">
            <h3>Câu trả lời của bạn</h3>
        </div>
        <div class="col-md-4 col-xs-12">
        </div>
        <div class="col-md-4 col-xs-12">
            <?php echo Html::dropDownList('atwo', 0, GameGuess::getTeamWC(), ['class' => 'form-control']) ?>
        </div>
        <div class="col-md-4 col-xs-12">
        </div>
    </div>
</div>