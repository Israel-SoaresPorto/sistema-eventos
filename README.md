# 📅 Sistema de Eventos

Aplicativo web simples para gerenciar eventos, permitindo criar, listar, visualizar, editar e excluir informações sobre eventos. Desenvolvido como projeto de estudos para demonstrar conceitos fundamentais de desenvolvimento web e a aplicação do padrão de arquitetura MVC com PHP.

## Visão Geral

Este projeto implementa um sistema CRUD completo com navegação simples e fluxo claro para o usuário, agora estruturado em MVC:

- **Listar** eventos cadastrados
- **Criar** novos eventos com nome, data, local e descrição
- **Visualizar** os detalhes de um evento em uma página dedicada
- **Editar** eventos existentes
- **Excluir** eventos com confirmação de segurança
- **Receber feedback** com a página de confirmação de sucesso

## Conceitos Aplicados

- Padrão de Arquitetura MVC (Model-View-Controller)
- Roteamento HTTP personalizado (Router e Front Controller)
- Padrão de Projeto Repository (`EventoRepository`) para abstração de dados
- POO (Programação Orientada a Objetos) no PHP
- Autoloading de classes com Composer (PSR-4)
- Armazenamento temporário com `$_SESSION`
- Operações CRUD (Create, Read, Update, Delete)
- Interatividade com JavaScript vanilla
- Uso do Dialog API para confirmações
- Componentização de views com partials reutilizáveis

## Funcionalidades principais

| Funcionalidade | Descrição |
| --- | --- |
| Listar eventos | Tabela com ID, título, data, local e link para detalhes |
| Criar evento | Formulário com validação HTML5 (`required`) |
| Visualizar evento | Página com os dados completos do evento selecionado |
| Editar evento | Formulário pré-preenchido para atualizar dados existentes |
| Excluir evento | Confirmação via dialog nativo e remoção do registro |
| Feedback | Página de sucesso mostra o resultado das operações |

## Estrutura do projeto

A nova estrutura do projeto adota conceitos sólidos de arquitetura MVC:

```
sistema-eventos/
├── app/                  # Lógica de negócio e controllers
│   ├── Controllers/      # Controladores da aplicação
│   ├── Model/            # Modelos de dados do domínio
│   └── Repository/       # Repositórios para acesso a dados (Interfaces e Implementação)
├── config/               # Arquivos de configuração da aplicação
├── core/                 # Núcleo do framework customizado (Router, Http Request/Response, View)
├── public/               # Document root do servidor web
│   ├── assets/           # Arquivos estáticos (CSS e JS)
│   └── index.php         # Entry point da aplicação (Front Controller)
├── resources/            # Views e componentes de UI
│   ├── components/       # Partials reutilizáveis (header, tables, dialogs)
│   └── views/            # Páginas da aplicação
├── routes/               # Definição das rotas HTTP (web.php)
└── composer.json         # Dependências e mapeamento de Autoloading (PSR-4)
```

## Como executar (local)

Pré-requisitos: PHP 7.4+, servidor local como XAMPP, LAMP ou MAMP e Composer.

1. Clone o repositório ou baixe os arquivos.
2. Na raiz do projeto, configure o autoload do Composer:
   ```bash
   composer dump-autoload
   ```
3. Aponte o document root do seu servidor para a pasta `public/` (ou configure um Virtual Host apontando para ela). Se usar o servidor embutido do PHP, execute na raiz do projeto:
   ```bash
   php -S localhost:8000 -t public
   ```
4. Acesse `http://localhost:8000/` no navegador.

> [!NOTE]
> Se você utilizar um servidor como XAMPP e colocar a pasta em `htdocs/sistema-eventos/` sem configurar um Virtual Host, a URL de acesso será `http://localhost/sistema-eventos/public/`.

## Detalhes de implementação

### Roteamento (`core/Router.php` e `routes/web.php`)

O sistema agora possui um motor de roteamento simples baseado em métodos HTTP (GET, POST). As rotas direcionam as requisições para os seus respectivos Controllers e métodos, centralizando o fluxo de entrada.

### Controllers (`app/Controllers`)

Os Controllers interceptam a requisição, processam as lógicas interagindo com os Models/Repositories e devolvem a View compilada:
- `HomeController` lida com a página inicial do sistema.
- `EventoController` possui os métodos para as ações CRUD (`index`, `create`, `store`, `show`, `edit`, `update`, `delete`).

### Repository Pattern (`app/Repository/EventoRepository.php`)

A persistência de dados foi isolada na interface `EventoRepositoryInterface`. Atualmente os eventos ainda ficam salvos em `$_SESSION`, mas este padrão garante que a implementação futura de um banco de dados (MySQL/PostgreSQL) não alterará os Controllers, obedecendo o princípio de Inversão de Dependência (SOLID).

### Interatividade

A exclusão de eventos utiliza `public/assets/js/delete_dialog.js`, que controla a abertura nativa do elemento `<dialog>`, preenche dinamicamente o formulário com o ID do evento a ser excluído e submete ou fecha a janela.

## Limitações e próximos passos

- **Persistência de Dados**: Migração de sessão volátil para banco de dados relacional.
- **Validação Robusta**: Implementação de `FormRequests` ou validadores no backend para os dados de entrada.
- **Segurança**: Adição de CSRF tokens e autenticação/autorização de usuários.
- **Filtros e Paginação**: Melhoria da listagem com busca e divisão em páginas.

## Aprendizados

- Implementação prática do padrão de arquitetura MVC a partir do zero
- Criação de um Front Controller e Router personalizado para fluxo HTTP
- Entendimento aprofundado do padrão Repository para injeção e abstração de dependências
- Autoloading de classes padronizado via Composer (PSR-4)
- Melhor separação de responsabilidades (SoC - Separation of Concerns)
- Organização avançada de Views e layouts reutilizáveis

---

**Status**: Projeto de Estudos Em Andamento
**Versão**: 2.0 - Arquitetura MVC com persistência em Sessão
**Última Atualização**: 2026
**Licença**: Aberta para fins educacionais
