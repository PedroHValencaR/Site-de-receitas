# 🥘 Receitas+

> Uma aplicação web dinâmica para explorar receitas regionais e internacionais, desenvolvida como projeto acadêmico para prática de desenvolvimento Full Stack.

![Status do Projeto](https://img.shields.io/badge/Status-Concluído-green)
![PHP](https://img.shields.io/badge/Backend-PHP-blue)
![MySQL](https://img.shields.io/badge/Database-MySQL-orange)

## 📝 Sobre o Projeto

O **Receitas+** é um site de receitas que consome dados dinamicamente de um banco de dados relacional. O projeto foca na aplicação de conceitos fundamentais de desenvolvimento web, incluindo HTML5 Semântico, CSS3 Moderno, Interatividade com JavaScript e manipulação de dados com PHP e SQL.

O site apresenta receitas divididas em categorias (Mais Vistas, Recentes e Regionais), permite busca externa (Wikipedia) e possui uma simulação de sistema de login.

## 🚀 Tecnologias Utilizadas

* **Front-end:**
    * HTML5 (Tags Semânticas)
    * CSS3 (Flexbox, Grid Layout, Design Responsivo)
    * JavaScript (Validação de formulários e interatividade)
    * FontAwesome (Ícones)
* **Back-end:**
    * PHP 7/8 (Uso da classe PDO para segurança)
* **Banco de Dados:**
    * MySQL (Armazenamento das receitas e links)
* **Ambiente de Desenvolvimento:**
    * XAMPP (Apache Server + MySQL)

## ✨ Funcionalidades

* **Carregamento Dinâmico:** As receitas (título, descrição, imagem e links) são carregadas diretamente do banco de dados MySQL.
* **Links Externos:** Integração com artigos da Wikipedia para aprofundamento sobre os pratos.
* **Barra de Pesquisa:** Funcionalidade de busca integrada com a Wikipedia.
* **Página "Quem Somos":** Listagem estilizada da equipe de desenvolvimento.
* **Validação de Login:** Script JS para simular validação de acesso (Front-end).
* **Conformidade:** Estrutura preparada para SEO e menções à LGPD no rodapé.

## 📂 Estrutura do Projeto

```text
receitas_plus/
│
├── assets/
│   └── image/          # Imagens das receitas e background
├── css/
│   ├── main.css        # Estilos globais e reset
│   ├── home.css        # Estilos específicos da Home
│   └── bar.css         # Estilos da barra de navegação
├── js/
│   └── script.js       # Lógica de validação do login
├── index.php           # Página principal (Lógica PHP + HTML)
├── lista.html          # Página "Quem Somos"
└── README.md           # Documentação do projeto
🛠️ Como Rodar o Projeto Localmente
Pré-requisitos
Ter o XAMPP instalado.

Passo a Passo
Clone ou Baixe o projeto: Coloque a pasta do projeto (ex: receitas_plus) dentro do diretório do servidor: C:\xampp\htdocs\receitas_plus

Inicie o Servidor: Abra o XAMPP Control Panel e inicie os serviços Apache e MySQL (clique em "Start").

Configure o Banco de Dados:

Acesse http://localhost/phpmyadmin no seu navegador.

Vá na aba SQL e execute o script de criação (disponível abaixo ou no arquivo do projeto).

<details> <summary>Clique para ver o SQL de Criação</summary>

SQL

CREATE DATABASE IF NOT EXISTS receitas_db;
USE receitas_db;

CREATE TABLE IF NOT EXISTS receitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    categoria VARCHAR(50),
    link VARCHAR(255)
);

-- Insira os dados (exemplo resumido)
INSERT INTO receitas (titulo, descricao, imagem, categoria, link) VALUES 
('Arroz com Pequi', 'Prato do cerrado...', './assets/image/arroz-com-pequi.jpg', 'regionais', '[https://pt.wikipedia.org/wiki/Arroz_com_pequi](https://pt.wikipedia.org/wiki/Arroz_com_pequi)');
</details>

Acesse o Site: Abra o navegador e digite: http://localhost/receitas_plus/index.php

⚠️ Solução de Problemas (Porta do MySQL)
Se o seu MySQL não estiver rodando na porta padrão 3306 (e sim na 3307, por exemplo), edite o arquivo index.php:

PHP

// Mude de:
$host = 'localhost';
// Para:
$host = 'localhost:3307';
👥 Equipe de Desenvolvimento
Projeto desenvolvido pelos integrantes:

Pedro H. Valença

Cainã Carmo

Luciano Andrade

Maiara Barbosa

Tayane Araujo
