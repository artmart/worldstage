<?php
ini_set('memory_limit', '512M');
ini_set('max_execution_time', 3000);
use frontend\models\Products;
//use yii\widgets\DetailView;
//var_dump($_REQUEST);

$product_sizing = $_REQUEST['product_sizing']; 
$size_type = $_REQUEST['size_type']; 
$wall_width = $_REQUEST['wall_width']; 
$wall_height = $_REQUEST['wall_height']; 
$wall_type = $_REQUEST['wall_type']; 
$install_type = $_REQUEST['install_type']; 
$quantity = $_REQUEST['quantity'];

//$primary_pictures = ['0'=>'Ground support', '1'=>'Flown'];
//$connection = Yii::$app->getDb();

for($p=0; $p<count($product_sizing); $p++){
    $prd_sizing = $product_sizing[$p];  
    $prd_size_type =  $size_type[$p]; 
    $prd_wall_width = $wall_width[$p]; 
    $prd_wall_height = $wall_height[$p]; 
    $prd_wall_type = $wall_type[$p]; 
    $prd_install_type = $install_type[$p]; 
    $prd_quantity = $quantity[$p];


$products = Products::find()->where(['id' =>$prd_wall_type])->one();    
//$sql = 'select * from '
//$query_res = $connection->createCommand($sql)->queryAll();
//$cnt = count($query_res);
    
 //$repair_model= Repair::find()->where(['product_id' =>$model->id])->one();   
 //var_dump($products); 
 echo yii\base\View::render('//site/view', ['model'=>$products, 
                                            'prd_sizing' => $prd_sizing,
                                            'prd_size_type' => $prd_size_type,
                                            'prd_wall_width' => $prd_wall_width,
                                            'prd_wall_height' => $prd_wall_height,
                                            'prd_wall_type' => $prd_wall_type,
                                            'prd_install_type'=>$prd_install_type,
                                            'prd_quantity'=>$prd_quantity,
                                            'p'=>$p]);

 /* 
  echo DetailView::widget([
        'model' => $products,
        'attributes' => ['product_name', 'phsyical_width_inches', 'physica_height_inches', 'pixel_width', 'pixel_height', 'weight_per_tile_lbs', 'hardware_weight_percent',
                         'tiles_per_case', 'case_width_inch', 'case_height_inch', 'case_length_inch',
                         'full_power_draw_amps', 'recommended_max_height_ground', 'max_height_ground', 'recommended_max_height_flown', 'max_height_flown',
                         ['attribute' => 'primary_picture', 'value' =>  $primary_pictures[$products->primary_picture]],
        ],
    ]); */ 
}
exit;
?>