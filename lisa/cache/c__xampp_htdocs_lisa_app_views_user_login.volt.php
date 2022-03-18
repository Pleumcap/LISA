<style>
    #togglePassword {
        width: 30px;
        height: 30px;
        /* position: absolute; */
        position: absolute;
        top: 220px;
        right: 260px;
    }

    #login_button {
        text-align: center;
        width: 200px;
        height: auto;
        font-size: 24px;
        font-family: RSU_BOLD !important;
        background: #000000;
        color: white;
        border-radius: 46px;
        cursor: pointer;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #forgetPassword_button {
        font-size: 24px;
        color: #000000;
        cursor: pointer;
        font-family: RSU_BOLD;
    }

    #signup_button {
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


<div class="row bg" style="margin: 0px; background-image: url('https://localhost/lisa/public/img/BG_Login.png');">
    <div class="col-6 d-flex justify-content-center" style=" height: 100vh; flex-direction: row;
    align-items: center;">
        <div class="col-8" style="margin-left: 200px;">
            <div style="font-size: 60px; font-family: RSU_BOLD;">ยินดีต้อนรับ!</div>
            <div style="font-size: 36px; font-family: RSU_BOLD;">กรุณาลงชื่อเข้าใช้งาน</div>
            <input class="newFormInput" placeholder="ชื่อผู้ใช้ / อีเมล" id="username" style="font-size: 24px;"
                aria-required="true"></input>
            <div>
                <input class="newFormInput" placeholder="รหัสผ่าน" id="passwordInput" type="password"
                    style="font-size: 24px;" required></input>
                <img src="https://localhost/lisa/public/img/icon/icon128_eye_close.png" id="togglePassword" onclick="myFunction()"
                    style="cursor: pointer;"></img>
            </div>
            <div
                style="display: flex; width: 360px; justify-content: space-between; align-items: center; margin-top: 20px;">
                <div id="login_button">
                    <div>ลงชื่อเข้าใช้</div>
                </div>
                <div id="forgetPassword_button">ลืมรหัสผ่าน ?</div>
            </div>
            <hr style=" border: 1px solid #000000; width: 360px; margin: 30px 0px 30px 0px;">
            <div id="signup_button">
                สร้างบัญชีผู้ใช้งานใหม่
            </div>
        </div>
    </div>


    <div class="col-6 d-flex justify-content-center" style=" flex-direction: row;
    align-items: center;">
        <div>
            <img src="https://localhost/lisa/public/img/Lisa-full.png" style="width: 500px; height: 500px; margin-left: 100px;">
        </div>
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

    $(document).on('click', '#forgetPassword_button', function () {
        location.href = 'http://localhost/lisa/user/forgetPassword';
    });
    $(document).on('click', '#signup_button', function () {
        location.href = 'http://localhost/lisa/user/signup';
    });

    $(document).on('click', '#login_button', function () {
        var username = $('#username').val();
        var password = $('#passwordInput').val();
        $(".loader-container").show();
        $.ajax({
            url: 'http://localhost/lisa/user/login',
            data: {
                username: username,
                password: password
            },
            type: 'POST',
            success: function (response) {
                var result = JSON.parse(response);
                console.log(result.status);
                if (result.status == "success") {
                    $(".loader-container").fadeOut(1000);
                    swal({
                        icon: "success",
                        title: "เข้าสู่ระบบสำเร็จ"
                    });
                    location.href = 'http://localhost/lisa/authen/main';
                } else {
                    $(".loader-container").fadeOut(1000);
                    swal({
                        icon: "warning",
                        title: "เข้าสู่ระบบไม่สำเร็จ",
                        text: "ตรวจสอบบัญชีผู้ใช้งานให้ถูกต้อง"
                    });
                }
            }
        });
    });
</script>