<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

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

    </style>

    <div class="">
        <div style="font-size: 48px; font-family: RSU_BOLD;">รายการประวัติผู้ใช้งาน</div>
        <table id="maintable" class="display" style="width:100%">
            <thead>
                <!-- <th>หมายเลขการแก้ไข</th> -->
                <th>ผู้ใช้</th>
                <th>การกระทำ</th>
                <th>เอกสาร</th>
                <th>User Agent</th>
                <th>วันที่</th>
            </thead>
            <tbody>
                <?php foreach ($viewHistory->data as $val) { ?>
                <tr>
                    <!-- <td><?= $val->historyId ?></td> -->
                    <td><?= $val->username ?></td>
                    <td style="width: 200px;"><?= $val->action ?></td>
                    <td><?= $val->documentId ?></td>
                    <td><?= $val->userAgent ?></td>
                    <td><?= $val->dateUpdate ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
          $('#maintable').DataTable({
            "pageLength": 20,
            "lengthChange": false,
            "ordering": false,
            "info": false,
            "paging": true,
            "searching": true,
            "language": {
              "emptyTable": "ไม่มีประวัติการกระทำ",
              "zeroRecords": "ไม่พบคำที่ค้นหา",
              "lengthMenu": "แสดง _MENU_ ข้อมูล",
              "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เอกสาร",
              "infoEmpty": "แสดง 0 ถึง 0 ของ 0 เอกสาร",
              "loadingRecords": "กำลังโหลดข้อมูล...",
              "search": "ค้นหาจากตาราง:",
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
