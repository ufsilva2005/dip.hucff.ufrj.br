CREATE TABLE exame1 SELECT numAmostra, dataAmostra  FROM examesSolicitados WHERE idExamesSolicitados > 3;
CREATE TABLE exame1 SELECT idExamesSolicitados, numAmostra, dataAmostra  FROM examesSolicitados WHERE idExamesSolicitados BETWEEN 2 AND 4