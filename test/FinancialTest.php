<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class FinancialTest extends TestCase
{
    public function testListInvoices()
    {

        $expectedResponseData = [
            [
                "ReferenceId"=> 0,
                "Amount"=> 0,
                "Description"=> "string",
                "PatientName"=> "string",
                "PatientId"=> 0,
                "Date"=> "2022-03-30",
                "InvoiceId"=> 0,
                "Status"=> "string",
                "PaymentReceived"=> "string",
                "PaymentConfirmed"=> "string",
                "InstallmentNumber"=> 0,
                "ReceiverBusinessId"=> 0
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
        $object = new Financial();
        $response = $object->listInvoices(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::FINANCIAL_LIST_INVOICES.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testAverageInstallments()
    {

        $expectedResponseData = [
            [
                "month"=> "string",
                "TotalPayments"=> 0,
                "TotalInstallments"=> 0,
                "AverageInstallments"=> 0
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
        $object = new Financial();
        $response = $object->averageInstallments(1, $dataFrom, $dataTo, 1, 'month');
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::FINANCIAL_AVERAGE_INSTALLMENTS.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1&group_by=month', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListRceipt()
    {

        $expectedResponseData = [
            [
                "id"=> 0,
                "ReferenceId"=> 0,
                "Amount"=> 0,
                "Description"=> "string",
                "PatientName"=> "string",
                "PatientId"=> 0,
                "ReceiptDate"=> "2022-03-30",
                "ReceiverBusinessId"=> 0
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
        $object = new Financial();
        $response = $object->listRceipt(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::FINANCIAL_LIST_RECEIPT.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListCashFlow()
    {

        $expectedResponseData = [
            [
                "in"=> 0,
                "out"=> 0,
                "in_forecast"=> 0,
                "out_forecast"=> 0,
                "month"=> "string",
                "cash"=> 0,
                "bank_slip"=> 0,
                "credit_card"=> 0,
                "debit_card"=> 0,
                "check"=> 0,
                "transfer"=> 0,
                "debit"=> 0
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
        $object = new Financial();
        $response = $object->listCashFlow(1, $dataFrom, $dataTo, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::FINANCIAL_LIST_CASH_FLOW.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListPayments()
    {

        $expectedResponseData = [
            [
                "totalInForecastAmount"=> 0,
                "totalPaymentsAmount"=> 0,
                "totalDebitAmount"=> 0
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
        $object = new Financial();
        $response = $object->listPayments(1, $dataFrom, $dataTo, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::FINANCIAL_LIST_PAYMENTS.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testListSummary()
    {

        $expectedResponseData = [
            [
                "From"=> "2022-03-30",
                "To"=> "2022-03-30",
                "BusinessId"=> 0,
                "TotalSales"=> 0,
                "TotalIncome"=> 0,
                "TotalExpenses"=> 0,
                "Type"=> "string",
                "values"=> [
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
        $object = new Financial();
        $response = $object->listSummary(1, $dataFrom, $dataTo, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::FINANCIAL_LIST_SUMMARY.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}