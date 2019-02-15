<?php

namespace Drupal\family_history\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Link;
use Drupal\Core\Render\Element;
/**
 * Class DeleteForm.
 *
 * @package Drupal\mydata\Form
 */
 class DeleteForm extends ConfirmFormBase {
 /**
    * {@inheritdoc}
    */
   public function getFormId() {
     return 'delete_form';
   }
   public $id;
   public function getQuestion() {
     return t('Are you sure you want to delete form #%id?', array('%id' => $this->id));
   }
  public function getCancelUrl() {
    return Link::createFromRoute('family_history.entry_list');
  }
  public function getDescription() {
    return t('Only do this if you are sure!');
  }
 /**
  * {@inheritdoc}
  */
 public function getConfirmText() {
   return t('Delete it!');
 }
 /**
  * {@inheritdoc}
  */
 public function getCancelText() {
   return t('Cancel');
 }
 /**
  * {@inheritdoc}
  */
 public function buildForm(array $form, FormStateInterface $form_state, $id = NULL) {
    $this->id = $id;
   return parent::buildForm($form, $form_state);
 }
 /**
   * {@inheritdoc}
   */
   public function validateForm(array &$form, FormStateInterface $form_state) {
     parent::validateForm($form, $form_state);
   }
   /**
    * {@inheritdoc}
    */
   public function submitForm(array &$form, FormStateInterface $form_state) {
        $query = \Drupal::database();
        $query->delete('family_history')
                    ->condition('id',$this->id)
                   ->execute();
              drupal_set_message("succesfully deleted");
             $form_state->setRedirect('family_history.entry_list');
   }
 }
