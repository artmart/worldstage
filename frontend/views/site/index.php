<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
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

        <p><a class="btn btn-lg btn-success" id="get_started" href="#">Get started</a></p>
    </div>

    <div class="body-content">

        <div class="row">
        

    <div class="container">
    
<form id="form_id">
    <div class="form-group" id="dynamic_form">
            
            
    <div class="row justify-content-center align-items-center">                        
        <input type="checkbox" id="product_type" name="product_type[]" checked data-toggle="toggle" data-on="Metric" data-off="Imperial" data-onstyle="success" data-offstyle="danger"/>
    </div>     
    <div class="row justify-content-center align-items-center mt-3">
    <div class="col-md-3">
        <input type="text" name="wall_width[]" id="wall_width" placeholder="Wall Width" class="form-control">
    </div>
    <div class="col-md-3">
        <input type="text" name="wall_height[]" id="wall_height" placeholder="Wall Height" class="form-control">
    </div>
    </div>                  
    <div class="row justify-content-center align-items-center">                       
      <section class="responsive slider">
        <div>
          <img src="http://placehold.it/350x300?text=1">
        </div>
        <div>
          <img src="http://placehold.it/350x300?text=2">
        </div>
        <div>
          <img src="http://placehold.it/350x300?text=3">
        </div>
        <div>
          <img src="http://placehold.it/350x300?text=4">
        </div>
        <div>
          <img src="http://placehold.it/350x300?text=5">
        </div>
        <div>
          <img src="http://placehold.it/350x300?text=6">
        </div>
      </section>
    </div>           
            
                
    <div class="row justify-content-center align-items-center">   
        <div class="col-md-2">
            <select class="form-control" id="install_type" name="install_type[]">
              <option>Flown</option>
              <option>Ground Stack</option>
              <option>Custom</option>
            </select>
        </div>  
        <div class="col-md-2">
            <input type="text" class="form-control" name="quantity[]" id="quantity" placeholder="Quantity">
        </div>
        <div class="button-group">
            <a href="javascript:void(0)" class="btn btn-primary" id="plus5">Add more walls</a>
            <a href="javascript:void(0)" class="btn btn-danger" id="minus5">Remove</a>
        </div>
    </div>
    <hr />
</div>
<div class="row justify-content-center align-items-center"> 
<button type="submit" class="btn btn-primary" onclick='results()'>Submit</button>
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
</div>
<script>
$("#form_id").submit(function(){return false;});
	$("#form_id").submit(function(){return false;});
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
                     //setTimeout( "$('#results').hide();", 4000);
    			}
            }); 
      }



$("#get_started").click(function() {
    $('html,body').animate({
        //$('#dynamic_form').show();
        scrollTop: $("#dynamic_form").offset().top},'slow');
});

$(document).ready(function() {
   // $('#dynamic_form').hide();
    
	var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
        limit:10,
        formPrefix : "dynamic_form",
        normalizeFullForm : false
    });

//	dynamic_form.inject([{p_name: 'Hemant',quantity: '123',remarks: 'testing remark'},{p_name: 'Harshal',quantity: '123',remarks: 'testing remark'}]);

    $("#dynamic_form #minus5").on('click', function(){
    	var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
    	if (initDynamicId === 2) {
    		$(this).closest('#dynamic_form').next().find('#minus5').hide();
    	}
    	$(this).closest('#dynamic_form').remove();
    });

    $('form').on('submit', function(event){
    	var values = {};
		$.each($('form').serializeArray(), function(i, field) {
		    values[field.name] = field.value;
		});
		console.log(values)
		event.preventDefault();
	})
});
        
//////////////////////////////////////////
$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
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


</script>
