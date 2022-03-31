<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class OperationalTest extends TestCase
{
    public function testListMissesGoals()
    {

        $expectedResponseData = [
          "From"=> "2022-03-30",
          "To"=> "2022-03-30",
          "month"=> "string",
          "Goal"=> 0,
          "Misses"=> 0
        ];
        $mockResponseJson = json_encode($expectedResponseData, JSON_THROW_ON_ERROR);
        $mockResponse = new MockResponse($mockResponseJson, [
            'http_code' => 201,
            'response_headers' => ['Content-Type: application/json'],
        ]);
        $httpClient = new MockHttpClient($mockResponse, ClientHttp::CLINICORP_API);

        // INICIO da chamada
        $dataFrom = new \DateTime('2021-01-01');
        $dataTo = new \DateTime('2021-01-21');


        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Operational();
        $response = $object->listMissesGoals(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::OPERATIONAL_LIST_MISSES_GOALS.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListSalesGoals()
    {

        $expectedResponseData = [
            [
                "month"=> "string",
                "From"=> "string",
                "To"=> "string",
                "Goal"=> 0,
                "TotalRevenueAmount"=> 0,
                "Projection"=> 0
            ]
        ];
        $mockResponseJson = json_encode($expectedResponseData, JSON_THROW_ON_ERROR);
        $mockResponse = new MockResponse($mockResponseJson, [
            'http_code' => 201,
            'response_headers' => ['Content-Type: application/json'],
        ]);
        $httpClient = new MockHttpClient($mockResponse, ClientHttp::CLINICORP_API);

        // INICIO da chamada
        $dataFrom = new \DateTime('2021-01-01');
        $dataTo = new \DateTime('2021-01-21');


        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Operational();
        $response = $object->listSalesGoals(1, $dataFrom, $dataTo, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::OPERATIONAL_LIST_SALES_GOALS.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}