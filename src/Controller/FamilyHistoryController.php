<?php

namespace Drupal\family_history\Controller;

use Drupal\Core\Database\Database;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;


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
        // Actions
        $edit_link = Link::createFromRoute($this->t('Edit'), 'family_history.add',['id'=>$content->id], [
            'absolute' =>
              TRUE
        ]);
        $delete_link = Link::createFromRoute($this->t('Delete'), 'family_history.add',['id'=>$content->id], [
            'absolute' =>
              TRUE
        ]);
        $build_link_action = [
              'action_edit' => [
              'title' => 'Edit1',
              '#type' => 'html_tag',
              '#value' => $edit_link->toString(),
              '#tag' => 'div',
              '#attributes'=>['class'=>['action-edit']]
             ],
             'action_delete' => [
               '#type' => 'html_tag',
               '#value' => $delete_link->toString(),
               '#tag' => 'div',
               '#attributes'=>['class'=>['action-edit']]
               ]
             ];
        $rows[] = array(
          'data' => [
            '#form' => 'FORM # ' . $content->id,
            '#edit' => \Drupal::service('renderer')->render($build_link_action['action_edit']),
            '#delete' => \Drupal::service('renderer')->render($build_link_action['action_delete']),
          ],

        );



       }
  // Create the header.
      $header = array('List of Forms', 'Edit', 'Delete');

      $output = array(
        '#theme' => 'table',    // Here you can write #type also instead of #theme.
        '#header' => $header,
        '#rows' => $rows,
      );
      var_dump($rows);
      return $output;
    }

}
