# Modelo de Sistema php com API
Este sitestema foi projetado para ser uma base na contrução de um site PHP, que pode funcionar como back-end para um aplicativo ou sistema desktop Flutter, com esta base é possível contruirm um Ecossistema abrangendo aplicação WEB, Desktop, e aplicativo móvel.
## Indice
- <a href="">Requisitos</a>
- <a href="">Como instalar</a>
- <a href="">Imagens</a>

### Requisitos
- PHP 8.* (recomendo) <a href="https://www.youtube.com/watch?v=HzIXZVctwI8&t=65s">Aqui está um vídeo ensinando como instalar o PHP diretamente no computador</a>, outra alternativa é usar o <a href="https://www.apachefriends.org/pt_br/index.html">XAMPP</a>;
-  Apache 2.4 é um servidor de código aberto, aqui estão dois vídeos que vão ajudar na instalação: <a href="https://www.youtube.com/watch?v=IvcdwaDs-ik">Vídeo 1</a> - <a href="https://www.youtube.com/watch?v=Y60Vvd4lhtg&t=27s">Vídeo 2</a>;
- MySQL e Workbench que é um sistema de gerenciamento de banco de dados, <a href="https://www.youtube.com/watch?v=IeTbZOxEwGc">aqui está um vídeo ensinando a instalar</a>;
- <a href="https://getcomposer.org">Composer</a> é um Gerenciador de Dependências para PHP;
- Para o desenvolvimento deste modelo de sistema foram usados os seguintes pacotes: "coffeecode/router": "1.0.*", "coffeecode/optimizer": "2.0.*", "coffeecode/cropper": "2.0.3", "league/plates": "v4.0.0-alpha", "monolog/monolog": "2.0.*" e a arquitetura mostrada na playlist PHP TIPS - Robson V. Leite <a href="https://youtube.com/playlist?list=PLi_gvjv-JgXqsmCAOrueT1-4JrnMW8_Gg">Acesse aqui</a>, porém a pesar de usar como base, a forma como é feita a interação com o banco de dados foi modificada completamente foi incluido Middlewares entre outras alterações e desenvolvimento próprio;
- Editor de código <a href="https://code.visualstudio.com/">VS code</a> (recomendo);
- Este sitema foi desenvolvido utilizando Windows 10;

### Como instalar
- 1º) Certifique-se se realmente não tem o PHP instalado entrando no prompt de comando e digitando: php -v caso apareça uma verssão anterior a 8 é recomendado instalar uma mais recente caso não apareça nada instale o PHP, Apache, MySQL, Workbench, Composer e o editor VS Code na sua máquina;
- 2º) Copie o link do repositório no gitHub, va até a pasta htdocs do servidor apache, apague o endereço da pasta e digite cmd, vai abrir o prompt de comando, com o caminho da pasta, em seguida digite: git clone (da um espaço) e cole o link do repositório;
- 3º) Abra a pasta no VS Code em seguida abra o arquivo (composer.json)

| Home                                                   | Login                                                                                        |
| ------------------------------------------------------ | -------------------------------------------------------------------------------------------- |
| ![Imagem 1](theme/assets/img/documentation/home.PNG)   | ![Imagem 2](theme/assets/img/documentation/janela_de_login_e_cadastro_de_usuario_parte_1.PNG)|

| Cadastro de Usuário                                    |
| ------------------------------------------------------ |
| ![Imagem 1](theme/assets/img/documentation/janela_de_login_e_cadastro_de_usuario_parte_2.PNG) |


| Painel do usuário                                                         | Cadastro de postagens                                        |
| ------------------------------------------------------------------------- | ------------------------------------------------------------ |
| ![Imagem 1](theme/assets/img/documentation/painel_de_usuario_parte_1.PNG) | ![Imagem 2](theme/assets/img/documentation/painel_de_usuario_parte_3.PNG)

| Edição de postagem parte 1                                                         | Edição de postagem parte 2                                   |
| ---------------------------------------------------------------------------------- | ------------------------------------------------------------ |
| ![Imagem 1](theme/assets/img/documentation/exemplo_edicao_de_postagem_parte_1.PNG) | ![Imagem 2](theme/assets/img/documentation/exemplo_edicao_de_postagem_parte_1.PNG)
