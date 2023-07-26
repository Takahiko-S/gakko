<x-base-layout>
<x-slot name="title"></x-slot>
<x-slot name="css">
<style type="text/css">
.test{
    height:300px;
}
<!--ゴミ箱のcss-->
  #gallery { float: left; width: 65%; min-height: 12em; }
  .gallery.custom-state-active { background: #eee; }
  .gallery li { float: left; width: 96px; height:auto; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
  .gallery li h5 { font-size:12px; margin: 0 0 0.4em; cursor: move; }
  .gallery li a { float: right; }
  .gallery li a.ui-icon-zoomin { float: left; }
  .gallery li img { width: 100%; cursor: move; margin-bottom:6px;}
 
  #trash { float: right; width: 100%; min-height: 18em; padding: 1%;height:100%; }
  #trash h4 { line-height: 16px; margin: 0 0 0.4em; }
  #trash h4 .ui-icon { float: left; }
  #trash .gallery h5 { display: none; }
  .hidden{
     display: none;
  }
  	  <!--EFFECTのCSS-->
      .toggler { width: 500px; height: 200px; position: relative; }
    #button { padding: .5em 1em; text-decoration: none; }
    #effect { width: 360px; height: 250px; padding: 0.4em; position: relative; }
    #effect h3 { margin: 0; padding: 0.4em; text-align: center; }
    .ui-effects-transfer { border: 2px dotted gray; }
</style>
</x-slot>
<x-slot name="main">
    <div class= "container">
    	<div class="row">
    		<div class="col-12 mb-5">
    			<h1 class="text-center text-primaryp-3">フォトサンプル</h1>
    		</div>
    		@csrf
    		<!--ゴミ箱-->
    		<div class="col-10 mb-5 border test ">
        		<ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">
        			@foreach($image_array as $image)
                  <li class="ui-widget-content ui-corner-tr">
                    <h5 class="ui-widget-header">High Tatras</h5>
                    <img src="{{asset($image['thumb'])}}" alt="The peaks of High Tatras" width="96" height="72">
                    <a href="{{asset($image['main'])}}" title="{{$image['title']}}" class="ui-icon ui-icon-zoomin">View larger</a>
                    <a href="link/to/trash/script/when/we/have/js/off" title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>
                  </li>
                  @endforeach
                  
               
           </div>
    		<div class="col-2 mb-5 border test p-0">
    		<div id="trash" class="ui-widget-content ui-state-default">
    	 		 <h4 class="ui-widget-header"><span class="ui-icon ui-icon-trash">Trash</span> Trash</h4>
			</div>
			
    		</div>

	</div>
	<!--  Tabs-->
	<div class="row">
    	<div class="col-mb-8 mx-auto">
        	<div id="tabs">
              <ul>		
                <li><a href="#tabs-1">Nunc tincidunt</a></li>
                <li><a href="#tabs-2">Proin dolor</a></li>
                <li><a href="#tabs-3">Aenean lacinia</a></li>
              </ul>
              <div id="tabs-1">
                <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
              </div>
              <div id="tabs-2">
                <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
              </div>
              <div id="tabs-3">
                <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
              </div>
    		</div>
    	</div>
	</div>
	
	
	
	
    	<div class="col-12 mb-3 text-center"><h1 >エフェクトテスト</h1></div>
		<div class="container text-center col-12">
			<div class="row mt-5">		
			

		<div id="effect"
			class="col-md-4 mx-auto ui-widget-content ui-corner-all">
			<img class="ui-widget-header ui-corner-all"
				src="{{asset('images/hotel1.jpg')}}"> <select name="effects"
				id="effectTypes" class="hidden">
				<option value="explode">Explode</option>
			</select>
			<p class="text-center mt-3">
				<button class="btn btn-primary ui-state-default ui-corner-all"
					id="button">実行</button>
			</p>
		</div>

	</div>
		</div>
</x-slot>
<x-slot name="script">


<script>
//Tabsーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
$( "#tabs" ).tabs();
//Trashーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // There's the gallery and the trash ドラッグしたら元に戻る
    var $gallery = $( "#gallery" ),
      $trash = $( "#trash" );
 
    // Let the gallery items be draggable
    $( "li", $gallery ).draggable({
      cancel: "a.ui-icon", // clicking an icon won't initiate dragging
      revert: "invalid", // when not dropped, the item will revert back to its initial position元の場所に戻る
      containment: "document",
      helper: "clone",
      cursor: "move"
    });
// ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー   
    // Let the trash be droppable, accepting the gallery itemsゴミ箱をドロップ可能にする
    $trash.droppable({
      accept: "#gallery > li",
      classes: {
        "ui-droppable-active": "ui-state-highlight"
      },
      drop: function( event, ui ) {
        deleteImage( ui.draggable );
      }
    });
 // ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー   
    // Let the gallery be droppable as well, accepting items from the trash
    $gallery.droppable({
      accept: "#trash li",
      classes: {
        "ui-droppable-active": "custom-state-active"
      },
      drop: function( event, ui ) {
        recycleImage( ui.draggable );
      }
    });
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
 // Image deletion function ゴミ箱に入れるファンクション
    var recycle_icon = "<a href='link/to/recycle/script/when/we/have/js/off' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
    function deleteImage( $item ) {
      $item.fadeOut(function() {
        var $list = $( "ul", $trash ).length ?
          $( "ul", $trash ) :
          $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );
 
        $item.find( "a.ui-icon-trash" ).remove();
        $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
          $item
            .animate({ width: "48px" })
            .find( "img" )
              .animate({ height: "36px" });
        });
      });
    }
//ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // Image recycle function
    var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";
    function recycleImage( $item ) {
      $item.fadeOut(function() {
        $item
          .find( "a.ui-icon-refresh" )
            .remove()
          .end()
          .css( "width", "96px")
          .append( trash_icon )
          .find( "img" )
           .css( "height", "auto" )
          .end()
          .appendTo( $gallery )
          .fadeIn();
      });
    }
  //ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // Image preview function, demonstrating the ui.dialog used as a modal window
        function viewLargerImage( $link ) {
      var src = $link.attr( "href" ),
        title = $link.siblings( "img" ).attr( "alt" ),
        $modal = $( "img[src$='" + src + "']" );
 
      if ( $modal.length ) {
        $modal.dialog( "open" );
      } else {
        var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
          .attr( "src", src ).appendTo( "body" );
        setTimeout(function() {
          img.dialog({
            title: title,
            width: 400,
            modal: true,
            buttons: {
                "閉じる": function() {
                  $( this ).dialog( "close" );
                }
            }

            
          });
        }, 1 );
      }
    }
    
  //ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // Resolve the icons behavior with event delegation
    $( "ul.gallery > li" ).on( "click", function( event ) {
      var $item = $( this ),
        $target = $( event.target );
 
      if ( $target.is( "a.ui-icon-trash" ) ) {
        deleteImage( $item );
      } else if ( $target.is( "a.ui-icon-zoomin" ) ) {
        viewLargerImage( $target );
      } else if ( $target.is( "a.ui-icon-refresh" ) ) {
        recycleImage( $item );
      }
 
      return false;
    });
 
 //effect ---------------------------------------------------------------------------------------------------
  $(function() {
	    // run the currently selected effect
	    function runEffect() {
	      // get effect type from
	      var selectedEffect = $( "#effectTypes" ).val();
	 
	      // Most effect types need no options passed by default
	      var options = {};
	      // some effects have required parameters
	      if ( selectedEffect === "scale" ) {
	        options = { percent: 50 };
	      } else if ( selectedEffect === "transfer" ) {
	        options = { to: "#button", className: "ui-effects-transfer" };
	      } else if ( selectedEffect === "size" ) {
	        options = { to: { width: 200, height: 60 } };
	      }
	 
	      // Run the effect
	      $( "#effect" ).effect( selectedEffect, options, 500, callback );
	    };
	 
	    // Callback function to bring a hidden box back
	    function callback() {
	      setTimeout(function() {
	        $( "#effect" ).removeAttr( "style" ).hide().fadeIn();
	      }, 1000 );
	    };
	 
	    // Set effect from select menu value
	    $( "#button" ).on( "click", function() {
	      runEffect();
	      return false;
	    });
	  } );


  
</script>
</x-slot>

</x-base-layout>