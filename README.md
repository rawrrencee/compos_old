### Deploying to Production (Shared Hosting)

1. Update .htaccess file
>       <IfModule mod_rewrite.c>
>           <IfModule mod_negotiation.c>
>               Options -MultiViews
>           </IfModule>
>       
>           RewriteEngine On
>       
>           # Redirect Trailing Slashes...
>           RewriteRule ^(.*)/$ /$1 [L,R=301]
>       
>           # Handle Front Controller...
>           RewriteCond %{REQUEST_FILENAME} !-d
>           RewriteCond %{REQUEST_FILENAME} !-f
>           RewriteRule ^ index.php [L]
>       </IfModule>
2. Install nvm and npm
>       wget -qO- https://cdn.rawgit.com/creationix/nvm/master/install.sh | bash
>       nvm install stable
3. Install composer
> Instructions from https://getcomposer.org/download/
> FAQ (Hostinger) https://support.hostinger.com/en/articles/5792082-how-to-solve-the-most-common-composer-issues
4. Run command `npm install`
5. Run command  `npm run build`
6. Run command  `./composer.phar self-update`
7. Run command  `./composer.phar install --optimize-autoloader --no-dev`
8. Shift `public_html/domain/public/build/assets` folder to `public_html/domain/build` folder of the domain
>   Keep `assets/manifest.json` in the `public_html/domain/public/build/assets` folder
9. Setup `.env` file
10. Run `php artisan migrate`