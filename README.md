# Redes 2024/2025

## Software necessário

XAMPP (PHP, MySQL, Apache) - https://www.apachefriends.org/

git - https://git-scm.com/download/win

composer - https://getcomposer.org/download/

node - https://nodejs.org/en/download/current

VS Code - https://code.visualstudio.com/

### GIT

É um sistema de controlo de versões que permite colaborar e manter um histórico de alterações.

Permite: 
- Tracking code changes
- Tracking who made changes
- Coding collaboration

https://git-scm.com/downloads

Como verificar se o GIT está bem instalado:

```bash
git --version
```

#### Informação adicional

Recomenda-se o segiuinte tutorial:

- https://www.w3schools.com/git/



### PHP

Como verificar se o PHP está bem instalado:

```bash
php -v
``` 

---

### Plugins do VS Code

- PHP Intelephense

  - https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client

### Atalhos do VS Code


| Ctrl + P | Procura um ficheiro pelo nome |
| --- | --- |

## Instalação 

### Laravel

Vamos instalar um projeto que iremos chamar ```redes2024```. Note que o nome do projeto é o nome da pasta que será criada e deverá estar relacionado com o nome do seu projeto. 

```bash
composer create-project laravel/laravel redes2024t1
```

### Jetstream

De seguida deverá entrar na pasta do projeto:

```cd redes2024t1```

Já dentro da pasta `redes2024t1` deverá executar o seguinte comando:

```bash
composer require laravel/jetstream
```

Iremos utilizar o jetstream com o ```livewire```. Para isso deverá executar o seguinte comando:

```bash
php artisan jetstream:install livewire
```

Neste momento não precisa de se preocupar sobre o que é o Livewire. 

### Finalização da instalação 

```bash
npm install
npm run build
```

### Configuração da base de dados

Para que o laravel use a base de dados correta, deverá alterar o ficheiro ```.env``` que se encontra na raiz do projeto e modificar a seguinte linha para o nome da base de dados. Deverá usar o nome adequado ao seu projeto.

Neste caso, como vamos usar ```mysql``` em vez de ```sqlite```, faremos as seguintes alterações no ficheiro:

```bash
#DB_CONNECTION=sqlite
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nodjintis
DB_USERNAME=root
DB_PASSWORD=

```

Nas últimas versões do Laravel, caso a base de dados não exista, o Laravel irá criá-la.

Finalmente, deverá executar as migrações:

```bash
php artisan migrate
```

# Execução

## XAMPP 

Ligar o Apache e o MySQL.

## Iniciar o servidor

Como estamos a usar o ```MySQL``` teremos que ter o servidor a funcionar. Para o nosso caso, terá que estar em execução no XAMPP (ou LAMPP se tiver em Linux).

Depois deverá ter executar na raíz da pasta do projecto:

```bash
php artisan serve
```

Para verificar se está tudo funcional, poderá, a partir do seu browser favorito, abrir o endereço retornado pelo comando anterior. Normalmente será 127.0.0.1 (localhost) e porta 8000:

```
localhost:8000
```





## Criação de componente 

Pode criar componentes para reutilizar. Por exemplo, as hiperligações de um menu:

```bash
php artisan make:component navlink
```

Poderá utilizar o componente recorrendo a:

```php
<x-navlink href="about">Acerca</x-navlinkg>
```

Caso deseje passar parâmetros poderá usar:

```html
<a class="text-blue-600" href="http://localhost:8000/{{ $href }}">{{ $slot }}</a>
```


## Criação de um modelo 

Para implementar o modelo visto nas aulas ```Organization``` deverá utilizar o comando:

```bash
php artisan make:model Organization
```

No entanto, como vimos, vamos criar sempre uma migração (m), factory (f), Seeder (s), e controlador. Pelo que podemos usar a opção ```-mfcs```.

```bash
php artisan make:model Organization -mcfs
```

# Criação, listagem e Inserção de Categorias

## Criação do modelo, migração, seeder e factory para ```Category```

Para criar o modelo ```Category``` assim como a migração (m), controller (c), seeder (s) e factory (f) deverá executar na linha de comandos (dentro da pasta raíz do projeto):

```
php artisan make:model Category -mcfs
```

Serão criados vários ficheiros. [Quais? Repare no nome dos ficheiros, principalmente no facto de estarem no singular ou plural.]

## Modificação da tabela da base de dados

Deverá editar o ficheiro que se encontra dentro da pasta ```database/migrations/``` e que terá um nome semelhante a ```2024_10_09_130553_create_categories_table.php```.

Para ser mais fácil encontrar o ficheiro, caso esteja a utilizar o Visual Studio Code, poderá procurá-lo fazendo ```Ctrl+P``` e escrever parte do nome, por exemplo ```migra catego```.

Para o nosso caso, vamos querer que a tabela guarde as seguintes informações:

- name: String com o nome da categoria;

- slug: Identificador **único** (em string); [Qual a vantagem de usar um slug em vez do ID?]

- description: Descrição *(opcional)* do que representa a categoria;

- image: String que terá o endereço da imagem da categoria *(opcional)*.

Para isso deverá alterar a função ```public function up(): void```php:

```php
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();
    $table->string('slug')->unique();
    $table->text('description')->nullable();
    $table->string('image')->nullable();
    $table->timestamps();
});
```

## Preenchimento da tabela categories através do seeder CategorySeeder

Deverá modificar o ficheiro que se encontra na pasta ```database/seeders/``` com o nome ```CategorySeeder.php```, inserindo dentro da função ```public function run()```:

