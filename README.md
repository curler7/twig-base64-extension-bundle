# Curler7 Twig Base64 Extension Bundle
Convert image to base64 string

## Installation
```console
composer require curler7/twig-base64-extension-bundle
```

## Usage
```twig
<img src="{{ 'img/logo.svg'|image64 }}" alt="Logo" />
```

Config Reference
============

``` yaml
# config/packages/curler7_twig_base_64_extension.yaml
curler7_twig_base_64_extension:
    converter:
        image_to_base_64_converter: ImageToBase64Converter::class
    twig:
        base_64_image_extension:    Base64ImageExtension::class
```

## Running Tests
To run tests, run the following command
```sh
docker compose up -d
```


## Authors
- [@curler7](https://www.github.com/curler7)
- [Licence MIT](LICENSE)

