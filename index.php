<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
    rel="stylesheet" type="text/css">
  </head>
  
  <body>
  
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-success">Download Image Program</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
              <label>Select image to upload:</label>
              <input type="file" name="fileToUpload"
              id="fileToUpload">
			  <br />
			  <input type="submit" class="btn btn-primary" value="submit"/>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-success">Status</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="C:/Users/PNY/Desktop/screen hot kho giao dien/nhahang.png"
            class="img-responsive" width="400px" style="margin:auto;">
          </div>
        </div>
      </div>
    </div>
  </body>
<?php
	
   if ( isset($_FILES["fileToUpload"]) ) {
		$data = $_FILES["fileToUpload"];
		/* echo "<pre>";
		print_r($data);
		echo "</pre>";
		die(); */
            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["file"]["name"] . "<br />";
             echo "Type: " . $_FILES["file"]["type"] . "<br />";
             echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                 //if file already exists
             if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "uploaded_file.txt";
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
            }
        }
     } else {
             echo "No file selected <br />";
     }
  ?>
</html>