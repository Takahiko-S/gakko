<?php
if(isset($_GET['src'])){
    $src_image = $_GET['src'];
}else{
    $src_image = "images/pictures.jpg";
}
$w = 1;
$h = 1;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="JavaScript image cropper.">
  <meta name="author" content="Chen Fengyuan">
  <title>Cropper.js</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@4/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cropper.css">
  <link rel="stylesheet" href="css/main.css">
  
 
</head>
<body>
  <!--[if lt IE 9]>
  <div class="alert alert-warning alert-dismissible fade s  <a class="dropdown-item" href="examples/a-range-of-aspect-ratio.html">Cropper with a range of aspect ratio</a>
              <a class="dropdown-item" href="examples/crop-a-round-image.html">Crop a round image</a>
              <a class="dropdown-item" href="examples/crop-cross-origin-image.html">Crop cross origin image</a>
              <a class="dropdown-item" href="examples/crop-on-canvas.html">Crop on canvas</a>
              <a class="dropdown-item" href="examples/cropper-in-modal.html">Cropper in modal</a>
              <a class="dropdown-item" href="examples/customize-preview.html">Customize preview</a>
              <a class="dropdown-item" href="examples/fixed-crop-box.html">Fixed crop box</a>
              <a class="dropdown-item" href="examples/full-crop-box.html">Full crop box</a>
              <a class="dropdown-item" href="examples/mask-an-image.html">Mask an image</a>
              <a class="dropdown-item" href="examples/minimum-and-maximum-cropped-dimensions.html">Minimum and maximum cropped dimensions</a>
              <a class="dropdown-item" href="    <!-- <h3>Toggles:</h3> -->
<!--         <div class="btn-group d-flex flex-nowrap" data-toggle="buttons"> -->
<!--           <label class="btn btn-primary active"> -->
<!--     examples/multiple-croppers.html">Multiple croppers</a>
              <a class="dropdown-item" href="examples/one-to-one-crop-box.html">One to one crop box</a>
              <a class="dropdown-item" href="examples/responsive-container.html">Responsive container</a>
              <a class="dropdown-item" href="examples/upload-cropped-image-to-server.html">Upload chow m-0 rounded-0" role="alert">
    You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <![endif]-->
    <!-- <h3>Toggles:</h3> -->
<!--         <div class="btn-group d-flex flex-nowrap" data-toggle="buttons"> -->
<!--           <label class="btn btn-primary active"> -->
<!--     
  <!-- Header -->
  <header class="navbar navbar-light navbar-expand-md">
    <div class="container">
      <a class="navbar-brand" href="./">Cropper.js</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="upload_test.php" data-toggle="tooltip" title="tooltip">アップロードテスト</a>
          </li>
         
          
        </ul>
      </div>
    </div>
  </header>

  <!-- Jumbotron -->
 

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- <h3>Demo:</h3> -->
        <div class="docs-demo">
          <div class="img-container">
            <img id= "image" src="<?php print $src_image?>" alt="Picture">
          </div>
        </div>
      </div>
<!--       <div class="col-md-3"> -->
        <!-- <h3>Preview:</h3> -->
      <!--   <div class="docs-preview clearfix">
          <div class="img-preview preview-lg"></div>
          <div class="img-preview preview-md"></div>
          <div class="img-preview preview-sm"></div>
          <div class="img-preview preview-xs"></div>
        </div>
 -->
        <!-- <h3>Data:</h3> -->
 <!--        <div class="docs-data">
          <div class="input-group input-group    <!-- <h3>Toggles:</h3> -->
<!--         <div class="btn-group d-flex flex-nowrap" data-toggle="buttons"> -->
<!--           <label class="btn btn-primary active"> -->
<!--     -sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataX">X</label>
            </span>
            <input type="text" class="form-control" id="dataX" placeholder="x">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataY">Y</label>
            </span>
            <input type="text" class="form-control" id="dataY" placeholder="y">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataWidth">Width</label>
            </span>
            <input type="text" class="form-control" id="dataWidth" placeholder="width">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataHeight">Height</label>
            </span>
            <input type="text" class="form-control" id="dataHeight" placeholder="height">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataRotate">Rotate</label>
            </span>
            <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
            <span class="input-group-append">
              <span class="input-group-text">deg</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleX">ScaleX</label>
            </span>
            <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleY">ScaleY</label>
            </span>
            <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
          </div>
        </div> -->
