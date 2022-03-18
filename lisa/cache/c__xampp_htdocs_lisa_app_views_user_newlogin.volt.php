<style>
    input,
    input::-webkit-input-placeholder {
        font-size: 20px;
        line-height: 3;
    }

    /* .fa-eye:before {
        position: absolute;
        content: "\f06e";
        bottom: 95px;
        left: 340px;
    }

    .fa-eye-slash:before {
        position: absolute;
        content: "\f06e";
        bottom: 95px;
        left: 340px;
    } */
</style>


<div class="row" style="width: 100%; height: 100%; margin: 0px;">

    <div class="col-6 d-flex justify-content-center" style="background-color: #FFDD53; height: 100vh; flex-direction: row;
    align-items: center;">
        <div class="col-8">
            <div style="font-size: 48px;">ยินดีต้อนรับ!</div>
            <div style="font-size: 24px;">กรุณาลงชื่อเข้าใช้งาน</div>
            <!-- style="background: #FFFFFF; border-radius: 46px; width: 360px; height: 36px; padding: 20px; margin: 20px 0px 20px 0px;" -->
            <input class="newFormInput" placeholder="ชื่อผู้ใช้ / อีเมล" id="username"></input>
            <div >
                <!-- style="background: #FFFFFF; border-radius: 46px; width: 360px; height: 36px; padding: 20px; margin: 20px 0px 20px 0px;" -->
                <input  class="newFormInput" placeholder="รหัสผ่าน" id="passwordInput" type="password"></input>
                <i class="fas fa-eye-slash" id="togglePassword" onclick="myFunction()"></i>
            </div>

            <div style="display: flex; width: 350px; justify-content: space-between; margin-top: 20px;">
                <div id="login_button"
                    style="text-align: center; width: 180px; height: 36px; background: #000000; color: white; border-radius: 46px; padding-top: 5px; cursor: pointer;">
                    ลงชื่อเข้าใช้
                </div>
                <div style="color: #000000; cursor: pointer;" id="forgetPassword" >ลืมรหัสผ่าน ?</div>
            </div>
            <hr style=" border: 1px solid #000000; width: 355px;">
            <div
            style="text-align: center; width: 240px; height: 36px; background: #00000033; color: #000000; border-radius: 46px; padding-top: 5px; border: 1px solid;">
            ลงชื่อเข้าใช้
        </div>
        </div>
    </div>


    <div class="col-6 d-flex justify-content-center" style="background-color: #FFFFFF; flex-direction: row;
    align-items: center;">
        <div>
            <img src="../public/img/Lisa-full.png" style="width: 500px; height: 500px;">
        </div>
    </div>

</div>
</div>

<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>
    function myFunction() {
        var x = document.getElementById("passwordInput");
        var y = document.getElementById("togglePassword");
        // var x = $('#passwordInput').val();
        if (x.type === "password") {
            x.type = "text";
            y.classList.remove('fa-eye-slash');
            y.classList.add('fa-eye');
        } else {
            x.type = "password";
            y.classList.remove('fa-eye');
            y.classList.add('fa-eye-slash');
        }
    }

    $(document).on('click', '#forgetPassword', function(){
        location.href='http://localhost/lisa/user/signup';
    });

    $(document).on('click', '#login_button', function () {
        var username = $('#username').val();
        var password = $('#passwordInput').val();
        console.log(username);
        console.log(password);
        $.ajax({
            url: 'http://localhost/lisa/user/login',
            data: {
                username: username,
                password: password
            },
            type: 'POST',
            success: function (response) {
                // console.log(response);
                var result = JSON.parse(response);
                console.log(result.status);
                if (result.status == "success") {
                    swal({
                        icon: "success",
                        title: "เข้าสู่ระบบสำเร็จ"
                    });
                    location.href = 'http://localhost/lisa/authen/main';
                } else {
                    swal({
                        icon: "warning",
                        title: "เข้าสู่ระบบไม่สำเร็จ",
                        text: "ตรวจสอบบัญชีผู้ใช้งานให้ถูกต้อง"
                    });
                    // location.reload();
                }

            }
        });
    });
</script>