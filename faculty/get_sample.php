<?php

require 'src/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load('src/excel_files/sample.xlsx');

//$cell = $spreadsheet->getActiveSheet()->getCell('total')->getCalculatedValue();
$sn = $spreadsheet->getActiveSheet()
		->namedRangeToArray(
			'sn',
			NULL,
			TRUE,
			TRUE,
			TRUE
		);

$cell = $spreadsheet->getActiveSheet()
		->namedRangeToArray(
			'total',
			NULL,
			TRUE,
			TRUE,
			TRUE
		);

$cell2 = $spreadsheet->getActiveSheet()
		->namedRangeToArray(
			'total2',
			NULL,
			TRUE,
			TRUE,
			TRUE
		);

$num = 11;
$temp = [];
$total = array();
$total1 = array();
$get_sn = array();
// $all = 11;

// for ($i=0; $i < $all; $i++) { 
// 	$one = $cell[$i];
// 	for($o=0; $o < 1; $o++) {
// 		$tempp[] = $one[$o];
// 	}
// }

// echo print_r($temp);
$all = '';

// foreach ($cell2 as $key) {
// 	foreach ($key as $next=>$value) {
// 		if($value != null) {
// 			$temp[] = $value;
// 		}
// 	}
// }
// foreach ($cell as $key) {
// 	foreach ($key as $next=>$value && $key2 as $next2=>$sn) {
// 		if($value != null) {
// 			$temp['total'][$sn] = $value ;
// 		}
// 	}
// }



foreach ($sn as $key) {
	foreach ($key as $next=>$value) {
		if($value != null) {
			$get_sn[] = $value;
		}
	}
}

foreach ($cell as $key) {
	foreach ($key as $next=>$value) {
		if($value != null) {
			$total[] = $value;
		}
	}
}

foreach ($cell2 as $key) {
	foreach ($key as $next=>$value) {
		if($value != null) {
			$total1[] = $value;
		}
	}
}

for ($i=0; $i < count($get_sn); $i++) { 
	$temp['total'][$get_sn[$i]] = $total[$i];
	$temp['total1'][$get_sn[$i]] = $total1[$i];
}


echo '<pre>';
print_r($temp);
echo '</pre>';

?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<div id="ss"></div><br>
<div id="ss1"></div>
<script type="text/javascript">
	console.log(<?php echo json_encode($temp);?>);

	var total = [];
	var total1 = [];
	var data = [<?php echo json_encode($temp);?>];

	data.forEach(function(v){
		total.push(v.total);
		total1.push(v.total1);
	});

	console.log(JSON.stringify(total));

	document.getElementById('ss').innerHTML = JSON.stringify(total);
	document.getElementById('ss1').innerHTML = JSON.stringify(total1);
</script>

