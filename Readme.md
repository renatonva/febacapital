# O Projeto foi desenvolvido utilizando PHP puro, sem uso de Framework

## Descrição

Este projeto é uma API construída em PHP puro, por mais que o teste cite Yii2, já fazem 5 anos que não uso Yii2 e como em Laravel, poderiamos ter algum problema de lib ao baixar o projeto, optei por ser em PHP puro.
O projeto em si permite o cadastro de usuários, clientes e livros, além de realizar autenticação via JWT.

## O que é JWT
JWT (JSON Web Token) é um padrão aberto (RFC 7519) que define um formato compacto e auto-contido para a transmissão segura de informações entre partes como um objeto JSON.

## Funcionalidades

- **Autenticação via JWT**: Login e registro de usuários com token JWT.
- **Cadastro de Clientes**: API para criar e listar clientes.
- **Cadastro de Livros**: API para criar e listar livros.

## Requisitos

- **PHP** 7.0 ou superior
- **MySQL** 7 ou superior

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/renatonva/febacapital.git

2. Rode no terminal o comando composer install, mas certifique que o composer.json da raiz do projeto está de fato na pasta, nele que é instalada a lib para o jwt.

3. As tabelas abaixo são as utilizadas no projeto, com base no teste enviado

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    endereco TEXT,
    sexo CHAR(1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

4. O JWT precisa de uma cahve secreta, para gerar o hash, rode o comando openssl rand -base64 32 e depois cole na posição secret_key no array dentro de database/jwt.php

5. Se você utiliza o Insomnia, para testar siga os passos

Crie uma nova requisição POST.
Coloque a URL http://localhost:8000/auth.

No corpo da requisição, escolha o tipo JSON e insira o conteúdo:

{
  "username": "shawn",
  "password": "psych"
}
Envie a requisição.

2. Cadastro de Clientes (POST /clientes)

Método: POST
URL: http://localhost:8000/clientes

Headers:
Authorization: Bearer [seu_token] (copie o token gerado na autenticação)
Body (JSON):

{
  "nome": "Shawn Spencer",
  "cpf": "12345678901",
  "cep": "01001000"
}

Resposta Esperada
Código HTTP: 201


