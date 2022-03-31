<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class ProceduresTest extends TestCase
{
    public function testListEspecialties()
    {

        $expectedResponseData = [
            [
                "id"=> 0,
                "Active"=> "string",
                "Description"=> "string",
                "Language"=> "string",
                "Type"=> "string",
                "z_LastChange_Date"=> "2022-03-30",
                "z_LastChange_UserId"=> 0
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
        $object = new Procedures();
        $response = $object->listEspecialties(1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::PROCEDURES_LIST_SPECIALTIES.'?subscriber_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}