<!--       </div> -->
    </div>
    <div class="row" id="actions">
      <div class="col-md-9 docs-buttons">
        <!-- <h3>Toolbar:</h3> -->
        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;move&quot;)">
              <span class="fa fa-arrows-alt"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;crop&quot;)">
              <span class="fa fa-crop-alt"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
            <span class="docs-tooltip" data-toggldata-dismiss="modal">
              <span class="fa fa-search-minus"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
              <span class="fa fa-undo-alt"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
              <span class="fa fa-redo-alt"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
              <span class="fa fa-arrows-alt-h"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
              <span class="fa fa-arrows-alt-v"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">
              <span class="fa fa-check"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">
              <span class="fa fa-times"></span>
            </span>
          </button>
        </div>

     <!--    <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.disable()">
              <span class="fa fa-lock"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.enable()">
              <span class="fa fa-unlock"></span>
            </span>
          </button>
        </div> -->

        <div class="btn-group">
<!--           <button type="button" class="btn btn-primary" data-method="reset" title="Reset"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()"> -->
<!--          ocs-buttons     <span class="fa fa-sync-alt"></span> -->
<!--             </span> -->
<!--           </button> -->
          <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
              画像アップロード
            </span>
          </label>
<!--           <button type="button" class="btn btn-primary" data-method="destroy" title="Destroy"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="cropper.destroy()"> -->
<!--               <span class="fa fa-power-off"></span> -->
<!--             </span> -->
<!--           </button> -->
        </div>

        <div class="btn-group btn-group-crop">
          <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">
				トリミング
            </span>
          </button>
<!--           <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 160, height: 90 })"> -->
<!--               160&times;90 -->
<!--             </span> -->
<!--           </button> Download-->
<!--           <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 320, height: 180 })"> -->
<!--               320&times;180 -->
<!--             </span> -->
<!--           </button> -->
        </div>

        <!-- Show the cropped image in modal -->
        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                <a class="btn btn-primary" id="save-image" href="javascript:void(0);" download="cropped.jpg" data-dismiss="modal">アップロード</a>
              </div>
            </div>
          </div>
        </div><!-- /.modal -->

<!--         <button type="button" class="btn btn-secondary" data-method="getData" data-option data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getData()"> -->
<!--             Get Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="setData" data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setData(data)"> -->
<!--             Set Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="getContainerData" data-option data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getContainerData()"> -->
<!--             Get Container Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="getImageData" data-option data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getImageData()"> -->
<!--             Get Image Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="getCanvasData" data-option data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCanvasData()"> -->
<!--             Get Canvas Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="setCanvasData" data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setCanvasData(data)"> -->
<!--             Set Canvas Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="getCropBoxData" data-option data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCropBoxData()"> -->
<!--             Get Crop Box Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="setCropBoxData" data-target="#putData"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setCropBoxData(data)"> -->
<!--             Set Crop Box Data -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="moveTo" data-option="0"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)"> -->
<!--             Move to [0,0] -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="zoomTo" data-option="1"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)"> -->
<!--             Zoom to 100% -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="rotateTo" data-option="180"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)"> -->
<!--             Rotate 180° -->
<!--           </span> -->
<!--         </button> -->
<!--         <button type="button" class="btn btn-secondary" data-method="scale" data-option="-2" data-second-option="-1"> -->
<!--           <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scale(-2, -1)"> -->
<!--             Scale (-2, -1) -->
<!--           </span> -->
<!--         </button> -->
<!--         <textarea class="form-control" id="putData" placeholder="Get data to here or set data with this value"></textarea> -->

      </div><!-- /.docs-buttons -->

      <div class="col-md-3 docs-toggles">
        <!-- <h3>Toggles:</h3> -->
