<?php
/**
 * @file
 * Contains \Drupal\weather_informer\Plugin\Block\WeatherInformer
 */

namespace Drupal\weather_informer\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an Weather informer Block
 * @Block(
 *   id = "weather_informer_block",
 *   admin_label = @Translation("Weather Informer Block")
 * )
 */
class WeatherInformer extends BlockBase {

  /**
   * @inheritDoc
   */
  public function build()
  {
    return [
      '#type' => 'inline_template',
      '#template' => '<iframe width="200" height="240" frameborder="0" scrolling="no" src="https://pogodnik.com/uk/informer/daily"> Подивитись прогноз погоди на <a href="https://pogodnik.com/uk"> <img src="https://pogodnik.com/uk/images/prognoz-pogody-200x240.png"> </a> </iframe>',
      '#context' => ['url' => 'https://pogodnik.com/uk/informer/daily']
    ];
  }
}
