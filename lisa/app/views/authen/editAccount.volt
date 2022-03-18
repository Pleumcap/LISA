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
                {{ form ('lisa/authen/editAccount', 'method' : 'post' ) }}
                <?php $this->flashSession->output() ?>
                <div class="form-group">
                        {{ hidden_field('username', 'size':32, 'class':'input-group', 'required':true, 'value': viewProfile.data.username) }}
                        {{ hidden_field('email', 'size':32, 'class':'input-group', 'required':true, 'value': viewProfile.data.email) }}
                    <div class="input-group">
                        <label for="status">สถานะบัญชี :</label>
                        <select id="status" name="status">
                            <option value="on" selected>On</option>
                            <option value="off">Off</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="permission">สิทธิ์การเข้าถึง :</label>
                        <select id="permission" name="permission">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                        {{ hidden_field('password', 'size':32, 'class':'input-group', 'required':true, 'value':"" ) }}
                        {{ hidden_field('password_confirm', 'size':32, 'class':'input-group', 'required':true, 'value':"") }}
                        {{hidden_field('userId', 'class':'input-group', 'required':true, 'value': userId) }}
                    <div class="input-group">
                        {{ submit_button('ยืนยันการแก้ไข', 'class':'btn btn-warning') }}
                    </div>
                    <p><a href="main" style="color: rgb(24,167,18);">กลับสู่หน้าหลัก</a></p>
                </div>
                {{ endform() }}
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>