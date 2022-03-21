

# Teste Desenvolvedor PHP / Laravel / Angular

Antes de iniciar o teste recomenda-se seguir o tutorial para configuração
do ambiente de trabalho, disponível em: [link:]https://github.com/DaanKrug/Ubuntu-Laravel-Angular-Environment-Config

Se você usa outro sistema operacional diferente do Ubuntu, não há problemas, desde que consiga
ter instaladas as ferramentas/programas listados ali neste tutorial.


## Instruções

Os requisitos do teste, documentação (Print do MER - Modelo Entidade Relacionamento),
e comandos SQL encontram-se no diretório: requisitos_funcionais_do_teste.

- Clonar o repositório para a máquina local, de preferência diretamente no
diretório de execução do apache/PHP (para facilitar), normalmente "/var/www/html" se utilizas Ubuntu
ou outra variante linux.

- Renomear o arquivo .env.example para .env
- Editar o arquivo .env para apontar corretamente a conexão com o banco de dados
	
		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=laravel
		DB_USERNAME=root
		DB_PASSWORD=123456
	
- Importar o arquivo .sql para gerar as tabelas via PhpMyAdmin


- Models em /app/Models
- Controllers em /app/Http/Controllers




















