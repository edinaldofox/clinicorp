<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna dados de pacientes
 */
class Patient extends ClientHttp
{

    /**
     * Cria um novo paciente
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        $this->return = $this->post(ClinicorpUrlEnum::PATIENT_CREATE, $data);

        return $this->return->toArray();
    }

    /**
     *
     * Retorna a soma dos orçamentos no periodo de referência
     *
     * @param int $subscriberId
     * @param \DateTime $from
     * @param \DateTime $to
     * @param int|null $businessId
     * @return mixed
     */
    public function listEstimates(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::PATIENT_LIST_ESTIMATES, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }
}