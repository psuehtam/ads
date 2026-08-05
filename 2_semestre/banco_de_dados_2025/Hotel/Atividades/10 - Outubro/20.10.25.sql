select Count(*) TotalClientes FROM Cliente;

select ClienteId, Count(*) TotalClientesComTelefone FROM Telefone GROUP BY ClienteId;

select Estado, Cidade, Count(*) TotalPorCidade FROM clientebrasileiro GROUP BY Cidade, Estado;

select Andar, Count(*) TotalQuartoAndar FROM QUARTO GROUP BY Andar;

select avg(VlrDiaria) VlrMedio FROM QUARTO;

select Andar, avg(VlrDiaria) VlrMedio FROM QUARTO GROUP BY Andar;

select Tipo, Count(*) QtdTipo FROM quarto group by tipo;

select tIpo, avg(VlrDiaria) VlrMedio FROM QUARTO GROUP BY Tipo;


