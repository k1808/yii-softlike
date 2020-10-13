<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop';
$this->params['breadcrumbs'][] = $this->title;
echo Yii::$app->controller->id;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
          'attribute'=>'category_id',
          'value'=>function($model){
            return $model->category->name;
          }
        ],

        'price',

        ['class' => 'yii\grid\ActionColumn',
          'template' => '{bay}',
          'buttons' => [
            'bay' => function ($url, $model, $key) {
                return Html::a(FA::icon('cart-arrow-down'), $url, [
                  'title' => 'Bay',
                  'style'=>['font-size'=>'22px'],
                  'data-pjax' => '0',
                ]);
            },
          ],

        ],
      ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
