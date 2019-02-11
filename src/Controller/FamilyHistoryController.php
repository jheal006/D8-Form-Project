<?php

namespace Drupal\family_history\Controller;

use Drupal\Core\Database\Database;
use Drupal\Core\Controller\ControllerBase;


class FamilyHistoryController extends ControllerBase {

  /**
   * entryList.
   *
   * @return string
   *   Return Table format data.
   */

   public function entryList() {

      $result = \Drupal::database()->select('family_history', 'n')
              ->fields('n', array('id'))
              ->execute()->fetchAll();
  // Create the row element.
      $rows = array();
      foreach ($result as $row => $content) {
        $rows[] = array(
          'data' => array('FORM # ' . $content->id)
        );
      }
  // Create the header.
      $header = array('List of Forms');
      $output = array(
        '#theme' => 'table',    // Here you can write #type also instead of #theme.
        '#header' => $header,
        '#rows' => $rows,
      );
      return $output;
    }

}
