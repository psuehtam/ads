USE HotelSaintGermain;

# Contar quantos clientes existem no hotel;
SELECT COUNT(*) TotClientes FROM Cliente;

# Listar os clientes do hotel, contando quantos telefones cada cliente possui;
SELECT C.Nome, COUNT(*) TotTelefones
FROM Cliente C
	INNER JOIN Telefone T
	ON T.ClienteId = C.Id
GROUP BY C.Nome;

# Listar o estado e o nome das cidades dos clientes do hotel, contando quantos clientes há em cada cidade;
SELECT Estado, Cidade, COUNT(*) TotClientes
FROM ClienteBrasileiro
GROUP BY Estado, Cidade;

# Listar quantos quartos existem no hotel, agrupando por andar;
SELECT Andar, COUNT(*) TotQuartos
FROM Quarto
GROUP BY Andar;

# Apresentar o valor médio das diárias dos quartos do hotel;
SELECT AVG(VlrDiaria) MedDiarias
FROM Quarto;

# Listar o valor médio das diárias dos quartos do hotel, agrupando por andar;
SELECT Andar, AVG(VlrDiaria) MedDiarias
FROM Quarto
GROUP BY Andar;

# Listar o tipo de quarto e a quantidade de quartos de cada tipo;
SELECT Tipo, COUNT(*) TotQuartos
FROM Quarto
GROUP BY Tipo;

# Listar o valor médio das diárias dos quartos do hotel, agrupando por tipo;
SELECT Tipo, AVG(VlrDiaria) MedDiarias
FROM Quarto
GROUP BY Tipo;

# Contar quantas reservas foram feitas no último ano;
SELECT COUNT(*) TotReservas
FROM Reserva
WHERE Entrada >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR);

# Listar a data de entrada e a quantidade de ocupações no último ano, agrupado pela data de entrada;
SELECT Entrada, COUNT(*) TotOcupacoes
FROM Ocupacao
WHERE Entrada >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
GROUP BY Entrada;

# Listar a data de saída e o valor total das ocupações, agrupado pela data de saída;
SELECT O.Saida, SUM(ValorTotal) VlrTotalOcupacoes
FROM Ocupacao O
INNER JOIN PagamentoOcupacao PO
	ON PO.ReservaNumero = O.ReservaNumero
GROUP BY O.Saida;

# Apresentar o valor médio dos pratos do restaurante;
SELECT AVG(Preco) VlrMedio FROM Restaurante;

# Apresentar o valor total pago em ocupações no ano atual;
SELECT SUM(ValorTotal) VlrTotalPago
FROM PagamentoOcupacao
WHERE YEAR(DataHora) = YEAR(CURDATE());

# Listar o número da reserva e o valor total consumido em restaurante por cada reserva;
SELECT OcuRes.ReservaNumero, SUM(R.Preco) VlrTotalConsumido
FROM OcupacaoRestaurante OcuRes
INNER JOIN Restaurante R
	ON OcuRes.RestauranteId = R.Id
GROUP BY OcuRes.ReservaNumero;

# Listar os pagamentos do último ano e o valor total pago, agrupados por tipo de pagamento;
SELECT TipoPagamentoId, SUM(ValorTotal) VlrTotalPago
FROM PagamentoOcupacao
WHERE DATE(DataHora) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
GROUP BY TipoPagamentoId;

# Listar o tipo de pagamento e a quantidade de reservas pagas no mês atual, agrupando pelo tipo de pagamento.
SELECT TipoPagamentoId, COUNT(*) TotReservasPagas
FROM PagamentoOcupacao
WHERE YEAR(DataHora) = YEAR(CURDATE())
	AND MONTH(DataHora) = MONTH(CURDATE())
GROUP BY TipoPagamentoId;

# Listar o menor valor pago em ocupações referentes ao mês passado;
SELECT MIN(ValorTotal) MenorValorPago
FROM PagamentoOcupacao
WHERE YEAR(DataHora) = YEAR(CURDATE() - INTERVAL 1 MONTH)
    AND MONTH(DataHora) = MONTH(CURDATE() - INTERVAL 1 MONTH);

# Listar o maior valor pago em ocupações no ano corrente.
SELECT MAX(ValorTotal) MaiorValorPago
FROM PagamentoOcupacao
WHERE YEAR(DataHora) = YEAR(CURDATE());
