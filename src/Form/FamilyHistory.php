<?php

namespace Drupal\family_history\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an example form.
 */
class FamilyHistory extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'family_history';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['#attached']['library'][] = 'family_history/family_history';
    //
    // Family History
    // .
    $form['familyHistory'] = [
      '#type' => 'fieldset',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    //
    // Family Compisition
    // .
    $form['familyHistory']['familyComp'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Family Composition'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    // Family Comp Parents.
    $form['familyHistory']['familyComp']['parents'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Parents'),
    ];
    $form['familyHistory']['familyComp']['parents']['parent_1'] = [
      '#type' => 'select',
      '#options' => [
        '1' => $this
          ->t('Father'),
        '2' => $this
          ->t('Mother'),
      ],
    ];
    $form['familyHistory']['familyComp']['parents']['parent_2'] = [
      '#type' => 'select',
      '#options' => [
        '1' => $this
          ->t('Father'),
        '2' => $this
          ->t('Mother'),
      ],
      '#default_value' => '2',
    ];

    // Family Comp - Parent(s) Name.
    $form['familyHistory']['familyComp']['parents']['name'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Name'),
    ];
    $form['familyHistory']['familyComp']['parents']['name']['parent_1_name'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];
    $form['familyHistory']['familyComp']['parents']['name']['parent_2_name'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];

    // Family Comp - Parent(s) Occupation.
    $form['familyHistory']['familyComp']['parents']['occupation'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Occupation'),
    ];
    $form['familyHistory']['familyComp']['parents']['occupation']['parent_1_occupation'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];
    $form['familyHistory']['familyComp']['parents']['occupation']['parent_2_occupation'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];

    // Family Comp - Parent(s) Education.
    $form['familyHistory']['familyComp']['parents']['education'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Education'),
    ];
    $form['familyHistory']['familyComp']['parents']['education']['parent_1_education'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];
    $form['familyHistory']['familyComp']['parents']['education']['parent_2_education'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];

    // Family Comp - Parent(s) General Health.
    $form['familyHistory']['familyComp']['parents']['health'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('General Health'),
    ];
    $form['familyHistory']['familyComp']['parents']['health']['parent_1_health'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];
    $form['familyHistory']['familyComp']['parents']['health']['parent_2_health'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
    ];

    // Family Comp - Sibling(s)
    $form['familyHistory']['familyComp']['siblings'] = [
      '#type' => 'fieldset',
      '#title' => t('Siblings'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['siblings']['siblings_none'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('None'),
    ];

    // Family Comp - Sibling(s) Names & Ages.
    $form['familyHistory']['familyComp']['siblings']['names_ages'] = [
      '#type' => 'fieldset',
      '#title' => t('Names & Ages'),
      '#attributes' => [
        'class' => 'siblings'
      ],
    ];
    $form['familyHistory']['familyComp']['siblings']['names_ages']['brothers']['brothers_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of brothers: '),
    ];
    $form['familyHistory']['familyComp']['siblings']['names_ages']['brothers']['brothers_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['siblings']['names_ages']['sisters']['sisters_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of sisters: '),
    ];
    $form['familyHistory']['familyComp']['siblings']['names_ages']['sisters']['sisters_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    // Family Comp - Children.
    $form['familyHistory']['familyComp']['children'] = [
      '#type' => 'fieldset',
      '#title' => t('Children'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['children']['children_none'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('None'),
    ];
    // Family Comp - Children Names & Ages.
    $form['familyHistory']['familyComp']['children']['names_ages'] = [
      '#type' => 'fieldset',
      '#title' => t('Names & Ages'),
      '#attributes' => [
        'class' => 'children'
      ],
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['children']['names_ages']['sons']['sons_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of sons: '),
    ];
    $form['familyHistory']['familyComp']['children']['names_ages']['sons']['sons_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['children']['names_ages']['daughters']['daughters_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of daughters: '),
    ];
    $form['familyHistory']['familyComp']['children']['names_ages']['daughters']['daughters_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    //
    // Parent's Marital Status
    //
    $form['familyHistory']['maritalStatus'] = [
      '#type' => 'fieldset',
      '#title' => t("Parent's Marital Status"),
      '#attributes' => [
        'class' => 'maritalStatus',
      ],
    ];
    $form['familyHistory']['maritalStatus']['single'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Single, never married'),
    ];
    $form['familyHistory']['maritalStatus']['engaged'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Engaged'),
    ];
    $form['familyHistory']['maritalStatus']['married'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Married'),
    ];
    $form['familyHistory']['maritalStatus']['divorced'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Divorced'),
    ];
    $form['familyHistory']['maritalStatus']['seperated'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Seperated'),
    ];
    $form['familyHistory']['maritalStatus']['divorceprocess'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Divorce in process'),
    ];
    $form['familyHistory']['maritalStatus']['livein'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Live-in'),
    ];
    $form['familyHistory']['maritalStatus']['selfmarriages'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('prior marriages (self)'),
    ];
    $form['familyHistory']['maritalStatus']['partnermarriages'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('prior marriages (partner)'),
    ];

    //
    // General Questions Text Area
    //
    $form['familyHistory']['textarea'] = [
      '#type' => 'fieldset',
    ];
    $form['familyHistory']['textarea']['text'] = [
      '#type' => 'textarea',
    ];
    $form['familyHistory']['family_relations']['family_relationships'] = [
      '#type' => 'textarea',
      '#title' => $this
        ->t('Past or present relationship with family members:'),
    ];
    $form['familyHistory']['stressors']['checkboxes'] = [
      '#type' => 'checkboxes',
      '#title' => $this
        ->t('Stressors:'),
      '#options' => [
        'None' => $this->t('None reported'),
        'abuse' => $this->t('Abuse'),
        'illness' => $this->t('Illness'),
        'death' => $this->t('Death'),
        'move' => $this->t('Move'),
        'separation' => $this->t('Separation or divorce'),
        'military' => $this->t('Military Deployment'),
        'other' => $this->t('Other'),
      ],
    ];
    $form['familyHistory']['stressors']['stressors_textarea'] = [
      '#type' => 'textarea',
    ];
    $form['familyHistory']['mental_substance']['mental_textarea'] = [
      '#type' => 'textarea',
      '#title' => $this
        ->t('Family history of Mental Health Issues/Substance Abuse/Other::'),
    ];


    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );

    return $form;
  }

  /**
 * {@inheritdoc}
 */
public function validateForm(array &$form, FormStateInterface $form_state) {
  // element_validate_number(($form_state->getValue('brothers_number'));
  if (!is_numeric($form_state->getValue('brothers_number'))) {
      $form_state->setErrorByName('brothers_number', $this->t('Please enter a number'));
  } else if (intval($form_state->getValue('brothers_number') < 0)) {
      $form_state->setErrorByName('brothers_number', $this->t('Please provide a positive integer'));
  }
}


  /**
   * {@inheritdoc}
   */

   public function submitForm(array &$form, FormStateInterface $form_state) {
    $dk = db_insert('family_history')
    ->fields(array(
      'name' => $form_state->getValue('parent_1_name'),
    ))
    ->execute();
    dsm($dk);
    // foreach ($form_state->getValues() as $key => $value) {
    //   drupal_set_message($key . ': ' . $value);
    // }
  }
  // public function submitForm(array &$form, FormStateInterface $form_state) {
  //  $values = $form_state->getValues();
  //  $this->config('your_module.settings')
  //    ->set('variable_name', $values)
  //    ->save();
  //  parent::submitForm($form, $form_state)
  // }

}
