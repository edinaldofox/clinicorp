<?php

namespace Clinicorp;


use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna dados dos orçamentos
 */
class Estimates extends ClientHttp
{

    /**
     *
     * Retorna o orçamento de acordo com id do paciente e id do tratamento
     *
     * @param int $subscriberId id do Assinante.
     * @param int $treatmentId id do orçamento.
     * @return array|\Symfony\Contracts\HttpClient\ResponseInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getEstimates(int $subscriberId, int $treatmentId) {
        $this->return = $this->get(ClinicorpUrlEnum::ESTIMATES_GET, [
            'subscriber_id' => $subscriberId,
            'treatment_id' => $treatmentId
        ]);

        return $this->return->toArray();
    }

    /**
     *
     * Retorna a lista de orçamentos das clinicas detalhando status do orçamento, profissional, valor, lista de procedimentos
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $clinicId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function list(int $subscriberId, \DateTime $from, \DateTime $to, ?int $clinicId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::ESTIMATES_LIST, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'clinic_id' => $clinicId
        ]);

        return $this->return->toArray();
    }
}