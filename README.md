# vagas-atibaia
Aplicativo desenvolvido em Ionic e Cordova para agregar anúncios de vagas de emprego.
https://play.google.com/store/apps/details?id=etec.emprego.atibaia

![O alt](https://lh3.googleusercontent.com/yl6BfsjhssckiaLE32fQeUB5UA1gJTDpS7qwZIpoKv9wLwEqajLKrJAZ-BXCHD_xTes=h900-rw "Aplicativo Vagas Atibaia")

Começe a implementar este projeto partindo do web service.

# Web Service
São arquivos PHP que devem extrair os dados das páginas WEB que você desejar. A extração depende muito da semântica HTML que foi usada na página, portanto, cada página alvo deverá ter um script extrator exclusivo para ela. A pasta webservice tráz 4 exemplos de extração, deve-se primeiro ler todo o HTML da página alvo e ir tratando linha a linha os conteúdos que devem ser extraídos.

Os arquivos PHP devem estar hospedados na Internet, uma alternativa eficiente e gratuita é Azure da Microsoft, o plano gratuito oferece 30 dias de processamento gratuitos! https://azure.microsoft.com/pt-br/pricing/calculator/

## Saídas jSON
Os arquivos PHP geram um outro arquivo PHP que contém os dados formatados em jSON para que o JavaScript do aplicativo possa ler e carregar estes dados.

Estes arquivos devem estar configurados no CRON do servidor, ou, você deverá executá-los periodicamente pois, são eles que manterão os anúcios das vagas atualizados.

Se você nunca trabalhou com web service e jSON, dê uma olhada nesta aula, publicada em meu blog;
* http://profanderson.blog.etecarmine.com.br/json-criando-o-web-service/
* http://profanderson.blog.etecarmine.com.br/json-conectando-seu-app-ao-webservice/

# Aplicativo
Utiliza:
* ionic (framework de estilização)
* apache cordova
* troca de dados usando jSON

## Ionic
Se desejar alterar o layout do aplicativo, faça se baseando na documentação do Ionic - http://ionicframework.com/

* Todas as páginas visuais do aplicativo ficam dentro da pasta www/templates
* Se quiser acrescentar mais telas, crie o arquivo html dentro da pasta www/templates e acrescente-o nos arquivos routes.js e controllers.js, basta seguir como exemplo o código já existente dentro destes arquivos.

## www/js/funcoes.js
Este é o arquivo mais importante do aplicativo, pois nele contêm as funções que irão se comunicar com as saídas jSON geradas pelo webService.

# Ideias de melhorias
Quem quiser ajudar com um FORK, estas serão minhas próx. melhorias

* Exigir cadastro do usuário, via Facebook ou pelas credenciais do próprio dispositivo.
* Fazer a localização do usuário e capturar o ID do dispositivo com o intuido de guardar a informação em um banco de dados, organizando por cidades e bairros. Dessa forma, podemos ter uma visão macro do uso do aplicativo e quais as regiões que mais utiliza.
* Fazer o envio de push notification, enviando alertas sobre o vestibulinho por exemplo, ou, para curtir a página da Etec no Facebook.
