<?php

use kartik\icons\Icon;
use yii\grid\GridView;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => '../'.Url::to('shop/index')];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php  foreach ($posts as $product){?>
        <div class="category-view-wrap">
            <div class="category-view__product-name"><?=$product->name;?></div>
            <div>.......................</div>
            <?= Html::a(FA::icon('cart-arrow-down'), ['post/show', 'page'=>5], ['class'=>'category-view__link']); ?>

        </div>
    <?php } ?>

    <? echo LinkPager::widget([
      'pagination' => $pagination,
      'registerLinkTags' => true
    ]); ?>


</div>
