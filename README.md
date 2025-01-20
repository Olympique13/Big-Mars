# Site événement BigMars
Affichage, gestion et inscription à des événements organisés par BigMars

## Importer le projet et toutes les extensions en local
* Se rendre dans votre dossier `www/` et depuis le terminal, éxécuter ces commandes
```
cd votre_repo
git clone https://gitlab.com/synergie-family/digital/bigmars.git

composer install
npm install
php bin/console cache:clear
```

## Vérifier que ce sont les bonnes versions
* Se rendre dans votre dossier `www/bigmars` et depuis le terminal, éxécuter ces commandes
```
composer -v (Composer)
npm -v (npm)
php -v (PHP)
php bin/console --version (Symfony)
```

### Outils et extensions
* Laragon 6.0
* PHP : 8.3.15 (>= 8.2)
* Composer : version 2.1.1
* npm 8.18
* symfony : 7.2

## Test and Deploy
- [ ] Cloner le repo
- [ ] Installer toutes les dépendences
- [ ] Verifier les bonnes versions
- [ ] Lancer le serveur (selon ce que vous utiliser)
- [ ] http://localhost/bigmars/public/

***