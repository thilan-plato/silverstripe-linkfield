# Silverstripe LinkField - Compatibility Guide

This module is now compatible with both Silverstripe 4 and Silverstripe 5.

## Changes Made for Compatibility

### 1. Composer Dependencies
- Updated `silvershop/silverstripe-hasonefield` to support `^3.0 || ^4.0 || ^5.0`
- Updated `symbiote/silverstripe-gridfieldextensions` to support `^3.1 || ^4.0 || ^5.0`
- Added `composer/installers` plugin configuration for better Composer 2.x compatibility
- Added PHPUnit dev dependency for testing

### 2. Frontend Build System
- Replaced Laravel Mix with modern Webpack 5 configuration
- Updated package.json with current webpack dependencies
- Added support for SCSS compilation
- Improved build process with development and production modes

### 3. Code Compatibility
- Replaced deprecated `singleton()` calls with `Injector::inst()->get()`
- Updated ValidationException import to use Silverstripe's own exception class
- Maintained backward compatibility with existing API

## Installation

### For Silverstripe 4
```bash
composer require gorriecoe/silverstripe-linkfield
```

### For Silverstripe 5
```bash
composer require gorriecoe/silverstripe-linkfield
```

## Building Frontend Assets

```bash
# Install dependencies
npm install

# Development build
npm run dev

# Watch for changes
npm run watch

# Production build
npm run build
```

## Usage

The module works the same way in both Silverstripe 4 and 5:

```php
use gorriecoe\LinkField\LinkField;

$field = LinkField::create(
    'MyLink',
    'My Link',
    $this,
    [
        'types' => ['URL', 'Email', 'Phone'],
        'title_display' => true
    ]
);
```

## Breaking Changes

There are no breaking changes for existing installations. The module maintains full backward compatibility while adding support for Silverstripe 5.

## Testing

The module includes PHPUnit configuration for testing across both Silverstripe 4 and 5 environments. 