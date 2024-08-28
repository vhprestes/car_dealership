
# Sistema de Gerenciamento de Concessionária

Este projeto consiste no desenvolvimento de uma API em Python para gerenciar uma concessionária de veículos, utilizando Flask, SQLAlchemy e outras bibliotecas associadas. Além disso, há um front-end simples em PHP que interage com a API, permitindo operações CRUD (Create, Read, Update, Delete) para os veículos cadastrados na concessionária.

## Estrutura do Projeto

```
car_dealership/
│
├── api/                    # Código da API em Python
│   ├── app.py
│   ├── models.py
│   ├── config.py
│   └── requirements.txt
│
├── frontend/               # Código do front-end em PHP
│   ├── index.php
│   ├── create.php
│   ├── update.php
│   ├── delete.php
│   └── vehicle_form.php
└── README.md               # Instruções do projeto
```
## Requisitos

- Python 3.8+
- PHP 7.4+
- MySQL ou SQLite (ou qualquer outro banco de dados suportado pelo SQLAlchemy)
- [pip](https://pip.pypa.io/en/stable/) para gerenciamento de pacotes Python
- Servidor web (como Apache ou Nginx) para rodar o PHP

## Configuração da API

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/vhprestes/car_dealership.git
   cd car_dealership/api
   ```

2. **Crie e ative um ambiente virtual (opcional, mas recomendado):**

   ```bash
   python3 -m venv venv
   source venv/bin/activate  # Para Windows, use `venv\Scripts\activate`
   ```

3. **Instale as dependências:**

   ```bash
   pip install -r requirements.txt
   ```

4. **Configure o banco de dados:**

   Edite o arquivo `config.py` para configurar a string de conexão do banco de dados.

5. **Execute as migrações do banco de dados:**

   ```bash
   flask db init
   flask db migrate
   flask db upgrade
   ```

6. **Inicie a API:**

   ```bash
   flask run
   ```

   A API estará disponível em `http://localhost:5000`.

## Configuração do Front-End em PHP

1. **Copie o conteúdo da pasta `frontend` para o diretório raiz do seu servidor web:**

   ```bash
   cp -r frontend/ /var/www/html/car_dealership_frontend
   ```

2. **Configure a URL da API no front-end:**

   Edite os arquivos PHP (como `index.php`, `create.php`, etc.) para apontar para a URL correta da API (`http://localhost:5000`).

3. **Acesse o front-end via navegador:**

   Abra `http://localhost/car_dealership_frontend/index.php` no seu navegador.

## Endpoints da API

A API expõe os seguintes endpoints:

- `GET /vehicles`: Retorna uma lista de todos os veículos.
- `POST /vehicles`: Adiciona um novo veículo.
- `GET /vehicles/<id>`: Retorna os detalhes de um veículo específico.
- `PUT /vehicles/<id>`: Atualiza os dados de um veículo específico.
- `DELETE /vehicles/<id>`: Exclui um veículo específico.

## Como Contribuir

1. Faça um fork do projeto.
2. Crie uma branch para sua nova feature (`git checkout -b feature/nova-feature`).
3. Faça commit das suas alterações (`git commit -am 'Adiciona nova feature'`).
4. Faça push para a branch (`git push origin feature/nova-feature`).
5. Abra um Pull Request.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

## Contato

Se você tiver dúvidas, sugestões ou quiser colaborar, sinta-se à vontade para entrar em contato ou abrir uma issue no repositório.

---
Obrigado por usar nosso sistema de gerenciamento de concessionária!
