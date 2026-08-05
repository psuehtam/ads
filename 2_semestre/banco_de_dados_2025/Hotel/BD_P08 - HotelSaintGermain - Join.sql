USE HotelSaintGermain;

# Listar, em ordem alfabética, o nome de todos os clientes e a data de entrada de suas reservas
SELECT C.Nome, R.Entrada
FROM Cliente C INNER JOIN Reserva R
	ON R.ClienteId = C.Id
ORDER BY C.Nome;

# Listar o nome e o cpf de todos os clientes brasileiros
SELECT C.Nome, CB.CPF
FROM Cliente C
INNER JOIN ClienteBrasileiro CB
	ON CB.ClienteId = C.Id;

# Listar o nome e o passaporte de todos os clientes estrangeiros
SELECT C.Nome, CE.Passaporte
FROM Cliente C
INNER JOIN ClienteEstrangeiro CE
	ON CE.ClienteId = C.Id;

# Listar o número da reserva e o nome do gerente de todas as reservas aprovadas
SELECT R.Numero, G.Nome
FROM Reserva R
INNER JOIN Aprovacao A
	ON A.ReservaNumero = R.Numero
INNER JOIN Gerente G
	ON G.Matricula = A.GerenteMatricula;

# Listar o número da reserva, a descrição e o valor dos pratos consumidos por todas as ocupações
SELECT O.ReservaNumero, R.Prato, R.Preco
FROM Ocupacao O
INNER JOIN OcupacaoRestaurante OcuRes -- não podemos abreviar como OR porque OR é palavra reservada (operador lógico "OU")
	ON OcuRes.ReservaNumero = O.ReservaNumero
INNER JOIN Restaurante R 
	ON R.Id = OcuRes.RestauranteId;

# Listar o nome do cliente e o tipo de pagamento de todas as ocupações pagas
SELECT DISTINCT C.Nome, TP.Descricao
FROM PagamentoOcupacao PO
INNER JOIN Ocupacao O
	ON PO.ReservaNumero = O.ReservaNumero
INNER JOIN Reserva R
	ON R.Numero = O.ReservaNumero
INNER JOIN Cliente C
	ON C.Id = R.ClienteId
INNER JOIN TipoPagamento TP
	ON TP.Id = PO.TipoPagamentoId;

# Listar o nome do cliente e os produtos utilizados nas massagens dos clientes que ficaram hospedados no último ano
SELECT C.Nome, OM.Produtos
FROM Cliente C
INNER JOIN Reserva R
	ON R.ClienteId = C.Id
INNER JOIN Ocupacao O
	ON O.ReservaNumero = R.Numero
INNER JOIN OcupacaoMassagem OM
	ON OM.ReservaNumero = O.ReservaNumero
WHERE O.Entrada >= DATE_SUB(NOW(), INTERVAL 1 YEAR);

# Listar o nome do cliente, a data de nascimento e o andar do quarto em que ficaram hospedados os clientes nos últimos três meses
SELECT C.Nome, C.DtaNasc, Q.Andar
FROM Cliente C
INNER JOIN Reserva R
	ON R.ClienteId = C.Id
INNER JOIN Ocupacao O
	ON O.ReservaNumero = R.Numero
INNER JOIN Quarto Q
	ON Q.Numero = O.QuartoNumero
WHERE O.Entrada >= DATE_SUB(NOW(), INTERVAL 3 MONTH);

# Listar o estado, o nome da cidade e o nome do cliente, para os clientes que se hospedaram nos últimos cinco anos
SELECT CB.Estado, CB.Cidade, C.Nome
FROM Cliente C
INNER JOIN ClienteBrasileiro CB
	ON CB.ClienteId = C.Id
INNER JOIN Reserva R
	ON R.ClienteId = C.Id
INNER JOIN Ocupacao O
	ON O.ReservaNumero = R.Numero
WHERE R.Entrada >= DATE_SUB(NOW(), INTERVAL 5 YEAR);

# Listar o nome do cliente, a data prevista para entrada (reservada), a data e saída da hospedagem (ocupação), o andar e o número do quarto de todos os clientes que se hospedaram no hotel no ano corrente
SELECT C.Nome, R.Entrada, O.Saida, Q.Andar, Q.Numero
FROM Cliente C
INNER JOIN Reserva R
	ON R.ClienteId = C.Id
INNER JOIN Ocupacao O
	ON O.ReservaNumero = R.Numero
INNER JOIN Quarto Q
	ON Q.Numero = O.QuartoNumero
WHERE YEAR(O.Entrada) = YEAR(NOW())
	OR YEAR(O.Saida) = YEAR(NOW());