<div>
    
@if ($showBar == true && $isDone == false )
  <div class="row d-flex justify-content-between border border-3 border-danger my-3">
   
       <h4 class=" col-md-3 d-flex align-items-center gap-1 "> <button class="btn btn-info text-white"  id="sendMailBtn" >
           
       {{ $sms }} </button> <i class="fa fa-download text-info" aria-hidden="true"></i>
 </h4>
 
       <div class="col-md-6">
            <img   src="{{ asset('/images/file-transfer-anime.gif') }}"  width="250px" height="150px"   >
       </div>
    
         <h4 class=" col-md-3 d-flex align-items-center gap-1"> <button class="btn btn-success"  id="success2" >
          {{ $success }} 
      </button> <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
</h4>  
  </div>
 
  @endif
  
  <script type="text/javascript">
  
    $(document).ready(function() {
 
        setInterval(fetchData,50000);

        });
     
   
   function fetchData(){
       
        
                 var started = "<?php echo $starts; ?>";
                  
                 var ended = "<?php echo $ends; ?>";
                
                 var alldata = {"sms": {{ $sms }} , 'success': {{ $success }} , "starts": started  , 'ends' : ended };
   

                  $.ajax({
                method: "POST",
                url: '{!! route('progressBar') !!}',
                dataType : 'json',
                data: {_token:"{{csrf_token()}}", data: alldata },
                success: function () {
                setTimeout(window.location.reload(), 5000)
         }

                }).done(function( msg ) {
                console.log(msg,'====');
                document.getElementById('success2').innerHTML = msg ?? 0;
                });
   }
 </script>
  
 </div>
