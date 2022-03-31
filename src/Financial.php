<?php

namespace Clinicorp;

use Clinicorp\Enum\ClinicorpUrlEnum;

/**
 * Retorna dados financeiros
 */
class Financial extends ClientHttp
{

    /**
     * Pagamentos com notas fiscais como valor da nota, nome do paciente, status, tipo da nota fiscal
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @return mixed
     */
    public function listInvoices(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::FINANCIAL_LIST_INVOICES, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }

    /**
     *
     * Retorna dados referentes a parcelamento medio como total de pagamentos, total de parcelas e parcelamento medio
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId d de uma clínica específica para pegar o tempo de agenda
     * @param string|null $groupBy Agrupar os dados. Passar a string month como parametro retorna os valores separados por mes de acordo com o periodo passado atraves de From e To
     * @return mixed
     */
    public function averageInstallments(int $subscriberId, \DateTime $from, \DateTime $to, int $businessId = null, string $groupBy = null) {
        $this->return = $this->get(ClinicorpUrlEnum::FINANCIAL_AVERAGE_INSTALLMENTS, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId,
            'group_by' => $groupBy
        ]);

        return $this->return->toArray();
    }

    /**
     * Retorna dados referentes a recibos como valor, descrição, nome do paciente
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @return mixed
     */
    public function listRceipt(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::FINANCIAL_LIST_RECEIPT, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }

    /**
     *
     * Retorna dados referentes ao fluxo de caixa, entradas, saidas, debitos e valores a receber
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @return mixed
     */
    public function listCashFlow(int $subscriberId, \DateTime $from, \DateTime $to, int $businessId) {
        $this->return = $this->get(ClinicorpUrlEnum::FINANCIAL_LIST_CASH_FLOW, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }

    /**
     * Retorna dados referentes a pagamentos, pagamentos inadimplentes, pagamentos em aberto e pagamentos efetuados
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @return mixed
     */
    public function listPayments(int $subscriberId, \DateTime $from, \DateTime $to, int $businessId) {
        $this->return = $this->get(ClinicorpUrlEnum::FINANCIAL_LIST_PAYMENTS, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }

    /**
     * Retorna informações financeiras do periodo como total de vendas, total de despesas, lista detalhada de pagamentos
     *
     * @param int $subscriberId id do Assinante.
     * @param \DateTime $from Data inicial
     * @param \DateTime $to Data final
     * @param int|null $businessId id de uma clínica específica em caso de multiclínicas em uma unidade.
     * @return mixed
     */
    public function listSummary(int $subscriberId, \DateTime $from, \DateTime $to, ?int $businessId = null) {
        $this->return = $this->get(ClinicorpUrlEnum::FINANCIAL_LIST_SUMMARY, [
            'subscriber_id' => $subscriberId,
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'business_id' => $businessId
        ]);

        return $this->return->toArray();
    }
}