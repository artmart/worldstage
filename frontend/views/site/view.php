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

//var_dump($_REQUEST);
?>
<div class="products-view container">

<div class="card border-primary mb-3">
<div class="card-header">Product: <?=$model->product_name;?></div>
<div class="card-body text-primary">

<div class="row" style="border:1px solid #ccc; padding: 5px;">
<!--<div class="col-lg-2">
 <img src="/img/person1.jpeg" alt="" height="100px">
</div>-->
<div class="col-lg-12 d-flex justify-content-center" style="width: 100% !important; max-height: 1600px !important;">

<script>
//products, 
/*
var prd_sizing = <?=$prd_sizing?>;
var prd_size_type = <?=$prd_size_type?>;
var prd_wall_width = <?=$prd_wall_width?>;
var prd_wall_height = <?=$prd_wall_height?>;
var prd_wall_type = <?=$prd_wall_type?>;
var prd_install_type = <?=$prd_install_type?>;
var prd_quantity = <?=$prd_quantity?>;
*/
</script>
<?php 

   // $prd_wall_width
   // $prd_wall_height

if($prd_size_type=='tile'){

}


$mm_to_pixel = 3.7795275591;
$inch_to_mm = 25.4;
$inch_to_pixel = 96;

$max_height = 300;
$max_width = 1600;

$pic_height = 984/$mm_to_pixel;
$pic_width = 310/$mm_to_pixel;

//$canvas_width = $prd_wall_width; //$prd_wall_width*$pixel;//*1600/max($prd_wall_width*$pixel, 1600);
//$canvas_height = $prd_wall_height; //$prd_wall_height*$pixel;//*300/ max($prd_wall_height*$pixel, $pic_height, 300);

$rows = round($prd_wall_height/$model->physica_height_inches);
$columns = round($prd_wall_width/$model->phsyical_width_inches);

/*width="<?=$canvas_width+$pic_width+10?>" height="<?=max($pic_height, $canvas_height)?>"*/
?>
 <canvas id="canvas<?=$p?>" style="border:1px solid #ccc;"></canvas>
