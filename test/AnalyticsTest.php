<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class AnalyticsTest extends TestCase
{
    public function testListUsers()
    {

        $expectedResponseData = ['list' =>
            [
                "TotalRevenueAmount"=> 0,
                "EstimatesTotalAmount"=> 0,
                "EstimatesTotalQuantity"=> 0,
                "EstimatesApprovedAmount"=> 0,
                "EstimatesApprovedQuantity"=> 0,
                "EstimatesOpenAmount"=> 0,
                "EstimatesOpenQuantity"=> 0,
                "EstimatesFollowUpAmount"=> 0,
                "EstimatesFollowUpQuantity"=> 0,
                "EstimatesRejectedAmount"=> 0,
                "EstimatesRejectedQuantity"=> 0,
                "ApprovedTicketAverage"=> 0,
                "BusinessId"=> 0,
                "ConversionRate"=> 0,
                "TotalReceivedAmount"=> 0,
                "TotalExpenses"=> 0,
                "AppointmentsTotal"=> 0,
                "AppoinmentsFinished"=> 0,
                "AppointmentsMissed"=> 0,
                "AppointmentsNewPatients"=> 0,
                "AppointmentsExistingPatients"=> 0,
                "WithoutCategory"=> 0,
                "UnityName"=> "string"
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
        $object = new Analytics();
        $response = $object->listResults(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::ANALYTICS_LIST_RESULTS.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}