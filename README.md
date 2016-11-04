# Pattern Library Boilerplate

## Development installation
1. Clone the git-repository into a directory of your choice.
2. In the project directory, run `composer create-project` to bootstrap and install dependencies.
3. In the project directory, run `composer update` to use the latest dependencies.

### Building assets
We're using [Laravel's Elixir](http://laravel.com/docs/elixir) for assets, so run `npm install` in the project root
and then `gulp` or `gulp watch` will build the assets during development.

## Deploy
1. Install all dependencies for the build in the build environment
(This goes in the *Advanced options* - *Cached build commands* section in Deploybot)
```bash
# refresh: .nvmrc, package.json, gulpfile.js, composer.json, composer.lock

# Make sure the node version specified in the .nvmrc file is used
nvm install
nvm use

# Install node_modules
npm install

# Update composer and install composer dependencies for production
/usr/local/bin/composer self-update
composer install
```
2. Build assets for production
(This goes in the *Compile, compress, or minimize your code* section in Deploybot)
```bash
# Make sure the node version specified in the .nvmrc file is used
nvm use

# Build assets for production
gulp --production
```
3. The `node_modules` directory may be excluded from actual deploy after the build has finished.
(This goes in the *Exclude certain paths from being uploaded* section in Deploybot)

### When the build fails...
If the dependencies are successfully installed, but the build fails for some reason,
try running or temporarily adding `rm -rf node_modules` at the beginning of the dependency install script
to start from scratch!

## Pattern library
The pattern/component library is built using [`macropiche`](https://github.com/fewagency/macropiche)
and can be found in the browser at `/pattern-library/` under the `public` folder. 
