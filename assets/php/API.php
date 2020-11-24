<?php
class openPrediction
{
    /* private $apiKey;

    public function _construct(string $apiKey)
    {
    $this->apiKey = $apiKey;
    } */

    public function getPrediction(array $value): ?string
    {
        $curl = curl_init("http://tamikara.xyz:5000/predict/" . $value['bedroom'] . "/" . $value['surface']);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            /* CURL_CAINFO => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'certif.cer', */
            CURLOPT_TIMEOUT => 1,
        ]);
        $data = curl_exec($curl);
        if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            return null;
        }
        //$result = [];
        //$data = json_decode($data, true);
        $data = explode(" = ", $data);
        return $data[1];

    }
}
