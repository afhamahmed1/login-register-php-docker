# PHP and Apache Docker Template

This repository provides a template for running a PHP and Apache server in Docker, along with a MySQL database. It allows you to quickly set up a development environment for hosting PHP web applications.

## Directory Structure

The directory structure of this template is as follows:

```
- apache
  - demo.apache.conf
  - Dockerfile
- php
  - Dockerfile
- public_html
  - your-website-files
- .env
- docker-compose.yml
- README.md
```

- The `apache` directory contains the Apache server configuration file (`demo.apache.conf`) and the (`Dockerfile`) for building the Apache container.
- The `php` directory contains the Dockerfile for building the PHP container.
- The `public_html` directory is where you can place your PHP web application files.
- The `.env` file is used to store environment variables for configuration.
- The `docker-compose.yml` file defines the services (PHP, Apache, MySQL) and their configurations.

## Prerequisites

Make sure you have the following software installed on your system:

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)

## Usage

1. Clone this repository to your local machine:

   ```bash
   git clone https://github.com/afhamahmed1/login-register-php-docker
   ```

2. Navigate to the cloned repository:

   ```bash
   cd login-register-php-docker
   ```

3. Customize the environment variables:

   - Open the `.env` file and update the variables according to your requirements (e.g., database name, username, password).

4. Start the Docker containers:

   ```bash
   docker-compose up -d
   ```
   This will start the PHP, Apache, and MySQL containers in the background.

5. Access the MySQL container's terminal:

   ```bash
   docker exec -it mysql /bin/bash
  
   ```

   ```bash
   mysql -uroot -prootpassword
  
   ```
   Enter the password specified in the .env file.

6. Once inside the MySQL terminal, run the following SQL commands to create the users table:
   ```sql
   USE dbtest;
   ```
   ```sql
   CREATE TABLE users (
       id INT PRIMARY KEY AUTO_INCREMENT,
       name VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL,
       password VARCHAR(255) NOT NULL
   );

   ```
   ```sql
   INSERT INTO users (name, email, password) VALUES ('afham', 'abc@example.com', 'password123');
   ```

7. Exit the MySQL terminal by typing exit or pressing Ctrl+D.

8. Open your web browser and access the application at [http://localhost](http://localhost).

   - If you have placed your PHP web application files in the `public_html` directory, they will be served by the Apache server.

## Configuration

- Apache configuration: The Apache server configuration file (`demo.apache.conf`) in the `apache` directory can be modified to suit your needs.
- PHP configuration: PHP configuration files can be adjusted in the `php` directory. Modify these files as per your application's requirements.
- MySQL configuration: The MySQL container configuration (including version, root password, database name, username, and password) can be customized in the `.env` file.

## Database Management

To manage the MySQL database, you can use a MySQL client such as phpMyAdmin, which can be added to the docker-compose.yml file.

- Add the following service configuration to the `docker-compose.yml` file:

  ```yaml
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    restart: always
    depends_on:
      - mysql
    ports:
      - "8080:80"
    environment:
      PMA_HOST: mysql
      MYSQL_ROOT_PASSWORD: "${DB_ROOT_PASSWORD}"
    container_name: phpmyadmin
  ```

- Uncomment the `phpmyadmin` service configuration in the `docker-compose.yml` file.

- Restart the Docker containers:

  ```bash
  docker-compose up -d
  ```

- Access phpMyAdmin at [http://localhost:8080](http://localhost:8080) and use the MySQL root username and password specified in the `.env` file to log in.

## Contributing

If you have any suggestions, improvements, or bug fixes, feel free to contribute to this repository. Fork the repository, make your changes, and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

---

Now you have a template for running a PHP and Apache server in Docker, allowing you to quickly set up a development environment for hosting PHP web applications. Start developing your PHP projects with ease. Happy coding!