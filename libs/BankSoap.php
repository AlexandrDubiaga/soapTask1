<?php
class BankSoap
{
    public function getDataBankSoap($date)
    {
        date_default_timezone_set('Europe/Kiev');
        //var_dump($date);
        if (date('Y-m-d', strtotime($date)) == $date) {
            $x = new SoapClient('http://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL');
            $dateArray["On_date"] = date($date);
            $result = $x->GetCursOnDate($dateArray)->GetCursOnDateResult->any;
            $xml = new SimpleXMLElement($result);
            $res = $xml->ValuteData->ValuteCursOnDate;
            return $res;
        }
    }
}


?>