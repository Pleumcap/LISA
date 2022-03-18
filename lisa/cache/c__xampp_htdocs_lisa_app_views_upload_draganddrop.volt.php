<!-- <!DOCTYPE html>
<html>
<body>
<div id="dropContainer" style="border:1px solid black;height:100px;">
   Drop Here
</div>
  Should update here:
  <input type="file" id="fileInput" />



  <input id="input-b1" name="input-b1" type="file" class="file" data-browse-on-zone-click="true">
</body>
<script>
    // dragover and dragenter events need to have 'preventDefault' called
// in order for the 'drop' event to register. 
// See: https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Drag_operations#droptargets
dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
  // pretty simple -- but not for IE :(
  fileInput.files = evt.dataTransfer.files;

  // If you want to use some of the dropped files
  const dT = new DataTransfer();
  dT.items.add(evt.dataTransfer.files[0]);
  dT.items.add(evt.dataTransfer.files[3]);
  fileInput.files = dT.files;

  evt.preventDefault();
};
</script>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drag Drop Multiple File Upload</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
      #drop_file_zone {
        background-color: #EEE;
        border: #999 5px dashed;
        width: 290px;
        height: 200px;
        padding: 8px;
        font-size: 18px;
    }
    #drag_upload_file {
        width:50%;
        margin:0 auto;
    }
    #drag_upload_file p {
        text-align: center;
    }
    #drag_upload_file #selectfile {
        display: none;
    }
    </style>
</head>
<body>
    <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
        <div id="drag_upload_file">
            <p>Drop file(s) here</p>
            <p>or</p>
            <p><input type="button" value="Select File(s)" onclick="file_explorer();"></p>
            <input type="file" id="selectfile" multiple>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="custom.js"></script>
</body>
<script>
  var fileobj;
function upload_file(e) {
    e.preventDefault();
    ajax_file_upload(e.dataTransfer.files);
}
 
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        files = document.getElementById('selectfile').files;
        ajax_file_upload(files);
    };
}
 
function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();
        for(i=0; i<file_obj.length; i++) {  
            form_data.append('file[]', file_obj[i]);  
        }
        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            contentType: false,
            processData: false,
            data: form_data,
            success:function(response) {
                alert(response);
                $('#selectfile').val('');
            }
        });
    }
}

</script>
</html>