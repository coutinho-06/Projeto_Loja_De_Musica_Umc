#CRIANDO O BANCO DE DADOS

create database groovesound;

#USANDO O BANCO DE DADOS
use groovesound;

#APAGAGANDO O BANCO DE DADOS
#drop database groovesound;

#CRIANDO, ALTERANDO E APAGANDO TABELAS
create table categoria (
	id_categoria int primary key auto_increment,
    categoria varchar(50)
);
#drop table categoria;

create table instrumento (
	id_instrumento int primary key auto_increment,
    imagem_instrumento varchar(250),
    nome_instrumento varchar(100),
    valor decimal(10,2),
    id_categoria int,
    constraint fk_id_categoria foreign key (id_categoria) references categoria (id_categoria)
);
#drop table instrumento;

create table cliente (
	id_cliente int primary key auto_increment,
    imagem_cliente varchar(250),
    primeiro_nome varchar(100) not null,
    segundo_nome varchar(100) not null,
    data_nascimento date not null,
    cpf varchar(11) not null unique,
    email varchar(50) not null unique,
    senha varchar(8) not null,
    telefone varchar(11) not null unique
);
#drop table cliente;

create table compra (
	id_compra int primary key auto_increment,
    forma_pagamento enum('Crédito', 'Débito', 'Pix', 'Boleto'),
    data_compra datetime,
    id_instrumento int,
    id_cliente int,
    constraint fk_id_instrumento foreign key (id_instrumento) references instrumento (id_instrumento),
    constraint fk_id_cliente foreign key (id_cliente) references cliente (id_cliente)
);
#drop table compra;

create table item_compra (
	id_item int primary key auto_increment,
    quantidade int not null,
    valor_unitario decimal(10,2) not null,
    id_compra int,
    id_instrumento int,
    constraint fk_id_compra foreign key (id_compra) references compra (id_compra),
    constraint fk_id_instrumento_item foreign key (id_instrumento) references instrumento (id_instrumento)
);
#drop table item_compra;

create table endereco (
	id_endereco int primary key auto_increment,
    estado varchar(30),
    cep char(8),
    numero varchar(6),
    id_cliente int,
    constraint fk_id_cliente_endereco foreign key (id_cliente) references cliente (id_cliente)
);
#drop table endereco;

create table encomenda (
	id_encomenda int primary key auto_increment,
    data_encomenda datetime,
    id_endereco int,
    id_compra int,
    constraint fk_id_endereco foreign key (id_endereco) references endereco (id_endereco),
    constraint fk_id_compra_encomenda foreign key (id_compra) references compra (id_compra)
);
#drop table encomenda;

#INSERINDO DADOS
# --- Categorias ---
INSERT INTO categoria (categoria)
VALUES 
('Sopros de madeira'),
('Sopros de metal'),
('Percussão'),
('Eletrônico'),
('Teclas'),
('Cordas');

# --- Instrumentos ---
INSERT INTO instrumento (nome_instrumento, valor, id_categoria)
VALUES
('Bateria Acústica', 2290.00, 3),
('Violão', 300.00, 6),
('Guitarra Elétrica', 559.90, 6),
('Flauta doce', 79.90, 1),
('Baqueta 5B', 39.90, 3),
('Ride B20', 579.90, 3);

# --- Clientes ---
INSERT INTO cliente (primeiro_nome, segundo_nome, data_nascimento, cpf, email, senha, telefone)
VALUES
('Gabriella', 'Ferreira', '2005-04-04', '12345678911', 'gabifofa123@gmail.com', '123123', '11959911849'), 
('Larissa', 'Souza', '2004-09-22', '98765432100', 'larissasouza04@gmail.com', '456456', '11987451236'),
('Pedro', 'Almeida', '2003-12-05', '85236974122', 'pedroalmeida03@gmail.com', '789789', '11975321458'),
('Beatriz', 'Oliveira', '2005-02-18', '74125896333', 'beatriz.oli18@gmail.com', '321321', '11969874521'),
('Lucas', 'Santos', '2006-07-30', '96385274144', 'lucassantos06@gmail.com', '654654', '11987451247');

