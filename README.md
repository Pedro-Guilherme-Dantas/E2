# E2 - Estatísticas de alunos com covid-19
Trabalho válido como atividade avaliativa na matéria de "Projeto e desenvolvimento de software".

## Tecnologias utilizadas
- Php
- Bootstrap (html, css, javascript)
- MySql
- Python (pandas, matplotlib, skimage, mysql-connector)

## Execução

O script Python realiza todo o tratamento de dados da base .csv para gerar gráficos e cálculos.
As imagens geradas são salvas no diretório /images e são requisitadas pelo código html do index.php para serem visualizadas na página.
O retorno das médias e contagens é escrito no arquivo base.txt, que serve como um conector do python para o php, possibilitando a visualização na página web.
A base de dados MySql contém os dados de cpfs cadastrados e os dados de cada cidade com suas respectivas coordenadas para o uso do gráfico 3.
Para a atualização dos dados em tela logo após o envio do formulário, o arquivo analise_dados.py deve ficar em execução ao fundo.

