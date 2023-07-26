<x-base-layout>
<x-slot name="title">ブログ編集</x-slot>
<x-slot name="css"></x-slot> 

<x-slot name="main">
	<div class="container">
	<div class="row mt-5">
		<div class="col-12">
			<h1 class="">ブログ編集</h1>
		</div>
	
		
		

	<div class="col-md-8 mx-auto">
    		
    		<form method = "post" action="./edit_save" style ="display:inline;">
    		@csrf
		<div class="mb-3">
			<label for="d_id" class="form-label">ID</label> 
			<input type="text" class="form-control"id="d_id" name="d_id" readonly value="{{$data->id}}">
		</div>
		<div class="mb-3">
			<label for="title" class="form-label">タイトル</label> 
			<input type="text" class="form-control"id="title" name="title" value="{{$data->title}}">
		</div>
		<div class="mb-3">
			<label for="body" class="form-label">本文</label>
			<textarea class="form-control" id="body" name="body" rows="5">{{$data->body}}</textarea>
		</div>
		<button type="submit" class="btn btn-secondary">キャンセル</button>
		<button type="submit" class="btn btn-primary">保存</button>
    		
    		</form>
    		
    	</div>
	</div>
</x-slot>


<x-slot name="script"></x-slot>
</x-base-layout>