# --- Compras (ligadas a clientes e instrumentos) ---
INSERT INTO compra (forma_pagamento, data_compra, id_cliente, id_instrumento)
VALUES
('Pix', '2025-10-20', 1, 1), 
('Crédito', '2025-02-10', 2, 2), 
('Débito', '2025-09-09', 3, 3), 
('Boleto', '2025-12-25', 4, 4), 
('Pix', '2025-06-14', 5, 5), 
('Crédito', '2025-08-31', 5, 6);
#select * from cliente;

# --- Itens de compra (ligados a compras e instrumentos) ---
INSERT INTO item_compra (quantidade, valor_unitario, id_compra, id_instrumento)
VALUES
(10, 39.90, 1, 1),
(2, 300.00, 2, 2),
(3, 79.90, 3, 3),
(1, 2290.00, 4, 4),
(1, 579.90, 5, 5),
(2, 559.90, 6, 6);

# --- Endereços ---
INSERT INTO endereco (estado, cep, numero, id_cliente)
VALUES
('São Paulo', '08744030', '136', 1),
('Rio de Janeiro', '22041001', '52', 2),
('Minas Gerais', '30140071', '789', 3),
('Paraná', '80010000', '245', 4),
('Bahia', '40020000', '67', 5),
('Santa Catarina', '88010000', '392', 5);

# --- Encomendas (ligadas a endereços e compras) ---
INSERT INTO encomenda (data_encomenda, id_endereco, id_compra)
VALUES
('2025-10-20', 1, 1),
('2025-02-10', 2, 2),
('2025-09-09', 3, 3),
('2025-12-25', 4, 4),
('2025-06-14', 5, 5),
('2025-08-31', 6, 6);

#ATUALIZANDO DADOS
UPDATE cliente 
SET email = 'gabriella.ferreira@gmail.com'
WHERE email = 'gabifofa123@gmail.com';
#select * from cliente;

update cliente
set telefone = '11954279325'
where telefone = '11954279324';
#select * from cliente;

#DELETANDO DADOS
#delete from cliente where email = 'miguelcoutotcc@gmail.com';
#select * from cliente;

#delete from instrumento where nome_instrumento = 'Bateria Acústica';
#select * from instrumento;

#CRIANDO O BACKUP DAS TABELAS
create table categoria_backup as select * from categoria;
#select * from categoria_backup;
create table instrumento_backup as select * from instrumento;
#select * from instrumento_backup;
create table cliente_backup as select * from cliente;
#select * from cliente_backup;
create table compra_backup as select * from compra;
#select * from compra_backup;
create table item_compra_backup as select * from item_compra;
#select * from item_compra_backup;
create table endereco_backup as select * from endereco;
#select * from endereco_backup;
create table encomenda_backup as select * from encomenda;
#select * from encomenda_backup;

#CRIANDO SELECTS PARA CONSULTAS GERAIS DAS TABELAS
#select * from categoria;
#select * from cliente;
#select * from compra;
#select * from item_compra;
#select * from endereco;
#select * from encomenda;

#CRIANDO SELECTS PARA CONSULTAR INFORMAÇÕES ESPECÍFICAS
#select primeiro_nome, segundo_nome, email FROM cliente WHERE primeiro_nome = 'Gabriella';
#select forma_pagamento, data_compra from compra where id_compra = 1;
#select categoria from categoria where id_categoria = 2;
#select nome_instrumento from instrumento where valor = 300.00;
#select quantidade, valor_unitario, id_item from item_compra where quantidade = 2;

#---------------------------------------G) JUNÇÃO DE TABELAS (mínimo 5)--------------------------------------

/*
SELECT 
	cl.primeiro_nome AS cliente,
	co.id_compra as compra,
    ins.nome_instrumento as instrumento
FROM
	cliente AS cl
JOIN
    compra AS co ON cl.id_cliente = co.id_cliente
JOIN
	instrumento as ins on co.id_instrumento = ins.id_instrumento;
*/

/*
SELECT 
    cl.primeiro_nome AS Cliente,
    cl.segundo_nome AS Sobrenome,
    co.id_compra AS Codigo_Compra,
    co.forma_pagamento AS Pagamento,
    i.nome_instrumento AS Instrumento,
    ca.categoria AS Categoria,
    ic.quantidade AS Quantidade,
    ic.valor_unitario AS Valor_Unitario,
    en.estado AS Estado_Entrega,
    en.cep AS CEP
FROM 
    cliente AS cl
JOIN 
    compra AS co ON cl.id_cliente = co.id_cliente
JOIN 
    item_compra AS ic ON co.id_compra = ic.id_compra
JOIN 
    instrumento AS i ON ic.id_instrumento = i.id_instrumento
JOIN 
    categoria AS ca ON i.id_categoria = ca.id_categoria
JOIN 
    encomenda AS e ON co.id_compra = e.id_compra
JOIN 
    endereco AS en ON e.id_endereco = en.id_endereco;
*/

