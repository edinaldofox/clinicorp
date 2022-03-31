<?php

namespace Clinicorp;


use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna informações sobre assinantes e clinicas
 */
class Group extends ClientHttp
{
    /**
     *
     * Lista informações das clinicas do assinante como nome da clinica, tipo, horarios de trabalho
     *
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function listSubscribersClinics() {
        $this->return = $this->get(ClinicorpUrlEnum::GROUP_LIST_SUBSCRIBERS_CLINICS, []);
        return $this->return->toArray();
    }

    /**
     *
     * Lista as unidades da franquia
     *
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function listSubscribers() {
        $this->return = $this->get(ClinicorpUrlEnum::GROUP_LIST_SUBSCRIBERS, []);
        return $this->return->toArray();
    }
}