isf-home
===

## Requirements

### WP CLI

```
compsoer global require wp-cli/wp-cli-bundle
```

## Installation

```
$ composer install
$ npm ci
```

Copy `.env.example` to `.env` and fill it with your database credential.
Copy `wp-cli.yml.example` to `wp-cli.yml` and fill it with your database credential.

```
$ wp core install \
  --url=www.isf-home.test \
  --title="國際社會主義前進" \
  --admin_user=admin \
  --admin_email=admin@isf-home.test \
  --skip-email
$ wp site switch-language zh_TW
```

## Development

### Test Data
To install test data, see [Theme Unit Test page on Codex](https://codex.wordpress.org/Theme_Unit_Test).

```
wp cli plugin activate wordpress-importer
wp cli import themeunittestdata.wordpress.xml --authors=create
```

### Assets Compile
This project use Laravel-Mix to compile assets for wordpress theme.  
See `package.json` for available npm scripts.

## License

[AGPL-3.0-or-later](LICENSE)

