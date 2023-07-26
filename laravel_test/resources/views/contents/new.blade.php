<x-base-layout>
<x-slot name="title">ブログ追加</x-slot>
<x-slot name="css"></x-slot> 

<x-slot name="main">
	<div class="container">
	<div class="row mt-5">
		<div class="col-12">
			<h1 class="">ブログ追加</h1>
		</div>
	
		
		

	<div class="col-md-8 mx-auto">
    		
    		<form method = "post" action="./new_save" style ="display:inline;">
    		@csrf
		
		<div class="mb-3">
			<label for="title" class="form-label">タイトル</label> 
			<input type="text" class="form-control"id="title" name="title" required>
		</div>
		<div class="mb-3">
			<label for="body" class="form-label">本文</label>
			<textarea class="form-control" id="body" name="body" rows="5" required></textarea>
		</div>
		<button type="submit" class="btn btn-secondary">キャンセル</button>
		<button type="submit" class="btn btn-primary">保存</button>
    		
    		</form>
    		
    	</div>
	</div>
</x-slot>


<x-slot name="script"></x-slot>
</x-base-layout>