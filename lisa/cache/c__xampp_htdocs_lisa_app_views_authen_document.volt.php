<!DOCTYPE html>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <!-- bootstrap datepicker -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<style>
  #maintable_filter {
    margin: 20px;
  }

  #maintable_filter input[type='search'] {
    background-color: #FFFFFF;
  }

  #maintable_wrapper {
    
    border-radius: 3px;
    /* box-shadow: 0 0 10px 5px #dedede; */
    text-align: center;
    width: 1500px;
    margin-left: 350px;
  }

  #maintable{
    background-color: #FFFFFF;
  }

  th{
    color: #000000;
  }

  .dataTables_wrapper {
    font-family: RSU_Regular;
    font-size: 20px;
    /* direction: rtl; */
    position: relative;
    clear: both;
    /* *zoom: 1;
    zoom: 1; */
    margin-top: 0px !important;
}

#viewDetail{
  width: 174px;
  height: 35px;
  background: #FFDD53 0% 0% no-repeat padding-box;
  border-radius: 18px;
  color: #000000;
  /* border:1px #000000 solid; */
  font-family: RSU_BOLD;
}

#filterBar{
  font-size: 24px;
  font-family: RSU_Regular;
  display: flex;
  width: 1000px;
  flex-direction: row;
  /* justify-content: space-around; */
  position: absolute;
  top: 230px;
  z-index: 1000;
}

#search_button{
  text-align: center;
  width: 150px;
  height: 50px !important;
  font-size: 24px;
  font-family: RSU_BOLD !important;
  background: #000000;
  color: white;
  border-radius: 46px;
  cursor: pointer;
  padding-top: 10px;
  padding-bottom: 10px;
  margin-left: 20px;
}
</style>

  <?= $this->tag->hiddenField(['limit', 'value' => 1000, 'min' => 0]) ?>
  <?= $this->tag->hiddenField(['offset', 'value' => 0, 'min' => 0]) ?>
  <?php $this->flashSession->output() ?>
  <div style="font-size: 48px; font-family: RSU_BOLD;">รายการเอกสาร</div>
  <?= $this->tag->form(['lisa/authen/document', 'method' => 'post', 'accept-charset' => 'utf-8']) ?>
  <div id="filterBar">
    <img src="../public/img/icon/xd_calendar_w copy@2x.png" alt="filter" style="width: 50px; height: 50px;">
    <div style="font-size: 36px; font-family: RSU_BOLD;">ตัวกรอง</div>
     <div style="margin-left: 20px;">
     <input id="startDate" name="startDate" placeholder="เริ่มวันที่" style="width: 200px; font-size: 24px; " />
     </div> 
     <div style="margin-left: 20px;">
    <input id="endDate" name="endDate" placeholder="ถึงวันที่" style="width: 200px; font-size: 24px;" />
   
     </div>
     <?= $this->tag->hiddenField(['limit', 'value' => 1000, 'min' => 0]) ?>
     <?= $this->tag->hiddenField(['offset', 'value' => 0, 'min' => 0]) ?> <br>
     <?= $this->tag->submitButton(['ค้นหา', 'class' => '', 'id' => 'search_button']) ?>
   </div>
   <?= $this->tag->endform() ?>
    <script>
      var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
      $('#startDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        maxDate: function () {
          return $('#endDate').val();
        },
        format: 'yyyy-mm-dd'
      });

      $('#endDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        minDate: function () {
          return $('#startDate').val();
        },
        format: 'yyyy-mm-dd'
      });
    </script>
  </div>
        <table id="maintable" class="display" style="width:100%">
          <thead style="text-align: start;">
            <tr>
              <th>#</th>
              <th>ชื่อ</th>
              <th>ส่งจาก</th>
              <th>ผู้รับ</th>
              <th>วันที่</th>
              <th>จัดการ</th>
            </tr>
          </thead>

          <tbody style="text-align: start;">
            <?php foreach ($viewDocuments->data as $val) { ?>
            <tr>
              <td><?= $val->documentId ?></td>
              <td><?= $val->title ?></td>
              <td><?= $val->sendAddress ?></td>
              <td><?= $val->receiver ?></td>
              <td><?= Extension::substrDate($val->dateWrite) ?></td>
              <td class="text-center">
                <a id="viewDetail" href="<?= $this->url->get('lisa/authen/viewDetail') ?>?doc_id=<?= $val->documentId ?>" )}" class="btn"
                  name="viewDetail">รายละเอียด</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>

        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>
          $(document).ready(function () {
            // oTable =  $('#maintable').DataTable({
            $('#maintable').DataTable({
              "pageLength": 20,
              "lengthChange": false,
              "ordering": false,
              "info": false,
              "paging": true,
              "searching": true,
              "language": {
                "emptyTable": "ไม่มีเอกสาร",
                "zeroRecords": "ไม่พบเอกสารที่ค้นหา",
                "lengthMenu": "แสดง _MENU_ ข้อมูล",
                "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เอกสาร",
                "infoEmpty": "แสดง 0 ถึง 0 ของ 0 เอกสาร",
                "loadingRecords": "กำลังโหลดข้อมูล...",
                "search": "ค้นหาเอกสารจากตาราง:",
                "paginate": {
                  "first": "หน้าแรก",
                  "last": "หน้าุดท้าย",
                  "next": "ถัดไป",
                  "previous": "ก่อนหน้า"
                },
              },
            });
          });
        </script>
      </div>
    </div>
  </div>

  <script>
    $(document).on('click', '#search_button', function(){
      console.log(1);
      var start = $('#startDate').val();
      var end = $('#endDate').val();
      var limit = $('#limit').val();
      var offset = $('#offset').val();
      console.log(start);
      console.log(end);
      console.log(limit);
      console.log(offset);
      $(".loader-container").show();
        $.ajax({
            url: 'http://localhost/lisa/authen/document',
            data: {
                startDate: start,
                endDate: end,
                limit: limit,
                offset: offset
            },
            type: 'POST',
            success: function (response) {
                var result = JSON.parse(response);
                console.log(result);
                console.log(result.status);
                if (result.status == "success") {
                    $(".loader-container").fadeOut(1000);
                } else {
                    $(".loader-container").fadeOut(1000);
                }
            }
        });
    });
  </script>
