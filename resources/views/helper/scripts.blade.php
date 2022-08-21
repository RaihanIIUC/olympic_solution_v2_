	<!-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>  -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


    <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
     <script src="{{ asset('js/app.js') }}"></script>


	<!--<script src="{{ asset(' js/popper.min.js') }}"></script>-->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/picker.js') }}"></script>
	<script src="{{ asset('js/picker.date.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	@livewireScripts 


<!--     <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script> -->
 
	
	<script>
                const datePickerStarts = document.getElementById("date-picker-start");
                
                const datePickerEnds = document.getElementById("date-picker-end");

            
            datePickerStarts.min = getDate(-7);
            datePickerStarts.max =   getDate();
            
            datePickerEnds.min = getDate(-7);
            datePickerEnds.max =   getDate(2);
            
            // Borrowed from https://stackoverflow.com/a/29774197/7290573
            function getDate(days) {
            let date;
            
            if (days !== undefined) {
                date = new Date(Date.now() + days * 24 * 60 * 60 * 1000);
            } else {
                date = new Date();
            }
            
            const offset = date.getTimezoneOffset();
            
            date = new Date(date.getTime() - (offset*60*1000));
            
            return date.toISOString().split("T")[0];
            }
	</script>