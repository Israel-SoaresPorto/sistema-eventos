# 📅 Sistema de Eventos

Aplicativo web simples para gerenciar eventos, permitindo criar, listar, visualizar, editar e excluir informações sobre eventos. Desenvolvido como projeto de estudos para demonstrar conceitos fundamentais de desenvolvimento web com PHP.

## Visão Geral

Este projeto implementa um sistema CRUD completo com navegação simples e fluxo claro para o usuário:

- **Listar** eventos cadastrados
- **Criar** novos eventos com nome, data, local e descrição
- **Visualizar** os detalhes de um evento em uma página dedicada
- **Editar** eventos existentes
- **Excluir** eventos com confirmação de segurança
- **Receber feedback** com a página de confirmação `sucesso.php`

## Conceitos Aplicados

- PHP para lógica de backend e processamento de formulários
- Armazenamento temporário com `$_SESSION`
- Operações CRUD (Create, Read, Update, Delete)
- Interatividade com JavaScript vanilla
- Uso do Dialog API para confirmações
- Separação entre páginas, formulários e partials reutilizáveis
- Passagem de parâmetros via GET e POST
- Sanitização básica com `htmlspecialchars()`

## Funcionalidades principais

| Funcionalidade | Descrição |
| --- | --- |
| Listar eventos | Tabela com ID, título, data, local e link para detalhes |
| Criar evento | Formulário com validação HTML5 (`required`) |
| Visualizar evento | Página com os dados completos do evento selecionado |
| Editar evento | Formulário pré-preenchido para atualizar dados existentes |
| Excluir evento | Confirmação via dialog nativo e remoção por ID |
| Feedback | `sucesso.php` mostra o resultado das operações (`criado`, `atualizado`, `excluido`) |

## Estrutura do projeto

```
sistema-eventos/
├── index.php
├── criar_evento.php
├── detalhes_evento.php
├── editar_evento.php
├── sucesso.php
├── app/
│   ├── config.php
│   ├── create_event.php
│   ├── delete_event.php
│   ├── list_event.php
│   ├── update_event.php
│   └── partials/
│       ├── delete_dialog.php
│       ├── event_form.php
│       ├── event_table.php
│       └── header.php
└── public/
    └── assets/
        ├── css/
        │   ├── alerts.css
        │   ├── buttons.css
        │   ├── forms.css
        │   ├── header.css
        │   ├── layout.css
        │   ├── modal.css
        │   ├── reset.css
        │   ├── responsive.css
        │   ├── style.css
        │   ├── tables.css
        │   ├── typography.css
        │   ├── utilities.css
        │   └── variables.css
        └── js/
            └── delete_dialog.js
```

## Como executar (local)

Pré-requisitos: PHP 7+, servidor local como XAMPP, LAMP ou MAMP.

1. Coloque a pasta `sistema-eventos` em `htdocs` ou na pasta pública do servidor.
2. Acesse `http://localhost/sistema-eventos/` no navegador.

## Detalhes de implementação

### Funções CRUD (`app/config.php`)

As responsabilidades principais ficam concentradas nas funções abaixo:

- `addEvent(array $evento)` cria novo evento e atribui ID
- `getEvents(): array` retorna a lista de eventos da sessão
- `getEventById(int $id): ?array` busca um evento pelo ID
- `updateEvent(int $id, array $novoevento)` atualiza um evento existente
- `deleteEvent(int $id)` remove um evento pelo ID

### Processamento de formulários

- `app/create_event.php` recebe `POST` e chama `addEvent()`
- `app/update_event.php` recebe `POST` com ID e chama `updateEvent()`
- `app/delete_event.php` recebe `POST` com ID e chama `deleteEvent()`

### Interatividade

`public/assets/js/delete_dialog.js` controla a abertura do dialog de confirmação, preenche o ID do evento e fecha a janela ao cancelar.

### Mensagens de sucesso

`sucesso.php` usa o parâmetro `?evento=` para exibir mensagens específicas de `criado`, `atualizado` e `excluido`.

## Limitações e próximos passos

- Dados armazenados apenas em sessão, então são voláteis
- Migração para banco de dados ainda é o próximo passo natural
- Validação de backend e tratamento de erros podem ser reforçados
- Autenticação e autorização ainda não foram implementadas

## Aprendizados

- Fluxo HTTP com GET e POST e redirecionamentos
- Manipulação de formulários e sanitização básica
- Estruturação de código PHP com partials reutilizáveis
- Uso de JavaScript para melhorar a UX com Dialog API

- `?evento=criado` → "Evento Criado com Sucesso!"
- `?evento=atualizado` → "Evento Atualizado com Sucesso!"
- `?evento=excluido` → "Evento Excluído com Sucesso!"

## 🎯 Próximos Passos (Melhorias Futuras)

- Persistência em banco de dados (MySQL, PostgreSQL)
- Validação de dados com backend (sanitização avançada)
- Interface com CSS
- Autenticação e autorização de usuários
- Busca e filtro de eventos
- Paginação de eventos

## 📚 Aprendizados

Este projeto foi útil para:

- Entender ciclo requisição/resposta HTTP (GET, POST)
- Trabalhar com formulários HTML (criação e edição)
- Manipular dados em Session PHP com funções
- Implementar operações CRUD básicas
- Praticar separação de responsabilidades
- Usar dialog HTML5 para confirmações seguras
- Manipulação do DOM com JavaScript puro
- Event handling e data attributes
- Redirecionamentos HTTP com parâmetros
- Comunicação entre páginas via GET/POST

---

**Status**: Projeto de Estudos Em Andamento
**Versão**: 1.0 - CRUD com persistência em Sessão  
**Última Atualização**: 2026  
**Licença**: Aberta para fins educacionais
