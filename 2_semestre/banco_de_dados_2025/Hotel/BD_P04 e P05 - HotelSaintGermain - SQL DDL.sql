CREATE DATABASE HotelSaintGermain;
USE HotelSaintGermain;

CREATE TABLE Cliente (
	Id INT PRIMARY KEY AUTO_INCREMENT,
	Nome VARCHAR(100) NOT NULL,
	Sexo CHAR(1),
	DtaNasc DATE NOT NULL
);

CREATE TABLE ClienteBrasileiro (
	ClienteId INT PRIMARY KEY,
    Cpf NUMERIC(11) UNIQUE NOT NULL,
    Rg VARCHAR(15) UNIQUE NOT NULL,
    Rua VARCHAR(100) NOT NULL,
    Numero SMALLINT NOT NULL,
    Cidade VARCHAR(100) NOT NULL,
    Estado CHAR(2) NOT NULL,
    Cep NUMERIC(8) NOT NULL,
    FOREIGN KEY (ClienteId)
		REFERENCES Cliente(Id)
);

CREATE TABLE ClienteEstrangeiro (
	ClienteId INT PRIMARY KEY,
    Passaporte VARCHAR(20) UNIQUE NOT NULL,
    FOREIGN KEY (ClienteId)
		REFERENCES Cliente(Id)
);

CREATE TABLE Telefone (
	ClienteId INT,
    Numero NUMERIC(14),
    PRIMARY KEY (ClienteId, Numero),
    FOREIGN KEY (ClienteId)
		REFERENCES Cliente(Id)
);

CREATE TABLE Quarto (
	Numero SMALLINT PRIMARY KEY,
	Andar TINYINT NOT NULL,
	Tipo CHAR(2) NOT NULL,
	Descricao VARCHAR(200),
	VlrDiaria DECIMAL(7,2)
);

CREATE TABLE Reserva (
	Numero INT PRIMARY KEY AUTO_INCREMENT,
    ClienteId INT,
    QuartoNumero SMALLINT,
    Entrada DATETIME NOT NULL,
    Periodo TINYINT NOT NULL,
    FOREIGN KEY (ClienteId)
		REFERENCES Cliente(Id),
    FOREIGN KEY (QuartoNumero)
		REFERENCES Quarto(Numero)
);

CREATE TABLE Gerente (
	Matricula INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL
);

CREATE TABLE Aprovacao (
	ReservaNumero INT PRIMARY KEY,
    GerenteMatricula INT,
    DataHora DATETIME NOT NULL,
    FOREIGN KEY (ReservaNumero)
		REFERENCES Reserva(Numero),
    FOREIGN KEY (GerenteMatricula)
		REFERENCES Gerente(Matricula)
);

CREATE TABLE Ocupacao (
	ReservaNumero INT PRIMARY KEY,
    QuartoNumero SMALLINT,
	Entrada DATETIME NOT NULL,
    Saida DATETIME,
    FOREIGN KEY (ReservaNumero)
		REFERENCES Reserva(Numero),
    FOREIGN KEY (QuartoNumero)
		REFERENCES Quarto(Numero)
);

CREATE TABLE Restaurante (
	Id INT PRIMARY KEY AUTO_INCREMENT,
    Prato VARCHAR(200) NOT NULL,
    Preco DECIMAL(6,2)
);

CREATE TABLE OcupacaoRestaurante (
	ReservaNumero INT,
    RestauranteId INT,
    DataHora DATETIME NOT NULL,
    Quantidade TINYINT NOT NULL,
    PRIMARY KEY (ReservaNumero, RestauranteId, DataHora),
    FOREIGN KEY (ReservaNumero)
		REFERENCES Ocupacao(ReservaNumero),
    FOREIGN KEY (RestauranteId)
		REFERENCES Restaurante(Id)
);

CREATE TABLE Frigobar (
	Id INT PRIMARY KEY AUTO_INCREMENT,
    Item VARCHAR(200) NOT NULL,
    Preco DECIMAL(6,2)
);

CREATE TABLE OcupacaoFrigobar (
	ReservaNumero INT,
    FrigobarId INT,
    DataHora DATETIME NOT NULL,
    Quantidade TINYINT NOT NULL,
    PRIMARY KEY (ReservaNumero, FrigobarId, DataHora),
    FOREIGN KEY (ReservaNumero)
		REFERENCES Ocupacao(ReservaNumero),
    FOREIGN KEY (FrigobarId)
		REFERENCES Frigobar(Id)
);

CREATE TABLE Massagem (
	Id INT PRIMARY KEY AUTO_INCREMENT,
    Tipo VARCHAR(50) NOT NULL,
    Preco DECIMAL(6,2)
);

CREATE TABLE OcupacaoMassagem (
	ReservaNumero INT,
    MassagemId INT,
    DataHora DATETIME NOT NULL,
    Produtos VARCHAR(500),
    PRIMARY KEY (ReservaNumero, MassagemId, DataHora),
    FOREIGN KEY (ReservaNumero)
		REFERENCES Ocupacao(ReservaNumero),
    FOREIGN KEY (MassagemId)
		REFERENCES Massagem(Id)
);

CREATE TABLE TipoPagamento (
	Id TINYINT PRIMARY KEY AUTO_INCREMENT,
    Descricao VARCHAR(20) NOT NULL
);

CREATE TABLE PagamentoOcupacao(
	ReservaNumero INT PRIMARY KEY,
    TipoPagamentoId TINYINT,
    DataHora DATETIME NOT NULL,
    ValorTotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (ReservaNumero)
		REFERENCES Reserva(Numero),
	FOREIGN KEY (TipoPagamentoId)
		REFERENCES TipoPagamento(Id)
);
