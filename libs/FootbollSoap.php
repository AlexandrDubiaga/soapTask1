<?php
class FootbollSoap
{
    protected $client;
    public function getDataSoapFootBall()
    {
        $this->client = new SoapClient('http://footballpool.dataaccess.eu/data/info.wso?WSDL');
        $data = [];
        $data = $this->client->cities();
        return $data;
    }
}

?>



