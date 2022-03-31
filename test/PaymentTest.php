<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class PaymentTest extends TestCase
{
    public function testList()
    {

        $expectedResponseData = ['list' =>
            [
                "id"=> 0,
                "PaymentReceived"=> "string",
                "DueDateAtomic"=> 0,
                "CheckOutDate"=> "2022-03-30",
                "Amount"=> 0,
                "DueDate"=> "2022-03-30",
                "ReceiverBusinessId"=> 0,
                "CheckOutAtomicTime"=> 0,
                "PaymentDate"=> "2022-03-30",
                "PaymentConfirmed"=> "string",
                "ConfirmedDate"=> "2022-03-30",
                "ConfirmedDateAtomic"=> 0,
                "InstallmentsCount"=> "2022-03-30",
                "z_LastChange_UserId"=> 0,
                "CheckOutUserId"=> 0,
                "InstallmentNumber"=> "string",
                "PostDate"=> "2022-03-30",
                "CheckOutDateAtomic"=> "string",
                "PatientId"=> 0,
                "PaymentHeaderId"=> 0,
                "ReceivedDateAtomic"=> 0,
                "ReceivedDate"=> "2022-03-30",
                "PostDateAtomic"=> "string",
                "z_LastChange_Date"=> "2022-03-30",
                "PaymentForm"=> "string",
                "PatientName"=> "string",
                "TreatmentId"=> 0,
                "TotalPostAmount"=> 0,
                "AmountWithDiscounts"=> 0
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
        $object = new Payment();
        $response = $object->list(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::PAYMENT_LIST.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}