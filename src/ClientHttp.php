<?php

namespace Clinicorp;

use Clinicorp\Exception\HttpClienteCliniException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * ClientHttp responsavel por realizar as chamadas da API e inicialização da autenticação
 */
class ClientHttp
{
    const CLINICORP_API = 'https://sistema.clinicorp.com/rest/v1';

    /**
     * @var HttpClient
     */
    private static $clientHttp;

    /**
     * @var ResponseInterface
     */
    protected $response;


    /**
     * @param string $username
     * @param string $token
     * @return void
     */
    public static function init(string $username, string $token) {

        if (empty($username) || empty($token)) {
            self::$clientHttp = null;
            return;
        }

        self::$clientHttp = HttpClient::create([
            'auth_basic' => [$username, $token],
        ]);
    }

    /**
     * @return HttpClient
     */
    public static function getCredential() {
        return self::$clientHttp;
    }

    /**
     * @return HttpClient
     */
    public static function setCredential(HttpClientInterface $clientHttp) {
        self::$clientHttp = $clientHttp;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * @param string $url
     * @param array $data
     * @return ResponseInterface
     * @throws HttpClienteCliniException
     */
    protected function get(string $url, ?array $data = []) {

        if (empty(ClientHttp::getCredential())) {
            throw new HttpClienteCliniException('auth_basic não informado em HttpClientService!');
        }

        $this->response = ClientHttp::getCredential()->request('GET', self::CLINICORP_API.$url, [
            'headers' => [
                'accept' => 'application/json',
            ],
            'query' => $data,
        ]);

        return $this->response;
    }

    /**
     * @param string $url
     * @param array $data
     * @return ResponseInterface
     * @throws HttpClienteCliniException
     */
    protected function put(string $url, array $data) {

        if (empty(ClientHttp::getCredential())) {
            throw new HttpClienteCliniException('auth_basic não informado em HttpClientService!');
        }

        $this->response = ClientHttp::getCredential()->request('PUT', self::CLINICORP_API.$url, [
            'headers' => [
                'accept' => 'application/json',
            ],
            'body' => $data,
        ]);

        return $this->response;
    }

    /**
     * @param string $url
     * @param array $data
     * @return ResponseInterface
     * @throws HttpClienteCliniException
     */
    protected function post(string $url, array $data) {

        if (empty(ClientHttp::getCredential())) {
            throw new HttpClienteCliniException('auth_basic não informado em HttpClientService!');
        }

        $this->response = ClientHttp::getCredential()->request('POST', self::CLINICORP_API.$url, [
            'headers' => [
                'accept' => 'application/json',
            ],
            'body' => $data,
        ]);

        return $this->response;
    }

    /**
     * @param string $url
     * @param array $data
     * @return ResponseInterface
     * @throws HttpClienteCliniException
     */
    protected function delete(string $url, array $data) {

        if (empty(ClientHttp::getCredential())) {
            throw new HttpClienteCliniException('auth_basic não informado em HttpClientService!');
        }

        $this->response = ClientHttp::getCredential()->request('DELETE', self::CLINICORP_API.$url, [
            'headers' => [
                'accept' => 'application/json',
            ],
            'query' => $data,
        ]);

        return $this->response;
    }
}