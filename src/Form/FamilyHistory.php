<?php

//THIS IS THE FILEPATH FROM THE CUSTOM DIR!!!!
namespace Drupal\family_history\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;

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

    $connection = Database::getConnection();

    if (isset($_GET['id'])) {
      $query = $connection->select('family_history', 'n')
        ->condition('id', $_GET['id'])
        ->fields('n');
      $record = $query->execute()->fetchAssoc();
    }

    $form['#attached']['library'][] = 'family_history/family_history';
    //
    // Family History
    // .
    $form['family_history'] = [
      '#type' => 'fieldset',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    //
    // Family Compisition
    // .
    $form['family_history']['family_comp'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Family Composition'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    // Family Comp Parents.
    $form['family_history']['family_comp']['parents'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Parents'),
    ];
    $form['family_history']['family_comp']['parents']['parent_1'] = [
      '#type' => 'select',
      '#options' => [
        'Father' => $this
          ->t('Father'),
        'Mother' => $this
          ->t('Mother'),
          '#default_value' => (isset($record['parent_1']) && $_GET['id']) ? $record['parent_1']: 'Father',
      ],
    ];
    $form['family_history']['family_comp']['parents']['parent_2'] = [
      '#type' => 'select',
      '#options' => [
        'Father' => $this
          ->t('Father'),
        'Mother' => $this
          ->t('Mother'),
      ],
      '#default_value' => (isset($record['parent_2']) && $_GET['id']) ? $record['parent_2']: 'Mother',
    ];

    // Family Comp - Parent(s) Name.
    $form['family_history']['family_comp']['parents']['name'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Name'),
    ];
    $form['family_history']['family_comp']['parents']['name']['parent_1_name'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_1_name']) && $_GET['id']) ? $record['parent_1_name']:'',
    ];
    $form['family_history']['family_comp']['parents']['name']['parent_2_name'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_2_name']) && $_GET['id']) ? $record['parent_2_name']:'',
    ];

    // Family Comp - Parent(s) Occupation.
    $form['family_history']['family_comp']['parents']['occupation'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Occupation'),
    ];
    $form['family_history']['family_comp']['parents']['occupation']['parent_1_occupation'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_1']) && $_GET['id']) ? $record['parent_1_occupation']: '',
    ];
    $form['family_history']['family_comp']['parents']['occupation']['parent_2_occupation'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_2']) && $_GET['id']) ? $record['parent_2_occupation']: '',
    ];

    // Family Comp - Parent(s) Education.
    $form['family_history']['family_comp']['parents']['education'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Education'),
    ];
    $form['family_history']['family_comp']['parents']['education']['parent_1_education'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_1_education']) && $_GET['id']) ? $record['parent_1_education']: '',
    ];
    $form['family_history']['family_comp']['parents']['education']['parent_2_education'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_2_education']) && $_GET['id']) ? $record['parent_2_education']: '',
    ];

    // Family Comp - Parent(s) General Health.
    $form['family_history']['family_comp']['parents']['health'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('General Health'),
    ];
    $form['family_history']['family_comp']['parents']['health']['parent_1_health'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_1_health']) && $_GET['id']) ? $record['parent_1_health']: '',
    ];
    $form['family_history']['family_comp']['parents']['health']['parent_2_health'] = [
      '#type' => 'textfield',
      '#required' => TRUE,
      '#default_value' => (isset($record['parent_2_health']) && $_GET['id']) ? $record['parent_2_health']: '',
    ];

    // Family Comp - Sibling(s)
    $form['family_history']['family_comp']['siblings'] = [
      '#type' => 'fieldset',
      '#title' => t('Siblings'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['family_history']['family_comp']['siblings']['siblings_none'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('None'),
      '#default_value' => (isset($record['siblings_none']) && $_GET['id']) ? $record['siblings_none']: 0,
    ];

    // Family Comp - Sibling(s) Names & Ages.
    $form['family_history']['family_comp']['siblings']['names_ages'] = [
      '#type' => 'fieldset',
      '#title' => t('Names & Ages'),
      '#attributes' => [
        'class' => 'siblings'
      ],
    ];
    $form['family_history']['family_comp']['siblings']['names_ages']['brothers']['brothers_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of brothers: '),
      '#default_value' => (isset($record['brothers_number']) && $_GET['id']) ? $record['brothers_number']: 0,
    ];
    $form['family_history']['family_comp']['siblings']['names_ages']['brothers']['brothers_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
      '#default_value' => (isset($record['brother_list']) && $_GET['id']) ? $record['brother_list']: '',
    ];
    $form['family_history']['family_comp']['siblings']['names_ages']['sisters']['sisters_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of sisters: '),
      '#default_value' => (isset($record['sisters_number']) && $_GET['id']) ? $record['sisters_number']: 0,
    ];
    $form['family_history']['family_comp']['siblings']['names_ages']['sisters']['sisters_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
      '#default_value' => (isset($record['sisters_list']) && $_GET['id']) ? $record['sisters_list']: '',
    ];

    // Family Comp - Children.
    $form['family_history']['family_comp']['children'] = [
      '#type' => 'fieldset',
      '#title' => t('Children'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['family_history']['family_comp']['children']['children_none'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('None'),
    ];
    // Family Comp - Children Names & Ages.
    $form['family_history']['family_comp']['children']['names_ages'] = [
      '#type' => 'fieldset',
      '#title' => t('Names & Ages'),
      '#attributes' => [
        'class' => 'children'
      ],
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['family_history']['family_comp']['children']['names_ages']['sons']['sons_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of sons: '),
    ];
    $form['family_history']['family_comp']['children']['names_ages']['sons']['sons_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['family_history']['family_comp']['children']['names_ages']['daughters']['daughters_number'] = [
      '#type' => 'textfield',
      '#title' => t('# of daughters: '),
    ];
    $form['family_history']['family_comp']['children']['names_ages']['daughters']['daughters_list'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    //
    // Parent's Marital Status
    //
    $form['family_history']['maritalStatus'] = [
      '#type' => 'fieldset',
      '#title' => t("Parent's Marital Status"),
      '#attributes' => [
        'class' => 'maritalStatus',
      ],
    ];
    $form['family_history']['maritalStatus']['single'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Single, never married'),
    ];
    $form['family_history']['maritalStatus']['engaged'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Engaged'),
    ];
    $form['family_history']['maritalStatus']['married'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Married'),
    ];
    $form['family_history']['maritalStatus']['divorced'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Divorced'),
    ];
    $form['family_history']['maritalStatus']['seperated'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Seperated'),
    ];
    $form['family_history']['maritalStatus']['divorce_process'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Divorce in process'),
    ];
    $form['family_history']['maritalStatus']['livein'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Live-in'),
    ];
    $form['family_history']['maritalStatus']['selfmarriages'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('prior marriages (self)'),
    ];
    $form['family_history']['maritalStatus']['partnermarriages'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('prior marriages (partner)'),
    ];

    //
    // General Questions Text Area
    //
    $form['family_history']['textarea'] = [
      '#type' => 'fieldset',
    ];
    $form['family_history']['textarea']['general_textarea'] = [
      '#type' => 'textarea',
      '#default_value' => '',
    ];
    $form['family_history']['family_relations']['family_relationships_textarea'] = [
      '#type' => 'textarea',
      '#title' => $this
        ->t('Past or present relationship with family members:'),
      '#default_value' => '',
    ];
    $form['family_history']['stressors']['checkboxes'] = [
      '#type' => 'checkboxes',
      '#title' => $this
        ->t('Stressors:'),
      '#options' => [
        'none' => $this->t('None reported'),
        'abuse' => $this->t('Abuse'),
        'illness' => $this->t('Illness'),
        'death' => $this->t('Death'),
        'move' => $this->t('Move'),
        'divorce' => $this->t('Separation or divorce'),
        'military' => $this->t('Military Deployment'),
        'other' => $this->t('Other'),
      ],

    ];
    $form['family_history']['stressors']['stressors_textarea'] = [
      '#type' => 'textarea',
    ];
    $form['family_history']['mental_substance']['mental_textarea'] = [
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
    if (!is_numeric($form_state->getValue('sisters_number'))) {
        $form_state->setErrorByName('sisters_number', $this->t('Please enter a number'));
    } else if (intval($form_state->getValue('sisters_number') < 0)) {
        $form_state->setErrorByName('sisters_number', $this->t('Please provide a positive integer'));
    }
    if (!is_numeric($form_state->getValue('sons_number'))) {
        $form_state->setErrorByName('sons_number', $this->t('Please enter a number'));
    } else if (intval($form_state->getValue('sons_number') < 0)) {
        $form_state->setErrorByName('sons_number', $this->t('Please provide a positive integer'));
    }
    if (!is_numeric($form_state->getValue('daughters_number'))) {
        $form_state->setErrorByName('daughters_number', $this->t('Please enter a number'));
    } else if (intval($form_state->getValue('daughters_number') < 0)) {
        $form_state->setErrorByName('daughters_number', $this->t('Please provide a positive integer'));
    }
  }


  /**
   * {@inheritdoc}
   */

   public function submitForm(array &$form, FormStateInterface $form_state) {

    $retrieve = $form_state->getValue();

    $fields = array(
        'parent_1' => $retrieve['parent_1'],
        'parent_2' => $retrieve['parent_2'],
        'parent_1_name' => $retrieve['parent_1_name'],
        'parent_2_name' => $retrieve['parent_2_name'],
        'parent_1_occupation' => $retrieve['parent_1_occupation'],
        'parent_2_occupation' => $retrieve['parent_2_occupation'],
        'parent_1_education' => $retrieve['parent_1_education'],
        'parent_2_education' => $retrieve['parent_2_education'],
        'parent_1_health' => $retrieve['parent_1_health'],
        'parent_2_health' => $retrieve['parent_2_health'],
        'siblings' => $retrieve['siblings_none'],
        'number_of_brothers' => $retrieve['brothers_number'],
        'brothers_list' => $retrieve['brothers_list'],
        'number_of_sisters' => $retrieve['sisters_number'],
        'sisters_list' => $retrieve['sisters_list'],
        'children' => $retrieve['children_none'],
        'number_of_sons' => $retrieve['sons_number'],
        'sons_list' => $retrieve['sons_list'],
        'number_of_daughters' => $retrieve['daughters_number'],
        'daughters_list' => $retrieve['daughters_list'],
        'single' => $retrieve['single'],
        'engaged' => $retrieve['engaged'],
        'married' => $retrieve['married'],
        'divorced' => $retrieve['divorced'],
        'seperated' => $retrieve['seperated'],
        'divorceprocess' => $retrieve['divorce_process'],
        'livein' => $retrieve['livein'],
        'selfmarriages' => $retrieve['selfmarriages'],
        'partnermarriages' => $retrieve['partnermarriages'],
        'general_textarea' => $retrieve['general_textarea'],
        'mental_textarea' =>  $retrieve['mental_textarea'],
        'family_stressors_none' => $retrieve[['checkboxes','none']] ? 1 : 0,
        'family_stressors_abuse' => $retrieve[['checkboxes','abuse']] ? 1 : 0,
        'family_stressors_illness' => $retrieve[['checkboxes','illness']] ? 1 : 0,
        'family_stressors_death' => $retrieve[['checkboxes','death']] ? 1 : 0,
        'family_stressors_move' => $retrieve[['checkboxes','move']] ? 1 : 0,
        'family_stressors_divorce' => $retrieve[['checkboxes','divorce']] ? 1 : 0,
        'family_stressors_military' => $retrieve[['checkboxes','military']] ? 1 : 0,
        'family_stressors_other' => $retrieve[['checkboxes','other']] ? 1 : 0,
        'family_relationships_textarea' => $retrieve['family_relationships_textarea'],
        'stressors_textarea' => $retrieve['stressors_textarea'],
      );

    $query = \Drupal::database();
    $get = \Drupal::request()->query->get('id');
    if (isset($_GET['id'])) {
      $query->update('family_history')
          ->fields($fields)
          ->condition('id', $get)
          ->execute();
          drupal_set_message("Succesfully Updated");
                 $form_state->setRedirect('family_history.entry_list');
    } else {
      $query->insert('family_history')
          ->fields($fields)
          ->execute();
          drupal_set_message("Succesfully Saved");
                 $form_state->setRedirect('family_history.entry_list');
    };
  }
}
