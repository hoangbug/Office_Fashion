<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Doanh số bán hàng - 2021"
	},
	axisY: {
		title: "Tốc độ tăng (VND)",
		suffix: "VND"
	},
	axisX: {
		title: "Countries"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#\"VND\"",
		dataPoints: [
            <?php foreach($selectAll as $value){ ?>
			{ label: "Tháng <?=$value['month'];?>", y: <?php if($value['total_money'] > 16000000){echo "16000000";}else{echo $value['total_money'];} ?> },
            <?php } ?>
			// { label: "Tháng 2", y: 6.70 },	
			// { label: "Tháng 3", y: 5.00 },
			// { label: "Tháng 4", y: 2.50 },	
			// { label: "Tháng 5", y: 23 },
			// { label: "Tháng 6", y: 18 },
			// { label: "Tháng 7", y: 60 },
			// { label: "Tháng 8", y: 16 },
			// { label: "Tháng 9", y: 80 },
			// { label: "Tháng 10", y: 50 },
			// { label: "Tháng 11", y: 40 },
			// { label: "Tháng 12", y: 30 }
			
		]
	}]
});
chart.render();

}
</script>
<div class="container-fluid">
    <div class="row" style="display: flex; justify-content: center; align-items: center; height: 180px; background-color: rgb(1, 127, 255);">
        <div class="col-md-4" style="display: flex; justify-content: flex-end;">
            <div class="clock">
                <div class="hour">
                    <div class="hr" id="hr"></div>
                </div>
                <div class="min">
                    <div class="mn" id="mn"></div>
                </div>
                <div class="sec">
                    <div class="sc" id="sc"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4" style="display: flex; justify-content: flex-start; align-items: center;">
            <div class="dropdown-account">
                <button class="dropbtn-account"><i class="fa fa-user-o" aria-hidden="true"></i></button>
                <div class="dropaccount-content">
                    <a href="index.php?page=affiliate&method=programAffiliate">Home</a>
                    <a href="#">Thông tin tài khoản</a>
                    <a href="index.php?page=affiliate&method=programManage">Quản lý chương trình</a>
                    <a href="index.php?page=affiliate&method=turnOverAffiliate">Quản lý doanh thu</a>
                    <a href="index.php?page=affiliate&method=changeCode">Đổi mã</a>
                    <a href="index.php?page=affiliate&method=logoutAffiliate">Thoát tài khoản</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
    </div>
</div>
