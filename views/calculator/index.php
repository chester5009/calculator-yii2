<?php
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php $form = \yii\widgets\ActiveForm::begin() ?>
        <?= \yii\helpers\Html::label('Выражение','inputExp');?>
        <?= \yii\helpers\Html::input('text','inputExp','',['class'=>'form-control','id'=>'inputField']) ?>
        <br>
        <?= \yii\helpers\Html::button('Посчитать',['class'=>'btn btn-success' , 'id'=>'calculateBtn']) ?>
        <?php \yii\widgets\ActiveForm::end() ?>
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <h1 id="result"></h1>
    </div>

</div>

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <div class="col-md-2"><button id="add" class="info-btn btn btn-info">Сложение</button></div>
        <div class="col-md-2"><button id="sub" class="info-btn btn btn-info">Вычитание</button></div>
        <div class="col-md-2"><button id="div" class="info-btn btn btn-info">Деление</button></div>
        <div class="col-md-2"><button id="mul" class="info-btn btn btn-info">Умножение</button></div>
        <div class="col-md-2"><button id="exp" class="info-btn btn btn-info">Степень</button></div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-10 col-md-offset-2 info">
        <table class="table-striped table-bordered" id="tableoperations">
            <caption>Операции</caption>
            <thead>
                <tr>
                    <th>Выражение</th>
                    <th>Результат</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>2</td>
                    <td>r</td>
                </tr>
            </tbody>


        </table>
    </div>
</div>

