<?php

namespace Clinicorp;


use Clinicorp\ClientHttp;
use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna informaçãoes das clinicas
 */
class Business extends ClientHttp
{
    /**
     *
     * Lista as clinicas do Assinante
     *
     * @param int $subscriberId id do Assinante.
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function list(int $subscriberId) {
        $this->return = $this->get(ClinicorpUrlEnum::BUSINESS_LIST, ['subscriber_id' => $subscriberId]);
        return $this->return->toArray();
    }
}