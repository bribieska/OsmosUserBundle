<?php
/**
 * Created by PhpStorm.
 * User: brandon
 * Date: 13/11/17
 * Time: 05:09 PM
 */

namespace OsmosUserBundle\Services;

class RequestHandler
{
    /**
     * @param string $method
     * @param string $url
     * @param array $data
     *
     * @return string
     */
    public function doRequest($method, $url, $data = null)
    {
        $c = curl_init();

        curl_setopt($c, CURLOPT_URL, $url);
        curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

        if ($method == "GET") {
            curl_setopt($c, CURLOPT_HTTPGET, true);

        } else if ($method == "POST") {
            curl_setopt($c, CURLOPT_POST, true);

        } else if ($method == "PUT") {
            curl_setopt($c, CURLOPT_PUT, true);

        } else {
            return null;

        }

        $result = curl_exec($c);

        curl_close($c);

        return json_decode($result, true);
    }

    /**
     * @param string $url
     * @param array $data
     *
     * @return string
     */
    public function parseURL($url, $data = null)
    {
        $urlParsed = "";
        if (!is_null($data)) {
            foreach ($data as $key => $value) {
                $urlParsed = str_replace("{" . $key . "}", $value, $url);
            }
        } else {
            $urlParsed = $url;
        }

        return $urlParsed;
    }
}