<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;

class Crm extends ClientHttp
{

    /**
     * Envia dados de um lead externo para ser adicionado em alguma campanha no CRM
     *
     * @param array $data
     * @return mixed
     */
    public function addLeads(array $data) {
        $this->response = $this->post(ClinicorpUrlEnum::CRM_ADD_LEADS, $data);

        return $this->response->toArray();
    }

    /**
     * Lista todos as campanhas ativas da unidade
     *
     * @param int $subscriberId id do Assinante.
     * @return mixed
     */
    public function listActiveCampaings(int $subscriberId) {
        $this->response = $this->get(ClinicorpUrlEnum::CRM_LIST_ACTIVE_CAMPAIGNS, [
            'subscriber_id' => $subscriberId
        ]);

        return $this->response->toArray();
    }
}