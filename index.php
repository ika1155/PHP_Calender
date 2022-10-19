<?php
$month = 0;

if (isset($_GET['month']) && is_numeric($_GET['month']))
{
	$month = (int)$_GET['month'];
}

$date = new DateTime('first day of this month');
$date->setTimezone(new DateTimeZone('Asia/Tokyo'));

if ($month < 0)
{
	$date->sub(new DateInterval("P" . (0 - $month) . "M"));
}
else if (0 < $month )
{
	$date->add(new DateInterval('P'.$month."M"));
}

//週初めが何曜日か数字で表示
$firstDayOfWeek = $date->format('w'); 
//月末が何日か（ひと月に何日あるか）
$endOfTheMonth = $date->format('t');

$weeks = ceil(($firstDayOfWeek + $endOfTheMonth) / 7);
$day = 1;

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
	<style>
        th {
            text-align: center;
        }
        td {
            text-align: right;
        }
    </style>
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

						<?php for ($i = 0; $i < $weeks; $i++): //週　?>
							<tr>
							<?php for ($j = 0; $j < 7; $j++): //日　?>								
								<?php 
								//1週目かつ曜日が一日と同じとき
								if($i == 0 && $firstDayOfWeek == $j){
									echo '<td>'.$day.'</td>';
									$day++;
								}
								//2日目以降かつ月末未満の時
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
					<a href="./?month= <?= $month - 1 ?>" class="btn btn-outline-primary">&lt;&lt;前の月</a>
					<a href="./" class="btn btn-primary">今月</a>
					<a href="./?month= <?= $month + 1 ?>" class="btn btn-outline-primary">次の月&gt;&gt;</a>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
	</div>
</body>
</html>