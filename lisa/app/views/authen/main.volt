<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<style>
    #lisaMainBanner {
        width: 1450px;
        height: 275px;
        background: #E5EFF9 0% 0% no-repeat padding-box;
        border-radius: 40px;
        margin-left: 60px;
        padding: 50px;
        margin-top: 100px;
    }

    #triedMan{
        width: 680px; 
        height: 450px; 
        margin-top: -400px;
        margin-left: 700px;
        font-size: 30px; font-family: RSU_BOLD;
    }

    #month{
        background: #FFFFFF 0% 0% no-repeat padding-box;
        border: 1px solid #CCA500;
        border-radius: 53px;
        width: 170px;
        height: 60px;
        font-size: 24px;
        font-family: RSU_BOLD;
        /* margin-left: 20px; */
        padding-left: 15px;
        padding-right: 15px;
        margin-left: 90px;
    }

    #week_button{
        text-align: center;
        width: 150px;
        height: 40;
        font-size: 24px;
        font-family: RSU_BOLD !important;
        background: #000000;
        color: white;
        border-radius: 46px;
        cursor: pointer;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-left: 20px;
    }
</style>
<div id="lisaMainBanner">
    <div  style="font-size: 60px; font-family: RSU_BOLD; ">สวัสดี ฉัน, LISA</div>
    <div  style="font-size: 30px; font-family: RSU_BOLD; ">ให้เราช่วยจัดการเอกสารของคุณ <br>
         ด้วยระบบที่รวดเร็ว ใช้งานง่าย และถูกต้องแม่นยำ</div>
    <img id="triedMan" src="../public/img/tired-man-edit.png" alt="tired-man">
</div>
<div style="padding: 50px;">
</div>

<div class="row">
    <div class="col-6">
        <div>
            <div style="display: flex;">
                {% if (monthChar == 'w')%}
                    <div style="font-size: 30px; font-family: RSU_BOLD;"  id="dateTitle">การอัปโหลดเอกสารในสัปดาห์นี้</div>
                {% endif %}
                {% if (monthChar =='m')%} 
                    <div style="font-size: 30px; font-family: RSU_BOLD;"  id="dateTitle">การอัปโหลดเอกสารในเดือน</div> 
                {% endif %}
                    <!-- <label for="month">เดือน :</label> -->
                    <select id="month" name="month" >
                        <option value="01">มกราคม</option>
                        <option value="02">กุมภาพันธ์</option>
                        <option value="03">มีนาคม</option>
                        <option value="04">เมษายน</option>
                        <option value="05">พฤษภาคม</option>
                        <option value="06">มิถุนายน</option>
                        <option value="07">กรกฎาคม</option>
                        <option value="08">สิงหาคม</option>
                        <option value="09">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                    </select>
                    <div id="week_button">ดูสัปดาห์นี้</div>
            </div>
            <canvas id="chartInsert" width="100%" height="100%"></canvas>
        </div>
    </div>
    <div class="col-6">
        <div style="font-size: 30px; font-family: RSU_BOLD;" >เอกสารที่มีจำนวนการเข้าดูสูงสุด</div>
        <canvas id="chartView" width="100%" height="100%"></canvas>
    </div>
</div>

<script>
    const insertDiv = document.getElementById('chartInsert').getContext('2d');
    var date = {{date}};
    var value = {{value}};
    var month = {{month}};
    $("#month").val(month).trigger("change");
    const chartInsert = new Chart(insertDiv, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: 'จำนวนการเพิ่มของเอกสาร',
                data: value,
                fill: false,
                tension: 0.1,
                backgroundColor: [ 
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: true
            },
            title: {
                display: false,
                text: 'Chart.js bar Chart'
            },
            animation: {
                animateScale: true
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) { if (Number.isInteger(value)) { return value; } },
                        stepSize: 1
                    }
                }]
            }
        }
    });
</script>

<script>
    const viewDiv = document.getElementById('chartView').getContext('2d');
    var docId = {{docId}};
    var count = {{count}};
    const chartView = new Chart(viewDiv, {
        type: 'bar',
        data: {
            labels: docId,
            datasets: [{
                label: 'จำนวนการเข้าดูเอกสาร',
                data: count,
                backgroundColor: [
                    '#FFDD53',
                    '#FFDD53',
                    '#FFDD53',
                    '#FFDD53',
                    '#FFDD53',
                ],
                borderColor: [
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#month').on('change', function () {
            var month = $('#month').val();
            location.href = `http://localhost/lisa/authen/main?type=0&month=${month}&opt=m`;
        });

        $('#week_button').on('click', function () {
            var month = $('#month').val();
            location.href = `http://localhost/lisa/authen/main`;
        });
    });
</script>
<script>
    var lineChartData = { labels: [], datasets: [] };
lineChartData.datasets.push({
label: 'test',
fill: false,
data: [1,2,3,4,5,6],
backgroundColor: 'red',
borderColor: 'red',
borderWidth: 1
});

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
type: 'line',
data: {
labels: ['jan','feb','mar','apr'],
datasets: lineChartData.datasets
},
options: {
title: {
display: true,
text: 'กราฟแสดงผลตอบแทนของแต่ละ บลจ.'
},
legend: {
display: true,
position: 'top',
},
tooltips: {
callbacks: {
label: function(item, data) {
var datasetLabel = data.datasets[item.datasetIndex].label || "";
var dataPoint = item.yLabel;
return datasetLabel + " : " + addCommas(dataPoint) + " บาท";
}
}
},
scales: {
xAxes: [{
barPercentage: 0.8,
scaleLabel: {
display: true,
labelString: 'เดือน'
}
}],
yAxes: [{
ticks: {
beginAtZero: true,
callback: function(label, index, labels) {
if (label < 1 && label >= 0) {
return Number(addCommas(label).replace(/[^0-9.-]+/g,"")).toFixed(1)+' บาท';
}else {
return addCommas(label)+' บาท';
}
}
},
scaleLabel: {
display: true,
labelString: 'จำนวนเงิน'
}
}]
}
}
});

function addCommas(nStr) {
nStr += '';
x = nStr.split('.');
x1 = x[0];
x2 = x.length > 1 ? '.' + x[1] : '';
var rgx = /(\d+)(\d{3})/;
while (rgx.test(x1)) {
x1 = x1.replace(rgx, '$1' + ',' + '$2');
}
return x1 + x2;
}
    </script>