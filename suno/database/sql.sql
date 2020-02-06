create database suno;

use suno;

create table proventos(
  id int primary key auto_increment not null,
  tipo_ativo varchar(2),
  data_aprovacao varchar(10),
  valor_provento double,
  proventos_um int,
  tipo_provento varchar(155),
  ult_com varchar(10),
  data_ult_preco varchar(10),
  ult_preco_com double,
  preco_um int,
  provento_preco double
);