<?php

namespace Clinicorp;

use Clinicorp\ClientHttp;
use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna dados de consultas dos pacientes
 */
class Appointment extends ClientHttp
{
    /**
     *
     * Info sobre Agendamentos como total de agendamentos, total de primeiros agendamentos, faltas e categorias de agendamento
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @param string|null $groupBy Envie "month" para poder agrupar por mês
     * @return array
     * @throws \Clinicorp\Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function listInfo(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null, ?string $groupBy = null) {
        $this->return = $this->get(ClinicorpUrlEnum::APPOINTMENT_LIST_INFO, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId,
            'group_by' => $groupBy
        ]);

        return $this->return->toArray();
    }

    /**
     *
     * Ocupação da Agenda de acordo com o priodo de referencia, total de tempo que a clinica teve disponivel no periodo de referencia(em minutos), tempo total de agendamento no periodo(em minutos), ocupação da agenda(em porcentagem), tempo total de eventos na agenda(em minutos) e total de tempo em que os profissionais nao estao disponiveis na clinica
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @param string|null $groupBy Envie "month" para poder agrupar por mês
     * @return array
     * @throws \Clinicorp\Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function scheduleOcupation(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null, ?string $groupBy = null) {
        $this->return = $this->get(ClinicorpUrlEnum::APPOINTMENT_SCHEDULE_OCUPATION, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId,
            'group_by' => $groupBy
        ]);

        return $this->return->toArray();
    }

    /**
     * Lista os dados referentes a agendamentos como nome do paciente, email, horario, tempo de consulta
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @param int|null $patientId Id do Paciente.
     * @return array
     * @throws \Clinicorp\Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function list(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null, ?int $patientId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::APPOINTMENT_LIST, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId,
            'patientId' => $patientId
        ]);

        return $this->return->toArray();
    }

    /**
     * Cria uma solicitação de agendamento
     *
     * @param array $data
     * @return array
     * @throws \Clinicorp\Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function createOnlineScheduling(array $data) {
        $this->return = $this->post(ClinicorpUrlEnum::APPOINTMENT_CREATE_ONLINE_SCHEDULING, $data);

        return $this->return->toArray();
    }

    /**
     * Pega horários disponíveis
     *
     * @param int $subscriber_id id do Assinante.
     * @param \DateTime $date Data selecionada
     * @param string $codeLink Código de acesso.
     * @return array
     * @throws \Clinicorp\Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getAvaliableTimesCalendar(int $subscriberId, \DateTime $date, string $codeLink) {
        $this->return = $this->get(ClinicorpUrlEnum::APPOINTMENT_GET_AVALIABLE_TIMES_CALENDAR, [
            'subscriber_id' => $subscriberId,
            'date' => $date->format('Y-m-d'),
            'code_link' => $codeLink
        ]);

        return $this->return->toArray();
    }

    /**
     * Pega dias da semana com horários disponíveis
     *
     * @param int $subscriberId id do Assinante.
     * @param string $codeLink Código de acesso.
     * @return array
     * @throws \Clinicorp\Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getAvaliableDays(int $subscriberId, string $codeLink) {
        $this->return = $this->get(ClinicorpUrlEnum::APPOINTMENT_GET_AVALIABLE_DAYS, [
            'subscriber_id' => $subscriberId,
            'code_link' => $codeLink
        ]);

        return $this->return->toArray();
    }

    /**
     * Cancela agendamento
     *
     * @param int $subscriberId id do Assinante.
     * @param int $id id do agendamento
     * @return array
     * @throws \Clinicorp\Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getAppointment(int $subscriberId, int $id) {
        $this->return = $this->get(ClinicorpUrlEnum::APPOINTMENT_GET_APPOINTMENT, [
            'subscriber_id' => $subscriberId,
            'id' => $id
        ]);

        return $this->return->toArray();
    }
}