<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;

class Sales extends ClientHttp
{

    /**
     * Retorna todos os dados referentes a orçamentos, Status, quantidade total de orçamentos, valor total de orçamentos, ticket medio e conversão
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica para pegar o tempo de agenda
     * @param string|null $groupBy agrupa os dados (utilizar month para agrupar por mes)
     * @return mixed
     */
    public function estimatesAndConversion(int $subscriberId, \DateTime $from, \DateTime $to, int $businessId = null, string $groupBy = null) {
        $this->return = $this->get(ClinicorpUrlEnum::SALES_ESTIMATES_AND_CONVERSION, [
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
     * Retorna os dados referentes a vendas por especialidade(mes de referencia e valor total de vendas para cada especialidade)
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId Id da clínica.
     * @param int|null $patientId Id do Paciente.
     * @return mixed
     */
    public function expertiseRevenue(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null, ?int $patientId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::SALES_EXPERTISE_REVENUE, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'businessId' => $businessId,
            'patientId' => $patientId
        ]);

        return $this->return->toArray();
    }

}