<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php
    Modal::begin([
        'header' => '<h4>Branches</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    
    Modal::end();
    ?>
    
    <?php
    $this->params['test']= 'this is a test string';
    $this->beginBlock('advertisement');?>
    <h3>This is a Advertisement</h3>
    <?php $this->endBlock(); ?>

        
   
    
      

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' =>function($model){
                      if($model->branch_status == 'inactive')
                      {
                          return['class'=>'danger']; 
                      }
                      else
                          {
                           return['class'=>'success']; 
                      }
                         
                      
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' => 'companies_company_id',
        'value' => 'companiesCompany.company_name',
    ],

            'companiesCompany.company_name',
            'branch_name',
            'branch_address',
            'branch_created_date',
             'branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
