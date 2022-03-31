<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna dados de pagamentos
 */
class Payment extends ClientHttp
{

    /**
     *
     * Retorna a lista de todos os pagamentos do periodo
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param string|null $includeTotalAmount X se for para trazer o valor total.
     * @param string|null $getAmountWithDiscounts X se for para trazer o valor com os descontos de taxas de pagamentos.
     * @return mixed
     */
    public function list(int $subscriberId, \DateTime $from, \DateTime $to, ?string $includeTotalAmount = null, ?string $getAmountWithDiscounts = null) {
        $this->return = $this->get(ClinicorpUrlEnum::PAYMENT_LIST, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'include_total_amount' => $includeTotalAmount,
            'get_amount_with_discounts' => $getAmountWithDiscounts,
        ]);

        return $this->return->toArray();
    }
}