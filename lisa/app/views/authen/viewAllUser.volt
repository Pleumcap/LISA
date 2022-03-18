<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  <!-- bootstrap datepicker -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
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
    }

    #maintable {
      background-color: #FFFFFF;
    }

    .dataTables_wrapper {
    position: relative;
    clear: both;
    zoom: 1;
    margin-top: 0px !important;
    }

    th {
      color: #000000;
    }

    .text-center {
      display: flex;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      /* 15% from the top and centered */
      padding: 20px;
      border: 1px solid #888;
      width: 40%;
      /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-backdrop.show{
      display: none ;
    }

    #suspendTime{
      width: 100px;
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
  top: 300px;
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
  /* margin-left: 20px; */

}
.dataTables_wrapper{
  font-family: RSU_Regular;
    font-size: 20px;
    /* direction: rtl; */
    position: relative;
    clear: both;
    margin-top: 0px !important;
}
.dataModal{
  width: 85px;
height: 35px;
background: #FFDD53;
border-radius: 18px;
}

.saveSuspend{
  font-family: 'RSU_BOLD';
    font-size: 20px;
    margin-left: 20px;
}
  </style>

<?php $this->flashSession->output() ?>
<div style="font-size: 48px; font-family: RSU_BOLD;">รายการผู้ใช้งาน</div>
  <table id="maintable"  style="width:100%">
    <thead >
      <tr>
        <th>#</th>
        <th>รูป</th>
        <th>ชื่อ</th>
        <th>อีเมลล์</th>
        <th>สิทธิ</th>
        <!-- <th>สถานะ</th> -->
        <th>เข้าใช้ล่าสุด</th>
        <th>การจัดการ</th>
      </tr>
    </thead>

    <tbody>
      {% for val in viewAllUser.data  %}
      <tr>
          <td>{{ val.userId}}</td>
        <td><img src="{{val.picture}}" width="60" height="60" class="rounded-circle"></td>
        <td>{{ val.username }}</td>
        <td>{{ val.email }}</td>
        <td>{{ val.permiss }}</td>
        <!-- <td>{{ val.status}}</td> -->
        <td>{{ val.lastConnect }}</td>

        <td class="">
          <input type="button" name="edit" value="แก้ไข" class="btn btn-warning edit_data" data-id="{{val.userId}}" style="margin: 10px;"></input>
          <!-- The Modal -->
          <div id="dataModal{{val.userId}}" class="modal" style="z-index: 1100;">
            <!-- Modal content -->
            <div class="modal-content">
              <span class="close" style="align-self: flex-end;" data-dismiss="modal">&times;</span>
              <h3 style="text-align: left;">แก้ไขสิทธิของผู้ใช้ : {{val.username}}</h3>
              {{ form ('lisa/authen/editAccount', 'method' : 'post' ) }}
              <div class="input-group">
                {{hidden_field('userId', 'value':val.userId)}}
                <label for="permission">สิทธิ์การเข้าถึง :</label>
                <!-- {{ text_field('permission', 'size':32, 'class':'input-group', 'required':true) }} -->
                <select id="permission" name="permission">
                  <option value="user">User</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
              {{submit_button('บันทึก', 'class':'btn btn-success')}}
              {{ endform() }}
            </div>
          </div>

          <input type="button" name="suspend" value="ระงับ" class="btn btn-danger suspend" data-id="{{val.userId}}" style="margin: 10px;" ></input>

           <!-- The Modal -->
           <div id="suspendModal{{val.userId}}" class="modal" style="z-index: 1100;">
            <!-- Modal content -->
            <div class="modal-content">
              <span class="close" style="align-self: flex-end;" data-dismiss="modal">&times;</span>
              <h3 style="text-align: left;">ระงับบัญชีของผู้ใช้ : {{val.username}}</h3>
              {{ form ('lisa/authen/suspend', 'method' : 'post' ) }}
              <div class="input-group">
                {{hidden_field('userId', 'value':val.userId)}}
                {{ numeric_field('days', 'size':32, 'value': 0, 'min' : 0 , 'id':'suspendTime')}}
                <label for="days"> : วัน</label>
                {{ numeric_field('hours', 'size':32, 'value': 0, 'min' : 0, 'id':'suspendTime' )}}
                <label for="hours"> : ชั่วโมง</label>
                {{ numeric_field('minutes', 'size':32, 'value': 0, 'min' : 0, 'id':'suspendTime'  )}}
                <label for="minutes"> : นาที</label>
              </div>
              <div style="display: flex;">
                <input type="button" class="btn-danger suspendForever"value="ระงับบัญชีถาวร">
                {{submit_button('บันทึก', 'class':'btn btn-warning saveSuspend')}}
              </div>
              {{ endform() }}
            </div>
          </div>
        </td>
      </tr>
    </tbody>
    {% endfor %}
  </table>
<script>
    $(document).on('click','.edit_data', function(){
    var id = $(this).data('id');
    $('#dataModal'+id).modal();
  });
  $(document).on('click','.suspend', function(){
    var id = $(this).data('id');
    $('#suspendModal'+id).modal();
    $('.suspendForever').on('click', function(){
      swal({
            title: 'ต้องการระงับผู้ใช้นี้ถาวรใช่หรือไม่',
            text: 'กด OK เพื่อระงับบัญชีผู้ใช้นี้ถาวร',
            icon: 'warning',
            buttons: true,
            confirmButtonText: 'OK',
            dangerMode: true,
        }).then((result) => {
            if (result) {
                console.log(result);
                $.ajax({
        url: "http://localhost/lisa/authen/suspendForever",
        data: {
          userId: id
        },
        type: "POST",
        success: function (response) {
          var result = JSON.parse(response);
          swal({
            title: 'ระงับบัญชีผู้ใช้นี้ถาวรแล้ว',
            icon: 'success',
        })
        }
      });
            }
        });
    });
  });

</script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#maintable').DataTable({
        "pageLength": 20,
        "lengthChange": false,
        "ordering": false,
        "info": false,
        "paging": false,
        "searching": false,
        "language": {
          "emptyTable": "ไม่มีประวัติการกระทำ",
          "zeroRecords": "ไม่พบคำที่ค้นหา",
          "lengthMenu": "แสดง _MENU_ ข้อมูล",
          "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เอกสาร",
          "infoEmpty": "แสดง 0 ถึง 0 ของ 0 เอกสาร",
          "loadingRecords": "กำลังโหลดข้อมูล...",
          // "search": "ค้นหาชื่อผู้ใช้จากตาราง:",
          "paginate": {
            "first": "หน้าแรก",
            "last": "หน้าสุดท้าย",
            "next": "ถัดไป",
            "previous": "ก่อนหน้า"
          },

        },
      });
    });
  </script>