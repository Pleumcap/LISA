<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="header">
                    <h2>LISA - ข้อมูลบัญชีผู้ใช้</h2>
                </div>
                <img src="<?= $viewProfile->data->picture ?>" width="100" height="100" class="rounded-circle"
                    style="margin: auto;">
                <div class="form-group">
                    <div class="input-group">
                        <label>หมายเลขผู้ใช้ : <?= $viewProfile->data->userId ?></label>
                    </div>
                    <div class="input-group">
                        <label>ชื่อผู้ใช้งาน : <?= $viewProfile->data->username ?></label>
                    </div>
                    <div class="input-group">
                        <label>คำนำหน้า : <?= $viewProfile->data->tname ?></label>
                    </div>
                    <div class="input-group">
                        <label>ชื่อ : <?= $viewProfile->data->fname ?></label>
                    </div>
                    <div class="input-group">
                        <label>นามสกุล : <?= $viewProfile->data->lname ?></label>
                    </div>
                    <div class="input-group">
                        <label>อีเมลล์ : <?= $viewProfile->data->email ?></label>
                    </div>
                    <div class="input-group">
                        <label>สิทธิการเข้าถึง : <?= $viewProfile->data->permiss ?></label>
                    </div>
                    <p><a href="main" style="color: rgb(24,167,18);">กลับสู่หน้าหลัก</a></p>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

</body>

</html>