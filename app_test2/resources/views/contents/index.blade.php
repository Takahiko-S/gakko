<x-base-layout>
<x-slot name="title">Image Upload Test</x-slot>
<x-slot name="css">

</x-slot>
<x-slot name="main">
    <div class= "container">
    	<div class="row">
        	<div class="col-md-12 mb-3">
    			<h1 class="text-center p-3 mb-5">Image Upload Test</h1>
    		</div>
		</div>
		<div class="row">
    		<div class="col-md-8 mx-auto mb-5">
    			<form method="post" action="{{route('upload_test')}}" enctype="multipart/form-data">
    			@csrf
    				<p>タイトル</p>
    				 <div class="input-group ">
                      <input type="text" class="form-control" id="title" name ="title"  aria-label="Upload">
                  </div>
                 
    				<p class="mt-3">添付ファイル</p>
                 <div class="input-group">
                      <input type="file" class="form-control" id="up_file" name="up_file" accept =".jpg,.jpeg,.JPG,.JPEG,.png,.PNG">
                	 	 <input type="hidden" id="orientation" name="orientation">
                 </div>
    
     			 <div class="input-group mt-5">
                   <button type="submit" class="btn btn-primary" >ファイルアップロード</button>
                 </div>                            
                                 
    			</form>
    		</div>
		</div>
	</div>
	
    	
  

</x-slot>
<x-slot name="script">
<script src="{{asset('js/jquery.exif.js')}}"></script>
<script>
$('#up_file').on('change',function(e){
	console.log($(this).prop('files')[0].name);	
	$(this).fileExif(function(exif){
		console.log("Orientation:" + exif.Orientation);
		console.log("All Exif:" + exif);
		$('#orientation').val(exif.Orientation);
		});
});
</script>
<script>

</script>
</x-slot>

</x-base-layout>