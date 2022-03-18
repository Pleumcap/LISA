<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="header">
                    <h2>LISA - ระงับบัญชีผู้ใช้</h2>
                </div>
                <?php $this->flashSession->output() ?>
                <?= $this->tag->form(['lisa/authen/editDeleteAccount', 'method' => 'post']) ?>
                <div class="form-group">
                    <div class="input-group">
                        <label>ยืนยันรหัสผ่านเพื่อระงับการใช้งานบัญชี : <?= $viewPersonProfile->data->username ?></label>
                        <br>
                        <label for="password">รหัสผ่าน :</label>
                        <?= $this->tag->textField(['password', 'class' => 'input-group', 'required' => true]) ?>
                        <label for="password_confirm">ยืนยันรหัสผ่าน :</label>
                        <?= $this->tag->textField(['password_confirm', 'class' => 'input-group', 'required' => true]) ?>

                        <?= $this->tag->hiddenField(['email', 'class' => 'input-group', 'value' => $viewPersonProfile->data->email]) ?>
                        <?= $this->tag->hiddenField(['permiss', 'class' => 'input-group', 'value' => $viewPersonProfile->data->permiss]) ?>
                        <?= $this->tag->hiddenField(['status', 'class' => 'input-group', 'value' => 'not used']) ?>
                        <?= $this->tag->hiddenField(['userId', 'class' => 'input-group', 'value' => $viewPersonProfile->data->userId]) ?>
                        <?= $this->tag->hiddenField(['username', 'class' => 'input-group', 'value' => $viewPersonProfile->data->username]) ?>
                    </div>
                    <div class="text-center" style="float: right; margin: 30px auto;">
                        <!-- <a href="#" class="btn btn-info">ดูต้นฉบับ</a>
            <a href="#" class="btn btn-warning">แก้ไข</a>
            <a href="#" class="btn btn-danger">ลบ</a> -->
                        <?= $this->tag->submitButton(['ยืนยันการแก้ไข', 'class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?= $this->tag->endform() ?>


            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>