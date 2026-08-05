USE HotelSaintGermain;

# Listar nome e sexo de todos os clientes por ordem alfabética
SELECT Nome, Sexo FROM Cliente ORDER BY Nome;

# Listar o cpf e o cep de todos os clientes brasileiros residentes em “Curitiba”
SELECT Cpf, Cep FROM ClienteBrasileiro WHERE Cidade = 'Curitiba';

# Listar o número de todos os quartos por ordem decrescente de andar e crescente de valor da diária
SELECT Numero FROM Quarto ORDER BY Andar DESC, VlrDiaria DESC;

# Listar o número de todos os quartos com valor da diária entre R$ 100 e R$ 150
SELECT Numero FROM Quarto WHERE VlrDiaria BETWEEN 100 AND 150;

# Listar todas as reservas de um determinado cliente (informar qualquer código válido)
# Nos exemplos DML do SaintGermain, ClienteId = 1 é um cliente válido: Evandro Zatti
SELECT * FROM Reserva WHERE	ClienteId = 1; 

# Listar, sem repetir, os números dos quartos que já foram ocupados algum dia
SELECT DISTINCT Numero FROM Quarto WHERE Numero IN (SELECT QuartoNumero FROM Ocupacao);

# Listar, sem repetir, o número das reservas que tiveram algum tipo de aprovação pelo gerente
SELECT DISTINCT Numero FROM Reserva WHERE Numero IN (SELECT ReservaNumero FROM Aprovacao);

# Listar, sem repetir, o número das reservas que fizeram uso do restaurante
SELECT DISTINCT ReservaNumero FROM OcupacaoRestaurante;

# Listar, sem repetir, as reservas que foram pagas em dinheiro.
# Nos exemplos DML do SaintGermain, TipoPagamentoId = 1 é: Dinheiro
SELECT DISTINCT ReservaNumero FROM PagamentoOcupacao WHERE TipoPagamentoId = 1;  # tipo 1 = Dinheiro
