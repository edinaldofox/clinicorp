<?php

namespace Clinicorp;


use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna a lista de usuários do assinante
 */
class Users extends ClientHttp
{

    /**
     * Retorna informações sobre assinantes e clinicas
     *
     * @param int $subscriberId id do Assinante.
     * @return array
     * @throws Exception\HttpClienteCliniException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function listUsers(int $subscriberId) {
        $this->response = $this->get(ClinicorpUrlEnum::SECURITY_LIST_USERS, ['subscriber_id' => $subscriberId]);
        return $this->response->toArray();
    }
}