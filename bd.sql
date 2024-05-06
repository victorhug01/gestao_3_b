DROP DATABASE gestao_3b;
-- criando a base de dados
CREATE DATABASE gestao_3b;


-- colocamos a base em uso
USE gestao_3b;

CREATE table usuarios(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nomeCompleto VARCHAR(200) NOT NULL,
	login VARCHAR(100) NOT NULL,
	senha VARCHAR(32) NOT NULL,
	nivel INT NOT NULL,
	telefone VARCHAR(18) NOT NULL,
	dataCriacao TIMESTAMP DEFAULT NOW(),
	dataAlteracao TIMESTAMP NULL
);