#-------------------------------H) JUNÇÃO DE TABELAS COM INNER (mínimo 5)---------------------------------------
#Mostra quem fez cada compra e o tipo de pagamento
/*
SELECT 
    cl.primeiro_nome AS Cliente,
    cl.segundo_nome AS Sobrenome,
    co.id_compra AS Codigo_Compra,
    co.forma_pagamento AS Pagamento,
    co.data_compra AS Datas
FROM 
    cliente AS cl
INNER JOIN 
    compra AS co ON cl.id_cliente = co.id_cliente;
*/

#Mostra o instrumento comprado e o valor.
/*
SELECT 
    co.id_compra AS Compra,
    i.nome_instrumento AS Instrumento,
    i.valor AS Valor_Instrumento
FROM 
    compra AS co
INNER JOIN 
    instrumento AS i ON co.id_instrumento = i.id_instrumento;
*/

#Mostra o cliente, o número da compra e a quantidade de itens comprados.
/*
SELECT 
    cl.primeiro_nome AS Cliente,
    co.id_compra AS Codigo_Compra,
    ic.quantidade AS Quantidade,
    ic.valor_unitario AS Valor_Unitario
FROM 
    cliente AS cl
INNER JOIN 
    compra AS co ON cl.id_cliente = co.id_cliente
INNER JOIN 
    item_compra AS ic ON co.id_compra = ic.id_compra;
*/

#Mostra o instrumento, sua categoria e o código da compra em que foi vendido.
/*
SELECT 
    i.nome_instrumento AS Instrumento,
    ca.categoria AS Categoria,
    co.id_compra AS Compra
FROM 
    instrumento AS i
INNER JOIN 
    categoria AS ca ON i.id_categoria = ca.id_categoria
INNER JOIN 
    compra AS co ON i.id_instrumento = co.id_instrumento;
*/

#Mostra o cliente, a compra, a data de envio e o estado do endereço de entrega.
/*
SELECT 
    cl.primeiro_nome AS Cliente,
    co.id_compra AS Compra,
    e.data_encomenda AS Data_Encomenda,
    en.estado AS Estado_Entrega,
    en.cep AS CEP
FROM 
    cliente AS cl
INNER JOIN 
    compra AS co ON cl.id_cliente = co.id_cliente
INNER JOIN 
    encomenda AS e ON co.id_compra = e.id_compra
INNER JOIN 
    endereco AS en ON e.id_endereco = en.id_endereco;
*/

#------------------------------------I) CRIANDO AS VIEWS (mínimo 5)---------------------------------------------
#Clientes e suas compras
CREATE VIEW vw_clientes_compras AS
SELECT 
    cl.id_cliente,
    cl.primeiro_nome,
    co.id_compra,
    co.forma_pagamento,
    co.data_compra
FROM cliente AS cl
INNER JOIN compra AS co ON cl.id_cliente = co.id_cliente;
#select * from vw_clientes_compras;

#Instrumentos e categorias
CREATE VIEW vw_instrumentos_categorias AS
SELECT 
    i.nome_instrumento,
    i.valor,
    c.categoria
FROM instrumento AS i
INNER JOIN categoria AS c ON i.id_categoria = c.id_categoria;
#select * from vw_instrumentos_categorias;

#Compras detalhadas com cliente e instrumento
CREATE VIEW vw_compras_detalhadas AS
SELECT 
    cl.primeiro_nome AS Cliente,
    i.nome_instrumento AS Instrumento,
    ic.quantidade,
    ic.valor_unitario,
    co.forma_pagamento
FROM cliente AS cl
INNER JOIN compra AS co ON cl.id_cliente = co.id_cliente
INNER JOIN item_compra AS ic ON co.id_compra = ic.id_compra
INNER JOIN instrumento AS i ON ic.id_instrumento = i.id_instrumento;
#select * from vw_compras_detalhadas;

