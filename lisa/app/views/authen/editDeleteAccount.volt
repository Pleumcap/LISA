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
                {{ form ('lisa/authen/editDeleteAccount', 'method' : 'post' ) }}
                <div class="form-group">
                    <div class="input-group">
                        <label>ยืนยันรหัสผ่านเพื่อระงับการใช้งานบัญชี : {{ viewPersonProfile.data.username }}</label>
                        <br>
                        <label for="password">รหัสผ่าน :</label>
                        {{ text_field('password', 'class':'input-group', 'required':true ) }}
                        <label for="password_confirm">ยืนยันรหัสผ่าน :</label>
                        {{ text_field('password_confirm', 'class':'input-group', 'required':true) }}
                        {{ hidden_field('email', 'class':'input-group', 'value': viewPersonProfile.data.email ) }}
                        {{ hidden_field('permiss', 'class':'input-group', 'value': viewPersonProfile.data.permiss ) }}
                        {{ hidden_field('status', 'class':'input-group', 'value': "not used" ) }}
                        {{ hidden_field('userId', 'class':'input-group', 'value': viewPersonProfile.data.userId ) }}
                        {{ hidden_field('username', 'class':'input-group', 'value': viewPersonProfile.data.username ) }}
                    </div>
                    <div class="text-center" style="float: right; margin: 30px auto;">
                        {{ submit_button('ยืนยันการแก้ไข', 'class':'btn btn-success')}}
                    </div>
                </div>
                {{ endform() }}
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>