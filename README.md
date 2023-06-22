[![MIT license](http://img.shields.io/badge/license-MIT-brightgreen.svg)](http://opensource.org/licenses/MIT)
[![TYPO3 V10](https://img.shields.io/badge/TYPO3-10-orange.svg)](https://get.typo3.org/version/10)
[![TYPO3 V11](https://img.shields.io/badge/TYPO3-11-orange.svg)](https://get.typo3.org/version/11)
[![TYPO3 V12](https://img.shields.io/badge/TYPO3-12-orange.svg)](https://get.typo3.org/version/12)
[![Minimum PHP Version](https://img.shields.io/badge/php-7.4-8892BF.svg)](https://php.net/)
[![GitHub CI status](https://github.com/netlogix/nxajaxpluginpage/actions/workflows/ci.yml/badge.svg?branch=master)](https://github.com/netlogix/nxajaxpluginpage/actions)

# TYPO3 extension nxajaxpluginpage

# Purpose

Provides a switch to change normal page output to JSON if the request
contains a `Accept: application/json` header.

# Usage

The extension is configured through TypoScript. The relevant settings are in constants
(see `Constants.typoscript` for all configuration values and their descriptions).
