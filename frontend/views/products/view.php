<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use frontend\models\Ballasts;
//use frontend\models\Repair;
//use frontend\models\Coloring;
//use frontend\models\Prices;
use frontend\models\Installtime;
use frontend\models\Productadditionalsizes;

$this->title = 'Product: '. $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

<!-- Modal for the Additional Size -->
<div class="modal fade" id="exampleModal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Additional Size</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php  
        $new_productadditionalsizes_model = new Productadditionalsizes();
        $new_productadditionalsizes_model->product_id = $model->id;
        echo yii\base\View::render('//productadditionalsizes/_form', ['model'=>$new_productadditionalsizes_model])
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 


<div class="card">
<div class="card-header bg-info">Product Data</div>
  <div class="card-body"> 
  
  
 
  
 <div class="row">
  <div class="col-sm-8"> 
    <div class="row">
        <h1 class="col-sm-6">Product<?php // Html::encode($this->title) ?></h1>
        <p class="col-sm-6 d-flex justify-content-end">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]) ?>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Size</button>
        </p>
    </div>
  <?php
  $primary_pictures = ['0'=>'Ground support', '1'=>'Flown', '2' => 'Picture Of Tile'];
  
  echo DetailView::widget([
        'model' => $model,
        'attributes' => ['product_name', 'phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent',
                         'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch',
                         'full_power_draw_amps', 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 'max_height_flown',
                         ['attribute' => 'primary_picture', 'value' =>  $primary_pictures[$model->primary_picture]],
                         'price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate', 'coloring_time_per_tile_installed', 'repair_time_per_tile_installed',
        ],
    ]) ?>
    
 


  </div>

  <div class="col-sm-4"> 
  
  
  <div class="row1"> 
  <div class="col-lg-12">
    <label>Link To Picture Of Tile <?=($model->primary_picture==2)?'(Primary)':'';?></label> 
      <?php 
       $pic = '/uploads/products/no-picture.jpg';
	   $file0 = $pic;
        if($model->link_to_picture_of_tile!==null){ $file0 = Url::to('@web/uploads/products/'.$model->link_to_picture_of_tile, true); }
      ?>
			<div class="form-group">
             <img src="<?=$file0?>" alt="" width="100%">
			</div>	
 
    </div> 
    <div class="col-lg-12">
    <label>Link To Picture Flown <?=($model->primary_picture==1)?'(Primary)':'';?></label> 
      <?php 
	   $file = $pic;
		if ($model->link_to_picture_flown){ $file = Url::to('@web/uploads/products/'.$model->link_to_picture_flown, true); }?>
			<div class="form-group">
             <img src="<?=$file?>" alt="" width="100%">
			</div>	
    </div>
    <div class="col-lg-12">
    <label>Link To Picture Ground <?=($model->primary_picture==0)?'(Primary)':'';?></label>
    <?php 
	   $file1 = $pic;
		if ($model->link_to_picture_ground_support){$file1 = Url::to('@web/uploads/products/'.$model->link_to_picture_ground_support, true);} ?>
			<div class="form-group">
             <img src="<?=$file1?>" alt="" width="100%" >
			</div>	
    </div>
   </div>  
  
  <hr />
  
  

<div class="row">
<?php $ballast_model= Ballasts::find()->where(['product_id' =>$model->id])->one();
  if($ballast_model){?>
   <div class="row clearfix">
    <h1 class="col-sm-10">Ballasts</h1>
    <p class="col-sm-2 d-flex justify-content-end">
        <?= Html::a('Update', ['ballasts/update', 'id' => $ballast_model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['ballasts/delete', 'id' => $ballast_model->id], [
            'class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post'],
        ]) ?>
    </p>
</div>
   <?php
   for($b=1; $b<=min(15, $model->max_height_ground); $b++){$column_ralls[] = '_'.$b.'_column_tall';}
  // $column_ralls = ['_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall', '_8_column_tall',
   //                      '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall'];
   
   echo DetailView::widget(['model' => $ballast_model, 'attributes' =>$column_ralls]);
    }else{ ?>
<div class="alert alert-warning">No Ballast available for this product yet.</div>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Ballast</button>

<!-- Modal for the new Ballast -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add new Ballast</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php  
        $new_ballasts_model = new Ballasts();
        $new_ballasts_model->product_id = $model->id;
        echo yii\base\View::render('//ballasts/_form', ['model'=>$new_ballasts_model, 'max_height_ground'=>$model->max_height_ground])
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>  
<?php }?>
</div>

  </div>
  </div>  
         
</div>
</div>


<?php
 $additionalsizes_data_provider = new \yii\data\ActiveDataProvider(['query' => $model->getAdditionalsizes(), 'pagination' => false]);
 $additionalsizescount = $additionalsizes_data_provider->getTotalCount();
 if($additionalsizescount>0){
?>
<div class="card">
<div class="card-header bg-info">
    Additional Sizes
    <button type="button" class="btn btn-success btn-sm d-flex justify-content-end float-right" data-toggle="modal" data-target="#exampleModal0"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Additional Size</button>
</div>
  <div class="card-body"> 
  <div class="yscroll">
  <?php
  echo GridView::widget([
        'dataProvider' => $additionalsizes_data_provider,
        'columns' => ['product_name', 'phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent', 'tiles_per_case',
                      'case_width_inch', 'case_height_inch', 'case_length_inch', 'full_power_draw_amps', 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 
                      'max_height_flown', 'price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate', 'coloring_time_per_tile_installed', 'repair_time_per_tile_installed',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
            'urlCreator' => function ($action, $i_model, $key, $index){return Url::to(['productadditionalsizes/'.$action, 'id' => $i_model->id]);}]],
    ]); ?>
  </div>
  </div>
</div> 
<?php } ?>


<div class="card">
<div class="card-header bg-info">
    Install Times
    <button type="button" class="btn btn-success btn-sm d-flex justify-content-end float-right" data-toggle="modal" data-target="#exampleModal41"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Install times</button>
</div>
  <div class="card-body"> 
  <div class="yscroll">
  <?php
 $installtimes_data_provider = new \yii\data\ActiveDataProvider(['query' => $model->getinstalltimes(), 'pagination' => false]);
 $installtimescount = $installtimes_data_provider->getTotalCount();
  
  if($installtimescount<3){ 
    
    if($installtimescount==0){
    ?>
    <div class="alert alert-warning">No Install Times available for this product yet.</div>
    
    <?php } ?>
    <!-- Modal for the new Installtime -->
    <div class="modal fade" id="exampleModal41" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add new Install Times</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <?php  
            $new_installtimes_model = new Installtime();
            $new_installtimes_model->product_id = $model->id;
            echo yii\base\View::render('//installtime/_form', ['model'=>$new_installtimes_model]);
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>   
  <?php } 
  echo GridView::widget([
        'dataProvider' => $installtimes_data_provider,
        'columns' => ['install_type', '_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall',
                      '_8_column_tall', '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
            'urlCreator' => function ($action, $i_model, $key, $index){return Url::to(['installtime/'.$action, 'id' => $i_model->id]);}]],
    ]); ?>
  </div>
  </div>
</div>  
  
</div>