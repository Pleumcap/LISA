    <!-- bootstrap datepicker -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
            background-color: #000000;
            margin-left: 900px;
        }

        .detailForm{
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border: 1px solid #CCA500;
            border-radius: 36px;
            width: 1550px;
            height: 300px;
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
            <div style="font-size: 48px; font-family: RSU_BOLD; margin-left: 60px;">แก้ไขเอกสาร</div>
        </div>
        
        <hr style="width: 1540px;  margin-top: 40px; margin-bottom: 40px;">
        {{ form ('lisa/authen/editDetail', 'method' : 'post' ) }}   
        <div style="margin-left: 120px;">
            <div style="display: flex;">
                <div style="color: #BCBCBC; font-size: 24px; font-family: RSU_BOLD;" >ชื่อเอกสาร</div>
                <div style="display: flex; text-align: center;">
                    {{ submit_button('บันทึก', 'class':'menuOption', 'id':'saveButton')}}
                </div>
            </div>
            <div style="font-size: 36px; font-family: RSU_BOLD;">{{ editDetail.data.title }}</div>
            <div id="dateUpdate" style="color: #BCBCBC; font-size: 24px; font-family: RSU_BOLD; margin-top: 20px;">แก้ไขเอกสารเมื่อ : {{ editDetail.data.dateUpdate }}</div>
            <div style=" font-size: 36px; font-family: RSU_BOLD; margin-top: 50px; margin-bottom: 50px;" >รายละเอียดคำสำคัญ</div>
        </div>
        
        <div class="detailForm row detail">
            <div class="col-3">
                <div class="detail">ชื่อเอกสาร</div>
                <div class="detail">วันที่เขียน</div>
                <div class="detail">ผู้รับ</div>
                <div class="detail">ส่งจาก</div>
            </div>
            <div class="col-9">
                {{ text_field('title','class':'detailBorder', 'value': editDetail.data.title ) }}
                <label style="margin-bottom: -10px;">
                    <input id="dateWrite" name='dateWrite' width="276" value='{{date}}'/>
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
                {{ hidden_field('documentId', 'class':'detailBorder', 'value': editDetail.data.documentId ) }}
                {{ text_field('receiver', 'class':'detailBorder', 'value': editDetail.data.receiver ) }}
                {{ text_field('sendAddress', 'class':'detailBorder', 'value': editDetail.data.sendAddress ) }}
            </div>
        </div>
        
        <div style="margin-left: 120px;">
            <div style=" font-size: 36px; font-family: RSU_BOLD; margin-top: 50px; margin-bottom: 50px;" >ผู้ลงนาม</div>
        </div>
        <div class="row detail">
        <table style="width: 1500px; padding: 50px; text-align: center; border-radius: 46px;">
            {% if(signature) %}
            <tr style="background-color: #CCA500; height: 60px;">
                <th style="width: 800px;">ชื่อผู้ลงนาม</th>
                <th style="width: 400px;">ตำแหน่ง</th>
            </tr>
            {% for i in signature %}
            <tr>
                {{hidden_field('personId[]', 'class':'', 'value':i.personId)}}
                {{hidden_field('signatureImg[]', 'class':'', 'value':i.signatureImg)}}
                <td>{{text_field('personName[]', 'class':'', 'value':i.personName, 'style':'width:400px')}}</td>
                <td>{{text_field('personRole[]', 'class':'', 'value':i.personRole)}}</td>
            </tr>
            {% endfor %}
            {% else %}
            <tr>
                <td colspan="3">เอกสารนี้ไม่มีชื่อลงนาม</td>
            </tr>
            {% endif %}
        </table>
        </div>
        {{ endform() }}
<script>
    $(document).on('click','#backward_button', function(){
        window.history.back();
    });
</script>

