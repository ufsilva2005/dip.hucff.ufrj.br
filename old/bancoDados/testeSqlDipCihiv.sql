CREATE TABLE exame1 SELECT numAmostra, dataAmostra  FROM examesSolicitados WHERE idExamesSolicitados > 3;
CREATE TABLE exame1 SELECT idExamesSolicitados, numAmostra, dataAmostra  FROM examesSolicitados WHERE idExamesSolicitados BETWEEN 2 AND 4


SELECT PAC_PRONTUARIO, PAC_NOMEPESQ, PAC_DTNASCIMENTO, PAC_SEXO, PAC_CPF, PAC_LOGRADOURO, PAC_NUMERO, PAC_COMPLEMENTO, PAC_BAIRRO,
PAC_UFE_SIGLA, PAC_CEP  FROM paciente WHERE PAC_CODIGO < 100;



nome - prontuario - cpf - sexo - logradouro - numero - complemento - bairro - cidade - cep - uf

SELECT PAC_CODIGO, PAC_NOMEPESQ, PAC_PRONTUARIO,  PAC_CPF, PAC_SEXO, PAC_DTNASCIMENTO, PAC_LOGRADOURO, PAC_NUMERO, PAC_COMPLEMENTO, PAC_BAIRRO,
PAC_CEP, UFE_SIGLA FROM paciente WHERE PAC_CODIGO < 100;