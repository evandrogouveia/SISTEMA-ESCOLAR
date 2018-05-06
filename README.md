
# SISTEMA ESCOLAR


## INFORMAÇÕES DO SISTEMA 

- O SISTEMA ESCOLAR é uma simulação de controle de alunos e cursos. 
O sistema permite cadastrar, editar e excluir um aluno com opção de inserção 
de foto no cadastro e opção de cadastro e exclusão de cursos. 
- O administrador poderá editar e excluir os demais usuários que se cadastraram no sistema.
- O usúario poderá consultar os alunos cadastrados no sistema.
- Será exibido a lista dos usuários excluídos.
- O sitema possui tela de login com as opções de "esqueci a senha" e "novo 
usuario".
- Será enviado uma nova senha para o email do usuário ou adm caso solicite.

## TECNOLOGIAS E LINGUAGENS UTILIZADAS
    ->PHP com Framework Laravel 5.3
    ->CSS3 com Framework Bootstrap 3
    ->Javascript com Framework jQuery
    ->Banco de dados Mysql
    ->IDE Netbeans
    ->Orientação a Objetos
    ->Padrão MVC

## INSTALAÇÃO DO SISTEMA LOCAL 
    ->Fazer download dos arquivos do repositório.
    ->Colocar os arquivos na pasta do servidor local.
    ->É necessário ter o laravel instalado na máquina.
    ->Copiar a pasta VENDOR do laravel que já está instalado na máquina para 
      a pasta do sistema no servidor local.
    ->importar o arquivo sistema_escolar.sql que está na pasta do sistema 
      para o banco de dados local.
    ->Configurar o arquivo .env de acordo com o banco local
    ->Configurar os dados de SMTP do servidor de email no .env para envio de email
    assim como a linha $message->from("vandogouveia67@gmail.com") em LoginController
    alterando para o mesmo email que foi configurado no .env
    ->Acessar o sistema na url http://localhost/sistema_escolar/public/
