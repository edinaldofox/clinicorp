Descrição
---------

A biblioteca Clinicorp em PHP é um conjunto de classes de domínio que facilitam, para o desenvolvimento PHP, a ultilização das funcionalidades que a Clinicorp oferece na forma de APIs. Com a biblioteca instalada e configurada, você pode facilmente integrar funcionalidades como:

- [Retorna a lista de usuários do assinante]

> Lista todos os usuários do sistema
>
> (new Users())->listUsers(?)
- [Retorna informações sobre assinantes e clinicas]
> Lista informações das clinicas do assinante como nome da clinica, tipo, horarios de trabalho
> 
> (new Group())->listSubscribersClinics()

> Lista as unidades da franquia
> 
> (new Group())->listSubscribers()
- [Retorna informaçãoes das clinicas]
> Lista as clinicas do Assinante
> 
> (new Business())->list(?)
- [Retorna dados de analise das clinicas do assinante]
>Lista dados analiticos de todas as clinicas do assinante como total de orçamentos no periodo, total de vendas, total de despesas, total de agendamentos
> 
> (new Analytics())->listResults(?, ?, ?)
- [Retorna dados dos orçamentos]

> Retorna o orçamento de acordo com id do paciente e id do tratamento
> 
> (new Estimates())->getEstimates(?, ?)

> Retorna a lista de orçamentos das clinicas detalhando status do orçamento, profissional, valor, lista de procedimentos
>
> (new Estimates())->list(?, ?, ?)
- [Retorna dados de consultas dos pacientes]
  
> Info sobre Agendamentos como total de agendamentos, total de primeiros agendamentos, faltas e categorias de agendamento
>
> (new Appointment())->listInfo(?, ?, ?)

> Ocupação da Agenda de acordo com o priodo de referencia, total de tempo que a clinica teve disponivel no periodo de referencia(em minutos), tempo total de agendamento no periodo(em minutos), ocupação da agenda(em porcentagem), tempo total de eventos na agenda(em minutos) e total de tempo em que os profissionais nao estao disponiveis na clinica
>
> (new Appointment())->scheduleOcupation(?, ?, ?)

> Lista os dados referentes a agendamentos como nome do paciente, email, horario, tempo de consulta
>
> (new Appointment())->list(?, ?, ?)

> Cria uma solicitação de agendamento
>
> (new Appointment())->createOnlineScheduling(?)

> Pega horários disponíveis
>
> (new Appointment())->getAvaliableTimesCalendar(?, ?, ?)

> Pega horários disponíveis
>
> (new Appointment())->getAvaliableDays(?, ?)

> Cancela agendamento
>
> (new Appointment())->getAppointment(?, ?)
- [Retorna dados de procedimentos]
> Cancela agendamento
>
> (new Procedures())->listEspecialties(?)
- [Retorna dados financeiros]
> Pagamentos com notas fiscais como valor da nota, nome do paciente, status, tipo da nota fiscal
>
> (new Financial())->listInvoices(?, ?, ?)

> Retorna dados referentes a parcelamento medio como total de pagamentos, total de parcelas e parcelamento medio
>
> (new Financial())->averageInstallments(?, ?, ?, ?, ?)

> Retorna dados referentes a recibos como valor, descrição, nome do paciente
>
> (new Financial())->listRceipt(?, ?, ?)

> Retorna dados referentes ao fluxo de caixa, entradas, saidas, debitos e valores a receber
>
> (new Financial())->listCashFlow(?, ?, ?)

> Retorna dados referentes a pagamentos, pagamentos inadimplentes, pagamentos em aberto e pagamentos efetuados
>
> (new Financial())->listPayments(?, ?, ?, ?)

> Retorna informações financeiras do periodo como total de vendas, total de despesas, lista detalhada de pagamentos
>
> (new Financial())->listSummary(?, ?, ?)

> Cancela agendamento
>
> (new Financial())->getAppointment(?, ?)
- [Retorna dados de pacientes]

> Cria um novo paciente
>
> (new Financial())->Patient(?)

> Retorna a soma dos orçamentos no periodo de referência
>
> (new Financial())->listEstimates(?, ?, ?)
- [Retorna dados de pagamentos]

> Retorna a lista de todos os pagamentos do periodo
>
> (new Payment())->list(?, ?, ?)

- [Sales]

> Retorna todos os dados referentes a orçamentos, Status, quantidade total de orçamentos, valor total de orçamentos, ticket medio e conversão
>
> (new Sales())->estimatesAndConversion(?, ?, ?, ?, ?)

> Retorna os dados referentes a vendas por especialidade(mes de referencia e valor total de vendas para cada especialidade)
>
> (new Sales())->expertiseRevenue(?, ?, ?)

- [Crm]

> Envia dados de um lead externo para ser adicionado em alguma campanha no CRM
>
> (new Crm())->addLeads(?)

> Lista todos as campanhas ativas da unidade
>
> (new Crm())->listActiveCampaings(?)

- [Operational]

> Retorna as metas de faltas referentes ao periodo e o total de faltas
>
> (new Operational())->listMissesGoals(?, ?, ?)

> Retorna as metas de vendas referentes ao periodo, total em vendas e projeção
>
> (new Operational())->listSalesGoals(?, ?, ?, ?)


Requisitos
----------

- [PHP] >=7.4
- [cURL]
- [Composer]


Instalação
----------
> Nota: Recomendamos a instalação via **Composer**. Você também pode baixar o repositório como [arquivo zip] ou fazer um clone via Git.


### Instalação via Composer
> Para baixar e instalar o Composer no seu ambiente acesse https://getcomposer.org/download/ e caso tenha dúvidas de como utilizá-lo consulte a [documentação oficial do Composer].
É possível instalar a biblioteca clinicorp([edinaldo/clinicorp]) via Composer de duas maneiras:

- Executando o comando para adicionar a dependência automaticamente
  ```
  php composer.phar require edinaldo/clinicorp
  ```

**OU**

- Adicionando a dependência ao seu arquivo ```composer.json```
  ```composer.json
  {
      "require": {
         "edinaldo/clinicorp" : "^1.0"
      }
  }
  ```

### Instalação manual
- Baixe o repositório como [arquivo zip] ou faça um clone;
- Descompacte os arquivos em seu computador;
- Execute o comando ```php composer.phar install``` no local onde extraiu os arquivos.


Como usar
---------
O diretório *[public](public)* contém exemplos das mais diversas chamadas à API da Clinicorp utilizando a biblioteca (users, group, business, analytics, estimates, appointment, procedures, financial, patient, payment, sales, crm, operational) e o diretório *[src](src)* contém a biblioteca propriamente dita (código fonte).

> ClientHttp::init('MEU USUARIO', 'MEU TOKEN');
> 
> $users = new Users();
> 
> var_dump($users->listUsers(1));

Dúvidas?
----------
---
Caso tenha dúvidas ou precise de suporte, envie um email para Edinaldo (edinaldofox@gmail.com).

Contribuições
-------------

Achou e corrigiu um bug ou tem alguma feature em mente e deseja contribuir?

* Faça um fork
* Adicione sua feature ou correção de bug (git checkout -b my-new-feature)
* Commit suas mudanças (git commit -am 'Added some feature')
* Rode um push para o branch (git push origin my-new-feature)
* Envie um Pull Request
* Obs.: Adicione exemplos para sua nova feature. Se seu Pull Request for relacionado a uma versão específica, o Pull Request não deve ser enviado para o branch master e sim para o branch correspondente a versão.