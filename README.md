# Teste Desenvolvedor PHP / Laravel / Angular


<span style="color: red; font-weight: bold;">Antes de Iniciar a Codificação:</span>
<br/>
<br/>
<span style="color: #01f;">Leia com atenção as instruções a seguir.</span>

## O que se espera com o teste

<span style="color: #01f; font-weight: bold;">
Não precisa ser Jedi nem Super Star das 7 galáxias, nem nada do tipo
</span>, se conseguir criar um CRUD bem feito tá valendo.

O teste tem objetivo de lhe ajudar a demonstrar seus conhecimentos nas tecnologias 
backend (PHP e/ou Laravel Framework + PHP) e frontend (Angular e/ou HTML + CSS + JS).

Este repositório do teste pressupõe que se utilizará o framework Laravel, contudo
pode ser feito o teste em PHP puro, lembrando-se de aplicar boas práticas aplicáveis.

O mesmo vale para o framework Angular, caso não conheça o framework deverá utilizar outra tecnologia
compatível com desenvolvimento frontend WEB (até mesmo HTML + CSS + JS puro sem frameworks). 


## Configuração do ambiente

Antes de iniciar o teste recomenda-se configurar o ambiente 
com as ferramentas básicas para PHP + WEB. 

Se precisar alguma orientação neste sentido podes 
seguir o tutorial para configuração
do ambiente de trabalho, disponível em: 

[Ubuntu-Laravel-Angular-Environment-Config](https://github.com/DaanKrug/Ubuntu-Laravel-Angular-Environment-Config)

Se você usa outro sistema operacional diferente do Ubuntu, não há problemas, desde que consiga
ter instaladas as ferramentas/programas listados ali neste tutorial 
- (NodeJs e NPM não serão necessários caso não vá usar Angular e afins para criar a interface).


## Procedimento para a "entrega" do teste

1º - Deve-se realizar o clone deste repositório para a máquina de desenvolvimento.

2º - Criar um repositório pessoal com o exato conteúdo deste repositório, na branch
"main" ou "master"

3º - Criar uma nova branch deste repositório para realizar o teste

4º - Fazer o commit/pull request desta nova branch com suas alterações

Este procedimento visa facilitar a análise do que foi produzido, e também demonstrará
que você tem algum domínio da ferramenta de versionamento.

Comandos iniciais até o passo 4º:

  - // navegar até o diretório
  - cd meu_diretorio
  
  - // clonar o repositório
  - git clone https://github.com/DaanKrug/concurso-000.git
  
  - // ir para o repositório clonado do git
  - cd concurso-000
  
  - // des-vincular com o repositório clonado
  - git remote remove origin 
  
  - // vincular com o seu repositório no github (criar o repositório vazio antes)
  - git remote add origin <https:/ /github.com/[seu_git_user]/[seu_repositorio].git>
  
  - // commitar o código original clonado para a branch main do seu repositório
  - git push origin main
  
  - // criar a nova branch no seu repositório
  - git checkout -b <feature/nome_sua_branch>
  
  - // commitar o código com suas alterações na nova branch de seu repositório
  - git push origin <feature/nome_sua_branch>
  
Efetuar o passo número 4º, conferir se as suas alterações/implemetações
estão todas na branch <feature/nome_sua_branch>, depois entrar
em contato com os responsáveis e enviar o link do seu repositório
<https:/ /github.com/[seu_git_user]/[seu_repositorio]>.

Não esquecer de deixar este seu repositório com acesso "public", para ser acessível.


## Instruções

Os requisitos do teste, documentação (Print do MER - Modelo Entidade Relacionamento),
e comandos SQL encontram-se no diretório: requisitos_funcionais_do_teste.

- Clonar o repositório para a máquina local, de preferência diretamente no
diretório de execução do apache/PHP (para facilitar), normalmente "/var/www/html" se utilizas Ubuntu
ou outra variante linux.

- Executar o comando "composer install" para instalar os pacotes e dependências

- Renomear o arquivo .env.example para .env

- Editar o arquivo .env para apontar corretamente a conexão com o banco de dados
	
		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=laravel
		DB_USERNAME=root
		DB_PASSWORD=123456
	
- Importar o arquivo .sql para gerar as tabelas e dados iniciais via PhpMyAdmin.

- O Log de erros estará em /storage/logs, assim que houverem erros no backend (500 e outros).

- Os Models estão em /app/Models.

- Os Controllers estão em /app/Http/Controllers.

- A Configuração das Routes fica em /routes/api.php - (API Rest).

- Importar a colection do postman para testar a API no Postman. Recomenda-se instalar e usar o postman,
pois irá lhe ajudar a identificar os possíveis problemas com o código
do backend, e/ou garantir que você está fazendo as chamadas de API REST corretamente.


## Objetivos gerais

Desenvolver um formulário para "cadastro em concurso". Será considerado o que tiver sido
entregue no tempo especificado, ou seja se não conseguir fazer tudo isso não implica em
desqualificação. DEVE obrigatoriamente utilizar a API REST para comunicar com o backend.

Alguns itens que serão considerados:

- Desenvolver uma interface para o formulário, (Pode ser bem simples em HTML puro + CSS + Javascript),
devendo atender aos requisitos mencionados no documento "Requisitos.docx". 
Cada requisito feito deste documento conta pontos.

- Criar os Models/Controllers/Routes para buscar a lista de Estados/Cidades e popular os campos 
"select box" com os valores retornados. Utilizar javascript para carregar o "select box" de cidades 
com as cidades pertencentes ao estado que for selecionado. Até pode-se copiar estes dados do banco e deixar
"hard coded", mas contará menos pontos já que não se cumpriu o requisito completo.

- Validações de campos no frontend: Aplicar Máscaras, Remover Caracteres especiais inválidos,
limitação de tamanhos.

- Validações de campos no backend: mesmas do frontend.

- Tratamento e prevenção de erros no backend.

- Conformidade com as regras de negócio que estejam contidas no documento de requisitos (leia com atenção).


## Pontos extras

Itens opcionais e que devem/podem ser feitos após ter completado os itens anteriores (Faça primeiro
tudo o que conseguir dos itens anteriores da melhor forma que puder/souber). Aqui você poderá demonstrar suas habilidades/capacidades de forma mais livre/criativa também.

- Desenvolvimento de telas adicionais, por exemplo os CRUD para cadastro de cidades e estados (Juntamente
com os respectivos endpoints no backend - Routes, Controllers e Models).

- Utilização de Typescript no desenvolvimento da(s) interface(s) (Angular, React, entre outros).

- Elementos de navegação de interface (Router Link, Menus e etc).

- Bom visual de apresentação (alinhamento, estilos e etc).

- Adequar a estrutura do código existente (Laravel) para se aproximar mais do padrão de separação
de camadas (identificar o que pode ser melhorado).

- Toda e qualquer outra ideia de melhoria que se coloque em prática (Se você tentar e não funcionar
pode deixar isso no código e vamos trocar uma idéia a respeito - melhor que simplesmente remover e
ter menos coisas para apresentar).





