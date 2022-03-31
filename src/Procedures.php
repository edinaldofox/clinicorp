<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna dados de procedimentos
 */
class Procedures extends ClientHttp
{

    /**
     *
     * Retorna a lista de especialidades da franquia
     *
     * @param int $subscriberId id do Assinante.
     * @return mixed
     */
    public function listEspecialties(int $subscriberId) {
        $this->return = $this->get(ClinicorpUrlEnum::PROCEDURES_LIST_SPECIALTIES, [
            'subscriber_id' => $subscriberId
        ]);

        return $this->return->toArray();
    }
}