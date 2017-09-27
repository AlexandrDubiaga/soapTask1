<?php
include ('libs/FootbollSoap.php');
include ('libs/FootballCurl.php');
include ('libs/BankSoap.php');
include ('libs/BankCurl.php');
$objFirst = new FootbollSoap();
$result = $objFirst->getDataSoapFootBall();
$objSecond = new FootballCurl();
$resultCurlFootball = $objSecond->getCurlDataFootBall();
$objThird = new BankSoap();
$objFourth = new BankCurl();
if(isset($_POST["date"]))
{
    $date = $_POST["date"];
    $resBank = $objThird->getDataBankSoap($date);
}
if(isset($_POST['var']))
{
    $res = $_POST['var'];
    $resCurlBank = $objFourth->getDataBankCurl($res);
}

include('template/index.php');

?>