<!--         <div class="btn-group d-flex flex-nowrap" data-toggle="buttons"> -->
<!--           <label class="btn btn-primary active"> -->
<!--             <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9"> -->
<!--               16:9 -->
<!--             </span> -->
<!--           </label> -->
<!--           <label class="btn btn-primary"> -->
<!--             <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3"> -->
<!--               4:3 -->
<!--             </span> -->
<!--           </label> -->
<!--           <label class="btn btn-primary"> -->
<!--             <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="1"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1"> -->
<!--               1:1 -->
<!--             </span> -->
<!--           </label> -->
<!--           <label class="btn btn-primary"> -->
<!--             <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="0.6666666666666666"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3"> -->
<!--               2:3 -->
<!--             </span> -->
<!--           </label> -->
<!--           <label class="btn btn-primary"> -->
<!--             <input type="radio" class="sr-only" id="aspectRatio5" name="aspectRatio" value="NaN"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN"> -->
<!--               Free -->
<!--             </span> -->
<!--           </label> -->
<!--         </div> -->

<!--         <div class="btn-group d-flex flex-nowrap" data-toggle="buttons"> -->
<!--           <label class="btn btn-primary active"> -->
<!--             <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 0"> -->
<!--               VM0 -->
<!--             </span> -->
<!--           </label> -->
<!--           <label class="btn btn-primary"> -->
<!--             <input type="radio" class="sr-only" id="viewMode1" name="viewMode" value="1"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 1"> -->
<!--               VM1 -->
<!--             </span> -->
<!--           </label> -->
<!--           <label class="btn btn-primary"> -->
<!--             <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 2"> -->
<!--               VM2 -->
<!--             </span> -->
<!--           </label> -->
<!--           <label class="btn btn-primary"> -->
<!--             <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3"> -->
<!--             <span class="docs-tooltip" data-toggle="tooltip" title="View Mode 3"> -->
<!--               VM3 -->
<!--             </span> -->
<!--           </label> -->
<!--         </div> -->

     <!--    <div class="dropdown dropup docs-options">
          <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
            Toggle Options
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="toggleOptions">
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="responsive" type="checkbox" name="responsive" checked>
                <label class="form-check-label" for="responsive">responsive</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="restore" type="checkbox" name="restore" checked>
                <label class="form-check-label" for="restore">restore</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="checkCrossOrigin" type="checkbox" name="checkCrossOrigin" checked>
                <label class="form-check-label" for="checkCrossOrigin">checkCrossOrigin</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="checkOrientation" type="checkbox" name="checkOrientation" checked>
                <label class="form-check-label" for="checkOrientation">checkOrientation</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="modal" type="checkbox" name="modal" checked>
                <label class="form-check-label" for="modal">modal</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="guides" type="checkbox" name="guides" checked>
                <label class="form-check-label" for="guides">guides</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="center" type="checkbox" name="center" checked>
                <label class="form-check-label" for="center">center</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="highlight" type="checkbox" name="highlight" checked>
                <label class="form-check-label" for="highlight">highlight</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="background" type="checkbox" name="background" checked>
                <label class="form-check-label" for="background">background</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="autoCrop" type="checkbox" name="autoCrop" checked>
                <label class="form-check-label" for="autoCrop">autoCrop</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="movable" type="checkbox" name="movable" checked>
                <label class="form-check-label" for="movable">movable</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="rotatable" type="checkbox" name="rotatable" checked>
                <label class="form-check-label" for="rotatable">rotatable</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="scalable" type="checkbox" name="scalable" checked>
                <label class="form-check-label" for="scalable">scalable</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="zoomable" type="checkbox" name="zoomable" checked>
                <label class="form-check-label" for="zoomable">zoomable</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="zoomOnTouch" type="checkbox" name="zoomOnTouch" checked>
                <label class="form-check-label" for="zoomOnTouch">zoomOnTouch</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="zoomOnWheel" type="checkbox" name="zoomOnWheel" checked>
                <label class="form-check-label" for="zoomOnWheel">zoomOnWheel</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="cropBoxMovable" type="checkbox" name="cropBoxMovable" checked>
                <label class="form-check-label" for="cropBoxMovable">cropBoxMovable</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="cropBoxResizable" type="checkbox" name="cropBoxResizable" checked>
                <label class="form-check-label" for="cropBoxResizable">cropBoxResizable</label>
              </div>
            </li>
            <li class="dropdown-item">
              <div class="form-check">
                <input class="form-check-input" id="toggleDragModeOnDblclick" type="checkbox" name="toggleDragModeOnDblclick" checked>
                <label class="form-check-label" for="toggleDragModeOnDblclick">toggleDragModeOnDblclick</label>
              </div>
            </li>
          </ul> -->
        </div><!-- /.dropdown -->

