# ExercicioMicroservices

![Arquiteruas](arquiteturas/arquiteturas.jpg)

CARRINHO: (php artisan serve --port 8000)<br>
BANCO:<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=carrinho_ms<br>
DB_USERNAME=root<br>
DB_PASSWORD=senha<br><br>
ROTAS:<br>
POST: http://localhost:8000/api/carrinho/add (Adiocona um produto no carrinho)<br> 
variaveis: produto_id, quantidade, carrinho_id (se nulo cria um carrinho)<br>
DELETE: http://localhost:8000/api/carrinho/remove/{ID} (Remove um produto do carrinho,  se > 1 decrementa)<br>
POST: http://localhost:8000/api/carrinho/finaliza/{ID} (Finaliza e da baixa no estoque do produto, se ficar negativo cancela a operacao)<br><br>
PRODUTO: (php artisan serve --port 8001)<br>
BANCO:<br>
DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE=produtos_ms<br>
DB_USERNAME=root<br>
DB_PASSWORD=senha<br><br>
ROTAS:<br>
GET http://localhost:8001/api/produtos (Retorna todos os produtos)<br>
GET http://localhost:8001/api/produtos/{ID} (Retorna um produto)<br>
POST http://localhost:8001/api/produtos (Adiciona um produto)<br>
variaveis: nome, descricao, valor, estoque<br>
PUT http://localhost:8001/api/produtos/{ID} (Altera um produto)<br>
variaveis: nome, descricao, valor, estoque<br>
DELETE http://localhost:8001/api/produtos/{ID} (Remove um produto)<br>
