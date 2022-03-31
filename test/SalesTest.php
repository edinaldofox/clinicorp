<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class SalesTest extends TestCase
{
    public function testEstimatesAndConversion()
    {

        $expectedResponseData = [
            [
                "month"=> "string",
                "Status"=> [
                    "TotalEstimates"=> 0,
                  "TotalEstimatesAmount"=> 0,
                  "AverageTicket"=> 0
                ],
                "Conversion"=> "string"
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
        $object = new Sales();
        $response = $object->estimatesAndConversion(1, $dataFrom, $dataTo, 1, 'month');
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::SALES_ESTIMATES_AND_CONVERSION.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1&group_by=month', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testExpertiseRevenue()
    {

        $expectedResponseData = [
            [
                "month"=> "string",
                "Expertise"=> "string"
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
        $object = new Sales();
        $response = $object->expertiseRevenue(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::SALES_EXPERTISE_REVENUE.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}