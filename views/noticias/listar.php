<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Noticias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticias-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $data,
        'columns' => [
            'id',
            'titulo',
            'texto:ntext',

//            ['class' => 'yii\grid\ActionColumn'], // botones de accion de los registros del listado
        ],
    ]); ?>


</div>
