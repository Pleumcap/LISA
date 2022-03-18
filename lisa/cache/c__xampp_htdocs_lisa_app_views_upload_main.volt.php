<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="lisa/authen/upload" method="post" enctype="multipart/form-data"> 
        <input type="file" name="myfile" required="true" accept="image/*">
        <button type="submit" >upload</button>
      </form> -->


      <!-- , 'accept' : 'application/pdf' -->
      <?= $this->tag->form(['lisa/upload/main', 'method' => 'post', 'enctype' => 'multipart/form-data']) ?>
            <h4>Select image to upload:</h4>
            <?= $this->tag->fileField(['fileToUpload', 'required' => true]) ?>
            <?= $this->tag->submitButton(['upload']) ?>
      <?= $this->tag->endform() ?>
      <!-- <form action="main" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required="true" accept="application/pdf">
        <input type="submit"  name="submit">
        <input type="submit" value="Upload Image" name="submit">
      </form> -->

      
</body>
</html>