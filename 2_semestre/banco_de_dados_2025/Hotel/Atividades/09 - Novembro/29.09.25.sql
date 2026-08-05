SELECT ReservaNumero
FROM ocupacao
WHERE QuartoNumero IN 
	(SELECT Numero
    FROM Quarto
    WHERE Andar = 5);
    #aqui ele pega por ordem o numero da reserva dos quartos que estão no 5º andar

SELECT Numero
FROM Quarto 
WHERE Numero IN 
	(SELECT QuartoNumero
    FROM ocupacao
    WHERE Entrada <= CURDATE()
	AND(Saida > CURDATE() OR Saida IS NULL));
    #pega os dados de qm ta ocupado hj
  
  
  #exercicio 1
UPDATE Reserva 
SET Entrada = curdate() 
WHERE Entrada <= curdate();

SELECT Numero, ClienteId, QuartoNumero, Entrada, Periodo FROM reserva;


#exercicio 2
UPDATE Reserva
SET Entrada = DATE_ADD(Entrada, INTERVAL 1 MONTH)
WHERE Entrada <= CURDATE();

SELECT Numero, ClienteId, QuartoNumero, Entrada, Periodo FROM reserva;


#exercicio 3
UPDATE clientebrasileiro
SET Cidade = 'Curitiba';

SELECT ClienteId, Cpf, Rg, Rua, Numero, Cidade, Estado, Cep FROM clientebrasileiro;
    
    
#exercicio 4    
UPDATE clientebrasileiro
SET Estado = 'PR';

SELECT ClienteId, Cpf, Rg, Rua, Numero, Cidade, Estado, Cep FROM clientebrasileiro;

#exercicio 5
UPDATE clientebrasileiro
SET Estado = 'ND'
WHERE estado = NULL;


#exercicio 6
UPDATE Quarto
SET VlrDiaria = VlrDiaria * 1.15
WHERE Andar > 3;

SELECT Numero, Andar, Tipo, Descricao, VlrDiaria FROM quarto;


#exercicio 7
UPDATE Quarto
SET VlrDiaria = VlrDiaria * 0.4
WHERE Numero in 
	(select QuartoNumero
	from ocupacao
	where saida < DATE_SUB(CURDATE(), INTERVAL 2 YEAR));


SELECT Numero, Andar, Tipo, Descricao, VlrDiaria from quarto;


#exercicio 8
UPDATE ocupacao
SET Saida = NOW();

SELECT ReservaNumero, QuartoNumero, Entrada, Saida FROM ocupacao;


#exercicio 9
DELETE FROM ocupacao
WHERE entrada = NULL;


#exercicio 10
DELETE FROM Quarto
WHERE Numero NOT IN
(SELECT QuartoNumero
	FROM Ocupacao);
    

#exercicio 11
DELETE FROM ocupacaofrigobar WHERE DataHora < '2015-01-01';
DELETE FROM ocupacaomassagem WHERE DataHora < '2015-01-01';
DELETE FROM ocupacaorestaurante WHERE DataHora < '2015-01-01';

SELECT * FROM ocupacaofrigobar;
SELECT * FROM ocupacaomassagem;
SELECT * FROM ocupacaorestaurante;

