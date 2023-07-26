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
    			<form class="row" method="post" action="" enctype="multipart/form-data">

				<p>タイトル</p>
				<div class="col-md-12 mb-5 p-0">
					<input	type="text" class="form-control" id="title" name="title">
				</div>

				<p>添付ファイル</p>
				<div class="col-md-3 mb-3 p-0">
					<input type="file" style="display: none;" id="file" required>
					<button type="button" class="btn btn-secondary fs-6 w-100 "id="select_file_bt">ファイルを選択</button>
				</div>
				<div class="col-md-9 mb-3 p-0">
					<div class=" border h-100 d-flex align-items-center pl-3" id="select">未選択</div>
				</div>
				<div class="col-md-4 mb-3 mt-5 ps-0">
					<button type="submit" class="btn btn-primary ">ファイルアップロード</button>
				</div>


			</form>
    		</div>
		</div>
	</div>
	
    	
  

</x-slot>
<x-slot name="script">
<script>

</script>
<script>

</script>
</x-slot>

</x-base-layout>