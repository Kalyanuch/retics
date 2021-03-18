<?php
/**
 * @file
 * Contains \Drupal\currency_informer\Plugin\Block\CurrencyInformer
 */

namespace Drupal\currency_informer\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\currency_informer\CurrencyInformerConfigModel;

/**
 * Provides an Currency informer Block
 * @Block(
 *   id = "currency_informer_block",
 *   admin_label = @Translation("Currency Informer Block")
 * )
 */
class CurrencyInformer extends BlockBase {

  /**
   * @inheritDoc
   */
  public function build()
  {
    $config = \Drupal::config('currency_informer.settings');

    if(!array_key_exists($config->get('informer_color', CurrencyInformerConfigModel::CURRENCY_INFORMER_COLOR_DEFAULT), CurrencyInformerConfigModel::getColorsList())) {
      $color = CurrencyInformerConfigModel::CURRENCY_INFORMER_COLOR_DEFAULT;
    } else {
      $color = $config->get('informer_color');
    }

    if($config->get('informer_type', CurrencyInformerConfigModel::CURRENCY_INFORMER_BLOCK) === CurrencyInformerConfigModel::CURRENCY_INFORMER_CALCULATOR) {
      // Calculator
      $out = '<div id="minfin-informer-m1Fn-calc">Загружаем <a href="https://minfin.com.ua/currency/" target="_blank">курсы валют</a> от minfin.com.ua</a></div>';
      $out .= '<script>var iframe = \'<ifra\'+\'me width="200" height="112" fram\'+\'eborder="0" src="https://informer.minfin.com.ua/gen/calc/nbu/?color=' . $color . '" vspace="0" scrolling="no" hspace="0" allowtransparency="true"style="width:200px;height:112px;ove\'+\'rflow:hidden;"></iframe>\';var cl = \'minfin-informer-m1Fn-calc\';document.getElementById(cl).innerHTML = iframe; </script>';
      $out .= '<noscript><img src="https://informer.minfin.com.ua/gen/img.png" width="1" height="1" alt="minfin.com.ua: курсы валют" title="Курс валют" border="0" /></noscript>';
    } else {
      // Block
      $width = $config->get('informer_width'); // It's default value. Can be from 150 to 350
      $out = '<div id="minfin-informer-m1Fn-currency">Загружаем <a href="https://minfin.com.ua/currency/" target="_blank">курсы валют</a> от minfin.com.ua</a></div>';
      $out .= '<script>var iframe = \'<ifra\'+\'me width="' . $width . '" height="120" fram\'+\'eborder="0" src="https://informer.minfin.com.ua/gen/course/?color=' . $color . '" vspace="0" scrolling="no" hspace="0" allowtransparency="true"style="width:' . $width . 'px;height:120px;ove\'+\'rflow:hidden;"></iframe>\';var cl = \'minfin-informer-m1Fn-currency\';document.getElementById(cl).innerHTML = iframe; </script>';
      $out .= '<noscript><img src="https://informer.minfin.com.ua/gen/img.png" width="1" height="1" alt="minfin.com.ua: курсы валют" title="Курс валют" border="0" /></noscript>';
    }

    return [
      '#type' => 'inline_template',
      '#template' => $out,
      '#context' => ['url' => 'https://informer.minfin.com.ua/gen/calc/nbu/']
    ];
  }
}
