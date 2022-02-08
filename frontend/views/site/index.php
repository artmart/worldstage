<?php
$this->title = 'Worldstage';
use frontend\models\Products;
?>
<style>
.jumbotron {
        padding-bottom: 0rem;
}
.card {
    border: 1px solid #702F8A;
}

.btn-primary {
    color: #fff;
    background-color: #012169;
    border-color: #012169;
}

.btn-danger {
    color: #fff;
    background-color: #702F8A;
    border-color: #702F8A;
}

.cropped {
    width: 50%;
    height: 100%;
    overflow: hidden;
    border: 0px;
    float: right;
}

.cropped img {
    margin: 0px 0px 0px 0px;
}

body {
  /*background-image: url('/vendors/images/img/1.png');*/
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-position: right;
}

 html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
      height: 100px;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }

    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }
    
.slider {
    margin: 20px;
}
</style>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>-->

<?php
$products = Products::find()->all();
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">LED Product Calculator</h1>
        <p class="lead">Fill the below form to get results.</p>
    </div>
    <div class="body-content">
    <div class="container">
   
<form id="form_id">
<div class="input_fields_wrap">
    <div class="form-group card">
    <div class="card-body">   
      
    <div class="row justify-content-center align-items-center">                        
        
    <div class="col-md-4">
    <div class="row">  
    <label class="col-md-5">Product sizing: </label>  
    <div class="col-md-7">   
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn radio_button active">
        <input type="radio" name='product_sizing[0]' value="0" checked> Metric
      </label>
      <label class="btn radio_button">
        <input type="radio" name='product_sizing[0]' value="1"> Imperial
      </label>
    </div>
    </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="row">
    <label class="col-md-5">Size Type: </label>   
    <div class="col-md-7">
        <select class="form-control" id="size_type0" name="size_type[0]" onchange="sizetypechange(0)">
          <option value="physical">Physical</option>
          <option value="tile">Tile</option>
        </select>
    </div>
    </div>
    </div>
    </div>
    
    <div class="row justify-content-center align-items-center mt-2">
    <div class="col-md-4">
    <div class="row">
    <label class="col-md-5 wall_width_label">Wall Width: </label> 
    <div class="col-md-7">
        <input type="text" name="wall_width[0]" id="wall_width0" placeholder="Wall Width" value="5" class="form-control">
    </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="row">
    <label class="col-md-5 wall_height_label">Wall Height: </label> 
    <div class="col-md-7">
        <input type="text" name="wall_height[0]" id="wall_height0" placeholder="Wall Height" value="3" class="form-control">
    </div>
    </div>
    </div> 
    </div> 
                   
    <div class="row justify-content-center align-items-center mt-2" style="border: 1px solid #702F8A;"> 
    <label class="col-md-2">Wall Type: </label>        
    <section class="regular slider col-md-7">  
    <?php 
    $k=1;
    foreach($products as $p){
    $checked = '';
    if($k==1){$checked = 'checked';}else{$checked = '';}
    $pic = '/uploads/products/no-picture.jpg';
    if($p->link_to_picture_flown){$pic = '/uploads/products/'. $p->link_to_picture_flown;}
    if($p->primary_picture==1 && $p->link_to_picture_ground_support){$pic = '/uploads/products/'. $p->link_to_picture_ground_support;}
    if($p->primary_picture==2 && $p->link_to_picture_of_tile){$pic = '/uploads/products/'. $p->link_to_picture_of_tile;}
    ?>
    <div><label class="btn"><input type="radio" name="wall_type[0]" value="<?=$p->id;?>" <?=$checked;?> ><img src="<?=$pic;?>"><br /><?=$p->product_name;?></label></div>
    <?php $k++;} ?>  
    </section> 
    </div> 
       
    <div class="row justify-content-center align-items-center mt-2">  
    <div class="col-md-4">
    <div class="row">
    <label class="col-md-4">Install Type: </label>  
    <div class="col-md-7">
        <select class="form-control" id="install_type" name="install_type[0]">
          <option value="Flown">Flown</option>
          <option value="Ground Stack">Ground Stack</option>
          <option value="Custom">Custom</option>
        </select>
    </div>
    </div>
    </div>
    
    <div class="col-md-4">
    <div class="row">
    <label class="col-md-4">Quantity: </label>    
    <div class="col-md-7">
        <input type="text" class="form-control" name="quantity[0]" id="quantity" value="1" placeholder="Quantity">
    </div>
    </div> 
    </div>  
    </div>
 
</div>
    
</div>
</div>


<div class="row justify-content-center align-items-center"> 
<button type="submit" class="btn btn-primary" onclick="results()">Submit</button>
<button class="add_field_button btn btn-primary">Add more walls</button>
<div id="wait" style="display:none; z-index: 1000;" class="justify-content-center align-items-center"> <img src='/img/ajaxloader.gif'/> Loading...</div>
</div>
</form>
 
<hr />
<div class="row"><div id="results"></div> </div>
</div>
</div>
</div>
<br />
<br />
<br />
<script>
 function sizetypechange(id){   
    var wall_width_text = 'Wall Width';
    var wall_height_text = 'Wall Height';
    
    if($('#size_type'+id).val()=='tile'){
            wall_width_text = 'Tiles Wide';
            wall_height_text = 'Tiles Tall';            
        }
        
        //$('#wall_width'+id).val(wall_width_text);
        //$('#wall_height'+id).val(wall_height_text);
        
    // $('#wall_width'+id).attr("placeholder", wall_width_text);
     $('#wall_width'+id).closest('.row').find('.wall_width_label').text(wall_width_text+':'); 
     
    // $('#wall_height'+id).attr("placeholder", wall_height_text);
     $('#wall_height'+id).closest('.row').find('.wall_height_label').text(wall_height_text+':');
 }


