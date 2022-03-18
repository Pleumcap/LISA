<style>
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
     </style>

<div id="titleDetail">
    <img id="backward_button" src="https://localhost/lisa/public/img/icon/icon128_back.png" alt="backward icon" style="cursor: pointer;">
    <div style="font-size: 48px; font-family: RSU_BOLD; margin-left: 60px;">รายละเอียดเอกสาร</div>
</div>

<hr style="width: 1540px;  margin-top: 40px; margin-bottom: 40px;">

<div style="margin-left: 120px;">
    <div style="display: flex;">
        <div style="color: #BCBCBC; font-size: 24px; font-family: RSU_BOLD;" >ชื่อเอกสาร</div>
        <div style="display: flex; text-align: center;">
            <div id="originalFile" class="menuOption" style="background-color: #000000; margin-left: 900px;">ต้นฉบับ</div>
            <?php if (($permission == 'admin')) { ?>
            <div id="editFile" class="menuOption" style="background-color: #CCA500; margin-left: 20px;">แก้ไข</div>
            <div id="deleteFile" class="menuOption" style="background-color: #FF3E3E; margin-left: 20px;">ลบ</div>
            <?php } ?>
        </div>
    </div>
   
    <div style="font-size: 36px; font-family: RSU_BOLD;"><?= $viewDetail->data->title ?></div>
    <div style="color: #BCBCBC; font-size: 24px; font-family: RSU_BOLD; margin-top: 20px;">แก้ไขเอกสารเมื่อ : <?= $viewDetail->data->dateUpdate ?></div>
    <div style=" font-size: 36px; font-family: RSU_BOLD; margin-top: 50px; margin-bottom: 50px;" >รายละเอียดคำสำคัญ</div>
</div>
<div class="detailForm row detail">
    <div class="col-3">
        <div class="detail">ชื่อเอกสาร</div>
        <div class="detail">วันที่เขียน</div>
        <div class="detail">ผู้รับ</div>
        <div class="detail">หมายเลขเอกสาร</div>
        <div class="detail">ส่งจาก</div>
    </div>
    <div class="col-9">
        <div class="detailBorder"><?= $viewDetail->data->title ?></div>
        <div class="detailBorder"><?= $date ?></div>
        <div class="detailBorder"><?= $viewDetail->data->receiver ?></div>
        <div class="detailBorder"><?= $viewDetail->data->documentId ?></div> 
        <div class="detailBorder"><?= $viewDetail->data->sendAddress ?></div>
    </div>
</div>

<div style="margin-left: 120px;">
    <div style=" font-size: 36px; font-family: RSU_BOLD; margin-top: 50px; margin-bottom: 50px;" >ผู้ลงนาม</div>
</div>
<div class="row detail">
<table style="width: 1500px; padding: 50px; text-align: center; border-radius: 46px;">
    <?php if (($signature)) { ?>
    <tr style="background-color: #CCA500; height: 60px;">
        <th style="width: 800;">ชื่อผู้ลงนาม</th>
        <th style="width: 400;">ตำแหน่ง</th>
    </tr>
    <?php foreach ($signature as $i) { ?>
    <tr>
        <td><?= $i->personName ?></td>
        <td><?= $i->personRole ?></td>
    </tr>
    <?php } ?>
    <?php } else { ?>
    <tr>
        <td colspan="3">เอกสารนี้ไม่มีชื่อลงนาม</td>
    </tr>
    <?php } ?>
</table>
</div>

<script>
    $(document).on('click','#backward_button', function(){
location.href='http://localhost/lisa/authen/document'
    });

    $(document).on('click','#originalFile', function(){
location.href='http://localhost/lisa/authen/viewPage?doc_id=<?= $viewDetail->data->documentId ?>'
    });

    $(document).on('click','#editFile', function(){
location.href='http://localhost/lisa/authen/editDetail?doc_id=<?= $viewDetail->data->documentId ?>'
    });

    $(document).on('click','#deleteFile', function(){
        swal({
                    title: 'ต้องการที่จะลบเอกจากระบบหรือไม่',
                    text: 'กด OK เพื่อลบเอกสารออกจากระบบ',
                    icon: 'error',
                    buttons: true,
                    confirmButtonText: 'OK',
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        console.log(result);
                        location.href = 'http://localhost/lisa/authen/deleteDocument?doc_id=<?= $viewDetail->data->documentId ?>';
                    }
                });
    });
</script>
