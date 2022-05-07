<?
/**
 * Created by w3cschool.cc
 * User: FK
 * Date: 12-7-18
 * Time: 上午11: 32
 * w3cschool.cc菜鸟教程实例代码
 */
//数组
$a[1]="Aa";
$a[2]="Brittany";
$a[3]="Cinderella";
$a[4]="Diana";
$a[5]="Eva";
$a[6]="Fiona";
$a[7]="Gunda";
$a[8]="Hege";
$a[9]="Inga";
$a[10]="Johanna";
$a[11]="Kitty";
$a[12]="Linda";
$a[13]="Nina";
$a[14]="Ophelia";
$a[15]="Petunia";
$a[16]="Amanda";
$a[17]="Raquel";
$a[18]="Cindy";
$a[19]="Doris";
$a[20]="Eve";
$a[21]="Evita";
$a[22]="Sunniva";
$a[23]="Tove";
$a[24]="Unni";
$a[25]="Violet";
$a[26]="Liza";
$a[27]="Elizabeth";
$a[28]="Ellen";
$a[29]="Wenche";
$a[30]="Vicky";
$a[31]="汽车";
$a[32]="汽水";
$a[33]='英雄';


$suggest = isset($_POST['tid']) ? htmlspecialchars($_POST['tid']) : '';
$suggest = strtolower($suggest);


$hint = '';
$responseTxt = '';
if(strlen($suggest) > 0) {
	$suggest = substr($suggest, 0 ,1);
	for($i=1; $i<count($a)+1; $i++) {
		$hint = substr(strtolower($a[$i]), 0, 1 );
		if($suggest == $hint) {
			$responseTxt .=  $a[$i] . ' , ';
		}
	}
	$responseTxt = substr($responseTxt, 0, -2);
	if(empty($responseTxt)) {
		echo '没有匹配项';
	} else {
		echo $responseTxt;
	}
} else {
	echo '没有匹配项';
}



