<?php
$this->title = 'Worldstage';
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
  background-image: url('/vendors/images/img/1.png');
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">LED Product Calculator</h1>

        <p class="lead">Fill the below form to get results.</p>

        <!--<p><a class="btn btn-lg btn-success" id="get_started" href="#">Get started</a></p>
        <hr />-->
    </div>

    <div class="body-content">
       

    <div class="container">
    
<form id="form_id">
    <div class="form-group card" id="dynamic_form">
    <div class="card-body"> 
    <!--<div class="cropped">
      <img src="/vendors/images/img/1.png">       
    </div>  -->      
    <div class="row justify-content-center align-items-center">                        
        <!--<input type="checkbox" id="product_type" name="product_type" checked data-toggle="toggle" data-on="Metric" data-off="Imperial" data-onstyle="success" data-offstyle="danger">-->
    <div class="col-md-4">
    <div class="row">  
    <label class="col-md-5">Product sizing: </label>  
    <div class="col-md-7">   
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-warning active">
        <input type="radio" name="product_type" id="product_type" autocomplete="off" checked> Metric
      </label>
      <label class="btn btn-warning">
        <input type="radio" name="product_type" id="product_type" autocomplete="off"> Imperial
    </div>
    </div>
    </div>
    </div>
    <!--</div> 
    
    <div class="row justify-content-center align-items-center mt-2">  -->
    <div class="col-md-4">
    <div class="row">
    <label class="col-md-5">Size Type: </label>   
    <div class="col-md-7">
        <select class="form-control" id="size_type" name="size_type">
          <option>- Select -</option>
          <option>Tile</option>
          <option>Physical</option>
        </select>
    </div>
    </div>
    </div>
    </div>
    
    <div class="row justify-content-center align-items-center mt-2">
    <div class="col-md-4">
    <div class="row">
    <label class="col-md-5">Wall Width: </label> 
    <div class="col-md-7">
        <input type="text" name="wall_width" id="wall_width" placeholder="Wall Width" class="form-control">
    </div>
    </div>
    </div>
    <!--</div>
    <div class="row justify-content-center align-items-center mt-2"> -->
    <div class="col-md-4">
    <div class="row">
    <label class="col-md-5">Wall Height: </label> 
    <div class="col-md-7">
        <input type="text" name="wall_height" id="wall_height" placeholder="Wall Height" class="form-control">
    </div>
    </div>
    </div> 
    </div> 
                   
    <div class="row justify-content-center align-items-center mt-2" style="border: 1px solid #702F8A;"> 
    
    <label class="col-md-2">Wall Type: </label>            
    <section class="row responsive slider col-md-7">    
        <div class="active">
          <label class="btn">
            <input type="radio" name="wall_type" id="wall_type" autocomplete="off" checked><img src="http://placehold.it/350x300?text=1">
          </label>
        </div>
        <div>
          <label class="btn">
            <input type="radio" name="wall_type" id="wall_type" autocomplete="off" checked><img src="http://placehold.it/350x300?text=2">
          </label>
        </div>
        <div>
          <label class="btn">
            <input type="radio" name="wall_type" id="wall_type" autocomplete="off" checked><img src="http://placehold.it/350x300?text=3">
          </label>
        </div>
     </section>
    </div> 

<?php /*
  <select class="theme" name='wall_type[]' class="image-picker show-labels show-html">           
  
    

<?php 
$thems = [['id'=>1, 'name'=>'Tile only view'], ['id'=>2, 'name'=>'Ground Support'], ['id'=>3, 'name'=>'Flown'] ];
foreach($thems as $theme){
    $img = 'http://placehold.it/350x300?text='.$theme['id']; 
?>
<div>
<option data-img-src="<?php echo $img; ?>" value="<?php echo $theme['id']; ?>"><?php echo $theme['name']; ?></option>
</div>
<?php } ?>

 </select>

*/ ?>
          
    

        
      
                
    <div class="row justify-content-center align-items-center mt-2">  
    <div class="col-md-4">
    <div class="row">
    <label class="col-md-4">Install Type: </label>  
    <div class="col-md-7">
        <select class="form-control" id="install_type" name="install_type">
          <option>Flown</option>
          <option>Ground Stack</option>
          <option>Custom</option>
        </select>
    </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="row">
        <label class="col-md-4">Quantity: </label>    
        <div class="col-md-7">
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity">
        </div>
     </div> 
     </div>  
        
        <div class="button-group">
            <a href="javascript:void(0)" class="btn btn-primary" id="plus5">Add more walls</a>
            <a href="javascript:void(0)" class="btn btn-danger" id="minus5">Remove</a>
        </div>
    </div>
    
    
    </div>
    
    

</div>
<div class="row justify-content-center align-items-center"> 
<button type="submit" class="btn btn-primary" >Submit</button>
</div>
</form>
        <div class="row">
        <div id="wait" style="display:none;position:absolute;top:50%;left:50%;padding:2px; z-index: 1000;">
            <img src='/img/ajaxloader.gif'/>
        </div>
        <div id="results"></div>  
        </div>
    </div>
        


    </div>
</div>
<br />
<br />
<br />
<script>
/*
$('.cb-value').click(function() {
  var mainParent = $(this).parent('.toggle-btn');
  if($(mainParent).find('input.cb-value').is(':checked')) {
    $(mainParent).addClass('active');
  } else {
    $(mainParent).removeClass('active');
  }

})
*/

//$("#form_id").submit(function(){return false;});
	
       function results(){
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


/*
$("#get_started").click(function() {
    $('html,body').animate({
        //$('#dynamic_form').show();
        scrollTop: $("#dynamic_form").offset().top},'slow');
});
*/
//function togglethis(name){
  //  $(this).prop('checked');
//}


$('.responsive').slick({
  //dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  //arrows: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
}); 

$(document).ready(function() {
    
//$(".theme").imagepicker({show_label: true});


    
  /*  $('.tgl').bootstrapToggle({
      'on': 'Metric',
      'off': 'Imperial'
    });*/
   // $('#dynamic_form').hide();
    
	var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
        limit:10,
        formPrefix : "dynamic_form",
        normalizeFullForm : true
    });

//	dynamic_form.inject([{p_name: 'Hemant',quantity: '123',remarks: 'testing remark'},{p_name: 'Harshal',quantity: '123',remarks: 'testing remark'}]);

    $("#dynamic_form #minus5").on('click', function(){
    	var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
    	if (initDynamicId === 2) {
    		$(this).closest('#dynamic_form').next().find('#minus5').hide();
    	}
    	$(this).closest('#dynamic_form').remove();
    });

    $('#form_id').on('submit', function(event){
    	var values = {};
		$.each($('#form_id').serializeArray(), function(i, field) {
		    //values[field.name] = field.value;
            $(field.id).val(field.value);
		});
		//console.log(values)
        results();
		event.preventDefault();
	})
});
        
//////////////////////////////////////////
   


</script>
