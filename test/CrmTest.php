<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class CrmTest extends TestCase
{
    public function testListUsers()
    {

        $expectedResponseData = [
            "id" => 3,
            "Name" => "Ingrid Raquel Bezerra Rodrigues",
            "Email" => 'juliana23@gmail.com',
            "Phone" => '(47) 99660-7975',
            "BoardName" => 'Campanha de Abril'
        ];
        $mockResponseJson = json_encode($expectedResponseData, JSON_THROW_ON_ERROR);
        $mockResponse = new MockResponse($mockResponseJson, [
            'http_code' => 201,
            'response_headers' => ['Content-Type: application/json'],
        ]);
        $httpClient = new MockHttpClient($mockResponse, ClientHttp::CLINICORP_API);

        // INICIO da chamada
        $data = [
            "Name" => "Ingrid Raquel Bezerra Rodrigues",
            "Email" => 'juliana23@gmail.com',
            "Phone" => '(47) 99660-7975',
            "BoardName" => 'Campanha de Abril'
        ];
        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Crm();
        $response = $object->addLeads($data);
        // FIM da chamada

        self::assertSame('POST', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::CRM_ADD_LEADS, $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListActiveCampaings()
    {

        $expectedResponseData = ['list' =>
            [
                "id" => 3,
                "Name" => "Ingrid Raquel Bezerra Rodrigues",
                "Email" => 'juliana23@gmail.com',
                "Phone" => '(47) 99660-7975',
                "BoardName" => 'Campanha de Abril'
            ]
        ];
        $mockResponseJson = json_encode($expectedResponseData, JSON_THROW_ON_ERROR);
        $mockResponse = new MockResponse($mockResponseJson, [
            'http_code' => 201,
            'response_headers' => ['Content-Type: application/json'],
        ]);
        $httpClient = new MockHttpClient($mockResponse, ClientHttp::CLINICORP_API);

        // INICIO da chamada
        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Crm();
        $response = $object->listActiveCampaings(1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::CRM_LIST_ACTIVE_CAMPAIGNS.'?subscriber_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}