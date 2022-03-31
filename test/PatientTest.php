<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class PatientTest extends TestCase
{
    public function testCreate()
    {

        $expectedResponseData = [
          "id" => 3,
          "subscriber_id"=> "string",
          "Name"=> "Nome do paciente",
          "BirthDate"=> "YYYY-MM-DD",
          "Sex"=> "M",
          "Email"=> "paciente@email.com",
          "MobilePhone"=> 999999999,
          "DocumentId"=> 0,
          "OtherDocumentId"=> 0,
          "Notes"=> "string",
          "IgnoreSameName"=> "Se enviar como 'X' vai criar o paciente mesmo que encontre um paciente com o mesmo nome.",
          "IgnoreSameDoc"=> "Se enviar como 'X' vai criar o paciente mesmo que encontre um paciente com o mesmo CPF."
        ];
        $mockResponseJson = json_encode($expectedResponseData, JSON_THROW_ON_ERROR);
        $mockResponse = new MockResponse($mockResponseJson, [
            'http_code' => 201,
            'response_headers' => ['Content-Type: application/json'],
        ]);
        $httpClient = new MockHttpClient($mockResponse, ClientHttp::CLINICORP_API);

        // INICIO da chamada
        $data = [
            "subscriber_id"=> "string",
            "Name"=> "Nome do paciente",
            "BirthDate"=> "YYYY-MM-DD",
            "Sex"=> "M",
            "Email"=> "paciente@email.com",
            "MobilePhone"=> 999999999,
            "DocumentId"=> 0,
            "OtherDocumentId"=> 0,
            "Notes"=> "string",
            "IgnoreSameName"=> "Se enviar como 'X' vai criar o paciente mesmo que encontre um paciente com o mesmo nome.",
            "IgnoreSameDoc"=> "Se enviar como 'X' vai criar o paciente mesmo que encontre um paciente com o mesmo CPF."
        ];
        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Patient();
        $response = $object->create($data);
        // FIM da chamada

        self::assertSame('POST', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::PATIENT_CREATE, $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListEstimates()
    {

        $expectedResponseData = [
            "From"=> "2022-03-30",
            "To"=> "2022-03-30",
            "BusinessId"=> 0,
            "ApprovedQuantity"=> 0,
            "ApprovedTotalAmount"=> 0,
            "FollowUpQuantity"=> 0,
            "FollowUpTotalAmount"=> 0,
            "OpenQuantity"=> 0,
            "OpenTotalAmount"=> 0,
            "RejectedQuantity"=> 0,
            "RejectedTotalAmount"=> 0
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
        $object = new Patient();
        $response = $object->listEstimates(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::PATIENT_LIST_ESTIMATES.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}