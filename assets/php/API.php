<?php
class openPrediction
{

    public function getPrediction(array $value): ?string
    {
        $curl = curl_init("http://tamikara.xyz:5000/predict/" . $value['postal'] . "/" . $value['type'] . "/" . $value['room'] . "/" . $value['surface'] . "/" . $value['kitchen'] . "/" . $value['terrace'] . "/" . $value['garden'] . "/" . $value['status']);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1,
        ]);
        $data = curl_exec($curl);
        if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
            return null;
        }
        $data = json_decode($data, true);
        return $data['PREDICTION'];
    }
}
