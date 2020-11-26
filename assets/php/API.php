<?php
class openPrediction
{
    public function getPrediction(array $value): ?string
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://tamikara.xyz:5000/predict/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"type_of_property": ' . $value["type_of_property"] . ',
                                    "is_new": ' . $value["is_new"] . ',
                                    "postal_code": ' . $value["postal_code"] . ',
                                    "house_area": ' . $value["house_area"] . ',
                                    "number_of_bedroom": ' . $value["number_of_bedroom"] . ',
                                    "garden": ' . $value["garden"] . ',
                                    "terrace": ' . $value["terrace"] . '
                                }
                  ',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response['PREDICTION'];
    }
}