$("#form_id").submit(function(){return false;});
	
       function results(){
        
         if(!$("#form_id").valid()){return false;}else{
        
        var data = $("#form_id").serialize();
        $.ajax({
    			type: 'post',
    			url: '/site/results',
    			data: data,
                beforeSend: function() {
                   $("#wait").css("display", "block");               
                  },
    			success: function (response){
    			     $("#wait").css("display", "none");
    			     $( '#results' ).html(response);
                       $('html,body').animate({scrollTop: $("#results").offset().top},'slow');
                     //setTimeout( "$('#results').hide();", 4000);
    			}
            }); 
         }
      }

/*
function destroyCarousel() {
    if ($('.regular').hasClass('slick-initialized')) {
        $('.regular').slick('unslick');
        $('.regular').slick('slickRemove', 0);
    }
}
*/

function applySlider() {
    $(".regular").slick({
        focusOnSelect: true,
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
  }

$(document).ready(function(){
applySlider();
    
	var max_fields      = 10; 
	var wrapper   		= $(".input_fields_wrap"); 
	var add_button      = $(".add_field_button"); 
    var append;   
    var formfields;

var options = {
        focusOnSelect: true,
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
};
	var x = 1; 
	$(add_button).click(function(e){ 
		e.preventDefault();
		if(x < max_fields){ 
		  
            formfields = '<div class="form-group card"><div class="card-body">';
            formfields += '<div class="row justify-content-center align-items-center">';
            formfields += '<div class="col-md-4"><div class="row"><label class="col-md-5">Product sizing: </label><div class="col-md-7">';   
            formfields += '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
            formfields += '<label class="btn radio_button active"><input type="radio" name="product_sizing['+x+']" value="0" checked> Metric</label>';
            formfields += '<label class="btn radio_button"><input type="radio" name="product_sizing['+x+']"  value="1"> Imperial</label></div></div></div></div>';
            
            formfields += '<div class="col-md-4"><div class="row"><label class="col-md-5">Size Type: </label><div class="col-md-7">';
            formfields += '<select class="form-control" id="size_type'+x+'" name="size_type['+x+']" onchange="sizetypechange('+x+')">';
            formfields += '<option value="physical">Physical</option><option value="tile">Tile</option></select></div></div></div></div>';
                        
            formfields += '<div class="row justify-content-center align-items-center mt-2"><div class="col-md-4"><div class="row">';
            formfields += '<label class="col-md-5 wall_width_label">Wall Width: </label><div class="col-md-7">';
            formfields += '<input type="text" name="wall_width['+x+']" id="wall_width'+x+'" value="5" placeholder="Wall Width" class="form-control"></div></div></div>';

            formfields += '<div class="col-md-4"><div class="row"><label class="col-md-5 wall_height_label">Wall Height: </label><div class="col-md-7">';
            formfields += '<input type="text" name="wall_height['+x+']" id="wall_height'+x+'" value="3" placeholder="Wall Height" class="form-control"></div></div></div></div>';
            
            formfields += '<div class="row justify-content-center align-items-center mt-2" style="border: 1px solid #702F8A;">'; 
            formfields += '<label class="col-md-2">Wall Type: </label><section class="regular slider col-md-7" id="regular['+x+']">';    
            <?php 
            $k=1;
            foreach($products as $p){
            if($k==1){$checked = 'checked';}else{$checked = '';}
            $pic = '/uploads/products/no-picture.jpg';
            if($p->link_to_picture_flown){$pic = '/uploads/products/'. $p->link_to_picture_flown;}
            if($p->primary_picture==1 && $p->link_to_picture_ground_support){$pic = '/uploads/products/'. $p->link_to_picture_ground_support;}  
            if($p->primary_picture==2 && $p->link_to_picture_of_tile){$pic = '/uploads/products/'. $p->link_to_picture_of_tile;}
            //$pic = '/uploads/products/'. $p->link_to_picture_flown;
            //if($p->primary_picture==1){$pic = '/uploads/products/'. $p->link_to_picture_ground_support;}
            ?>
            formfields += '<div><label class="btn"><input type="radio" name="wall_type['+x+']" value="<?=$p->id;?>" <?=$checked;?>><img src="<?=$pic;?>"></label></div>';
            <?php $k++;} ?>
            formfields += '</section></div>';
                    
            formfields += '<div class="row justify-content-center align-items-center mt-2"><div class="col-md-4"><div class="row">';
            formfields += '<label class="col-md-4">Install Type: </label><div class="col-md-7">';
            formfields += '<select class="form-control" id="install_type" name="install_type['+x+']">';
            formfields += '<option value="Flown">Flown</option><option value="Ground Stack">Ground Stack</option><option value="Custom">Custom</option>';
            formfields += '</select></div></div></div>';
    
            formfields += '<div class="col-md-4"><div class="row"><label class="col-md-4">Quantity: </label><div class="col-md-7">';
            formfields += '<input type="text" class="form-control" name="quantity['+x+']" id="quantity" value="1" placeholder="Quantity">';
            formfields += '</div></div></div>';  
        
            formfields += '<div class="button-group">';
            formfields += '<a href="javascript:void(0)" class="btn btn-danger remove_field">Remove</a></div></div>';

            formfields += '</div></div></div>';
          
            append = formfields; //+'<a href="#" class="remove_field col-sm-1"> X</a>';
            $(wrapper).append(append); 
                         
            $(".regular").not('.slick-initialized').slick(options);
			
            x++; 
        }
	});
	
	$(wrapper).on("click",".remove_field", function(e){ 
		e.preventDefault(); $(this).closest('.card').remove(); x--;
	})
});
</script>