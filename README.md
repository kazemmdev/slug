# Slug

<!-- BADGES_START -->
[![Latest Version](https://img.shields.io/github/release/kazemmdev/slug.svg?style=flat-square)](https://github.com/kazemmdev/slug/releases)
![run-tests](https://github.com/kazemmdev/slug/workflows/run-tests/badge.svg?label=tests)
[![Total Downloads](https://img.shields.io/packagist/dt/kazemmdev/slug.svg?style=flat-square)](https://packagist.org/packages/kazemmdev/slug)

A simple slug generator works for both ltr and rtl language

## Installation

Using composer:

```bash
composer require kazemmdev/slug
```

## Usage

```php
<?php

use Kazemmdev\Slug\Slug;

Slug::handle(string: 'sample text!!??'); // 'sample-text'
Slug::handle(string: 'sample-- --text'); // 'sample-text'
Slug::handle(string: 'SamPle-tExt'); // 'sample-text'
Slug::handle(string: 'نمونه متن'); // 'نمونه-متن'
Slug::handle(string: 'عينة النص'); // 'عينة-النص'
Slug::handle(string: 'عينةْ اًلنصٌ'); // 'عينة-النص'
Slug::handle(string: 'sample text', separator:  '+'); // 'sample-text'
```