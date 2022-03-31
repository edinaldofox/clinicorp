<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class EstimatesTest extends TestCase
{

    public function testGetEstimates()
    {

        $expectedResponseData = [
          "Patient_PersonId"=> 0,
          "CreateDate"=> "2022-03-30",
          "PaymentTypePlan"=> "string",
          "BusinessId"=> 0,
          "Dentist_PersonId"=> 0,
          "CurrentChargePaymentPlanId"=> 0,
          "Status"=> "string",
          "id"=> 0,
          "ProcedureList"=> [
            []
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
        $object = new Estimates();
        $response = $object->getEstimates(1, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::ESTIMATES_GET.'?subscriber_id=1&treatment_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListUsers()
    {

        $expectedResponseData = [
            [
                "PatientId"=> 0,
                "CreateDate"=> "2022-03-30",
                "SearchDate"=> "2022-03-30",
                "Date"=> "2022-03-30",
                "LastChange_Date"=> "2022-03-30",
                "BusinessId"=> 0,
                "ProfessionalId"=> 0,
                "ProfessionalName"=> "string",
                "PatientName"=> "string",
                "Amount"=> 0,
                "Status"=> "string",
                "TreatmentId"=> 0,
                "id"=> 0,
                "ProcedureList"=> [
                  []
                ]
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
        $object = new Estimates();
        $response = $object->list(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::ESTIMATES_LIST.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}