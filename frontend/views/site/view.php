<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use frontend\models\Ballasts;
use frontend\models\Repair;
use frontend\models\Coloring;
use frontend\models\Prices;
use frontend\models\Installtime;

$this->title = 'Product: '. $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view container">

<div class="card border-primary mb-3">
<div class="card-header">Product: <?=$model->product_name;?></div>
<div class="card-body text-primary">

  
 <div class="row">
  <div class="col-lg-8"> 
    <div class="row">
        <h1 class="col-sm-9"><?= Html::encode($this->title) ?></h1>
    </div>
  <?php
  $primary_pictures = ['0'=>'Ground support', '1'=>'Flown'];
  
  echo DetailView::widget([
        'model' => $model,
        'attributes' => ['phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent',
                         'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch',
                         'full_power_draw_amps', 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 'max_height_flown',
                         //['attribute' => 'primary_picture', 'value' =>  $primary_pictures[$model->primary_picture]],'product_name', 
        ],
    ]) ?>
    
    
  <div class="row">  
    <div class="col-lg-6">
    <label>Link To Picture Flown</label> 
      <?php 
	   $file = Url::to('@web/uploads/products/'.$model->link_to_picture_flown, true);
		if ($model->link_to_picture_flown){ ?>
			<div class="form-group">
             <img src="<?=$file?>" alt="" width="100%">
			</div>	
    <?php } ?>  
    </div>
    <div class="col-lg-6">
    <label>Link To Picture Ground</label>
    <?php 
	   $file1 = Url::to('@web/uploads/products/'.$model->link_to_picture_ground_support, true);
		if ($model->link_to_picture_ground_support){ ?>
			<div class="form-group">
             <img src="<?=$file1?>" alt="" width="100%" >
			</div>	
    <?php } ?> 
    </div>
   </div> 
  </div>

<div class="col-lg-4"> 
<div class="row">
<?php $ballast_model= Ballasts::find()->where(['product_id' =>$model->id])->one();
  if($ballast_model){?>
   <h1>Ballasts</h1>
   <?php
   for($b=1; $b<=min(15, $model->max_height_ground); $b++){$column_ralls[] = '_'.$b.'_column_tall';}
   echo DetailView::widget(['model' => $ballast_model, 'attributes' =>$column_ralls]);
    }?>

</div>
<hr />
<div class="row">
    <h1>Timing</h1>
    <table class="table table-striped">
        <tbody>
          <tr><td><strong>Repair</strong></td>
          <td>
          <?php
          $repair_model= Repair::find()->where(['product_id' =>$model->id])->one();
          if($repair_model){echo $repair_model->repair_time_per_tile_installed; }
          ?>
          </td>
          </tr>
          <tr>
            <td><strong>Coloring</strong></td>
            <td>
          <?php
          $coloring_model= Coloring::find()->where(['product_id' =>$model->id])->one();
          if($coloring_model){echo $coloring_model->coloring_time_per_tile_installed; }
          ?>
            </td>
          </tr>
        </tbody>
      </table>
</div>


  </div>
  </div>  

<hr /> 


  <?php  
  $installtimes = Installtime::find()->where(['product_id' =>$model->id])->andWhere(['install_type' => $prd_install_type])->one(); 
  if($installtimes){ ?>
  <h1>Install time</h1>
  <?php
  echo DetailView::widget([
        'model' => $installtimes,
        'attributes' => ['install_type', '_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall',
                      '_8_column_tall', '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall'
            ],
    ]);

     } 
    ?>



<hr />

  <?php
  $prices_model= Prices::find()->where(['product_id' =>$model->id])->one();
  if($prices_model){?>
 <h1>Prices</h1>
 
    <hr />
    <?= DetailView::widget([
        'model' => $prices_model,
        'attributes' => ['price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate'],
    ]);
   }?>
  </div> 
  
   </div>
</div> 