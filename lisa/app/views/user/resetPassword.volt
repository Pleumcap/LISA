<style>
    #togglePassword {
        width: 30px;
        height: 30px;
        position: absolute;
        top: 160px;
        right: 20px;
    }

    #toggleConfirmPassword {
        width: 30px;
        height: 30px;
        position: absolute;
        top: 223px;
        right: 20px;
    }

    #passwordInput {
        font-size: 24px;
        width: 600px !important;
    }

    #confirmPasswordInput {
        font-size: 24px;
        width: 600px !important;
    }

    #savePassword_button {
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
</style>
{{ hidden_field('tokenurl', 'value':tokenurl, 'min':0) }}
<div class="row bg" style="background-image: url('https://localhost/lisa/public/img/Web 1920 – 18.png');">
    <div class="col-6 d-flex justify-content-center" style=" height: 100vh; flex-direction: row;
        align-items: center;">
        <div class="col-8" style="margin-left: 200px;">
            <div style="font-size: 60px; font-family: RSU_BOLD;">รีเซ็ตรหัสผ่าน</div>
            <div style="font-size: 36px; font-family: RSU_BOLD;">กรอกรหัสผ่านใหม่ในการเข้าสู่ระบบ</div>
            <div>
                <input class="newFormInput" placeholder="รหัสผ่าน" id="passwordInput" type="password"></input>
                <img src="https://localhost/lisa/public/img/icon/icon128_eye_close.png" id="togglePassword" onclick="myFunction()"
                    style="cursor: pointer;"></img>
                <input class="newFormInput" placeholder="ยืนยันรหัสผ่าน" id="confirmPasswordInput"
                    type="password"></input>
                <img src="https://localhost/lisa/public/img/icon/icon128_eye_close.png" id="toggleConfirmPassword" onclick="myFunction2()"
                    style="cursor: pointer;"></img>
            </div>
            <div style="display: flex; width: 480px; justify-content: space-between; margin-top: 20px;">
                <div id="savePassword_button">
                    บันทึกรหัสผ่าน
                </div>
            </div>
            <div style="display: flex; position: absolute; top: 500px; left: 50px;">
                <div style="width: 92px; height: 12px; background-color: #000000; border-radius: 6px;"></div>
                <div
                    style="width: 92px; height: 12px; background-color: #000000; border-radius: 6px; margin-left: 20px;">
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
     function myFunction() {
        var x = document.getElementById("passwordInput");
        var y = document.getElementById("togglePassword");

        if (x.type === "password") {
            x.type = "text";
            y.src = 'https://localhost/lisa/public/img/icon/icon128_eye_open.png'
        } else {
            x.type = "password";
            y.src = 'https://localhost/lisa/public/img/icon/icon128_eye_close.png'
        }
    }
    function myFunction2() {
        var x = document.getElementById("confirmPasswordInput");
        var y = document.getElementById("toggleConfirmPassword");

        if (x.type === "password") {
            x.type = "text";
            y.src = 'https://localhost/lisa/public/img/icon/icon128_eye_open.png'
        } else {
            x.type = "password";
            y.src = 'https://localhost/lisa/public/img/icon/icon128_eye_close.png'
        }
    }
    
    $(document).on('click', '#savePassword_button', function () {
        $(".loader-container").show();
        var password = $('#passwordInput').val();
        var passwordConfirm = $('#confirmPasswordInput').val();
        var tokenurl = $('#tokenurl').val();
        console.log(password);
        console.log(passwordConfirm);
        if (password != passwordConfirm) {
            $(".loader-container").fadeOut(1000);
            swal({
                icon: "warning",
                title: "รีเซ็ตรหัสผ่านไม่สำเร็จ",
                text: "กรุณากรอกรหัสผ่านให้ตรงกัน"
            });
        } else {
            $.ajax({
                url: 'http://localhost/lisa/user/resetPasswordAjax',
                data: {
                    password: password,
                    password_confirm: passwordConfirm,
                    tokenurl: tokenurl
                },
                type: 'POST',
                success: function (response) {
                    var result = JSON.parse(response);
                    var status = result.status
                    var message = result.message
                    console.log(result);
                    console.log(message);
                    if (result.status == "success") {
                        $(".loader-container").fadeOut(1000);
                        swal({
                            icon: "success",
                            title: "รีเซ็ตรหัสผ่านสำเร็จ"
                        });
                        location.href = 'http://localhost/lisa/user/login';
                    } else {
                        $(".loader-container").fadeOut(1000);
                        swal({
                            icon: "warning",
                            title: "รีเซ็ตรหัสผ่านไม่สำเร็จ",
                            text: message
                        });
                    }

                },
                error: function (response) {
                     $(".loader-container").fadeOut(1000);
                        swal({
                            icon: "success",
                            title: "รีเซ็ตรหัสผ่านสำเร็จ"
                        });
                        location.href = 'http://localhost/lisa/user/login';
                }
            });
        }
    });
</script>