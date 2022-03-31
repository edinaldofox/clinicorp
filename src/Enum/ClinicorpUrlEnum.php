<?php

namespace Clinicorp\Enum;

class ClinicorpUrlEnum
{
    const SECURITY_LIST_USERS = '/security/list_users', //Lista todos os usuários do sistema

    // GROUP
    // Retorna informações sobre assinantes e clinicas
    GROUP_LIST_SUBSCRIBERS_CLINICS = '/group/list_subscribers_clinics', // Lista informações das clinicas do assinante como nome da clinica, tipo, horarios de trabalho
    GROUP_LIST_SUBSCRIBERS = '/group/list_subscribers', // Lista informações das clinicas do assinante como nome da clinica, tipo, horarios de trabalho

    // BUSINESS
    // Retorna informaçãoes das clinicas
    BUSINESS_LIST = '/business/list', // Lista as clinicas do Assinante

    // ANALYTICS
    // Retorna dados de analise das clinicas do assinante
    ANALYTICS_LIST_RESULTS = '/analytics/list_results', // Lista dados analiticos de todas as clinicas do assinante como total de orçamentos no periodo, total de vendas, total de despesas, total de agendamentos

    // ESTIMATES
    // Retorna dados dos orçamentos
    ESTIMATES_GET = '/estimates/get', // Retorna o orçamento de acordo com id do paciente e id do tratamento
    ESTIMATES_LIST = '/estimates/list', // Retorna a lista de orçamentos das clinicas detalhando status do orçamento, profissional, valor, lista de procedimentos

    // APPOINTMENT
    // Retorna dados de consultas dos pacientes
    APPOINTMENT_LIST_INFO = '/appointment/list_info', // Info sobre Agendamentos como total de agendamentos, total de primeiros agendamentos, faltas e categorias de agendamento
    APPOINTMENT_SCHEDULE_OCUPATION = '/appointment/schedule_ocupation', // Ocupação da Agenda de acordo com o priodo de referencia, total de tempo que a clinica teve disponivel no periodo de referencia(em minutos), tempo total de agendamento no periodo(em minutos), ocupação da agenda(em porcentagem), tempo total de eventos na agenda(em minutos) e total de tempo em que os profissionais nao estao disponiveis na clinica
    APPOINTMENT_LIST = '/appointment/list', // Lista os dados referentes a agendamentos como nome do paciente, email, horario, tempo de consulta
    APPOINTMENT_CREATE_ONLINE_SCHEDULING = '/appointment/create_online_scheduling', // Cria uma solicitação de agendamento
    APPOINTMENT_GET_AVALIABLE_TIMES_CALENDAR = '/appointment/get_avaliable_times_calendar', // Pega horários disponíveis
    APPOINTMENT_GET_AVALIABLE_DAYS = '/appointment/get_avaliable_days', // Pega dias da semana com horários disponíveis
    APPOINTMENT_GET_APPOINTMENT = '/appointment/get_appointment', // Cancela agendamento

    // PROCEDURES
    // Retorna dados de procedimentos
    PROCEDURES_LIST_SPECIALTIES = '/procedures/list_specialties', // Retorna a lista de especialidades da franquia

    // FINANCIAL
    // Retorna dados financeiros
    FINANCIAL_LIST_INVOICES = '/financial/list_invoices', // Pagamentos com notas fiscais como valor da nota, nome do paciente, status, tipo da nota fiscal
    FINANCIAL_AVERAGE_INSTALLMENTS = '/financial/average_installments', // Retorna dados referentes a parcelamento medio como total de pagamentos, total de parcelas e parcelamento medio
    FINANCIAL_LIST_RECEIPT = '/financial/list_receipt', // Retorna dados referentes a recibos como valor, descrição, nome do paciente
    FINANCIAL_LIST_CASH_FLOW = '/financial/list_cash_flow', // Retorna dados referentes ao fluxo de caixa, entradas, saidas, debitos e valores a receber
    FINANCIAL_LIST_PAYMENTS = '/financial/list_payments', // Retorna dados referentes a pagamentos, pagamentos inadimplentes, pagamentos em aberto e pagamentos efetuados
    FINANCIAL_LIST_SUMMARY = '/financial/list_summary', // Retorna informações financeiras do periodo como total de vendas, total de despesas, lista detalhada de pagamentos

    // PATIENT
    // Retorna dados de pacientes
    PATIENT_CREATE = '/patient/create', // Cria um novo paciente
    PATIENT_LIST_ESTIMATES = '/patient/list_estimates', // Retorna a soma dos orçamentos no periodo de referência

    // PAYMENT
    // Retorna dados de pagamentos
    PAYMENT_LIST = '/payment/list', // Retorna a lista de todos os pagamentos do periodo

    // SALES
    SALES_ESTIMATES_AND_CONVERSION = '/sales/estimates_and_conversion', // Retorna todos os dados referentes a orçamentos, Status, quantidade total de orçamentos, valor total de orçamentos, ticket medio e conversão
    SALES_EXPERTISE_REVENUE = '/sales/expertise_revenue', // Retorna os dados referentes a vendas por especialidade(mes de referencia e valor total de vendas para cada especialidade)

    // CRM
    // Retorna dados de pacientes
    CRM_ADD_LEADS = '/crm/add_leads', // Envia dados de um lead externo para ser adicionado em alguma campanha no CRM
    CRM_LIST_ACTIVE_CAMPAIGNS = '/crm/list_active_campaigns', // Lista todos as campanhas ativas da unidade

    // OPERATIONAL
    // Retorna dados de pacientes
    OPERATIONAL_LIST_MISSES_GOALS = '/operational/list_misses_goals', // Retorna as metas de faltas referentes ao periodo e o total de faltas
    OPERATIONAL_LIST_SALES_GOALS = '/operational/list_sales_goals' // Retorna as metas de vendas referentes ao periodo, total em vendas e projeção
    ;
}