<!--         <a class="btn btn-success btn-block" data-toggle="tooltip" href="https://fengyuanchen.github.io/photo-editor" title="An advanced example of Cropper.js">Photo Editor</a> -->

      </div><!-- /.docs-toggles -->
      
    </div>
<!--   </div> -->

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p class="heart"></p>
      <nav class="nav flex-wrap justify-content-center mb-3">
        <a class="nav-link" href="https://github.com/fengyuanchen/cropperjs">GitHub</a>
        <a class="nav-link" href="https://github.com/fengyuanchen/cropperjs/releases">Releases</a>
        <a class="nav-link" href="https://github.com/fengyuanchen/cropperjs/blob/main/LICENSE">License</a>
        <a class="nav-link" href="https://chenfengyuan.com/">About</a>
        <a class="nav-link" href="https://fengyuanchen.github.io/cropperjs/v2-alpha/">v2 (Alpha)</a>
      </nav>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="js/jquery-3.6.3.min.js"></script>
  <script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/cropper.js"></script>
  <script src="js/main.js"></script>
  
 <script>
var w = <?php print $w;?>;
var h = <?php print $h;?>;
  $('#image').cropper({
	aspectRatio: w/h
	  });
  </script>
  <script>
function saveImage(dataUrl){
	console.log("save");
	//console.log(dataUrl);
	document.body.style.cursor = 'wait';//waitはマウスカーソルがくるくるしてる状態
	//FormDataオブジェクトを用意
	var fd = new FormData();//変数fdにFormDataをセット
	fd.append("title","トリミング_"+ Date.now());
	fd.append("upload_image",dataURIConverter(dataUrl));
	

	//XHRで送信
	$.ajax({
		url: "upload.php",  //送信先
		type:"post",//getでも送れる
		data:fd,
		mode:"multiple",
		processData: false,
		contentType:false,
		timeout: 10000,    //単位はミリ秒
		error:function(XMLHttpRequest,textStatus,errorThrown){
			err=XMLHttpRequest.status+"\n"+XMLHttpRequest.statusText;
			alert(err);
			document.body.style.cursor = 'auto';
			},
			beforeSend:function(xhr){//送信前に何かしたいときにここのカッコに入れる

				}
		})
		.done(function(res){
			//ここは戻ってきた時の処理を記述
			console.log(res);
		
			document.body.style.cursor = 'auto';
			//location.replace('upload_test.php');

			});
	
}

function dataURIConverter(dataURI){
	//base64/URLEncoded 文字列データをバイナリーデータに変更する
	var byteString = atob(dataURI.split(',')[1]);

	//mimetypeを抜き出す
	var mimeType =dataURI.split(',')[0].split(':')[1].split(';')[0]; 	


	//バイナリーデータを扱えるように、typed array に書き換えていく
	var buffer = new Uint8Array(byteString.length);
	for(var i = 0; i < byteString.length; i++){
		buffer[i] = byteString.charCodeAt(i);
}
	//第一引数は配列で渡し、Fileオブジェクトを返す
	
	return new File([buffer],'ファイル名.'+ mimeType.split('/')[1],{type:mimeType});
}
  </script>
</body>
</html>