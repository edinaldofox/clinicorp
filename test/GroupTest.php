<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use \PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class GroupTest extends TestCase
{
    public function testListSubscribersClinis()
    {

        $expectedResponseData = [
            [
                "Name" => "string",
                "Email" => "string",
                "NoLimitAptSameTime" => "string",
                "Address" => "string",
                "Active" => "string",
                "OtherLandline" => 0,
                "WorkingDaysHours" => [],
                "Landline" => 0,
                "SubscriberBussinessUID" => "string",
                "SlotTime" => 0,
                "CompanyId" => 0
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
        $object = new Group();
        $response = $object->listSubscribersClinics();
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::GROUP_LIST_SUBSCRIBERS_CLINICS, $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListSubscribers()
    {

        $expectedResponseData = [
            "SubscriberBussinessUID" => "string",
            "Namespace"=> "string"
        ];
        $mockResponseJson = json_encode($expectedResponseData, JSON_THROW_ON_ERROR);
        $mockResponse = new MockResponse($mockResponseJson, [
            'http_code' => 201,
            'response_headers' => ['Content-Type: application/json'],
        ]);
        $httpClient = new MockHttpClient($mockResponse, ClientHttp::CLINICORP_API);

        // INICIO da chamada
        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Group();
        $response = $object->listSubscribers();
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::GROUP_LIST_SUBSCRIBERS, $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}