-- 1. Criar a base de dados para o esquema e deixá-la pronta para uso. (valor: 0,1 pt)
CREATE DATABASE Estacionamento;
USE Estacionamento;

-- 2. Criar a estrutura do esquema, com as tabelas (considerando o uso adequado dos data types do MySQL para os 
-- campos), implementando devidamente as restrições (constraints). (valor: 1,0 pt)
CREATE TABLE Marca(
Id INT PRIMARY KEY AUTO_INCREMENT,
Nome VARCHAR(50) NOT NULL
);

CREATE TABLE Carro(
Placa VARCHAR(7) PRIMARY KEY,
MarcaId INT NOT NULL,
Descricao VARCHAR(50) NOT NULL,
FOREIGN KEY (MarcaId) REFERENCES Marca(Id)
);

CREATE TABLE Permanencia(
Id INT PRIMARY KEY AUTO_INCREMENT,
CarroPlaca VARCHAR(7) NOT NULL,
Entrada DATETIME NOT NULL,
Saida DATETIME NOT NULL,
ValorPago DECIMAL(10,2) NOT NULL,
FOREIGN KEY (CarroPlaca) REFERENCES Carro(Placa)
);

-- 3. Inserir os seguintes registros nas respectivas tabelas: (valor: 0,5 pt)
INSERT INTO Marca (Id, Nome)
VALUES 
(1,'FIAT'), 
(2, 'Volkswagen');

INSERT INTO Carro (Placa, MarcaId, Descricao)
VALUES 
('ABC1234', 1, 'Argo'),
('DEF5678', 1, 'Palio'),
('GHI4321', 2, 'Gol'),
('JKL9999', 2, 'Polo');

INSERT INTO Permanencia (CarroPlaca, Entrada, Saida, ValorPago)
VALUES
('ABC1234', '2022-10-14 12:00', '2022-10-14 12:50', 11.00),
('DEF5678', '2022-10-14 09:00', '2022-10-14 10:00', 11.00),
('GHI4321', '2023-10-14 08:30', '2023-10-14 18:00', 20.00),
('GHI4321', '2023-10-16 08:40', '2023-10-16 18:15', 20.00),
('DEF5678', '2023-10-20 09:30', '2023-10-20 10:30', 12.00),
('ABC1234', '2023-11-20 12:10', '2023-11-20 13:00', 12.00);



-- 4. Alterar a marca do carro Polo de Volkswagen para FIAT. (valor: 0,2 pt)
UPDATE Carro SET MarcaId = 1 WHERE Descricao = 'Polo';


-- 5. Listar todos os dados de todos os carros cadastrados. (valor: 0,3 pt)
SELECT * FROM Carro;


-- 6. Listar a descrição e a placa de todos os carros, ordenando pela de descrição. (valor: 0,5 pt)
SELECT Placa, Descricao FROM Carro
ORDER BY Descricao;


-- 7. Listar a marca, a descrição e a placa dos carros. (valor: 0,6 pt)
SELECT M.Nome AS Marca, C.Descricao, C.Placa FROM Carro C
JOIN Marca M ON C.MarcaId = M.Id;

-- 8. Listar a placa dos carros que não tiveram nenhuma permanência. (valor: 0,5 pt)

SELECT C.Placa
FROM Carro C
LEFT JOIN Permanencia P ON C.Placa = P.CarroPlaca
WHERE P.Id IS NULL;


-- 9. Listar a descrição e a placa de cada carro, contando quantas vezes (alias: Quantas) o carro permaneceu no 
-- estacionamento. (valor: 0,6 pt)

SELECT C. Placa, C. Descricao,
COUNT(P.Id) AS Quantas
FROM Carro C
LEFT JOIN Permanencia P ON C.Placa = P.CarroPlaca
GROUP BY C.Placa, C.Descricao;



-- 10. Listar o ano de permanência (considerando a entrada) e a soma dos valores pagos (alias: TotalPago), agrupando 
-- pelo ano de permanência. (valor: 0,7 pt)

SELECT 
YEAR (Entrada) AS Ano,
sum(ValorPago) AS TotalPago

FROM Permanencia
GROUP BY YEAR (Entrada)
ORDER BY Ano;