#Encomendas com endereço
CREATE VIEW vw_encomendas_endereco AS
SELECT 
    e.id_encomenda,
    e.data_encomenda,
    en.estado,
    en.cep,
    en.numero
FROM encomenda AS e
INNER JOIN endereco AS en ON e.id_endereco = en.id_endereco;
#select * from vw_encomendas_endereco;

#Relatório geral de vendas
CREATE VIEW vw_relatorio_vendas AS
SELECT 
    cl.primeiro_nome AS Cliente,
    i.nome_instrumento AS Produto,
    ic.quantidade,
    ic.valor_unitario,
    (ic.quantidade * ic.valor_unitario) AS Total,
    co.forma_pagamento AS Pagamento,
    co.data_compra
FROM cliente AS cl
INNER JOIN compra AS co ON cl.id_cliente = co.id_cliente
INNER JOIN item_compra AS ic ON co.id_compra = ic.id_compra
INNER JOIN instrumento AS i ON ic.id_instrumento = i.id_instrumento;
select * from vw_relatorio_vendas;

#-----------------------J) CRIANDO PROCEDURES E FUNÇÕES COM E SEM PASSAGEM DE PARÂMETROS--------------------------

#Informações de método de pagamento e data de uma compra referente a um cliente específico.
DELIMITER $$
CREATE PROCEDURE compras_por_cliente(IN idCliente INT)
BEGIN
    SELECT 
        co.id_compra,
        co.forma_pagamento,
        co.data_compra
    FROM compra AS co
    WHERE co.id_cliente = idCliente;
END $$
DELIMITER ;
call compras_por_cliente(2);

#Informações de uma compra de um cliente específico.
delimiter $$
create procedure informacoes_compra(in p_id_cliente int)
begin
	select
		co.id_compra,
        co.data_compra,
        ic.valor_unitario,
        ic.quantidade,
        ins.nome_instrumento
	from 
		compra as co
    inner join 
		instrumento as ins on co.id_instrumento = ins.id_instrumento
	inner join
		item_compra as ic on co.id_compra = ic.id_compra
    where co.id_cliente = p_id_cliente;
end $$
delimiter ;
call informacoes_compra(2);

#mostrar todas as encomendas e endereços de um cliente específico.
DELIMITER $$
CREATE PROCEDURE listar_encomendas_cliente(IN p_id_cliente INT)
BEGIN
	SELECT 
		cl.primeiro_nome AS Cliente,
		co.id_compra AS Compra,
		enc.id_encomenda AS Encomenda,
		enc.data_encomenda AS Data_Envio,
		en.estado AS Estado,
		en.cep AS CEP,
		en.numero AS Numero
	FROM 
		cliente AS cl
	INNER JOIN 
		compra AS co ON cl.id_cliente = co.id_cliente
	INNER JOIN 
		encomenda AS enc ON co.id_compra = enc.id_compra
	INNER JOIN 
		endereco AS en ON enc.id_endereco = en.id_endereco
	WHERE 
		cl.id_cliente = p_id_cliente;
END $$
DELIMITER ;
call listar_encomendas_cliente(1);

#mostrar todas as vendas com total calculado, sem precisar de parâmetro.
DELIMITER $$
CREATE PROCEDURE relatorio_vendas_geral()
BEGIN
	SELECT 
		cl.primeiro_nome AS Cliente,
		i.nome_instrumento AS Produto,
		ic.quantidade,
		ic.valor_unitario,
		(ic.quantidade * ic.valor_unitario) AS Total,
		co.forma_pagamento AS Pagamento,
		co.data_compra
	FROM 
		cliente AS cl
	INNER JOIN compra AS co ON cl.id_cliente = co.id_cliente
	INNER JOIN item_compra AS ic ON co.id_compra = ic.id_compra
	INNER JOIN instrumento AS i ON ic.id_instrumento = i.id_instrumento
	ORDER BY co.data_compra DESC;
END $$
DELIMITER ;
call relatorio_vendas_geral;

#atualizar o preço de um instrumento específico
DELIMITER $$
CREATE PROCEDURE atualizar_preco_instrumento(
	IN p_id_instrumento INT,
	IN p_novo_valor DECIMAL(10,2)
)
BEGIN
	UPDATE instrumento
	SET valor = p_novo_valor
	WHERE id_instrumento = p_id_instrumento;
