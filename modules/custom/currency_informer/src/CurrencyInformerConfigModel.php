<?php
/**
 * @file
 * Contains constants
 */
namespace Drupal\currency_informer;

class CurrencyInformerConfigModel {
  const CURRENCY_INFORMER_BLOCK = 'block';
  const CURRENCY_INFORMER_CALCULATOR = 'calculator';
  const CURRENCY_INFORMER_COLOR_DEFAULT = 'white';
  const CURRENCY_INFORMER_WIDTH_DEFAULT = 250;
  const CURRENCY_INFORMER_WIDTH_MIN = 150;
  const CURRENCY_INFORMER_WIDTH_MAX = 350;

  public static function getTypesList() {
    return [
      self::CURRENCY_INFORMER_BLOCK => 'Block',
      self::CURRENCY_INFORMER_CALCULATOR => 'Calculator'
    ];
  }

  public static function getColorsList() {
    return [
      'white' => 'White',
      'grey' => 'Grey',
      'yellow' => 'Yellow',
      'pink' => 'Pink',
      'blue' => 'Blue',
      'marine' => 'Marine',
      'green' => 'Green',
      'violet' => 'Violet'
    ];
  }
}
