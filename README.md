## How to run on local

-   Clone this project

    ```bash
    git clone https://github.com/ifntuscpt/assessment-test-RSIA-PuriBunda.git
    ```

-   Go to the project folder

    ```bash
    cd assessment-test-RSIA-PuriBunda
    ```

-   Install dependencies

    ```bash
    composer install
    ```

-   Create an environment configuration file for applications

    ```bash
    cp .env.example .env
    ```

-   Generate a new application key

    ```bash
    php artisan key:generate

    ```

-   Run database migrations

    ```bash
    php artisan migrate

    ```

-   Run the server

    ```bash
    php artisan serve
    ```

-   Open <http://localhost:8000> with your browser to see the result.
