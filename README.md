# Pattern Library Boilerplate

## How to use this repo as a boilerplate to start a new project
1. Clone this repo with `-o boilerplate` which will name the initial remote *boilerplate* instead of *origin*:
  
  ```shell
  git clone -o boilerplate git@github.com:fewagency/boilerplate-pattern-library.git NEW_PROJECT_DIR
  ```
  
2. `cd` into the new project directory
3. Create a new empty git repo for your new project through your git service 
  
  (If that's on github, keep the resulting page open in your browser -
  it has some nifty commands you'll want to copy and use below)
4. Set up the new repo as a new remote with tracking (`-u`) in your local project:
  
  ```shell
  git remote add origin GIT_URL_FOR_EMPTY_REPO
  git push -u origin master
  ```
  
  (These two lines can be copied from the page github displays after creating an empty repo) 
5. In the project directory, run `composer update` to use the latest dependencies.
6. Remove this section from docs

  //TODO: Remember to remove this section about using the boilerplate from this README
  as it won't be relevant when your new project no longer represents a boilerplate repo!

### About boilerplate repo usage
This method for installing boilerplate packages is inspired by
http://stackoverflow.com/questions/4096448/git-workflow-using-one-repo-as-the-basis-for-another

Another method could be
http://www.tekkie.ro/methodology/use-git-checkout-index-initialise-project-from-boilerplate-repository/

Other ways to do it is to just get a zip file of this repo from github and start from that,
or clone this repo and then recursively remove all `.git` folders.

## Development installation
1. Clone the git-repository into a directory of your choice
2. In the project directory, run `composer create-project` to bootstrap and install composer dependencies

### Building assets
We're using [Laravel's Elixir](http://laravel.com/docs/elixir) for assets, so run `npm install` in the project root
and then `gulp` or `gulp watch` will build the assets during development.

For *browsersync* to work locally you need to set its `proxy` configuration in `gulpfile.js` to the
actual url used in your development environment.

## Deploy
1. Install all dependencies for the build in the build environment:
  
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
  
  (This goes in the *Advanced options* - *Cached build commands* section in Deploybot)
2. Build assets for production:

  ```bash
  # Make sure the node version specified in the .nvmrc file is used
  nvm use
  
  # Build assets for production
  gulp --production
  ```

  (This goes in the *Compile, compress, or minimize your code* section in Deploybot)
3. The `node_modules` directory may be excluded from actual deploy after the build has finished.
  (This goes in the *Exclude certain paths from being uploaded* section in Deploybot)

### When the build fails...
If the dependencies are successfully installed, but the build fails for some reason,
try running or temporarily adding `rm -rf node_modules` at the beginning of the dependency install script
to start from scratch!

## Pattern library
The pattern/component library is built using [`macropiche`](https://github.com/fewagency/macropiche)
and can be found in the browser at `/pattern-library/` under the `public` folder. 
