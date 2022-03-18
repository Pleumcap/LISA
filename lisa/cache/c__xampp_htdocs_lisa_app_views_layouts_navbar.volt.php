<style>
    .navbar {
        background-color: #FFFFFF;
    }

    .form-inline {
        display: flex 1;
        flex-flow: unset;
        align-items: center;
    }

    .dropdown-menu.show {
        display: block;
        width: 300px;
    }

    #upload_button {
        width: 250px;
        border-radius: 46px;
        font-family: RSU_BOLD;
        background-color: #000000;
        color: #FFFFFF;
        font-size: 24px;
        text-align: center;
        margin-right: 70px;
        margin-top: 10px;
    }

    #upload_button:hover {
        color: #FFFFFF !important;
    }

    #profile_dropdown {
        margin-right: 20px;
    }

    .dropdownMenu {
        text-align: center;
        font-size: 24px;
        font-family: RSU_Regular;
    }

    #editProfile_button {
        text-align: center;
        font-size: 24px;
        font-family: RSU_Regular;
    }

    #logout_button {
        text-align: center;
        font-size: 24px;
        font-family: RSU_Regular;
    }

    #profileName {
        text-align: center;
        font-size: 24px;
        font-family: RSU_Regular;
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 0px 3px 6px #00000029;">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto "></ul>
        <ul class="navbar-nav">
            <?php if (($permission == 'admin')) { ?>
            <li class="nav-item">
                <a class="nav-link" id="upload_button" href="<?= $this->url->get('lisa/upload/index') ?>"> + อัปโหลดเอกสาร</a>
            </li>
            <?php } ?>
            <li class="nav-item dropdown" id="profile_dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= $picture ?>" width="50" height="50" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <p id="profileName">ชื่อผู้ใช้งาน : <?= $username ?></p>
                    <hr>
                    <a class="dropdown-item" id="editProfile_button"
                        href="<?= $this->url->get('lisa/authen/editProfile') ?>">แก้ไขข้อมูลส่วนตัว</a>
                    <a class="dropdown-item" id="logout_button" style="cursor: pointer;">ลงชื่อออก</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    $(document).on("click", "#logout_button", function () {
        swal({
            title: 'ต้องการที่จะออกจากระบบหรือไม่',
            text: 'กด OK เพื่อออกจากระบบ',
            icon: 'warning',
            buttons: true,
            confirmButtonText: 'OK',
            dangerMode: true,
        }).then((result) => {
            if (result) {
                console.log(result);
                location.href = 'http://localhost/lisa/user/logout';
            }
        });
    });
</script>