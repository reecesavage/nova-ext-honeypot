# Spam Honeypot - A [Nova](https://anodyne-productions.com/nova) Extension

<p align="center">
  <a href="https://github.com/reecesavage/nova-ext-mission-post-summary/releases/tag/v1.0.1"><img src="https://img.shields.io/badge/Version-v1.0.1-brightgreen.svg"></a>
  <a href="http://www.anodyne-productions.com/nova"><img src="https://img.shields.io/badge/Nova-v2.6.1-orange.svg"></a>
  <a href="https://www.php.net"><img src="https://img.shields.io/badge/PHP-v5.3.0-blue.svg"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/license-MIT-red.svg"></a>
</p>

This extension adds a Honeypot to the Contact and Join forms for spambot prevention.

This extension requires:

- Nova 2.6+
- Nova Extension [`jquery`](https://github.com/jonmatterson/nova-ext-jquery)

## Installation

- Install Required Extensions.
- Copy the entire directory into `applications/extensions/nova_ext_honeypot`.
- Add the following to `application/config/extensions.php`: - Be sure the `jquery` line appears before `nova_ext_honeypot`
```
$config['extensions']['enabled'][] = 'nova_ext_honeypot';
```

## Issues

If you encounter a bug or have a feature request, please report it on GitHub in the issue tracker here: https://github.com/reecesavage/nova-ext-honeypot/issues

## License

Copyright (c) 2021 Reece Savage.

This module is open-source software licensed under the **MIT License**. The full text of the license may be found in the `LICENSE` file.
