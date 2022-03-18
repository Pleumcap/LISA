<!-- bootstrap datepicker -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
            width: 1500px;
            /* margin-left: 450px; */
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

.numberTitle3{
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

.detailTitle3{
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
    background-color: #FFDD53;
    color: #FFFFFF;
    font-size: 24px;
    font-family: RSU_BOLD;
    margin-right: 180px;
    cursor: pointer;
    border-radius: 46px;
    padding-top: 5px;
    color: #000000;
 }

 .save_btn{
    width: 265px;
    height: 45px;
    background-color: #000000;
    color: #FFFFFF;
    font-size: 24px;
    font-family: RSU_BOLD;
    margin-right: 180px;
    cursor: pointer;
    border-radius: 46px;
    padding-top: 5px;
    margin-left: -140px;
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

        .menuOption{
            width: 110px;
            height: 35px;
            border-radius: 30px;
            color: #FFFFFF;
            font-size: 24px; 
            font-family: RSU_BOLD;
            cursor: pointer;
        }

        .detailForm{
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #CCA500;
            border-radius: 36px;
            width: 1550px;
            height: 350px;
            padding: 50px;
        }

        .detail{
            font-size: 24px;
            font-family: RSU_BOLD;
            margin-top: 10px;
        }

        .detailBorder{
            width: 1000px;
            height: 36px;
            background: #FFFFFF;
            border: 1px solid #DEDEDE;
            border-radius: 12px;
            margin-top: 10px;
            padding: 0px 20px 0px 20px;
        }

        .menuBar{
            display: flex;
    margin-top: 100px;
    width: 1500px;
    justify-content: flex-end;
    text-align: center;
    align-items: center;
        }

        #imgPer{
            margin-left: 20px;
        }

        #namePer{
            width: 600px; margin-left: 100px;
        }

        #rolePer{
            width: 300px; margin-left: 100px;
        }
     </style>

<?php $this->flashSession->output() ?>
<div id="titleDetail">
    <img id="backward_button" src="https://localhost/lisa/public/img/icon/icon128_back.png" alt="backward icon" style="cursor: pointer;">
    <div style="font-size: 48px; font-family: RSU_BOLD; margin-left: 60px;">รายละเอียดเอกสาร</div>
</div>

<hr style="width: 1540px;  margin-top: 40px; margin-bottom: 40px;">
<?= $this->tag->form(['lisa/upload/save', 'method' => 'post']) ?>
<?= $this->tag->hiddenField(['documentId', 'class' => 'input-group', 'value' => $editDetail->data->documentId]) ?>
<div class=" row detail">
    <div class="col-3">
        <div class="detail">ชื่อเอกสาร</div>
        <div class="detail">วันที่เขียน</div>
        <div class="detail">ผู้รับ</div>
        <div class="detail">ส่งจาก</div>
    </div>
    <div class="col-9">
        <?= $this->tag->textField(['title', 'class' => 'input-group', 'value' => $editDetail->data->title]) ?>
        <label>
            <input id="dateWrite" name='dateWrite' width="276" value='<?= $date ?>' />
        </label>
        <script>
            var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date()
                .getDate());
            $('#dateWrite').datepicker({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                maxDate: function () {
                    return $('#endDate').val();
                },
                format: 'ddd, dd mmm yyyy,'
            });
        </script>
        <?= $this->tag->textField(['receiver', 'class' => 'input-group', 'value' => $editDetail->data->receiver]) ?>
        <?= $this->tag->textField(['sendAddress', 'class' => 'input-group', 'value' => $editDetail->data->sendAddress]) ?>
    </div>
    <table class="signatureTable" style="display: none; margin-top: 20px;">
        <th>ชื่อผู้ลงนาม :</th>
        <tbody id="signTable">
        </tbody>
    </table>
    <?= $this->tag->endform() ?>
    <div class="menuBar">
        <div id="extract_btn" class="extract_btn extractSignature">เพิ่มสกัดชื่อผู้ลงนาม</div>
        <?= $this->tag->submitButton(['บันทึกเอกสาร', 'class' => 'save_btn']) ?>
    </div>
</div>

<div id="signPageField" style="margin-top: 100px; display: none;">
    <?= $this->tag->hiddenField(['documentId', 'class' => 'input-group', 'value' => $editDetail->data->documentId, 'id' => 'documentId']) ?>
    <div style="overflow-x:auto;">
        <div id="table" class="page">
            <?php foreach ($viewPage as $key => $i) { ?>
            <label id="pages"><img class="pageForSort" src="<?= $i ?>" width="100" height="140">
                <div style="text-align: center;"><input type="checkbox" class="get_value" name="selectPage[]"
                        value="<?= $viewNumber[$key] ?>,<?= $i ?>">
                    <p><?= $viewNumber[$key] ?></p>
                </div>
            </label>
            <?php } ?>
        </div>
    </div>

    <div class="text-center" style="float: right; margin: 30px auto;">
        <?= $this->tag->submitButton(['สกัดชื่อผู้ลงนาม', 'class' => 'save_btn extractSignature', 'id' => 'extractSignature']) ?>
    </div>
</div>
    <script>
        $(document).ready(function () {
            $("#extractSignature").click(function () {
                var pages = [];
                var docId = $('#documentId').val();
                $('.get_value').each(function () {
                    if ($(this).is(":checked")) {
                        pages.push($(this).val());
                    }
                    console.log(pages);
                });
                $.ajax({
                    url: "http://localhost/lisa/upload/extractSignature",
                    data: {
                        selectPage: pages,
                        documentId: docId
                    },
                    type: "POST",
                    success: function (response) {
                        var result = JSON.parse(response);
                        console.log(result);
                        $(".signatureTable").show();
                        $(".pageView").show();
                        $.each(result.data, function (index, value) {
                                $('#signTable').append(
                                    `<tr style="margin-top:30px">
                                        <input type="hidden" id="" name="personId[]" value="${value.personId}">
                                        <input type="hidden" id="" name="signatureImg[]" value="${value.signatureImg}">
                                        <input type="hidden" ><img id="imgPer" src="" width="100" height="100" style=""></input>
                                        <td ><input  id="namePer" name="personName[]" value="${value.personName}" style=""></td>
                                        <td ><input  id="rolePer" name="personRole[]" value="${value.personRole}" style=""></td>
                                    </tr>`
                                );
                        });
                    }
                });
            });
        });
        $(document).on('click', '#extract_btn', function(){
            $('#signPageField').show();
        });
        $(document).on('click','#backward_button', function(){
        window.history.back();
    });
    </script>
