<?php

namespace Clinicorp;

use \PHPUnit\Framework\TestCase;
use Clinicorp\Enum\ClinicorpUrlEnum;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class BusinessTest extends TestCase
{
    public function testList()
    {

        $expectedResponseData = [
            [
                "id"=> 0,
                "CompanyId"=> 0,
                "BusinessName"=> "string",
                "Name"=> "string",
                "Address"=> "string",
                "Email"=> "string"
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
        $object = new Business();
        $response = $object->list(1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::BUSINESS_LIST.'?subscriber_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}