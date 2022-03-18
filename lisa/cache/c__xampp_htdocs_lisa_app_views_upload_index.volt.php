<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag & Drop using dropzone</title>
    <!-- dropzone css and js -->
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/jquery-ui.structure.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.css">
    <script type="text/javascript" src="../js/dropzone.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .page {
            display: flex;
        }

        .pageForSort {
            padding: 10px;
            margin: 10px;
        }
        .pageSelect{
            display: inline;
            margin: 1rem 3rem;
            /* border: 1px solid green; */
        }

        .dropzone{
            border: 3px dashed #CCA500;
            border-radius: 36px;
        }

        #table{
            border: 1px solid #CCA500;
            border-radius: 36px;
            margin-top: 200px;
            width: 1000px;
            margin-left: 450px;
        }


        #upload_btn,#submit_upload{
            margin-top: 30px;
        float: right;
        }

        #titleDetail{
            display: flex;
            flex-direction: row;
            align-items: center;
         }

         #backward_button{
            width: 60px;
            height: 60px;
            cursor: pointer;
         }

.button {
  background-color: #4CAF50;
  color: white;
}

.message{
    margin: 50px auto;
}

.upload_btn{
    width: 265px;
    height: 45px;
    background-color: #000000;
    color: #FFFFFF;
    font-size: 24px;
    font-family: RSU_BOLD;
    margin-right: 180px;
    cursor: pointer;
    border-radius: 46px;
}
.file_upload{
    width: 1000px;
    margin-left: 200px;
    
}

.numberTitle{
    width: 138px;
    height: 138px;
    border: 12px solid #FFDD53;
    border-radius: 300px;

    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 85px;
    font-family: 'RSU_BOLD';
    margin-left: 100px;
}

.detailTitle{
    position: absolute;
    top: 430px;
    font-size: 24px;
    font-family: 'RSU_BOLD';
}

.content{
    display: flex;
    align-items: center;
}

.numberTitle2{
    width: 138px;
    height: 138px;
    border: 12px solid #FFDD53;
    border-radius: 300px;

    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 85px;
    font-family: 'RSU_BOLD';
    margin-left: 100px;
    position: absolute;
    top: 700px;
}

.detailTitle2{
    position: absolute;
    top: 430px;
    font-size: 24px;
    font-family: 'RSU_BOLD';
    position: absolute;
    top: 900px;
}
 .docID{
    position: absolute;
    top: 600px;
    font-size: 24px;
    font-family: 'RSU_BOLD';
 }

 .msg{
    position: absolute;
    font-size: 24px;
    font-family: 'RSU_BOLD';
    top: 600px;
    left: 600px;
 }

 .extract_btn{
    width: 265px;
    height: 45px;
    background-color: #000000;
    color: #FFFFFF;
    font-size: 24px;
    font-family: RSU_BOLD;
    margin-right: 180px;
    cursor: pointer;
    border-radius: 46px;
 }
    </style>
</head>
    <div id="titleDetail">
        <div style="font-size: 48px; font-family: RSU_BOLD; margin-left: 60px;">อัปโหลดเอกสาร</div>
    </div>
    <div style="padding: 20px; margin-top: 30px;">
        <div class="main">
            <div class="content">
                <div class="numberTitle" style="display: flex;">1</div>
                <div class="detailTitle">อัปโหลดเอกสารแล้วเลือกหน้าของเอกสาร</div>
                <form action="lisa/upload/uploadFile" enctype="multipart/form-data" class="dropzone file_upload" id="file_upload">
                </form>
            </div>
            <input type="submit" class="upload_btn" id="upload_btn" value="ตรวจสอบเอกสาร"></input>
        </div>
        <div class="pageView" style="display:none">
            <?= $this->tag->form(['lisa/upload/extractFile', 'method' => 'post']) ?>
            <div>
                <div id="table" class="page">
                </div>
                <input type="hidden" id="arrPage" name="arrPage">
            </div>
            <?= $this->tag->submitButton(['เริ่ม! สกัดเอกสาร', 'id' => 'submit_upload', 'class' => 'button extractButton extract_btn']) ?>
            <?= $this->tag->endform() ?>
        </div>
    </div>
    <div>

    </div>





    

    <script src="../js/jquery.slim.min.js" type="text/javascript"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <script>
        $("#table").sortable({
            opacity: 0.5,
            distance: 300,
            delay: 0,
            containment: "parent",
            cursor: "grabbing",
        });
        $("#table").disableSelection();
    </script>
    <script>
        Dropzone.autoDiscover = false;
        var n;
        var myDropzone = new Dropzone("#file_upload", {
            url: "http://localhost/lisa/upload/uploadFile",
            // url:"http://127.0.0.1/lisa/upload/uploadFile",
            // paramName : "fileOther",
            timeout: 180000,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            acceptedFiles: '.jpg,.jpeg,.png,application/pdf',
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictRemoveFile: "ลบ",
            dictCancelUpload: "ยกเลิก",
            dictDefaultMessage: "เลือกไฟล์ หรือ ลากมาวางที่นี่ <br> คุณสามารถอัปโหลดไฟล์ประเภทเดียวกันได้ถึง 10 ไฟล์",
           
            success: function (file, response) {
                
                console.log(response);
                $(".loader-container").fadeOut(1000);
                var result = JSON.parse(response);
                // console.log(result.data.pages);
                $(".pageView").show();
                $(".page").html("");
                $.each(result.data.pages, function (index, value) {
                    $('.page').append(
                        `<label class="pageSelect"><img class="pageForSort" src=${value[index]} width="100" height="145">
                            <div style="text-align: center;"><input type="checkbox" checked="checked" class="selectPage" name="selectPage[]" value=${index},${value[index]}><p>${index}</p></div><label>`
                        );
                });

                if (result.status == 'success') {
                    $('.content .message').hide();
                    $('.content .docID').hide();
                    $('.content .msg').hide();
                    $('.content').append(
                        // '<div class="message success">Images Uploaded Successfully.</div>',
                        `<div class="numberTitle2" style="display: flex;">2</div>`,
                        `<div class="detailTitle2">เลือกหน้าของเอกสารที่จะนำไปใช้ในการสกัดคำ</div>`,
                        `<div class='docID' name='docID'> เอกสารหมายเลข : ${result.data.documentId} </div>`,
                        `<div class="msg"> คุณมีเอกสารทั้งหมด : ${result.data.pages.length} หน้า</div>`
                        );

                    $('.page').append(
                        `<input type='hidden' name='documentID' class='extract_btn' value=${result.data.documentId} />`,
                        );
                    swal({
                        title: "อัปโหลดไฟล์เอกสารสำเร็จ",
                        text: "เลือกหน้าของเอกสารที่ต้องการสกัดคำ",
                        icon: "success"
                    } );
                } else {
                    $('.content .message').hide();
                    $('.content').append('<div class="message error">Images can\'t Uploaded.</div>');
                }
            }
        });

     

                $(".extractButton").click(function () {
                var pages = [];
                var docId = $('#documentId').val();
                // console.log(docId);
                $('.selectPage').each(function (index, value) {
                    if ($(this).is(":checked")) {
                        pages.push($(this).val());
                        // console.log($(this).val(),index)
                    }
                    console.log(pages);
                });
                // $('.arrPage').append(`<input value="${pages}" name="arrPage">`);
                $('#arrPage').val(JSON.stringify(pages));
            });

        $('#upload_btn').click(function () {
            $(".loader-container").show();
            myDropzone.processQueue();
        });
    </script>
