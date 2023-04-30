<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Blog API :notebook_with_decorative_cover:

A simple RESTful API built with Laravel to create, read, update, and delete blog posts.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![PHP Version](https://img.shields.io/badge/PHP-%3E%3D%207.2-8892BF.svg)
![Laravel Version](https://img.shields.io/badge/Laravel-10.x-orange.svg)


## Installation :package:

1. Clone the repository to your local machine.
2. Run `composer install` to install the dependencies.
3. Create a new MySQL database and update the `.env` file with your database credentials.
4. Run `php artisan migrate` to create the necessary database tables.
5. Start the development server with `php artisan serve`.

## Usage :rocket:

### Endpoints

- `GET /api/blogpost` - Get all blog posts
- `GET /api/blogpost/{id}` - Get a single blog post by ID
- `POST /api/blogpost` - Create a new blog post
- `PUT /api/blogpost/{id}` - Update an existing blog post by ID
- `DELETE /api/blogpost/{id}` - Delete a blog post by ID

### Request Body Schema

The request body for creating or updating a blog post should have the following schema:

```json
{
"status":true or false,
"message":"Response Message"
}
```

## Contributing :raising_hand:

Contributions are welcome! If you find any bugs or have suggestions for improving the API, please open an issue or submit a pull request.

## License :page_facing_up:

This project is licensed under the MIT License. See the LICENSE file for details
