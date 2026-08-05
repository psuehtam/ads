USE HotelSaintGermain;

# Altere a data de entrada de todas as reservas para a data atual
UPDATE Reserva SET Entrada = NOW();

# Postergue a data de entrada de todas as reservas em um mês
UPDATE Reserva SET Entrada = DATE_ADD(Entrada, INTERVAL 1 MONTH);

# Altere a cidade, de todos os clientes brasileiros, para “Curitiba”
UPDATE ClienteBrasileiro SET Cidade = 'Curitiba';

# Altere o estado, dos clientes residentes em “Curitiba”, para “PR”
UPDATE ClienteBrasileiro SET Estado = 'PR' WHERE Cidade = 'Curitiba';

# Altere para “ND” (não definido) os estados dos clientes que estão sem valor (estão nulos ou com sequência de caracteres em branco)
UPDATE ClienteBrasileiro SET Estado = 'ND' WHERE Estado = '' OR Estado IS NULL;

# Aplique um acréscimo de 15% nas diárias dos quartos acima do 3º andar
UPDATE Quarto SET VlrDiaria = VlrDiaria * 1.15 WHERE Andar > 3;

# Baixe para 40% o valor das diárias dos quartos que já não são mais ocupados há 2 anos
UPDATE Quarto SET VlrDiaria = VlrDiaria * 0.4 WHERE Numero NOT IN
	(SELECT QuartoNumero FROM Ocupacao WHERE Saida >= DATE_SUB(NOW(), INTERVAL 2 YEAR));

# Coloque a data e hora atuais como saída de todas as ocupações
UPDATE Ocupacao SET Saida = NOW();

# Exclua todas as reservas que estejam sem ocupação
DELETE FROM Reserva WHERE Numero NOT IN
	(SELECT DISTINCT ReservaNumero FROM Ocupacao);

# Exclua os quartos que nunca foram ocupados
DELETE FROM Quarto WHERE Numero NOT IN
	(SELECT QuartoNumero FROM Ocupacao); 

# Exclua todos os consumos de restaurante, frigobar e massagem anteriores ao ano de 2015
DELETE FROM OcupacaoRestaurante WHERE YEAR(DataHora) < 2015;
DELETE FROM OcupacaoFrigobar WHERE YEAR(DataHora) < 2015;
DELETE FROM OcupacaoMassagem WHERE YEAR(DataHora) < 2015;
