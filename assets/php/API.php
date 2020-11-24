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
        /* /predict/<int:postal_code>/<int:type_of_property>/<int:number_of_room>/<int:house_area>/<int:fully_equipped_kitchen>/<int:terrace>/<int:garden>/<int:state_of_the_building> */
        $curl = curl_init("http://tamikara.xyz:5000/predict/" . $value['postal'] . "/" . $value['type'] . "/" . $value['room'] . "/" . $value['surface'] . "/" . $value['kitchen'] . "/" . $value['terrace'] . "/" . $value['garden'] . "/" . $value['status']);
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
        $data = json_decode($data, true);
        /* $data = explode(" = ", $data); */
        return $data['PREDICTION'];
    }
}
