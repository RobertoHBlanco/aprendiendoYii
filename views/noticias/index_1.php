<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Noticias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticias-index">
    <div class="jumbotron">
    <h1><?= Html::encode($titulo) ?></h1>

    <p>
        <?= $descripcion ?>
    </p>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columnas
    ]); ?>


</div>
