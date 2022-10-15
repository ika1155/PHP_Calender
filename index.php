<?php
$month = 0;

$date = new DateTime('first day of this month');
$date->setTimezone(new DateTimeZone('Asia/Tokyo'));

$firstDay = $date->format('w');
$endOfTheMonth = $date->format('t');
//https://wepicks.net/phpsample-date-format/#page-003
//https://dobon.net/vb/dotnet/system/newdatetime.html 指定した日付のDatetime
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>07-5 Calender</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<div class="row my-3">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<?= $date->format('Y月m日') ?>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<tr>
							<th>日</th>
							<th>月</th>
							<th>火</th>
							<th>水</th>
							<th>木</th>
							<th>金</th>
							<th>土</th>	
						</tr>
						
						<?php $day = 1;
						?>
						
						<?php for ($i=0; $i<6; $i++): ?>
							<tr>
							<?php for ($j=0; $j<7; $j++): ?>
								
								<?php 
								if($i == 0 && $firstDay == $j){
									echo '<td>'.$day.'</td>';
									$day++;
								}
								else if(1 < $day && $day <= $endOfTheMonth){
									echo '<td>'.$day.'</td>';
									$day++;
								}
								else
								{
									echo '<td></td>';
								}
								?>
								
							<?php endfor ?>
							</tr>
						<?php endfor ?>
						
					</table>
				</div>
				<div class="card-footer">
					<a href="./" class="btn btn-outline-primary">&lt;&lt;前の月</a>
					<a href="./" class="btn btn-primary">今月</a>
					<a href="./" class="btn btn-outline-primary">次の月&gt;&gt;</a>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
	</div>
</body>
</html>