</div>
<script>
(function(){
    var rows=parseFloat('<?=$rows?>');
    var columns=parseFloat('<?=$columns?>');
    var one_height=300/rows; //parseFloat('<?=$model->physica_height_inches?>');
    var one_width = 700/columns; //parseFloat('<?=$model->phsyical_width_inches?>'); 
    var pic_width =parseFloat('<?=$pic_width?>'); 
    var pic_height =parseFloat('<?=$pic_height?>');
    var min_heigh = 0;
    if(rows*one_height<pic_height){
        min_heigh = pic_height-rows*one_height;
    }
    
    
    fabric.Object.prototype.originY = 'bottom';

    //fabric.Object.prototype.originX = 'left';
  var realWidth = columns*one_width+pic_width+100;
  var realHeight = Math.max(rows*one_height, pic_height)+10;
  var canvas<?=$p?> =  new fabric.StaticCanvas('canvas<?=$p?>');
  canvas<?=$p?>.setDimensions({ width: realWidth, height: realHeight });
//canvas<?=$p?>.setWidth('70%');
//canvas<?=$p?>.setHeight('50%');
//var canvas = new fabric.Canvas('canvas');

    fabric.Image.fromURL('/img/person1.jpeg', function(img) {canvas<?=$p?>.add(img.set({ left: 0, top: realHeight-10, angle: 0}).scale(0.16));}); //, width: <?=$pic_width?>

y=1;   
while (y <= rows){
    x=0;
    while (x <= columns){
        canvas<?=$p?>.add( new fabric.Rect({ top: min_heigh+one_height*y, left: pic_width+one_width*x, width: one_width, height: one_height, fill: '#13035e', stroke: 'black', strokeWidth: 1 }),); 
        x++;
    }
    y++;
}

//canvas<?=$p?>.add(new fabric.Line([100*x, 0, 100*x, 600],{ stroke: "#000000", strokeWidth: 1, selectable:false,}));
//canvas<?=$p?>.add(new fabric.Line([100, 0, 0, 50],{ stroke: "#000000", strokeWidth: 1, selectable:false, }));


    canvas<?=$p?>.add(new fabric.Text('txt', {left: 50, top: 10, fontFamily: 'arial', fill: 'red', fontSize: 20, angle: 60}));

    //var canvas = window.__canvas = new fabric.Canvas('c');
    addArrowToCanvas<?=$p?>([510, 10, 510, 100], 120);/*from  w  ww . dem  o2 s. c o  m*/
    
    addArrowToCanvas<?=$p?>([510, 240, 510, 150], 60);
    
    
    addArrowToCanvas<?=$p?>([5, 270, 210, 270], 270);
    addArrowToCanvas<?=$p?>([510, 270, 280, 270], 90);
    
    addArrowToCanvas<?=$p?>([5, 250, 220, 125], 240);
    addArrowToCanvas<?=$p?>([490, 5, 260, 125], 60);
    
    function addArrowToCanvas<?=$p?>(coords, angle) {
        var line, arrow;
        line = new fabric.Line(coords, {stroke: 'blue', selectable: true, strokeWidth: '2', padding: 5, hasBorders: false, hasControls: false, originX: 'center',
                                        originY: 'center', lockScalingX: true, lockScalingY: true});
        var centerX = (line.x1 + line.x2) / 2,
            centerY = (line.y1 + line.y2) / 2;
        deltaX = line.left - centerX,
        deltaY = line.top - centerY;
        arrow = new fabric.Triangle({
            left: line.get('x1') + deltaX+1.5,
            top: line.get('y1') + deltaY,
            originX: 'center',
            originY: 'center',
            padding: 5,
            hasBorders: false,
            hasControls: false,
            lockScalingX: true,
            lockScalingY: true,
            lockRotation: true,
            pointType: 'arrow_start',
            angle: angle,
            width: 10,
            height: 10,
            fill: 'blue'
        });
       // arrow.line = line;
      /*  circle = new fabric.Circle({
            left: line.get('x2') + deltaX,
            top: line.get('y2') + deltaY,
            radius: 1,
            stroke: '#000',
            strokeWidth: 3,
            originX: 'center',
            originY: 'center',
            hasBorders: false,
            hasControls: false,
            lockScalingX: true,
            lockScalingY: true,
            lockRotation: true,
            pointType: 'arrow_end',
            fill: '#000'
        });*/
        //circle.line = line;
        //line.customType = arrow.customType = circle.customType = 'arrow';
        //line.circle = arrow.circle = circle;
        //line.arrow = circle.arrow = arrow;
        canvas<?=$p?>.add(line, arrow);


    }
})();

</script>
</div>
  
 <div class="row">
  <div class="col-lg-8"> 
    <div class="row">
        <h1 class="col-sm-9"><?= Html::encode($this->title) ?></h1>
    </div>
  <?php
  $primary_pictures = ['0'=>'Ground support', '1'=>'Flown'];
  
  echo DetailView::widget(['model' => $model,
        'attributes' => ['phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent',
                         'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch',
                         'full_power_draw_amps', // 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 'max_height_flown',
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

<?php /*
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
*/ ?>


  </div>
  </div>  

<hr /> 
  <?php  
  $installtimes = Installtime::find()->where(['product_id' =>$model->id])->andWhere(['install_type' => $prd_install_type])->one(); 
  if($installtimes){ ?>
  <h1>Install time</h1>
  <?= DetailView::widget(['model' => $installtimes,
        'attributes' => ['install_type', '_1_column_tall', '_2_column_tall', '_3_column_tall', '_4_column_tall', '_5_column_tall', '_6_column_tall', '_7_column_tall',
                      '_8_column_tall', '_9_column_tall', '_10_column_tall', '_11_column_tall', '_12_column_tall', '_13_column_tall', '_14_column_tall', '_15_column_tall'],
    ]);
    } 
    
    
    
    /*
    ?>



<hr />

  <?php
  $prices_model= Prices::find()->where(['product_id' =>$model->id])->one();
  if($prices_model){?>
 <h1>Prices</h1>
 <hr />
    <?= DetailView::widget(['model' => $prices_model,
        'attributes' => ['price_per_tile', 'ground_support', 'flown', 'sandbag_estimate', 'mini_g_block_estimate'],
    ]);
   }
   
   */
   ?>
   
   
   
   
   
  </div> 
  
   </div>
</div> 