<?php
class BankCurl
{
    protected $arr;
    public function getDataBankCurl($variable)
    {
        $soapUrl = "http://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?op=GetCursOnDate";
        $xmlPostString = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
        <soap:Body>
        <GetCursOnDate xmlns="http://web.cbr.ru/">
            <On_date>'.$variable.'</On_date>
        </GetCursOnDate>
        </soap:Body>
        </soap:Envelope>';
        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: http://web.cbr.ru/GetCursOnDate",
            "Content-length: ".strlen($xmlPostString),
        );
        $url = $soapUrl;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlPostString); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $res = curl_exec($ch);
        curl_close($ch);
        $response1 = str_replace("<soap:Body>","",$res);
        $response2 = str_replace("</soap:Body>","",$response1);
        $response3 = str_replace("xs:","",$response2);
        $response4 = str_replace("diffgr:","",$response3);
        $parse = new SimpleXMLElement($response4);
        $curs = $parse->GetCursOnDateResponse->GetCursOnDateResult->diffgram->ValuteData->ValuteCursOnDate;
        return $curs;

    }
}

?>