const elixir = require('laravel-elixir');

elixir(mix => {
  mix.sass('app.scss')
    .sass('pattern-library.scss')
    .webpack('app.js');

  mix.browserSync({
    proxy: 'http://pattern-library.local'
  });
});
