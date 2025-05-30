# Consumo de API com Laravel HTTP Client

## 📌 Descrição do Projeto
Implementação de um serviço Laravel para consumir a NewsAPI (API de notícias) utilizando o HTTP Client nativo do Laravel, conforme requisitos do teste técnico.

## 🚀 Funcionalidades
- Consulta de notícias por termo de busca
- Listagem de manchetes por país
- Filtragem de fontes por categoria e país
- Tratamento de erros e respostas padronizadas

## 🔧 Pré-requisitos
- PHP 8.0+
- Composer
- Laravel 12.x
- Chave de API da NewsAPI (registre-se em [newsapi.org](https://newsapi.org/))

## 🛠 Configuração

### 1. Instalação
```bash
git clone https://github.com/abreujean/api-http-client-laravel
cd api-http-client-laravel
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Configuração da API
Adicione sua chave da NewsAPI no arquivo `.env`:
```env
NEWS_API_KEY=sua_chave_aqui
```

## 🌐 Endpoints da API

### 1. Pesquisar Notícias
```
GET /api/news/search
```
**Parâmetros:**
- `q`: Termo de busca (obrigatório)
- `pageSize`: Quantidade de resultados (padrão: 10)

**Exemplo:**
```bash
http://localhost:8000/api/news/search/bitcoins/10
```

### 2. Top Manchetes
```
GET /api/news/top-headlines
```
**Parâmetros:**
- `country`: Código do país (2 letras, obrigatório)
- `pageSize`: Quantidade de resultados (padrão: 10)

**Exemplo:**
```bash
http://localhost:8000/api/news/top-headlines/us/10
```

### 3. Fontes por Categoria
```
GET /api/news/sources
```
**Parâmetros:**
- `category`: Categoria de notícias (obrigatório)
- `country`: Código do país (2 letras, obrigatório)

**Exemplo:**
```bash
http://localhost:8000/api/news/sources/technology/us
```

## 🧪 Testando a API

1. Utilize o Postman para testar os endpoints:


## 📦 Estrutura do Projeto
```
app/
├── Http/
│   ├── Controllers/
│   │   └── NewsController.php
├── Services/
│   └── NewsService.php
config/
routes/
├── api.php
```

## 🔒 Armazenamento Seguro
- Credenciais armazenadas no arquivo `.env` (nunca commitado)
- Chave de API injetada via variáveis de ambiente
- Validação de parâmetros em todas as requisições

## 🛡 Tratamento de Erros
A API retorna respostas padronizadas:
```json
{
    "success": false,
    "error": "Mensagem de erro detalhada"
}
```

Códigos de status HTTP:
- 200: Sucesso
- 400: Parâmetros inválidos
- 502: Erro na comunicação com a NewsAPI

## 📄 Documentação Adicional
- Documentação da NewsAPI: [newsapi.org/docs](https://newsapi.org/docs)
- Documentação do HTTP Client do Laravel: [laravel.com/docs/http-client](https://laravel.com/docs/http-client)

## 👨‍💻 Autor
Jean Abreu 
jeandcabreu@gmail.com