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
<div class="products-view">

<hr />
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Product</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="installtimes-tab" data-toggle="tab" href="#installtimes" role="tab" aria-controls="installtimes" aria-selected="false">Install Times</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="prices-tab" data-toggle="tab" href="#prices" role="tab" aria-controls="prices" aria-selected="false">Prices</a>
  </li>  
  
  
</ul>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <br />
  
 <div class="row">
  <div class="col-lg-8"> 
    <div class="row">
        <h1 class="col-sm-9">Product<?php // Html::encode($this->title) ?></h1>
        <p class="col-sm-3 d-flex justify-content-end">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]) ?>
        </p>
    </div>
  <?= DetailView::widget([
        'model' => $model,
        'attributes' => ['product_name', 'phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent',
                         'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch',
                         'full_power_draw_amps', 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 'max_height_flown'
        ],
    ]) ?>
  </div>
  <div class="col-lg-4"> 
<?php $ballast_model= Ballasts::find()->where(['product_id' =>$model->id])->one();
  if($ballast_model){?>
   <div class="row clearfix">
    <h1 class="col-sm-10">Ballast</h1>
    <p class="col-sm-2 d-flex justify-content-end">
        <?= Html::a('Update', ['ballasts/update', 'id' => $ballast_model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['ballasts/delete', 'id' => $ballast_model->id], [
            'class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post'],
        ]) ?>
    </p>
</div>
   <?= DetailView::widget([
        'model' => $ballast_model,
        'attributes' => ['_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall', '_8_column_tall',
                         '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall'],
    ]);
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
        echo yii\base\View::render('//ballasts/_form', ['model'=>$new_ballasts_model])
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
    
     
    <hr />
    
  <div class="row">
  <div class="col-lg-4">
      <?php 
	   $file = Url::to('@web/uploads/products/'.$model->link_to_picture_flown, true);
		if ($model->link_to_picture_flown){ ?>
			<div class="form-group">
             <img src="<?=$file?>" alt="" width="100%">
			</div>	
    <?php } ?>  
    </div>
    <div class="col-lg-4">
    <?php 
	   $file1 = Url::to('@web/uploads/products/'.$model->link_to_picture_ground_support, true);
		if ($model->link_to_picture_ground_support){ ?>
			<div class="form-group">
             <img src="<?=$file1?>" alt="" width="100%" >
			</div>	
    <?php } ?> 
    </div>
   
    <div class="col-lg-4">
    <table class="table table-striped">
        <tbody>
          <tr><td><strong>Repair</strong></td>
          <td>
          <?php
          $repair_model= Repair::find()->where(['product_id' =>$model->id])->one();
          if($repair_model){?>
           <div class="row">
            <div class="col-sm-10"><?= $repair_model->repair_time_per_tile_installed; ?></div>
            <div class="col-sm-2 d-flex justify-content-end">
                <?= Html::a('Update', ['repair/update', 'id' => $repair_model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['repair/delete', 'id' => $repair_model->id], [
                    'class' => 'btn btn-danger btn-sm', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post'],
                ]) ?>
            </div>
            </div>
           <?php }else{ ?>
            <!--<div class="alert alert-warning">No Repair available for this product yet.</div>-->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Repair</button>
            <!-- Modal for the new Repair -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add new Repair</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <?php  
                    $new_repair_model = new Repair();
                    $new_repair_model->product_id = $model->id;
                    echo yii\base\View::render('//repair/_form', ['model'=>$new_repair_model])
                    ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                  </div>
                </div>
              </div>
            </div>            
        <?php } ?>
          </td>
          </tr>
          <tr>
            <td><strong>Coloring</strong></td>
            <td>
          <?php
          $coloring_model= Coloring::find()->where(['product_id' =>$model->id])->one();
          if($coloring_model){?>
           <div class="row">
            <div class="col-sm-10"><?= $coloring_model->coloring_time_per_tile_installed; ?></div>
            <div class="col-sm-2 d-flex justify-content-end">
                <?= Html::a('Update', ['coloring/update', 'id' => $coloring_model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Delete', ['coloring/delete', 'id' => $coloring_model->id], [
                    'class' => 'btn btn-danger btn-sm', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post'],
                ]) ?>
            </div>
            </div>
           <?php }else{ ?>
            <!--<div class="alert alert-warning">No Coloring available for this product yet.</div>-->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal3"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Coloring</button>
            <!-- Modal for the new coloring -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add new Coloring</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <?php  
                    $new_coloring_model = new Coloring();
                    $new_coloring_model->product_id = $model->id;
                    echo yii\base\View::render('//coloring/_form', ['model'=>$new_coloring_model])
                    ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                  </div>
                </div>
              </div>
            </div>            
        <?php } ?>
            </td>
          </tr>
        </tbody>
      </table>
</div>    
</div>
<hr />  
</div>
  
  <div class="tab-pane fade" id="installtimes" role="tabpanel" aria-labelledby="installtimes-tab">
  <div class="yscroll">
  <?php
 $installtimes_data_provider = new \yii\data\ActiveDataProvider(['query' => $model->getinstalltimes(), 'pagination' => false]);
 $installtimescount = $installtimes_data_provider->getTotalCount();
  
  if($installtimescount<3){ 
    
    if($installtimescount==0){
    ?>
    <div class="alert alert-warning">No Install Times available for this product yet.</div>
    
    <?php } ?>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal41"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Install times</button>
    <hr />
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
  <div class="tab-pane fade" id="prices" role="tabpanel" aria-labelledby="prices-tab">
  <div class="yscroll">
  <?php
  $prices_model= Prices::find()->where(['product_id' =>$model->id])->one();
  if($prices_model){?>
   <div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2 d-flex justify-content-end">
        <?= Html::a('Update', ['prices/update', 'id' => $prices_model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Delete', ['prices/delete', 'id' => $prices_model->id], [
            'class' => 'btn btn-danger btn-sm', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post'],
        ]) ?>
    </div>
    </div>
    <hr />
    <?= DetailView::widget([
        'model' => $prices_model,
        'attributes' => ['price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate'],
    ]);
   }else{ ?>
    <div class="alert alert-warning">No Prices available for this product yet.</div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal4"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Prices</button>
    <!-- Modal for the new Prices -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add new Prices</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <?php  
            $new_prices_model = new Prices();
            $new_prices_model->product_id = $model->id;
            echo yii\base\View::render('//prices/_form', ['model'=>$new_prices_model])
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>            
<?php } ?> 
  </div>
  </div>  
  
</div>
</div>