<?php

namespace ErpNet;

/**
 * Client
 *
 * @author Lucas A. de Araújo <lucas.araujo@bevicred.com.br>
 * @package ErpNet
 */
class Client
{
    /**
     * @var string Local do arquivo que armazenará os cookies
     */
    protected $cookieFile;

    /**
     * @param string $cookieFile Local do arquivo que armazenará os cookies
     */
    public function setCookieFile($cookieFile)
    {
        $this->cookieFile = $cookieFile;
    }

    /**
     * @param string $url URL a ser chamada
     * @param array $payload Corpo a ser requisitado
     * @return array
     */
    public function post($url, $payload)
    {
        $ch = curl_init("https://erpnet.online$url");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookieFile);
        $response = curl_exec($ch);

        return json_decode($response, true);

    }

    /**
     * @param $url
     * @return array
     */
    public function get($url)
    {
        $ch = curl_init("https://erpnet.online$url");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookieFile);
        $response = curl_exec($ch);

        return json_decode($response, true);
    }

    /**
     * @param $url
     * @return array
     */
    public function put($url, $payload)
    {
        $ch = curl_init("https://erpnet.online$url");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookieFile);
        $response = curl_exec($ch);

        return json_decode($response, true);
    }

    /**
     * @param $url
     * @return array
     */
    public function delete($url, $payload)
    {
        $ch = curl_init("https://erpnet.online$url");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookieFile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookieFile);
        $response = curl_exec($ch);

        return json_decode($response, true);
    }
}