```php
  Category::create([
      'name' => 'Manuais',
      'slug' => 'manuais',  
      'image' => 'manuais.jpg'          
  ]);

  Category::create([
      'name' => 'Cidadania e Desenvolvimento',
      'slug' => 'ced',
      'description' => 'Nesta categoria poderá encontrar informações sobre os domínios da área curricular de Cidadania e Desenvolvimento'            
  ]);

  Category::create([
      'name' => 'Programação e Sistemas de Informação',
      'slug' => 'psi',            
  ]);

  Category::create([
      'name' => 'Redes de Comunicação',
      'slug' => 'rc',            
  ]);
```

Para que as informações passem do Seeder para a BD, teremos que o executar:

```bash
php artisan db:seed --class=CategorySeeder
```

Note que se executar duas vezes consecutivas o Seeder, teremos erros, porque pedimos que o slug não possa ser "repetido". Uma solução poderá passar por no início do Seeder, dentro da função ```public function run()``` a linha:

**Nota importante:** Esta linha apagará todos os dados que já estão na BD.

## Criação do "routing" para a vista de listagem de categorias

Queremos agora que o utilizador ao chegar ao endereço ```http://localhost:8000/categories``` encontre a listagem de todas as categorias.

Para isso vamos acrescentar uma rota ao ficheiro ```web.php``` que se encontra na pasta ```routes```. Vamos também colocar na variável ```$categories``` todo o conteúdo que está na tabela ```categories```através de ```Category::all()```. Não se esqueça de colocar ```use App\Models\Category``` no início do ficheiro ```web.php```.

```php
Route::get('/categories', function () {
    $categories = Category::all();    
    return view('categories.index', compact('categories'));
});
```

Deverá ainda criar um ficheiro ```index.blade.php``` na pasta ```resources\views\categories```. Um possível conteúdo poderá ser:

```html
<x-guestLayout>
    Index das categorias
    
    @foreach ($categories as $category)
        <div class="border p-2 rounded">{{ $category->name }}</div>
    @endforeach

    <a class="hover:underline text-blue-500" href="/categories/create">Criar nova categoria<a>
</x-guestLayout>
```

# Criação do "routing" para a criação de categorias

```php
Route::get('/categories/create', function () {
    return view('categories.create', compact('categories'));
});
```

Deverá ainda criar um ficheiro ```create.blade.php``` na pasta ```resources\views\categories```. Um possível conteúdo poderá ser:

```html
<x-guestLayout>
    <form action="/categories/store" method="POST">
        @csrf
        Nome: <input type="text" name="name"><br>
        Slug: <input type="text" name="slug"><br>
        Image: <input type="text" name="image"><br>
        Descrição: <textarea name="description"></textarea>
        <x-button>Criar</x-button>
    </form>
</x-guestLayout>
```

Note-se que deverá ter a linha ```@csrf``` depois do form (ver Cross-side referency forgery) e que o método do formulário é ```POST```.

# Criação do "routing" para a gravação da categoria

Para gravar na base de dados poderá usar (isto vai ser reformulado na próxima aula, acrescentando validação e redirecionamento).

```php
Route::post('/categories/store', function (Request $request) {
    Category::create([
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'description' => $request->input('description'),
        'image' => $request->input('image'),
    ]);
});
```


## Cross-site request forgery



# Utilização de "modelos"

Usar como base
<x-guestLayout>
    ...

    <h1>Página da Escola</h1>

    A melhor página da Internet!

    ...
</x-guestLayout>








# Forking

- Ir ao projeto: (no Github)
- No canto superior direito clicar em Fork
- Por baixo de "owner" escolher o nosso utilizador
- Selecionar o "Copy the default branch"
- Clicar em Create Fork.

## Clonar o fork

- Na pasta onde quer instalar o projeto executar:
``` bash
git clone https://github.com/YOUR-USERNAME/rc_aeg1
```
- cd rc_aeg1
- Executar ```composer update```
- Executar ```npm install```
- Criar uma nova *branch* com o nome do modelo que te foi atribuído (em vez de BRANCH-NAME):
```bash
git branch BRANCH-NAME
git checkout BRANCH-NAME
```

---

https://github.com/<your_username>/rc_aeg1. You'll see a banner indicating that your branch is one commit ahead of dvdfreitas:main. Click Contribute and then Open a pull request.


GitHub will bring you to a page that shows the differences between your fork and the dvdfreitas/rc_aeg1 repository. Click Create pull request.


- git remote -v
- git remote add upstream https://github.com/ORIGINAL_OWNER/rc_aeg1
- git remote -v


Mais informações em:
https://docs.github.com/en/get-started/quickstart/contributing-to-projects

# Avaliação

## Criação do repositório

Para a avaliação dos trabalhos, cada aluno ou grupo, deverá ter o seu projeto disponibilizado no Github.

Para isso deverá:

1 - Ter uma conta no https://github.com/

2 - Em ```Repositories``` fazer ```New```, para criar um repositório.

3 - Dar nome ao repositório, preencher os campos necessários e fazer ```Create repository```.

4 - Preencher no ficheiro partilhado para o efeito, a hiperligação para o vosso projeto.

## Atualização do repositório

Deverá, na raíz do projecto:

```
git add .
git commit -m "Nome da alteração"
git push
```

# Tutoriais

## Markdown

https://www.markdownguide.org/cheat-sheet/

# Erros

## SQLSTATE[HY000] [2002] Connection refused
## SQLSTATE[HY000] [1049] Unknown database 'rc11'
## SQLSTATE[42S02]: Base table or view not found: 1146 Table 'rc11.sessions' doesn't exist
## Add [id] to fillable property to allow mass assignment on [App\Models\Student]