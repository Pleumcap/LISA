<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

		<style>
		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.modal-lg{
			max-height: 1000px !important;
  			max-width: 1000px !important;
		}

		.overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}

		#sample_image{
			width: 100%;
			height: 100%;
		}

        .main{
            font-family: RSU_BOLD;
            font-size: 24px;
        }
      

        .menuOption{
            width: 110px;
            height: 35px;
            border-radius: 30px;
            color: #FFFFFF;
            font-size: 24px; 
            font-family: RSU_BOLD;
            cursor: pointer;
        }

        #upload_button {
            width: 250px;
            border-radius: 46px;
            font-family: RSU_BOLD;
            background-color: #000000;
            color: #FFFFFF;
            font-size: 24px;
            text-align: center;
            margin-right: 70px;
            margin-top: 10px;
            margin-left: 1450px;
        }
</style>
  
  <!-- Page content -->
  <div style="font-size: 48px; font-family: RSU_BOLD;">แก้ไขข้อมูลผู้ใช้งาน</div>
  
		<?php $this->flashSession->output() ?>
		<div class="container main" align="center">
			<div class="row">
				<div class="col-md-2">
					<div class="image_area">
						<form method="post">
							<label for="upload_image">
								<img src="{{viewProfile.data.picture}}" id="uploaded_image" class="img-responsive img-circle" />
								<div class="overlay">
									<div class="text">กดเพื่อเปลี่ยนรูปโปรไฟล์</div>
								</div>
								<input type="file" name="image" class="image" id="upload_image" style="display:none" />
							</label>
						</form>
					</div>
			    </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-4 ">
                            <div style="margin-top: 10px;">ชื่อผู้ใช้งาน</div>
                            <div style="margin-top: 10px;">อีเมล</div>
                        </div>
                        <div class="col-8">
                            {{ text_field('username', 'size':32, 'class':'input-group', 'required':true, 'value':viewProfile.data.username) }}
                        {{ email_field('email', 'size':32, 'class':'input-group', 'required':true, 'value':viewProfile.data.email) }}
                        </div>
                    </div>
                    <div id="saveEditFile" class="menuOption" style="background-color: #000000;    margin-left: 300px;
                    margin-top: 50px;">บันทึก</div>
                           
                </div>
    		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title">ครอบตัดรูปภาพโปรไฟล์</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
			      			<button type="button" id="crop" class="btn btn-primary">บันทึก</button>
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
			      		</div>
			    	</div>
			  	</div>
			</div>			
		</div>
<script>

$(document).ready(function(){
	var $modal = $('#modal');
	var image = document.getElementById('sample_image');
	var cropper;
	$('#upload_image').change(function(event){
		var files = event.target.files;
		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});
	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 3,
			preview:'.preview',
			zoomOnWheel: true,
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:400,
			height:400
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'http://localhost/lisa/authen/test',
					method:'POST',
					data:{image:base64data},
					success:function(data)
					{
						var result = JSON.parse(data);
						$modal.modal('hide');
						if(result.status == 'success'){
							location.reload();
						} else {
							alert('try again');
						}
					}
				});
			};
		});
	});
	
});
</script>

<script>
    $(document).on('click','#saveEditFile',function(){
        var username = $('#username').val();
        var email = $('#email').val();
        $(".loader-container").show();
        $.ajax({
            url: 'http://localhost/lisa/authen/editProfileAjax',
            data: {
                username: username,
                email: email
            },
            type: 'POST',
            success: function (response) {
                var result = JSON.parse(response);
                console.log(result);
                if (result.status == "success") {
                    $(".loader-container").fadeOut(1000);
                    swal({
                        icon: "success",
                        title: "แก้ไขข้อมูลผู้ใช้สำเร็จ"
                    });
                }else{
                    $(".loader-container").fadeOut(1000);
                    swal({
                        icon: "warning",
                        title: "แก้ไขข้อมูลผู้ใช้ไม่สำเร็จ"
                    });
                }
            }
        });
    }); 
</script>