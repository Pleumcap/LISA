<style>
    #email_button {
        text-align: center;
        width: 230px;
        height: auto;
        font-size: 24px;
        font-family: RSU_BOLD !important;
        background: #000000;
        color: white;
        border-radius: 46px;
        padding-top: 10px;
        cursor: pointer;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #email {
        font-size: 24px;
        width: 600px !important;
    }

    #login_button {
        text-align: center;
        width: 300px;
        height: auto;
        font-size: 24px;
        font-family: RSU_BOLD !important;
        background: #00000033;
        color: #000000;
        border-radius: 46px;
        padding-top: 10px;
        border: 1px solid;
        cursor: pointer;
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
<div class="row bg" style="background-image: url('https://localhost/lisa/public/img/Web 1920 – 18.png');">
    <div class="col-6 d-flex justify-content-center" style=" height: 100vh; flex-direction: row;
    align-items: center;">
        <div class="col-8" style="margin-left: 200px;">
            <div style="font-size: 60px; font-family: RSU_BOLD;">รีเซ็ตรหัสผ่าน</div>
            <div style="font-size: 36px; font-family: RSU_BOLD;">ระบุอีเมลเพื่อการยืนยันการสร้างรหัสผ่านใหม่</div>

            <input class="newFormInput" placeholder="อีเมล" id="email"></input>

            <div style="display: flex; width: 480px; justify-content: space-between; margin-top: 20px;">
                <div id="email_button">
                    ส่งอีเมล
                </div>
            </div>
            <hr style=" border: 1px solid #000000; width: 600px; margin: 30px 0px 30px 0px;">
            <div id="login_button">
                ลงชื่อเข้าใช้งาน
            </div>
            <div style="display: flex; position: absolute; top: 500px; left: 50px;">
                <div style="width: 92px; height: 12px; background-color: #000000; border-radius: 6px;"></div>
                <div
                    style="width: 92px; height: 12px; background-color: #000000; border-radius: 6px; opacity: 0.3; margin-left: 20px;">
                </div>
            </div>
        </div>
    </div>


    <div class="col-6 d-flex justify-content-center" style=" flex-direction: row;
    align-items: center;">
        <div>
            <img src="https://localhost/lisa/public/img/Lisa-full.png" style="width: 320px; height: 320px; position: absolute;
            top: 40px;
            right: 40px;">
        </div>
    </div>
    <div>
    </div>
</div>
</div>

<script>
    $(document).on('click', '#email_button', function () {
        $(".loader-container").show();
        var email = $('#email').val();
        console.log(email);
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test(email)) {
            $.ajax({
                url: 'http://localhost/lisa/user/forgetPassword',
                data: {
                    email: email
                },
                type: 'POST',
                success: function (response) {
                    var result = JSON.parse(response);
                    console.log(result.status);
                    var status = result.status
                    var message = result.message
                    if (result.status == "success") {
                        $(".loader-container").fadeOut(1000);
                        swal({
                            icon: "success",
                            title: "ส่งลิ้งก์รีเซ็ตรหัสผ่านสำเร็จ",
                            text: 'กรุณาตรวจสอบที่อีเมลของคุณ'
                        });
                       
                    } else {
                        $(".loader-container").fadeOut(1000);
                        swal({
                            icon: "warning",
                            title: "ส่งลิ้งก์รีเซ็ตรหัสผ่านไม่สำเร็จ",
                            text: message
                        });
                    }
                }
            });
        } else {
            $(".loader-container").fadeOut(1000);
            swal({
                icon: "warning",
                title: "ส่งลิ้งก์รีเซ็ตรหัสผ่านไม่สำเร็จ",
                text: "กรุณาตรวจสอบความถูกต้องของอีเมล"
            });
        }

    });
    $(document).on('click', '#login_button', function () {
        location.href = 'http://localhost/lisa/user/login';
    });
</script>