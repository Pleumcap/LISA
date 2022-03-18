<style>
    table {
    cursor: grabbing;
}
</style>
<table>
    <tr>
        <td><img src="../uploads/alarm-clock.jpg" width="100px", height="100px"></td>
        <td><input type="checkbox" checked="checked"></td>
        <td>1C</td>
    </tr>
    <tr>
        <td><img src="../uploads/download.jpg" width="100px", height="100px"></td>
        <td><input type="checkbox" checked="checked"></td>
        <td>2C</td>
    </tr>
    <tr>
        <td><img src="../uploads/tenor.png" width="100px", height="100px"></td>
        <td><input type="checkbox" checked="checked"></td>
        <td>3C</td>
    </tr>
</table>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $("table tbody").sortable({
    handle: 'img',
    cancel: ''
}).disableSelection();

</script>
<!-- <html>

<head>
    <title>test move</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/jquery-ui.structure.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.css">
    <link rel="stylesheet" href="public/css/jquery-ui.css">
    <link rel="stylesheet" href="public/css/jquery-ui.structure.css">
    <link rel="stylesheet" href="public/css/jquery-ui.theme.css">
</head>

<body>
    <h2>test move sortable</h2>
    <div id="mydivs">
        <div class="cube">
            <h3>cube1</h3>
        </div>
        <div class="cube">
            <h3>cube2</h3>
        </div>
        <div class="cube">
            <h3>cube3</h3>
        </div>
    </div>
   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/jquery.slim.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $('#mydivs').sortable({
        opacity: 0.5,
        distance: 50,
        delay: 300,
        containment:"parent",
        cursor: "grabbing",
    });
</script>

</html> -->