Installation
============
1) Clone the repository
2) Edit `DATABASE_URL` and `SMARTFORM_CLIENT_ID` in `.env`
3) Run `$ bin/console doctrine:database:create`
4) Run `$ bin/console doctrine:migrations:migrate`
5) Run `$ symfony server:start`
6) Visit the website
