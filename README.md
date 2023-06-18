# ExercicioMicroservices
CARRINHO: (php artisan serve --port 8000)

BANCO:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=carrinho_ms
DB_USERNAME=root
DB_PASSWORD=senha

ROTAS:
GET http://localhost:8001/api/produtos (retorna todos os produtos)

GET http://localhost:8001/api/produtos/{ID} (retorna um produto)

POST http://localhost:8001/api/produtos
variaveis: nome, descricao, valor, estoque

PUT http://localhost:8001/api/produtos/{ID}
variaveis: nome, descricao, valor, estoque

DELETE http://localhost:8001/api/produtos/{ID}

PRODUTO: (php artisan serve --port 8001)

BANCO:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=produtos_ms
DB_USERNAME=root
DB_PASSWORD=senha

ROTAS:
POST: http://localhost:8000/api/carrinho/add
variaveis: produto_id, quantidade, carrinho_id (se nulo cria um carrinho)

DELETE: http://localhost:8000/api/carrinho/remove/{ID} (1 item exclui, > 1 decrementa)

POST: http://localhost:8000/api/carrinho/finaliza/{ID} (finaliza e baixa o estoque do produto, se ficar negativo cancela a operacao)
