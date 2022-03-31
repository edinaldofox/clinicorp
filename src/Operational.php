<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;

class Operational extends ClientHttp
{

    /**
     *
     * Retorna as metas de faltas referentes ao periodo e o total de faltas
     *
     * @param int $subscriber_id id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @return mixed
     */
    public function listMissesGoals(int $subscriber_id, \DateTime $from, \DateTime $to, ?int $businessId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::OPERATIONAL_LIST_MISSES_GOALS, [
            'subscriber_id' => $subscriber_id,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }

    /**
     * Retorna as metas de vendas referentes ao periodo, total em vendas e projeção
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica para pegar o tempo de agenda
     * @return mixed
     */
    public function listSalesGoals(int $subscriberId, \DateTime $from, \DateTime $to, int $businessId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::OPERATIONAL_LIST_SALES_GOALS, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }
}