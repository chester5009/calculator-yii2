<?php
foreach ($transacts as $transact){
    echo $transact->id;
    echo $transact->expression;
    echo $transact->result;
    echo '<br>';
}

//debug($transacts[0]);
?>

<div class="row">
    <div class="col-md-5">
        <h1>Результат: <?= $result?></h1>
    </div>
    <div class="col-md-3 col-md-offset-2">
        <a href="/calculator/index" class="btn btn-info">В начало</a>
    </div>
</div>

<div class="row">
    <table>

    </table>
</div>
