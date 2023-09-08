Before running application set environment variables both in frontend and backend folders.

Me myself mainly focuses on the backend,I also added some basic authorization,in case it is needed,but did not implement
it on frontend

## Project Setup For Backend

Create a table

```sh
php artisan migrate
```

For creating one user and seeding from csv file

```sh
php artisan db:seed
```

Start Server

```sh
php artisan serve
```

## Project Setup For Frontend

```sh
npm install
```

### Compile and Hot-Reload for Development

```sh
npm run dev
```

### Compile and Minify for Production

```sh
npm run build
```
