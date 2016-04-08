<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="platform-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row col-lg-4">
        
        
  <?php $imgFiles = \yii\helpers\FileHelper::findFiles(Yii::getAlias('@webroot'),['only'=>['*.png']]);

 foreach($imgFiles as $files)
{
        echo "<table>";
        echo "<tr>";
     
        $explodeImg = explode('\\', $files);
        $imgName = end($explodeImg);
        echo "<td>.$imgName</td>";
        echo Html::img(Yii::getAlias('@web').'/img/'.$imgName, ['class' => 'img-responsive img_list_products']);
        echo "</tr>";
        echo "</table>";
}


?>    
    </div>
</div>