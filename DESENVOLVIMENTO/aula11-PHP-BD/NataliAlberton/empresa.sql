create database EMPRESA;
use EMPRESA;

CREATE TABLE CLIENTE (
	pk_cli INT PRIMARY KEY auto_increment,
	cli_nome VARCHAR(50) not null,
    cli_endereco VARCHAR(80) not null,
    cli_telefone VARCHAR(20) not null,
    cli_email VARCHAR(50) not null
);

CREATE TABLE USUARIO (
	pk_user INT PRIMARY KEY auto_increment,
    user_nome VARCHAR(50) default null,
    user_usuario VARCHAR(10) default null,
    user_senha VARCHAR(32) default null,
    nivel INT default null
);

INSERT INTO CLIENTE (cli_nome, cli_endereco, cli_telefone, cli_email) VALUES
('João Silva', 'Rua das Flores, 123 - São Paulo/SP', '(11) 98765-4321', 'joao.silva@email.com'),
('Maria Oliveira', 'Av. Paulista, 1000 - São Paulo/SP', '(11) 91234-5678', 'maria.oliveira@email.com'),
('Carlos Souza', 'Rua XV de Novembro, 50 - Curitiba/PR', '(41) 99876-5432', 'carlos.souza@email.com'),
('Ana Pereira', 'Av. Brasil, 200 - Rio de Janeiro/RJ', '(21) 98765-1234', 'ana.pereira@email.com'),
('Pedro Costa', 'Rua da Praia, 300 - Florianópolis/SC', '(48) 91234-8765', 'pedro.costa@email.com');