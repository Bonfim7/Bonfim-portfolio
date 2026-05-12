# Portfólio Profissional - Giovani Bonfim

Este é um sistema de portfólio completo desenvolvido com **Laravel 13**, focado em um visual corporativo, moderno e elegante. O sistema possui uma área pública para exibição de perfil, experiências e projetos, além de um painel administrativo para gerenciamento dinâmico de conteúdo.

## 🚀 Tecnologias Utilizadas

- **Back-end:** Laravel 13, PHP 8.3
- **Banco de Dados:** MySQL (configurável) / SQLite (padrão p/ testes)
- **Front-end:** Blade, Tailwind CSS (via CDN), JavaScript
- **Gráficos:** Chart.js
- **Notificações:** SweetAlert2
- **Ícones:** FontAwesome 6

## 🛠️ Funcionalidades

### Área Pública
- **Home:** Apresentação profissional com animações suaves.
- **Sobre Mim:** Detalhamento da trajetória e transição de carreira.
- **Tecnologias:** Listagem de skills com níveis de domínio e categorias.
- **Experiências:** Timeline profissional elegante.
- **Projetos:** Grid de projetos com tecnologias utilizadas e links externos.

### Painel Administrativo
- **Dashboard:** Estatísticas gerais e gráficos de tecnologias.
- **Gerenciamento de Projetos:** CRUD completo com upload de imagens e associação de tecnologias.
- **Autenticação:** Proteção de rotas para acesso restrito.

## 📦 Instalação

1. Clone o repositório ou extraia os arquivos.
2. No diretório raiz, execute:
   ```bash
   composer install
   ```
3. Configure o arquivo `.env` (exemplo fornecido para SQLite e MySQL).
4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```
5. Execute as migrações e popule o banco:
   ```bash
   php artisan migrate --seed
   ```
6. Crie o link simbólico para o storage de imagens:
   ```bash
   php artisan storage:link
   ```
7. Inicie o servidor local:
   ```bash
   php artisan serve
   ```

## 🔐 Acesso Administrativo

- **URL:** `/login`
- **E-mail:** `admin@portfolio.com`
- **Senha:** `123456`

## 🎨 Design

O projeto utiliza um **Tema Dark Moderno** com as seguintes características:
- Paleta de cores: Slate, Blue e Purple.
- Efeitos de "Glassmorphism" em componentes-chave.
- Tipografia limpa (Inter).
- Design 100% responsivo.

---
Desenvolvido por **Giovani Bonfim**
