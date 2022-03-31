<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class AppointmentTest extends TestCase
{
    public function testListInfo()
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
        $object = new Appointment();
        $response = $object->listInfo(1, $dataFrom, $dataTo);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::APPOINTMENT_LIST_INFO.'?subscriber_id=1&from=2021-01-01&to=2021-01-21', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testScheduleOcupation()
    {

        $expectedResponseData = [
            [
                "TotalValidScheduleTime"=> 0,
                "TotalAppointmentTime"=> 0,
                "TotalEvent"=> "string",
                "TotalBusy"=> 0,
                "month"=> "string",
                "Ocupaccion"=> "string"
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
        $object = new Appointment();
        $response = $object->scheduleOcupation(1, $dataFrom, $dataTo, 1, 'month');
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::APPOINTMENT_SCHEDULE_OCUPATION.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1&group_by=month', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testList()
    {

        $expectedResponseData = [
            [
                "TotalValidScheduleTime"=> 0,
                "TotalAppointmentTime"=> 0,
                "TotalEvent"=> "string",
                "TotalBusy"=> 0,
                "month"=> "string",
                "Ocupaccion"=> "string"
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
        $object = new Appointment();
        $response = $object->list(1, $dataFrom, $dataTo, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::APPOINTMENT_LIST.'?subscriber_id=1&from=2021-01-01&to=2021-01-21&business_id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testCreateOnlineScheduling()
    {

        $expectedResponseData = [
            "id" => 3,
            "CodeLink"=> 27478,
            "PatientName"=> "Nome do paciente",
            "SchedulingReason"=> "Razao da consulta",
            "MobilePhone"=> "(47) 90000-0000",
            "OtherPhones"=> "(47) 90000-0000",
            "OtherDocumentId"=> "567 (apenas 3 primeiros dígitos)",
            "Email"=> "joaosilva@yahoo.com",
            "NotesPatient"=> "preciso dessa consulta urgente",
            "fromTime"=> "14=>30",
            "toTime"=> "15=>30",
            "IsOnlineScheduling"=> true,
            "date"=> "2021-07-15T03=>00=>00.000Z",
            "Type"=> "CLOUDIA",
            "Dentist_PersonId"=> 0,
            "Clinic_BusinessId"=> 0,
            "AlreadyPatient"=> true
        ];
        $mockResponseJson = json_encode($expectedResponseData, JSON_THROW_ON_ERROR);
        $mockResponse = new MockResponse($mockResponseJson, [
            'http_code' => 201,
            'response_headers' => ['Content-Type: application/json'],
        ]);
        $httpClient = new MockHttpClient($mockResponse, ClientHttp::CLINICORP_API);

        // INICIO da chamada
        $data = [
            "CodeLink"=> 27478,
            "PatientName"=> "Nome do paciente",
            "SchedulingReason"=> "Razao da consulta",
            "MobilePhone"=> "(47) 90000-0000",
            "OtherPhones"=> "(47) 90000-0000",
            "OtherDocumentId"=> "567 (apenas 3 primeiros dígitos)",
            "Email"=> "joaosilva@yahoo.com",
            "NotesPatient"=> "preciso dessa consulta urgente",
            "fromTime"=> "14=>30",
            "toTime"=> "15=>30",
            "IsOnlineScheduling"=> true,
            "date"=> "2021-07-15T03=>00=>00.000Z",
            "Type"=> "CLOUDIA",
            "Dentist_PersonId"=> 0,
            "Clinic_BusinessId"=> 0,
            "AlreadyPatient"=> true
        ];
        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Appointment();
        $response = $object->createOnlineScheduling($data);
        // FIM da chamada

        self::assertSame('POST', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::APPOINTMENT_CREATE_ONLINE_SCHEDULING, $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testGetAvaliableTimesCalendar()
    {

        $expectedResponseData = [
            [
                "From"=> "9=>00",
                "To"=> "10=>00",
                "DayWeek"=> 1,
                "BusinessId"=> 123456789,
                "ProfessionalId"=> 2345512
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


        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Appointment();
        $response = $object->getAvaliableTimesCalendar(1, $dataFrom, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::APPOINTMENT_GET_AVALIABLE_TIMES_CALENDAR.'?subscriber_id=1&date=2021-01-01&code_link=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testGetAvaliableDays()
    {

        $expectedResponseData = [
            [
                "Date"=> "YYYY-MM-DD",
                "Week"=> "Quarta-Feira",
                "DayWeek"=> "3 (Quarta-Feira)"
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


        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Appointment();
        $response = $object->getAvaliableDays(1, '14124141');
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::APPOINTMENT_GET_AVALIABLE_DAYS.'?subscriber_id=1&code_link=14124141', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }

    public function testGetAppointment()
    {

        $expectedResponseData = [
            [
                "OtherPhones"=> "(47) 99999-9999",
                "ShedulingReason"=> "Dor de dente",
                "AtomicDate"=> 20210713,
                "CreateUserId"=> -1,
                "Date"=> "2021-07-15T18=>02=>36.132Z",
                "Id"=> 4791226171916288,
                "Type"=> "CLOUDIA",
                "MobilePhone"=> "(47) 98870-0805",
                "SK_DateFirstTime"=> 920210713,
                "Deleted"=> "Se tiver com 'X', é porque o agendamento foi deletado ou a solicitação de agendamento recusada",
                "OtherDocumentId"=> 12345678900,
                "ToTime"=> "13=>00",
                "FromTime"=> "14=>00",
                "Email"=> "joaosilva@gmail.com",
                "Clinic_BusinessId"=> 5759793708400640,
                "Dentist_PersonId"=> 5670262998564864,
                "NotesPatient"=> "Obs do paciente",
                "PatientName"=> "Gustavo Blasius",
                "IsOnlineScheduling"=> true,
                "ShedulingAccepted"=> false
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


        ClientHttp::setCredential($httpClient); // ClientHttp::init('username', 'Token');
        $object = new Appointment();
        $response = $object->getAppointment(1, 1);
        // FIM da chamada

        self::assertSame('GET', $mockResponse->getRequestMethod());
        self::assertSame(ClientHttp::CLINICORP_API.ClinicorpUrlEnum::APPOINTMENT_GET_APPOINTMENT.'?subscriber_id=1&id=1', $mockResponse->getRequestUrl());
        self::assertContains(
            'accept: application/json',
            $mockResponse->getRequestOptions()['headers']
        );
        self::assertSame($expectedResponseData, $response);
    }
}