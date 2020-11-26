<?php
class open3D
{
    public function get3D(array $value): ?string
    {
        $result = apiRequest('postal_codes');
        if (!array_key_exists($value['postal_code'], $result)) {
            $randomKey = array_rand($result, 1);
            $postal = $result[$randomKey];
        } else {
            $postal = $result[$value['postal_code']];
        };

        $result = apiRequest($postal);
        if (!array_key_exists($value['street'], $result)) {
            $randomKey = array_rand($result, 1);
            $street = $result[$randomKey];
        } else {
            $street = $result[$value['street']];
        };

        $result = apiRequest($postal . "/" . $street);
        if (!array_key_exists($value['number'], $result)) {
            $randomKey = array_rand($result, 1);
            $id = $result[$randomKey];
        } else {
            $id = $result[$value['number']];
        };
        $folder = getFolder($id);

        return "test";
    }
}

function apiRequest($url)
{
    $curl = curl_init("https://static.wallonia.ml/file/wallonia-lidar/web/$url.json");
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 1,
    ]);
    $data = curl_exec($curl);
    if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
        return null;
    }
    $data = json_decode($data, true);
    return $data;
}

function getFolder($id)
{
    $url = "https://api.wallonia.ml/v1/model/$id";
    $path = __DIR__ . '/download/3dObject.zip';
    $fp = fopen($path, 'w');

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_FILE, $fp);

    $data = curl_exec($ch);

    curl_close($ch);
    fclose($fp);

    $zip = new ZipArchive;
    if ($zip->open(__DIR__ . '/download/3dObject.zip') === true) {
        $zip->extractTo(__DIR__ . '/threeJs');
        $zip->close();
    } else {
        echo 'échec';
    }
}
