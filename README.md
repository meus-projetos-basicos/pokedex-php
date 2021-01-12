# Pokedex

<p style="text-align: justify">
    O objetivo desse projeto foi desenvolver uma aplicação Pokédex, onde será integrado a uma api externa,
cujo nome é o mesmo.
</p>

<p style="text-align: justify">
    É uma central que permite visualizar uma lista de pokemons e ver os detalhes específicos de um 
    determinado pokemon. Os registros serão requisitados a partir da integração com a Api externa.
    Podemos também fazer busca de um pokemon.
</p>

 <table style="width:100%">
    <thead>
      <tr>
        <th></th>
        <th>Ambiente de trabalho</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Docker</td>
        <td><a target="_blank" href="https://www.docker.com/">https://www.docker.com/</a></td>
      </tr>   
      <tr>
        <td>Laravel 8</td>
        <td><a target="_blank" href="https://laravel.com/">https://laravel.com/</a></td>
      </tr>   
      <tr>
        <td>Guzzle</td>
        <td><a target="_blank" href="https://docs.guzzlephp.org/en/stable/">https://docs.guzzlephp.org/en/stable/</a></td>
      </tr>   
      <tr>
        <td>Insomnia</td>
        <td><a target="_blank" href="https://insomnia.rest/">https://insomnia.rest/</a></td>
      </tr>    
    </tbody>
</table>

## Comandos de execução

Para iniciar o projeto pela primeira vez, execute:
docker-compose up -d --build

Após o 1º build, poderá está executando sem a flag --build

Para derrubar os container, execute:
docker-compose down

## Campo de Pesquisa
Ao pesquisar um pokemon, ele fará o filtro e logo em seguida redirecionará para a página do seu próprio detalhe

## Lista
A lista está sendo visualizada assim como seus botões de acesso para os seus detalhes.

## Detalhes
Cada pokemon tem os suas devidas características de poder, habilidades, forças, etc.
Detalhei só os mais básicos.



