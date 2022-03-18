<style>
    #username {
        font-size: 24px;
        width: 600px !important;
    }

    #email {
        font-size: 24px;
        width: 600px !important;
    }

    #passwordInput {
        font-size: 24px;
        width: 600px !important;
    }

    #confirmPasswordInput {
        font-size: 24px;
        width: 600px !important;
    }

    #signup_button {
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

    #togglePassword {
        width: 30px;
        height: 30px;
        position: absolute;
        top: 285px;
        right: 20px;
    }

    #toggleConfirmPassword {
        width: 30px;
        height: 30px;
        position: absolute;
        top: 345px;
        right: 20px;
    }
</style>
<div class="row bg" style="background-image: url('https://localhost/lisa/public/img/Web 1920 – 18.png');">
    <div class="col-6 d-flex justify-content-center" style=" height: 100vh; flex-direction: row;
        align-items: center;">
        <div class="col-8" style="margin-left: 200px;">
            <div style="font-size: 60px; font-family: RSU_BOLD;">สร้างบัญชีผู้ใช้ใหม่</div>
            <div style="font-size: 36px; font-family: RSU_BOLD;">กรุณากรอกข้อมูลในการสร้างบัญชีใหม่</div>
            <input class="newFormInput" placeholder="ชื่อผู้ใช้" id="username"></input>
            <input class="newFormInput" placeholder="อีเมล" id="email"></input>
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
                <div id="signup_button">
                    สร้างบัญชี
                </div>
            </div>
            <hr style=" border: 1px solid #000000; width: 600px; margin: 30px 0px 30px 0px;">
            <div id="login_button">
                ลงชื่อเข้าใช้งาน
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
    $(document).on('click', '#login_button', function () {
        location.href = 'http://localhost/lisa/user/login';
    });

    $(document).on('click', '#signup_button', function () {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#passwordInput').val();
        var passwordConfirm = $('#confirmPasswordInput').val();
        $(".loader-container").show();
        if (username && email && password && passwordConfirm) {
            if (email) {
                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if (testEmail.test(email)) {
                    if (password != passwordConfirm) {
                        $(".loader-container").fadeOut(1000);
                        swal({
                            icon: "warning",
                            title: "สร้างบัญชีผู้ใช้ไม่สำเร็จ",
                            text: "กรุณากรอกรหัสผ่านให้ตรงกัน"
                        });
                    } else {
                        $.ajax({
                            url: 'http://localhost/lisa/user/signup',
                            data: {
                                username: username,
                                email: email,
                                password: password,
                                password_confirm: passwordConfirm
                            },
                            type: 'POST',
                            success: function (response) {
                                var result = JSON.parse(response);
                                var status = result.status
                                var message = result.message
                                console.log(message);
                                if (result.status == "success") {
                                    $(".loader-container").fadeOut(1000);
                                    swal({
                                        icon: "success",
                                        title: "สร้างบัญชีผู้ใช้สำเร็จ"
                                    });
                                    location.href = 'http://localhost/lisa/authen/main';
                                } else {
                                    $(".loader-container").fadeOut(1000);
                                    swal({
                                        icon: "warning",
                                        title: "เข้าสู่ระบบไม่สำเร็จ",
                                        text: message
                                    });
                                }
                            }
                        });
                    }
                } else {
                    $(".loader-container").fadeOut(1000);
                    swal({
                        icon: "warning",
                        title: "สร้างบัญชีผู้ใช้ไม่สำเร็จ",
                        text: "กรุณาตรวจสอบความถูกต้องของอีเมล"
                    });
                }
            }
        } else {
            $(".loader-container").fadeOut(1000);
            swal({
                icon: "warning",
                title: "สร้างบัญชีผู้ใช้ไม่สำเร็จ",
                text: "กรุณากรอกข้อมูลให้ครบทุกช่อง"
            });
        }
    });
</script>