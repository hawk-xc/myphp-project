<?php
// php data
// Random Number Generate project
function devnumber()
{
	$number1 = $_POST['number1'];
	$number2 = $_POST['number2'];
	$data = rand($number1, $number2);
	echo "selected number is $data";
	if ($data == 1)
	{
		echo '<br>"semua kenangan mu kawan, akan selalu abadi dikalbuku. sampai bertemu dialam selanjutnya dimana kita bisa menghabiskan waktu masa kecil dengan berbagai kesenangan"<br>~ dannu n';
	}
	else if ($data == 2)
	{
		echo '<br>"jika cinta menjauhkan ku dari pertemanan, maka aku berharap tidak pernah merasakan cinta"<br>~ dannu n';
	}
	else if ($data == 3)
	{
		echo '<br>"terkadang tidak terlihat adalah cara yang baik untuk berkembang, daripada terlihat namun kopong"<br>~ wahyu tc';
	}
	else if ($data == 4)
	{
		echo '<br>"juara tidak perlu menang suatu kompetisi atau yang lainnya. tapi juara adalah orang yang mau mencoba"<br>~ pak yomi';
	}
	else
	{
		echo '<br>"bisa atau tidak, kerjakan. selagi masih hidup"<br>~ dannu n';
	}
}
devnumber();