END $$
DELIMITER ;
call atualizar_preco_instrumento(1, 4000.00);

DELIMITER $$

#Calcular o valor total de itens comprados em uma compra
CREATE FUNCTION total_compra(p_id_compra INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
	DECLARE total DECIMAL(10,2);

	SELECT SUM(valor_unitario * quantidade)
	INTO total
	FROM item_compra
	WHERE id_compra = p_id_compra;

	RETURN total;
END $$
DELIMITER ;

#Pegar o nome completo do cliente
DELIMITER $$
CREATE FUNCTION nome_completo(p_id_cliente INT)
RETURNS VARCHAR(200)
DETERMINISTIC
BEGIN
	DECLARE nome VARCHAR(200);

	SELECT CONCAT(primeiro_nome, ' ', segundo_nome)
	INTO nome
	FROM cliente
	WHERE id_cliente = p_id_cliente;

	RETURN nome;
END $$
DELIMITER ;


#Descobrir o preço do instrumento
DELIMITER $$
CREATE FUNCTION preco_instrumento(p_id_instrumento INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
	DECLARE preco DECIMAL(10,2);

	SELECT valor
	INTO preco
	FROM instrumento
	WHERE id_instrumento = p_id_instrumento;

	RETURN preco;
END $$
DELIMITER ;

DELIMITER $$
#Quantidade de compras que um cliente fez
CREATE FUNCTION quantidade_compras(p_id_cliente INT)
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE total INT;

    SELECT COUNT(*)
    INTO total
    FROM compra
    WHERE id_cliente = p_id_cliente;

    RETURN total;
END $$
DELIMITER ;

#Total gasto por um cliente
DELIMITER $$
CREATE FUNCTION total_gasto_cliente(p_id_cliente INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
    DECLARE total DECIMAL(10,2);

    SELECT SUM(total_compra(id_compra))
    INTO total
    FROM compra
    WHERE id_cliente = p_id_cliente;

    RETURN total;
END $$
DELIMITER ;

#-------------------------K) procedimento para inserção de dados usando estrutura condicional--------------------

#Inserir nova categoria com validação (não pode repetir nome)
DELIMITER $$
CREATE PROCEDURE inserir_categoria_condicional(
	IN p_categoria VARCHAR(50)
)
BEGIN
	START TRANSACTION;
	-- Verifica se já existe
	IF (SELECT COUNT(*) FROM categoria WHERE categoria = p_categoria) > 0 THEN
		ROLLBACK;
		SELECT 'Erro: Categoria já cadastrada.' AS Mensagem;
	ELSE
		INSERT INTO categoria (categoria)
		VALUES (p_categoria);
		COMMIT;
		SELECT 'Categoria inserida com sucesso!' AS Mensagem;
	END IF;
END $$
DELIMITER ;

#2) Inserir instrumento garantindo que a categoria existe
DELIMITER $$
CREATE PROCEDURE inserir_instrumento_condicional(
	IN p_nome VARCHAR(100),
	IN p_valor DECIMAL(10,2),
	IN p_id_categoria INT
)
BEGIN
	START TRANSACTION;
	IF (SELECT COUNT(*) FROM categoria WHERE id_categoria = p_id_categoria) = 0 THEN
		ROLLBACK;
		SELECT 'Erro: Categoria não encontrada.' AS Mensagem;
	ELSE
		INSERT INTO instrumento (nome_instrumento, valor, id_categoria)
		VALUES (p_nome, p_valor, p_id_categoria);
		COMMIT;
		SELECT 'Instrumento inserido com sucesso!' AS Mensagem;
	END IF;
END $$
DELIMITER ;

#3) Inserir cliente verificando duplicidade de CPF
DELIMITER $$
CREATE PROCEDURE inserir_cliente_condicional(
	IN p_primeiro VARCHAR(100),
	IN p_segundo VARCHAR(100),
	IN p_nasc DATE,
	IN p_cpf CHAR(11),
	IN p_email VARCHAR(50),
	IN p_senha VARCHAR(8),
	IN p_telefone CHAR(11)
)
BEGIN
	START TRANSACTION;

	IF (SELECT COUNT(*) FROM cliente WHERE cpf = p_cpf) > 0 THEN
		ROLLBACK;
		SELECT 'Erro: CPF já cadastrado.' AS Mensagem;
	ELSE
		INSERT INTO cliente (primeiro_nome, segundo_nome, data_nascimento, cpf, email, senha, telefone)
		VALUES (p_primeiro, p_segundo, p_nasc, p_cpf, p_email, p_senha, p_telefone);
		COMMIT;
		SELECT 'Cliente inserido com sucesso!' AS Mensagem;
	END IF;
END $$
DELIMITER ;

#4) Inserir compra garantindo que cliente e instrumento existem
DELIMITER $$
CREATE PROCEDURE inserir_compra_condicional(
	IN p_forma ENUM('Crédito','Débito','Pix','Boleto'),
	IN p_data DATETIME,
	IN p_id_cliente INT,
	IN p_id_instrumento INT
)
BEGIN
	START TRANSACTION;
	IF (SELECT COUNT(*) FROM cliente WHERE id_cliente = p_id_cliente) = 0 THEN
		ROLLBACK;
		SELECT 'Erro: Cliente não encontrado.' AS Mensagem;
	ELSEIF (SELECT COUNT(*) FROM instrumento WHERE id_instrumento = p_id_instrumento) = 0 THEN
		ROLLBACK;
		SELECT 'Erro: Instrumento não encontrado.' AS Mensagem;
	ELSE
		INSERT INTO compra (forma_pagamento, data_compra, id_cliente, id_instrumento)
		VALUES (p_forma, p_data, p_id_cliente, p_id_instrumento);
		COMMIT;
		SELECT 'Compra registrada com sucesso!' AS Mensagem;
	END IF;
END $$
DELIMITER ;

#5) Inserir item de compra validando compra existente
DELIMITER $$

CREATE PROCEDURE inserir_item_compra_condicional(
	IN p_qtd INT,
	IN p_valor DECIMAL(10,2),
	IN p_id_compra INT,
	IN p_id_instrumento INT
)
BEGIN
	START TRANSACTION;
	IF (SELECT COUNT(*) FROM compra WHERE id_compra = p_id_compra) = 0 THEN
		ROLLBACK;
		SELECT 'Erro: Compra inexistente.' AS Mensagem;
	ELSEIF (SELECT COUNT(*) FROM instrumento WHERE id_instrumento = p_id_instrumento) = 0 THEN
		ROLLBACK;
		SELECT 'Erro: Instrumento inexistente.' AS Mensagem;
	ELSE
		INSERT INTO item_compra (quantidade, valor_unitario, id_compra, id_instrumento)
		VALUES (p_qtd, p_valor, p_id_compra, p_id_instrumento);
		COMMIT;
		SELECT 'Item adicionado com sucesso!' AS Mensagem;
	END IF;
END $$
DELIMITER ;

#-------------------------------------------L) CRIANDO TRIGGERS---------------------------------------------------
#1)Impedir instrumento com valor negativo
DELIMITER $$
CREATE TRIGGER trg_instrumento_valor_check
BEFORE INSERT ON instrumento
FOR EACH ROW
BEGIN
    IF NEW.valor < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: O valor do instrumento não pode ser negativo.';
    END IF;
END $$
DELIMITER ;

#2) tualizar automaticamente o valor_unitário no item_compra
DELIMITER $$
CREATE TRIGGER trg_item_compra_preco_auto
BEFORE INSERT ON item_compra
FOR EACH ROW
BEGIN
    IF NEW.valor_unitario IS NULL THEN
        SET NEW.valor_unitario = (
            SELECT valor FROM instrumento 
            WHERE id_instrumento = NEW.id_instrumento
        );
    END IF;
END $$
DELIMITER ;

#3) Impedir duplicação de CPF no cliente (proteção extra)
DELIMITER $$
CREATE TRIGGER trg_cliente_cpf_unico
BEFORE INSERT ON cliente
FOR EACH ROW
BEGIN
    IF (SELECT COUNT(*) FROM cliente WHERE cpf = NEW.cpf) > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: CPF já cadastrado.';
    END IF;
END $$
DELIMITER ;

#4) Criar uma encomenda automaticamente ao registrar uma compra
DELIMITER $$
CREATE TRIGGER trg_criar_encomenda_auto
AFTER INSERT ON compra
FOR EACH ROW
BEGIN
    INSERT INTO encomenda (data_encomenda, id_endereco, id_compra)
    VALUES (
        NOW(),
        (SELECT id_endereco FROM endereco 
         WHERE id_cliente = NEW.id_cliente 
         ORDER BY id_endereco DESC LIMIT 1),
        NEW.id_compra
    );
END $$
DELIMITER ;

#5) Impedir duas compras iguais no mesmo dia pelo mesmo cliente
DELIMITER $$
CREATE TRIGGER trg_compra_mesmo_dia
BEFORE INSERT ON compra
FOR EACH ROW
BEGIN
    IF (
        SELECT COUNT(*) 
        FROM compra 
        WHERE id_cliente = NEW.id_cliente
          AND DATE(data_compra) = DATE(NEW.data_compra)
          AND forma_pagamento = NEW.forma_pagamento
    ) > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: Este cliente já fez uma compra com essa forma de pagamento hoje.';
    END IF;
END $$
DELIMITER ;

#------------------------------------M) SELECTS QUE USAM SUBSELECTS------------------------------------------------

#1) Mostrar clientes que já gastaram mais de R$1000
SELECT primeiro_nome, segundo_nome, cpf
FROM cliente
WHERE id_cliente IN (
    SELECT id_cliente
    FROM compra
    WHERE id_compra IN (
        SELECT id_compra
        FROM item_compra
        GROUP BY id_compra
        HAVING SUM(quantidade * valor_unitario) > 1000
    )
);

#2) Mostrar instrumentos mais caros que a média da categoria
SELECT nome_instrumento, valor, id_categoria
FROM instrumento
WHERE valor > (
    SELECT AVG(valor)
    FROM instrumento AS i2
    WHERE i2.id_categoria = instrumento.id_categoria
);

#3) Mostrar clientes que nunca compraram
SELECT primeiro_nome, segundo_nome, email
FROM cliente
WHERE id_cliente NOT IN (
    SELECT DISTINCT id_cliente
    FROM compra
);

#4) Mostrar última compra de cada cliente
SELECT primeiro_nome, segundo_nome, 
       (SELECT MAX(data_compra) 
        FROM compra 
        WHERE id_cliente = cliente.id_cliente) AS ultima_compra
FROM cliente;

#5) Mostrar encomendas com valor total maior que R$500
SELECT id_encomenda, id_compra, data_encomenda
FROM encomenda
WHERE id_compra IN (
    SELECT id_compra
    FROM item_compra
    GROUP BY id_compra
    HAVING SUM(quantidade * valor_unitario) > 500
);

#--------------------------------------------N) CRIANDO ÍNDICES----------------------------------------------------

#1 Tabela cliente – Índice em nome e cpf
-- Índice para CPF (único, mas melhora performance de busca)
CREATE INDEX idx_cliente_cpf ON cliente(cpf);

-- Índice para primeiro_nome e segundo_nome (pesquisa por nome completo)
CREATE INDEX idx_cliente_nome ON cliente(primeiro_nome, segundo_nome);

#2) Tabela categoria – Índice em categoria
CREATE INDEX idx_categoria_nome ON categoria(categoria);

#3) Tabela instrumento – Índice em nome_instrumento e id_categoria
CREATE INDEX idx_instrumento_nome ON instrumento(nome_instrumento);
CREATE INDEX idx_instrumento_categoria ON instrumento(id_categoria);

#4) Tabela compra – Índice em id_cliente e data_compra
CREATE INDEX idx_compra_cliente ON compra(id_cliente);
CREATE INDEX idx_compra_data ON compra(data_compra);

#5) Tabela item_compra – Índice em id_compra e id_instrumento
CREATE INDEX idx_item_compra_compra ON item_compra(id_compra);
CREATE INDEX idx_item_compra_instrumento ON item_compra(id_instrumento);

#6) Tabela endereco – Índice em id_cliente e cep
CREATE INDEX idx_endereco_cliente ON endereco(id_cliente);
CREATE INDEX idx_endereco_cep ON endereco(cep);

#7) Tabela encomenda – Índice em id_compra e id_endereco
CREATE INDEX idx_encomenda_compra ON encomenda(id_compra);
CREATE INDEX idx_encomenda_endereco ON encomenda(id_endereco);
