<?php
include("conf.php");
include("progres_location.php");
?>  
<body>


 
<div class="container">
<br>
<br>
<br>
<br>
<br>
<br>
  <div class="span12">
   <script type="text/javascript">
	$(document).ready(function()
		{
		 var delay = 40;
		setTimeout(function(){ window.location = 'home.php';}, delay);  
    });
	
	

</script>



    <script>
        $(document).ready(function() {
		
               
                $('.progress .bar.text-filled-1').progressbar({
                    display_text: 1,
					         refresh_speed: 200,
                   transition_delay: 1000,
             
            });
            
            });
   
    </script>
            <section id="h-default">
              
                <div class="row-fluid">
                   
               
              
						<h1>Loading Sky bus  .....</h1>
                        <div id="prog" class="progress progress-danger progress-striped">
                            <div class="bar text-filled-1" data-amount-part="1337" data-amount-total="9000" data-percentage="100"></div>
                        </div>
						
		
             
                </div>
            </section>
            
        </div>
		</div>
		</body>