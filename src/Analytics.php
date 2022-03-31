<?php

namespace Clinicorp;


use Clinicorp\ClientHttp;
use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna dados de analise das clinicas do assinante
 */
class Analytics extends ClientHttp
{
    /**
     *
     * Lista dados analiticos de todas as clinicas do assinante como total de orçamentos no periodo, total de vendas, total de despesas, total de agendamentos
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function listResults(int $subscriberId, \DateTime $from, \DateTime $to) {
        $this->return = $this->get(ClinicorpUrlEnum::ANALYTICS_LIST_RESULTS, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
        ]);

        return $this->return->toArray();
    }
}