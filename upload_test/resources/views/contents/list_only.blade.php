	<div class="row">

		<div class="col-12">
			<div class="row">
				@foreach($data_list as $list)
				<div class="col-6 col-md-2 p-1">
					<img src="{{$list['img']}}" class="w-100 show_pic" value="{{$list['id']}}" draggable="true">
					<p>{{$list['title']}}</p>
				</div>
				@endforeach
				
			</div>
		</div>
		<div class="ui-widget ui-helper-clearfix">
 
<ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">
 
  <li class="ui-widget-content ui-corner-tr">
  @foreach($data_list as $list)
    <h5 class="ui-widget-header">{{$list['title']}}</h5>
    
    <img src="{{$list['img']}}" alt="On top of Kozi kopka" width="96" height="72" value="{{$list['id']}}">
    <a href="{{$list['img']}}" title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a>
    <a href="link/to/trash/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>
  @endforeach
  </li>
</ul>		
 
<div id="trash" class="ui-widget-content ui-state-default">
  <h4 class="ui-widget-header"><span class="ui-icon ui-icon-trash">Trash</span> Trash</h4>
</div>
 
</div>

	</div>
<script>
/* $('.page_bt').on('click',function(e){
	changeContents($(this).attr('value'));
	 page_num = $(this).attr('value');
	});
$('.show_pic').on('click',function(e){
	console.log($(this).attr('value'));
	openModal($(this).attr('value'));
}); */
</script>
