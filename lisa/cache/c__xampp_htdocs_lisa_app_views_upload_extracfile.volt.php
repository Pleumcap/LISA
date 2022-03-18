<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Detail Document</title>

    <!-- bootstrap datepicker -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <style>
        .pageSelect {
            display: inline;
            margin: 1rem 3rem;
            border: 1px solid green;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <?= $this->tag->form(['lisa/upload/save', 'method' => 'post']) ?>
            <table class="table table-striped">
                <tr>
                    <th>รายละเอียดคำสำคัญ : </th>
                    <th colspan="4"></th>
                </tr>
                <tr>
                    <th for="dateWrite">วันที่เขียน :</th>
                    <!-- <label for="username">ชื่อผู้ใช้ :</label>
                        <label for="dateWrite"></label> -->
                    <!-- <td colspan="4"><?= $this->tag->textField(['dateWrite', 'class' => 'input-group', 'value' => $editDetail->data->dateWrite]) ?></td> -->
                    <td colspan="4">
                        <label>
                            <input id="dateWrite" name='dateWrite' width="276" value='<?= $date ?>' />
                        </label>
                        <script>
                            var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                            $('#dateWrite').datepicker({
                                uiLibrary: 'bootstrap4',
                                iconsLibrary: 'fontawesome',
                                maxDate: function () {
                                    return $('#endDate').val();
                                },
                                format: 'ddd, dd mmm yyyy,'
                            });
                        </script>
                    </td>
                </tr>
                <!-- <tr> -->
                <!-- <th for="documentId">หมายเลขเอกสาร :</th>
                    <td colspan="4"> -->

                <!-- <?php foreach ($pageSequence as $i) { ?>
                    <?= $this->tag->hiddenField(['pageSequence[]', 'class' => 'input-group', 'value' => $i]) ?>
                    <?php } ?> -->
                <?= $this->tag->hiddenField(['documentId', 'class' => 'input-group', 'value' => $editDetail->data->documentId]) ?></td>

                <!-- <td colspan="4"> <?= $editDetail->data->documentId ?></td> -->
                <!-- </tr> -->

                <tr>
                    <th for="title">เอกสาร : </th>
                    <td colspan="4"><?= $this->tag->textField(['title', 'class' => 'input-group', 'value' => $editDetail->data->title]) ?>
                    </td>
                </tr>
                <tr>
                    <th for="receiver">ผู้รับ :</th>
                    <td colspan="4">
                        <?= $this->tag->textField(['receiver', 'class' => 'input-group', 'value' => $editDetail->data->receiver]) ?></td>
                </tr>
                <tr>
                    <th for="sendAddress">ส่งจาก :</th>
                    <td colspan="4">
                        <?= $this->tag->textField(['sendAddress', 'class' => 'input-group', 'value' => $editDetail->data->sendAddress]) ?>
                    </td>
                </tr>

            </table>

            <?php if (($signature)) { ?>
            <h1>ชื่อผู้ลงนาม :</h1>
            <table>

                <?php foreach ($signature as $i) { ?>
                <tr>

                    <td><img src="<?= $i->data->signatureImg ?>" width="100" height="100"></td><br>
                    <?= $this->tag->hiddenField(['personId[]', 'class' => 'input-group', 'value' => $i->personId]) ?>
                    <?= $this->tag->hiddenField(['signatureImg[]', 'class' => 'input-group', 'value' => $i->data->signatureImg]) ?>
                    <td><?= $this->tag->textField(['personName[]', 'class' => 'input-group', 'value' => $i->data->personName]) ?></td>
                    <td><?= $this->tag->textField(['personRole[]', 'class' => 'input-group', 'value' => $i->data->personRole]) ?></td>
                </tr>
                <?php } ?>
                <?php } else { ?>

                <!-- <tr>
                    <td colspan="3">เอกสารนี้ไม่มีลายเซ็นต์ลงนาม</td>
                </tr> -->

            </table>
            <?php } ?>

            <!-- <table class="table table-striped" style="margin-left: auto; margin-right: auto;">
                <tr>
                    <th>ชื่อและลายเซ็นต์ผู้ลงนาม : </th>
                    <th colspan="4"></th>

                </tr>

                <?php foreach ($signature as $i) { ?>
                <tr>
                    <td><img src="<?= $i->signatureImg ?>" width="100" height="100"></td><br>
                    <td><?= $this->tag->hiddenField(['personId[]', 'class' => 'input-group', 'value' => $i->personId]) ?></td><br>
                    <td><?= $this->tag->textField(['personName[]', 'class' => 'input-group', 'value' => $i->personName]) ?></td><br>
                    <td><?= $this->tag->textField(['personRole[]', 'class' => 'input-group', 'value' => $i->personRole]) ?></td><br>
                    <td><?= $this->tag->hiddenField(['signatureImg[]', 'class' => 'input-group', 'value' => $i->signatureImg]) ?></td><br>
                </tr>
                <?php } ?>
            </table> -->
            
        </div>
        <!-- row -->
        <div class="text-center" style="margin: 30px auto;">
            <?= $this->tag->submitButton(['บันทึก', 'class' => 'btn btn-success', 'style' => 'float: right']) ?>
        </div>


        <?= $this->tag->endform() ?>


    </div>

    <?= $this->tag->form(['lisa/upload/extractSignature', 'method' => 'post']) ?>
    <!-- <a style="float: right; margin: 10px;"
            href="<?= $this->url->get('lisa/upload/extract') ?>?documentId=<?= $document ?>&type=1" class="btn btn-success"
            name="viewDetail">สกัดลายเซ็นต์</a> -->
    <!-- upload/extract?documentId=5&type=1 -->
    <?= $this->tag->hiddenField(['documentId', 'class' => 'input-group', 'value' => $editDetail->data->documentId]) ?>
    <?php foreach ($viewPage as $key => $i) { ?>
    <label><img src="<?= $i ?>" width="100" height="140">
        <div style="text-align: center;"><input type="checkbox" name="selectPage[]" value="<?= $viewNumber[$key] ?>,<?= $i ?>">
            <p><?= $viewNumber[$key] ?></p>
        </div>
    </label>
    <?php } ?>
    <div class="text-center" style="float: right; margin: 30px auto;">
        <?= $this->tag->submitButton(['สกัดลายเซ็นต์', 'class' => 'btn btn-success']) ?>
    </div>
    <?= $this->tag->endform() ?>

    <!-- `<label class="pageSelect"><img class="pageForSort" src=${value[index]} width="100" height="145">
                            <div style="text-align: center;"><input type="checkbox" checked="checked" name="selectPage[]" value=${index},${value[index]}><p>${index}</p></div><label>` -->

    <!-- <script>
         $.each(result.data.pages, function (index, value) {
                        $('.page').append(
                            `<label class="pageSelect"><img src=${value[index]} width="100" height="145"><input type="checkbox" checked="checked" name="selectPage[]" value=${index},${value[index]}><p>${index}</p><label>`
                            );
                        // $("<input>", {
                        //     type: "checkbox",
                        //     "checked": "checked",
                        //     name: "selectPage[]",   
                        // }).val(`${index},${value[index]}`).appendTo('.page');

                        // $("<button>", {
                        //     text:"ย้าย",
                        // }).appendTo('.page');

                        // $('.page').append(
                        //     `<td><input type="checkbox" checked="checked" value=${index},${value[index]}></td>`
                        // );
                        // $('.page').append(
                        //     `<td><button>ย้าย</button></td>`
                        // );
                    });
    </script> -->
</body>

</html>