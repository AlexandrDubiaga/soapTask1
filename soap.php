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
$params = array('bSelected'=>'');
$result = $client->AllPlayerNames($params);
/*
foreach($result as $key => $val)
{
    foreach($val as $values)
    {
        foreach($values as $item)
        {
            foreach($item as $i)
            {
               echo $i."<br>";
            }

        }
    }
}
*/
?>
<form>
    <input type="text" name="fieldName">
    <input type="submit" name="go" value="go">

</form>

<?php
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

            // convertingc to XML
            $parser = simplexml_load_string($response2);
            // user $parser to get your data out of XML response and to display it.
    

?>