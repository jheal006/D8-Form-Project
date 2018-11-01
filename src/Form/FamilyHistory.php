<?php

namespace Drupal\family_history_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * Implements an example form.
 */
class FamilyHistoryForm extends FormBase {

  /**
   * {@inheritdoc}
   */

  public function getFormId() {
    return 'family_history_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {


    $form['#attached']['library'][] = 'family_history_form/library';
    // Family Composition
    // $form['familyComp'] = array(
    //   '#type' => 'container',
    //   '#attributes' => array(
    //     'class' => 'familyComp',
    //   ),
    // );

  ///////////////////////////////
  // Family History
  ///////////////////////////////
  $form['familyHistory']= array(
    '#type' => 'fieldset',
    '#title' => t('Family History'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );

    ///////////////////////////////
    // Family Compisition
    ///////////////////////////////
      $form['familyHistory']['familyComp']= array(
        '#type' => 'fieldset',
        '#title' => t('Family Composition'),
        '#collapsible' => FALSE,
        '#collapsed' => FALSE,
      );

          // Family Comp Parents
          $form['familyHistory']['familyComp']['parents'] = array(
            '#type' => 'fieldset',
            '#title' => $this
              ->t('Parents'),
          );
          $form['familyHistory']['familyComp']['parents']['parent1'] = [
              '#type' => 'select',
              '#title' => $this
                ->t('Select element'),
              '#options' => [
                '1' => $this
                  ->t('Father'),
                '2' => $this
                  ->t('Mother'),
              ],
            ];
            $form['familyHistory']['familyComp']['parents']['parent2'] = [
                '#type' => 'select',
                '#title' => $this
                  ->t('Select element'),
                '#options' => [
                  '1' => $this
                    ->t('Mother'),
                  '2' => $this
                    ->t('Father'),
                ],
              ];

              // Family Comp - Parent(s) Name
              $form['familyHistory']['familyComp']['parents']['name'] = array(
                '#type' => 'fieldset',
                '#title' => $this
                  ->t('Name'),
              );
              $form['familyHistory']['familyComp']['parents']['name']['parent_1'] = array(
                '#type' => 'textfield',
              );
              $form['familyHistory']['familyComp']['parents']['name']['parent_2'] = [
                '#type' => 'textfield',
              ];

            // Family Comp - Parent(s) Occupation
                $form['familyHistory']['familyComp']['parents']['occupation'] = array(
                  '#type' => 'fieldset',
                  '#title' => $this
                    ->t('Occupation'),
                );
                $form['familyHistory']['familyComp']['parents']['occupation']['parent_1'] = array(
                  '#type' => 'textfield',
                );
                $form['familyHistory']['familyComp']['parents']['occupation']['parent_2'] = [
                  '#type' => 'textfield',
                ];

            // Family Comp - Parent(s) Education
                $form['familyHistory']['familyComp']['parents']['education'] = array(
                  '#type' => 'fieldset',
                  '#title' => $this
                    ->t('Education'),
                );
                $form['familyHistory']['familyComp']['parents']['education']['parent_1'] = array(
                  '#type' => 'textfield',
                );
                $form['familyHistory']['familyComp']['parents']['education']['parent_2'] = [
                  '#type' => 'textfield',
                ];

            // Family Comp - Parent(s) General Health
                $form['familyHistory']['familyComp']['parents']['health'] = array(
                  '#type' => 'fieldset',
                  '#title' => $this
                    ->t('General Health'),
                );
                $form['familyHistory']['familyComp']['parents']['health']['parent_1'] = array(
                  '#type' => 'textfield',
                );
                $form['familyHistory']['familyComp']['parents']['health']['parent_2'] = [
                  '#type' => 'textfield',
                ];

            // Family Comp - Sibling(s)
                $form['familyHistory']['familyComp']['siblings']= array(
                  '#type' => 'fieldset',
                  '#title' => t('Siblings'),
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );
                $form['familyHistory']['familyComp']['siblings']['none'] = [
                  '#type' => 'checkbox',
                  '#title' => $this->t('None'),
                ];

            // Family Comp - Sibling(s) Names & Ages
                $form['familyHistory']['familyComp']['siblings']['names_ages']= array(
                  '#type' => 'fieldset',
                  '#title' => t('Names & Ages'),
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );
                $form['familyHistory']['familyComp']['siblings']['names_ages']['number']['brothers']= array(
                  '#type' => 'textfield',
                  '#title' => t('# of brothers: '),
                );$form['familyHistory']['familyComp']['siblings']['names_ages']['number']['sisters']= array(
                  '#type' => 'textfield',
                  '#title' => t('# of sisters: '),
                  '#attributes' => array(
                      'class' => 'numbers',
                    ),
                );
                $form['familyHistory']['familyComp']['siblings']['names_ages']['brothers']= array(
                  '#type' => 'textfield',
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );
                $form['familyHistory']['familyComp']['siblings']['names_ages']['sisters']= array(
                  '#type' => 'textfield',
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );

            // Family Comp - Children
                $form['familyHistory']['familyComp']['children']= array(
                  '#type' => 'fieldset',
                  '#title' => t('Children'),
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );
                $form['familyHistory']['familyComp']['children']['none'] = [
                  '#type' => 'checkbox',
                  '#title' => $this->t('None'),
                ];
            // Family Comp - Children Names & Ages
                $form['familyHistory']['familyComp']['children']['names_ages']= array(
                  '#type' => 'fieldset',
                  '#title' => t('Names & Ages'),
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );
                $form['familyHistory']['familyComp']['children']['names_ages']['number']['sons']= array(
                  '#type' => 'textfield',
                  '#title' => t('# of sons: '),
                );$form['familyHistory']['familyComp']['children']['names_ages']['number']['daughters']= array(
                  '#type' => 'textfield',
                  '#title' => t('# of daughters: '),
                  '#attributes' => array(
                      'class' => 'numbers',
                    ),
                );
                $form['familyHistory']['familyComp']['children']['names_ages']['sons']= array(
                  '#type' => 'textfield',
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );
                $form['familyHistory']['familyComp']['children']['names_ages']['daughters']= array(
                  '#type' => 'textfield',
                  '#collapsible' => FALSE,
                  '#collapsed' => FALSE,
                );

    ///////////////////////////////
    // Parent's Marital Status
    ///////////////////////////////

    $form['familyHistory']['maritalStatus'] = array(
      '#type' => 'fieldset',
      '#title' => t("Parent's Marital Status"),
      '#attributes' => array(
        'class' => 'maritalStatus',
      ),
    );
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

    ///////////////////////////////
    // General Questions Text Area
    ///////////////////////////////

    $form['familyHistory']['textarea'] = array(
      '#type' => 'fieldset',
    );
        $form['familyHistory']['textarea']['text'] = array(
        '#type' => 'textarea',
        );
        $form['familyHistory']['textarea']['family_relations'] = array(
        '#type' => 'textarea',
        '#title' => $this
          ->t('Past or present relationship with family members:'),
        );
        $form['familyHistory']['textarea']['stressors'] = array(
        '#type' => 'textarea',
        '#title' => $this
          ->t('Stresssors:'),
        );
          $form['familyHistory']['textarea']['stressors'] = array(
          '#type' => 'checkboxes',
          '#options' => array(
                'None' => $this->t('None reportted'),
                'abuse' => $this->t('Abuse'),
                'illness' => $this->t('Illness'),
                'death' => $this->t('Death'),
                'move' => $this->t('Move'),
                'separation' => $this->t('Separation or divorce'),
              ),
          '#title' => $this->t('What standardized tests did you take?'),
          );
        $form['familyHistory']['textarea']['mental_substance'] = array(
        '#type' => 'textarea',
        '#title' => $this
          ->t('Family history of Mental Health Issues/Substance Abuse/Other::'),
        );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
   public function submitForm(array &$form, FormStateInterface $form_state) {

   }
}
