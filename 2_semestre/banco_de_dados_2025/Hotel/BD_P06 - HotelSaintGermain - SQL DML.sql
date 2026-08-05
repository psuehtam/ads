USE HotelSaintGermain;

# Inserir pelo menos 5 registros em cada tabela
# (começando pelas tabelas de entidades básicas e depois as tabelas de associação, garantindo a integridade referencial)

INSERT INTO Cliente
(Nome, Sexo, DtaNasc)
VALUES
('Evandro Alberto Zatti','M','1976-01-22'),
('Augusta Ada Byron King','F','1815-12-10'),
('Charles Babbage','M','1791-12-26'),
('Dennis MacAlistair Ritchie','M','1941-09-09'),
('Cesare Mansueto Giulio Lattes','M','1924-07-11'),
('Ayrton Senna da Silva','M','1960-03-21'),
('Grace Murray Hopper','F','1906-12-09'),
('Francisca Edviges Neves Gonzaga','F','1847-10-17'),
('Alan Mathison Turing','M','1912-06-23'),
('Oswaldo Cruz','M','1872-08-05');

INSERT INTO ClienteBrasileiro 
(ClienteId, Cpf, Rg, Rua, Numero, Cidade, Estado, Cep)
VALUES
(1, 03030698998, '1.123.456-7', 'Rua XV de Novembro', 123, 'Curitiba', 'PR', 82500000),
(5, 12345678900, '7.654.321-0', 'Av. Visconde de Guarapuava', 456, 'Curitiba', 'PR', 82500000),
(6, 98765432111, '2.233.445-5', 'Rua Doutor Fernandes Coelho', 85, 'São Paulo', 'SP', 05423040),
(8, 11223344556, '1.122.334-4', 'Rua Morais e Vale', 1234, 'Rio de Janeiro', 'RJ', 20021260),
(10, 9786746321, '3.456.789-0', 'Rua Treze de Maio', 1815, 'São Luiz do Paraitinga', 'SP', 12140000);

INSERT INTO ClienteEstrangeiro
(ClienteId, Passaporte)
VALUES
(2, 'UK 1234 LHR'),
(3, 'UK 5678 LHR'),
(4, 'US 4321 JFK'),
(7, 'US 8765 JFK'),
(9, 'UK 9090 LHR');

INSERT INTO Telefone
(ClienteId, Numero)
VALUES
(1, 5541999956222),
(1, 554133173214),
(2, 442071234567),
(2, 442078909876),
(7, 014081234567);

INSERT INTO Quarto
(Numero, Andar, Tipo, Descricao, VlrDiaria)
VALUES
(11, 1, 'CL', 'Casal, luxo, janela', 300),
(12, 1, 'SS', 'Solteiro, standard, corredor', 150),
(13, 1, 'SL', 'Solteiro, luxo, corredor', 200),
(14, 1, 'SL', 'Solteiro, luxo, janela', 250),
(51, 5, 'CL', 'Casal, luxo, janela', 400),
(52, 5, 'SS', 'Solteiro, standard, corredor', 200),
(53, 5, 'SL', 'Solteiro, luxo, corredor', 250),
(54, 5, 'SL', 'Solteiro, luxo, janela', 300);

INSERT INTO Reserva 
(ClienteId, QuartoNumero, Entrada, Periodo)
VALUES
(1, 53, '2024-12-20', 7),
(1, 54, '2024-12-31', 5),
(2, 11, '2024-12-20', 7),
(2, 51, '2024-12-31', 3),
(7, 12, '2024-12-20', 15);

INSERT INTO Gerente
(Nome)
VALUES
('Chico Buarque'),
('Elis Regina'),
('Gal Costa'),
('Tom Jobim'),
('Gusttavo Lima');

INSERT INTO Aprovacao
(ReservaNumero, GerenteMatricula, DataHora)
VALUES
(1, 1, NOW()),
(2, 2, NOW()),
(3, 3, NOW()),
(4, 4, NOW()),
(5, 5, NOW());

INSERT INTO Ocupacao
(ReservaNumero, QuartoNumero, Entrada, Saida)
VALUES
(1, 53, '2024-12-20', '2024-12-26'),
(2, 54, '2024-12-31', '2025-01-04'),
(3, 11, '2024-12-20', '2024-12-30'),
(4, 51, '2024-12-31', '2025-01-02'),
(5, 12, '2024-12-20', '2025-01-05');

INSERT INTO Restaurante
(Prato, Preco)
VALUES
('Batata Frita', 20.00),
('Arroz', 10.00),
('Feijão', 12.00),
('Alcatra grelhado', 25.00),
('Frango frito', 15.00);

INSERT INTO OcupacaoRestaurante
(ReservaNumero, RestauranteId, DataHora, Quantidade)
VALUES
(1, 1, '2024-12-20 12:01:00', 1),
(1, 2, '2024-12-20 12:01:05', 1),
(1, 3, '2024-12-20 12:01:20', 1),
(3, 1, '2024-12-22 13:15:00', 2),
(5, 1, '2024-12-25 15:00:00', 1);

INSERT INTO Frigobar
(Item, Preco)
VALUES
('Água mineral', 8.50),
('Coca-cola', 10.00),
('Guaraná', 9.00),
('Chocolate', 12.50),
('Vinho', 50.00);

INSERT INTO OcupacaoFrigobar
(ReservaNumero, FrigobarId, DataHora, Quantidade)
VALUES
(1, 2, '2024-12-20 12:01:30', 1),
(2, 1, '2024-12-31 12:00:00', 1),
(2, 5, '2024-12-31 22:30:00', 5),
(3, 3, '2024-12-22 13:16:00', 1),
(5, 4, '2024-12-25 18:00:00', 2);

INSERT INTO Massagem
(Tipo, Preco)
VALUES
('Quick massage - 15 min', 50.00),
('Relaxante - 1 hora', 100.00),
('Relaxante - 1h30m', 130.00),
('Modeladora - 1 hora', 150.00),
('Reflexologia - 1 hora', 120.00);

INSERT INTO OcupacaoMassagem
(ReservaNumero, MassagemId, DataHora, Produtos)
VALUES
(1, 2, '2024-12-20 14:00:00', 'Toalha; creme; aroma ambiente'),
(2, 2, '2024-12-31 14:00:00', 'Toalha; creme'),
(2, 1, '2024-12-31 14:30:00', 'Toalha; creme'),
(3, 5, '2024-12-22 14:36:00', 'Toalha; óleo'),
(5, 3, '2024-12-25 16:00:00', 'Toalha; creme; aroma ambiente');

INSERT INTO TipoPagamento
(Descricao)
VALUES
('Dinheiro (espécie)'),
('Débito'),
('Crédito'),
('Pix'),
('PayPal');

INSERT INTO PagamentoOcupacao
(ReservaNumero, TipoPagamentoId, DataHora, ValorTotal)
VALUES
(1, 2, '2024-12-26 13:00:00', 4050.00),
(2, 2, '2025-01-04 12:30:00', 2500.00),
(3, 3, '2024-12-30 13:30:00', 6080.00),
(4, 3, '2025-01-02 12:00:00', 3200.00),
(5, 5, '2025-01-05 12:30:00', 5680.00);
