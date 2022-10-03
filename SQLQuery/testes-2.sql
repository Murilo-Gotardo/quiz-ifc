SELECT * FROM `quiz-ifc`.pergunta;

insert into perguntas (pergunta, respostaIncorreta1, respostaIncorreta2, respostaIncorreta3, respostaCorreta) values ('concorda?', 'sim', 'nao', 'talvez', 'vai embora, louco!!!!');

SELECT respostaIncorreta1, respostaIncorreta2, respostaIncorreta3 FROM perguntas WHERE idPergunta = 1 ORDER BY RAND() limit 3