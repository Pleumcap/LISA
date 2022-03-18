<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $this->tag->form(['lisa/user/resetPasswordProcess/', 'method' => 'post']) ?>
    <div class="input-group">
        <!-- <?= $tokenurl ?>
        <?= $this->tag->submitButton(['ยืนยันการแก้ไข', 'class' => 'btn btn-warning']) ?> -->
        <!-- <a href="<?= $this->url->get('lisa/user/resetPasswordProcess') ?>/<?= $tokenurl ?>")}" class="btn btn-success" >ยืนยันการแก้ไข</a> -->
      <!-- <a href="<?= $this->url->get('lisa/user/resetPasswordProcess') ?>/<?= $tokenurl ?>")}" class="btn btn-success">ยืนยันการแก้ไข</a> -->
      <!-- <a href="<?= $this->url->get('lisa/user/resetPasswordProcess') ?>/<?= $tokenurl ?>")}" class="btn btn-success"><?= $this->tag->submitButton(['ยืนยันการแก้ไข', 'class' => 'btn btn-warning']) ?></a> -->
    </div>
    <?= $this->tag->endform() ?>
</body>
</html>