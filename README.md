<h1 align="center"> Mural de Oportunidades de Estágio - MOE</h1>

<h2 align="center">Trabalho da disciplina de Projeto de Software - Professor Cássio Leonardo</h2>
<h2 align="center"> Alunos: <a href="https://github.com/wesleyrodriguessantos">Wesley Rodrigues</a> e <a href="https://github.com/ArlleyMatheus">Arlley Matheus</a></h2>
<hr>
<h2 align="center">Descrição</h2>

<p align="center">O Mural de Oportunidades de Estágio (MOE) é um sistema web no qual empresas
podem publicar anúncios de contração de estagiários. Adicionalmente, alunos
podem se cadastrar no sistema como disponíveis para contratação. Assim, as
empresas podem consultar se há alunos com o perfil desejado disponíveis no MOE
e alunos podem consultar se há vagas disponíveis nas empresas participantes do
MOE.</p>

<h3 align="center">"Habilitadores Tecnológicos" e Tecnologias usadas nesse projeto:</h3>

- [x] Framework CodeIgniter
- [x] Xampp
- [x] MySQL
- [x] PHP
- [x] HTML
- [x] CSS
- [x] Framework Materialize
- [x] Javascript
- [x] JQuery
- [x] phpMyAdmin

<h3 align="center">Execute o script abaixo para criar o banco de dados</h3>
<pre>
USE moe;
CREATE TABLE IF NOT EXISTS estagiario
(
id_estagiario INT AUTO_INCREMENT PRIMARY KEY,
nome_estagiario VARCHAR(80) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL,
senha VARCHAR(255),
curso_estagiario VARCHAR(80) NOT NULL,
ano_ingresso_estagiario YEAR NOT NULL,
minicurriculo_estagiario TEXT,
status_estagiario CHAR DEFAULT '1',
tipo_usuario CHAR DEFAULT '1'
);

CREATE TABLE IF NOT EXISTS empregador
(
id_empregador INT AUTO_INCREMENT PRIMARY KEY,
nome_empresa VARCHAR(60) UNIQUE NOT NULL,
endereco_empresa VARCHAR(80) NOT NULL,
email VARCHAR(100) UNIQUE NOT NULL,
senha VARCHAR(255) NOT NULL,
pessoa_de_contato VARCHAR(60) NOT NULL,
descricao_empresa TEXT,
produtos_empresa VARCHAR(220),
status_empregador CHAR(1) DEFAULT '1',
tipo_usuario CHAR DEFAULT '2'
);

CREATE TABLE IF NOT EXISTS vagas
(
id_vaga INT AUTO_INCREMENT PRIMARY KEY,
nome_vaga VARCHAR(80) NOT NULL,
lista_atividades TEXT NOT NULL,
semestre CHAR(1) NOT NULL,
lista_habilidades TEXT NOT NULL,
descricao_vaga TEXT  NOT NULL,
horas VARCHAR(2),
remuneracao VARCHAR(10),
id_empregadorVaga INT NOT NULL,
CONSTRAINT fk_empregador FOREIGN KEY (id_empregadorVaga) REFERENCES empregador (id_empregador)
);
  </pre>