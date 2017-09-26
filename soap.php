<?php
$client = new SoapClient('http://footballpool.dataaccess.eu/data/info.wso?WSDL');
$data = [];
$data = $client->cities();
foreach($data as $key => $val)
{
    foreach($val as $values)
    {
        foreach($values as $item)
        {
            echo "Cities: ".$item."<br>";
        }
    }

}


?>
<form method="POST">
	<input type="text" name="date">
	<input type="submit" name="submit" value="go">

</form>
<?php
	date_default_timezone_set('Europe/Kiev');
	$date = $_POST["date"];	
	//var_dump($date);
		if(date('Y-m-d', strtotime($date)) == $date){
		$x = new SoapClient('http://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL');
		$dateArray["On_date"] = date($date);
		$result = $x->GetCursOnDateXML($dateArray);
		$arr = $result->GetCursOnDateXMLResult->any;
		echo $arr;
?>


<?php
echo "<br>";
echo "<br>";
        $soapUrl = "http://footballpool.dataaccess.eu/data/info.wso?op=Teams"; // asmx URL of WSDL
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <Teams
                    xmlns="http://footballpool.dataaccess.eu">
                </Teams>
             </soap:Body>
        </soap:Envelope>';
        $headers = array(
                        "Content-type: text/xml;charset=\"utf-8\"",
                        "Accept: text/xml",
                        "Cache-Control: no-cache",
                        "Pragma: no-cache",
                        "POST /data/info.wso HTTP/1.1",
                        "Host: footballpool.dataaccess.eu",
                        "Content-length: ".strlen($xml_post_string),
                    );
            $url = $soapUrl;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch); 
            curl_close($ch);
            $response1 = str_replace("<soap:Body>","",$response);
            $response2 = str_replace("</soap:Body>","",$response1);
			$response3 = str_replace("<m:TeamsResult>","",$response2);
			$response4 = str_replace("</m:TeamsResult>","",$response3);
			$response5 = str_replace("m:","",$response4);
			$teams = new SimpleXMLElement($response5);
			//$lex = array();
			$valex = array();

			foreach($teams->TeamsResponse[0]->tTeamInfo as $value)
			{
				 $valex[$value->sName-> __toString()] = $value->sCountryFlag-> __toString();
			}
			foreach($valex as $key => $val)
			{
				echo "Names: ".$key." "."Flags: "."$val"."<br>";	
			}
			
		



 echo "<br>";
 echo "<br>";





?>
