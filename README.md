Lumen Framework Helloworld
===

Just a repo to set-up a base project for PHP with:
- [Lumen](https://lumen.laravel.com/) micro-framework
- Code quality
  - [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki) with `robo check:php-cs` running auto-fixes with `check:php-cs-fixer`.
  - [PHP Stan](https://phpstan.org/user-guide/getting-started) with `robo check:php-stan`.
  - [Phan](https://github.com/phan/phan/wiki) with `robo check:phan`.
- [Robo.li](https://robo.li/) as build tasks manager.
- [Deployer](https://deployer.org/) to manage deployment to stating and production.environments
