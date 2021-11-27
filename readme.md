# Readme *maisonphilo*

## launching the application locally

`https://127.0.0.1:8000/`
`https://localhost:8000`
`http://localhost:81/phpmyadmin/`

## bank photo

`https://fr.depositphotos.com/stock-photos/femme-africaine-agee.html`

```bash
symfony server:start
php bin/console translation:update --force fr
php bin/console doctrine:fixtures:load
php composer.phar dump-env prod
```

## Composer

```cmd
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

```bash
php composer.phar update
```

### install noode js

```bash
curl -o- https://raw.githubusercontent.com/nvm... | bash 
nvm install node
```

### Webpack

```bash
npx encore dev-server --hot
npm install
npx encore production
````

## GitHub

`https://github.com/Michael-Serva/maisonphilo.git`

## creating false data

`https://symfonycasts.com/screencast/symfony4-doctrine/faker-fixtures` / `https://github.com/fzaninotto/Faker`

## Random User generator / avatar

`https://randomuser.me/`
`https://randomuser.me/api/portraits/men/1.jpg` <!-- images range from 0 to 100 for men or woman -->

### Regex Generator`

`https://www.beautifyconverter.com/regex-tester.php`

### Linear Gradient Generator

`https://www.w3schools.com/csSref/tryit.asp?filename=trycss3_gradient-linear`

## google analytics

`https://analytics.google.com/analytics/web/provision/?_ga=2.83265046.1804555890.1629906954-457951912.1629906954#/provision`

`https://www.malt.fr/t/barometre-tarifs`

## Site web

`https://www.bastideleconfortmedical.com/fauteuil-roulant-v300-xr-viking.html`
`https://www.wordreference.com/fren/r%C3%A9f%C3%A9rence`

### Product site

`https://codepen.io/albertoleon/pen/jONyrvY`

## Eslint auto-modify js files

## Phpcs

`https://github.com/squizlabs/PHP_CodeSniffer`
`phpcs -v --standard=PSR12 --ignore=./src/Kernel.php ./src` => for check the code
`phpcbf -v --standard=PSR12 --ignore=./src/Kernel.php ./src` => for fix the code

## Boostrap alert

`https://bbbootstrap.com/snippets/bootstrap-messages-alerts-58736812`

### Popupmenu

`https://codepen.io/darkcider/pen/PgBqMG`

## SEO

`[searchgoogle testmobile friendly](https://search.google.com/test/mobile-friendly)`
usages des alt 7 balises
normes 3wc
meta descriptions
balise title
arborescence coherente

pertinence des contenus
evitez les contenus dupliqués

robot.txt
sitemaps.xml => generateur en ligne
.htaccess

capgemini soprasteria accenture
