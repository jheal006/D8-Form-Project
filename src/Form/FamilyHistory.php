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
    // Family Composition
    // $form['familyComp'] = array(
    //   '#type' => 'container',
    //   '#attributes' => array(
    //     'class' => 'familyComp',
    //   ),
    // );.
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
    $form['familyHistory']['familyComp']['parents']['parent1'] = [
      '#type' => 'select',
      '#options' => [
        '1' => $this
          ->t('Father'),
        '2' => $this
          ->t('Mother'),
      ],
    ];
    $form['familyHistory']['familyComp']['parents']['parent2'] = [
      '#type' => 'select',
      '#options' => [
        '1' => $this
          ->t('Mother'),
        '2' => $this
          ->t('Father'),
      ],
    ];

    // Family Comp - Parent(s) Name.
    $form['familyHistory']['familyComp']['parents']['name'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Name'),
    ];
    $form['familyHistory']['familyComp']['parents']['name']['parent_1'] = [
      '#type' => 'textfield',
    ];
    $form['familyHistory']['familyComp']['parents']['name']['parent_2'] = [
      '#type' => 'textfield',
    ];

    // Family Comp - Parent(s) Occupation.
    $form['familyHistory']['familyComp']['parents']['occupation'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Occupation'),
    ];
    $form['familyHistory']['familyComp']['parents']['occupation']['parent_1'] = [
      '#type' => 'textfield',
    ];
    $form['familyHistory']['familyComp']['parents']['occupation']['parent_2'] = [
      '#type' => 'textfield',
    ];

    // Family Comp - Parent(s) Education.
    $form['familyHistory']['familyComp']['parents']['education'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Education'),
    ];
    $form['familyHistory']['familyComp']['parents']['education']['parent_1'] = [
      '#type' => 'textfield',
    ];
    $form['familyHistory']['familyComp']['parents']['education']['parent_2'] = [
      '#type' => 'textfield',
    ];

    // Family Comp - Parent(s) General Health.
    $form['familyHistory']['familyComp']['parents']['health'] = [
      '#type' => 'fieldset',
      '#title' => $this
        ->t('General Health'),
    ];
    $form['familyHistory']['familyComp']['parents']['health']['parent_1'] = [
      '#type' => 'textfield',
    ];
    $form['familyHistory']['familyComp']['parents']['health']['parent_2'] = [
      '#type' => 'textfield',
    ];

    // Family Comp - Sibling(s)
    $form['familyHistory']['familyComp']['siblings'] = [
      '#type' => 'fieldset',
      '#title' => t('Siblings'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['siblings']['none'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('None'),
    ];

    // Family Comp - Sibling(s) Names & Ages.
    $form['familyHistory']['familyComp']['siblings']['names_ages'] = [
      '#type' => 'fieldset',
      '#title' => t('Names & Ages'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['siblings']['names_ages']['number']['brothers'] = [
      '#type' => 'textfield',
      '#title' => t('# of brothers: '),
    ];$form['familyHistory']['familyComp']['siblings']['names_ages']['number']['sisters'] = [
      '#type' => 'textfield',
      '#title' => t('# of sisters: '),
      '#attributes' => [
        'class' => 'numbers',
      ],
    ];
    $form['familyHistory']['familyComp']['siblings']['names_ages']['brothers'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['siblings']['names_ages']['sisters'] = [
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
    $form['familyHistory']['familyComp']['children']['none'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('None'),
    ];
    // Family Comp - Children Names & Ages.
    $form['familyHistory']['familyComp']['children']['names_ages'] = [
      '#type' => 'fieldset',
      '#title' => t('Names & Ages'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['children']['names_ages']['number']['sons'] = [
      '#type' => 'textfield',
      '#title' => t('# of sons: '),
    ];$form['familyHistory']['familyComp']['children']['names_ages']['number']['daughters'] = [
      '#type' => 'textfield',
      '#title' => t('# of daughters: '),
      '#attributes' => [
        'class' => 'numbers',
      ],
    ];
    $form['familyHistory']['familyComp']['children']['names_ages']['sons'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];
    $form['familyHistory']['familyComp']['children']['names_ages']['daughters'] = [
      '#type' => 'textfield',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
    ];

    //
    // Parent's Marital Status
    // .
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
    $form['familyHistory']['textarea']['family_relations'] = [
      '#type' => 'textarea',
      '#title' => $this
        ->t('Past or present relationship with family members:'),
    ];
    $form['familyHistory']['textarea']['stressors'] = [
      '#type' => 'textarea',
      '#title' => $this
        ->t('Stresssors:'),
    ];
    $form['familyHistory']['checkboxes']['stressors'] = [
      '#title' => $this
        ->t('Stresssors:'),
      '#type' => 'checkboxes',
      '#options' => [
        'None' => $this->t('None reported'),
        'abuse' => $this->t('Abuse'),
        'illness' => $this->t('Illness'),
        'death' => $this->t('Death'),
        'move' => $this->t('Move'),
        'separation' => $this->t('Separation or divorce'),
      ],
    ];
    $form['familyHistory']['textarea']['mental_substance'] = [
      '#type' => 'textarea',
      '#title' => $this
        ->t('Family history of Mental Health Issues/Substance Abuse/Other::'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
