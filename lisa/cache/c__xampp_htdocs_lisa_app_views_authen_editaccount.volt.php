<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="header">
                    <h2>LISA - แก้ไขบัญชี</h2>
                </div>

                <?= $this->tag->form(['lisa/authen/editAccount', 'method' => 'post']) ?>

                <?php $this->flashSession->output() ?>
                
                <div class="form-group">

                    <!-- <div class="input-group">
                        <label for="username">ชื่อผู้ใช้ :</label> -->
                        <?= $this->tag->hiddenField(['username', 'size' => 32, 'class' => 'input-group', 'required' => true, 'value' => $viewProfile->data->username]) ?>
                        <!-- , 'value': viewPersonProfile.data.username -->
                    <!-- </div> -->
                    <!-- <div class="input-group">
                        <label for="email">อีเมลล์ :</label> -->
                        <?= $this->tag->hiddenField(['email', 'size' => 32, 'class' => 'input-group', 'required' => true, 'value' => $viewProfile->data->email]) ?>
                        <!-- , 'value': viewPersonProfile.data.email -->
                    <!-- </div> -->
                    <div class="input-group">
                        <label for="status">สถานะบัญชี :</label>
                        <!-- <?= $this->tag->textField(['status', 'size' => 32, 'class' => 'input-group', 'required' => true]) ?> -->
                        <select id="status" name="status">
                            <option value="on" selected>On</option>
                            <option value="off">Off</option>
                            <!-- <option value="not used">Not used</option> -->
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="permission">สิทธิ์การเข้าถึง :</label>
                        <!-- <?= $this->tag->textField(['permission', 'size' => 32, 'class' => 'input-group', 'required' => true]) ?> -->
                        <select id="permission" name="permission">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <!-- <div class="input-group">
                        <label for="password">รหัสผ่าน :</label> -->
                        <?= $this->tag->hiddenField(['password', 'size' => 32, 'class' => 'input-group', 'required' => true, 'value' => '']) ?>
                    <!-- </div> -->
                    <!-- <div class="input-group">
                        <label for="cornfirm_password">ยืนยันรหัสผ่าน :</label> -->
                        <?= $this->tag->hiddenField(['password_confirm', 'size' => 32, 'class' => 'input-group', 'required' => true, 'value' => '']) ?>
                    <!-- </div> -->
                    <!-- <div class="input-group"> -->
                        <!-- <label for="tokenurl">hidden field* :</label> -->
                        <?= $this->tag->hiddenField(['userId', 'class' => 'input-group', 'required' => true, 'value' => $userId]) ?>
                    <!-- </div> -->
                    <div class="input-group">
                        <?= $this->tag->submitButton(['ยืนยันการแก้ไข', 'class' => 'btn btn-warning']) ?>
                    </div>
                    <p><a href="main" style="color: rgb(24,167,18);">กลับสู่หน้าหลัก</a></p>
                </div>
                <?= $this->tag->endform() ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</body>

</html>