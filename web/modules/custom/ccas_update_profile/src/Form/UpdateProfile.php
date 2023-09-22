<?php
namespace Drupal\ccas_update_profile\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class UpdateProfile extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return "ccas_update_profile_wizard_form";
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    if ($form_state->has('page_num')) {
      $current_page = $form_state->get('page_num');
      switch ($current_page) {
        case 2:
          return $this->pageTwo($form, $form_state);
        case 3:
          return $this->pageThree($form, $form_state);
      }
    }

    $form_state->set('page_num', 1);

    $form['#attributes']['class'] = ['container-inline', 'form-inline'];

    $form['personal_data'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Informations personnelles'),
    ];
    $form['personal_data']['civilite'] = [
      '#type' => 'select',
      '#title' => $this->t('Civilité'),
      '#default_value' => $form_state->getValue('civilite', 'MR'),
      '#options' => [
        'MR' => 'M.',
        'MRS' => 'Mme',
      ],
      '#required' => TRUE,
    ];
    $form['personal_data']['nom_naissance'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom de naissance'),
      '#default_value' => $form_state->getValue('nom_naissance', ''),
      '#required' => FALSE,
    ];
    $form['personal_data']['nom'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom'),
      '#default_value' => $form_state->getValue('nom', ''),
      '#required' => TRUE,
    ];
    $form['personal_data']['prenom'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prénom'),
      '#default_value' => $form_state->getValue('prenom', ''),
      '#required' => TRUE,
    ];
    $form['personal_data']['lib_sit_famille'] = [
      '#type' => 'select',
      '#title' => $this->t('Situation familiale'),
      '#default_value' => $form_state->getValue('lib_sit_famille', 'mariee'),
      '#options' => [
        'celibataire' => 'Célibataire',
        'mariee' => 'Marié(e)',
        'divorce' => 'Divorcé(e)',
      ],
      '#required' => TRUE,
    ];
    $form['personal_data']['date_naissance'] = [
      '#type' => 'date',
      '#title' => $this->t('Date de naissance'),
      '#default_value' => $form_state->getValue('date_naissance', ''),
      '#required' => TRUE,
      '#palceholder' => "JJ/MM/AAAA",
    ];


    $form['main_adress'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Adresse principale'),
    ];
    $form['main_adress']['adr_dom2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('N° et libellé de la voie'),
      '#default_value' => $form_state->getValue('adr_dom2', ''),
    ];
    $form['main_adress']['adr_dom1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Entrée-Bâtiment-Immeuble-Résidence '),
      '#default_value' => $form_state->getValue('adr_dom1', ''),
    ];
    $form['main_adress']['adr_dom3'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Lieu-dit, poste restante, boite postale'),
      '#default_value' => $form_state->getValue('adr_dom3', ''),
    ];
    $form['main_adress']['code_postal_dom'] = [
      '#type' => 'number',
      '#title' => $this->t('Code postal'),
      '#default_value' => $form_state->getValue('code_postal_dom', ''),
      '#attributes' => [
        'pattern' => '\d{5,5}',
      ],
    ];
    $form['main_adress']['ville_dom'] = [
      '#type' => 'select',
      '#title' => $this->t('Ville'),
      '#default_value' => $form_state->getValue('ville_dom', ''),
      '#options' => [],
    ];
    $form['main_adress']['code_pays_dom'] = [
      '#type' => 'select',
      '#title' => $this->t('Pays'),
      '#default_value' => $form_state->getValue('code_pays_dom', ''),
      '#options' => [],
    ];


    $form['secondary_adress'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Adresse Secondaire'),
    ];
    $form['secondary_adress']['adr_sec2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('N° et libellé de la voie'),
      '#default_value' => $form_state->getValue('adr_sec2', ''),
    ];
    $form['secondary_adress']['adr_sec1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Entrée-Bâtiment-Immeuble-Résidence '),
      '#default_value' => $form_state->getValue('adr_sec1', ''),
    ];
    $form['secondary_adress']['adr_sec3'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Lieu-dit, poste restante, boite postale'),
      '#default_value' => $form_state->getValue('adr_sec3', ''),
    ];
    $form['secondary_adress']['code_postal_sec'] = [
      '#type' => 'number',
      '#title' => $this->t('Code postal'),
      '#default_value' => $form_state->getValue('code_postal_sec', ''),
    ];
    $form['secondary_adress']['ville_sec'] = [
      '#type' => 'select',
      '#title' => $this->t('Ville'),
      '#default_value' => $form_state->getValue('ville_sec', ''),
      '#options' => [],
    ];
    $form['secondary_adress']['code_pays_sec'] = [
      '#type' => 'select',
      '#title' => $this->t('Pays'),
      '#default_value' => $form_state->getValue('code_pays_sec', ''),
      '#options' => [],
    ];
    $form['secondary_adress']['date_infos'] = [
      '#type' => 'html_tag',
      '#tag' => 'label',
      '#value' => $this->t("Période de validité de l'adresse secondaire"),
    ];
    $form['secondary_adress']['date_deb_val_adr_sec'] = [
      '#type' => 'date',
      '#title' => $this->t('Du'),
      '#default_value' => $form_state->getValue('date_deb_val_adr_sec', ''),
      '#required' => FALSE,
      '#palceholder' => "JJ/MM/AAAA",
    ];
    $form['secondary_adress']['date_fin_val_adr_sec'] = [
      '#type' => 'date',
      '#title' => $this->t('au'),
      '#default_value' => $form_state->getValue('date_fin_val_adr_sec', ''),
      '#required' => FALSE,
      '#palceholder' => "JJ/MM/AAAA",
    ];

    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['next'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => $this->t('Next'),
      // Custom submission handler for page 1.
      '#submit' => ['::nextSubmit'],
      // Custom validation handler for page 1.
      '#validate' => ['::nextValidate'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $page_values = $form_state->get('page_values');
    $this->messenger()->addMessage($this->t('The form has been submitted. name="@first @last", year of birth=@year_of_birth', [
      '@first' => $page_values['first_name'],
      '@last' => $page_values['last_name'],
      '@year_of_birth' => $page_values['birth_year'],
    ]));

    $this->messenger()->addMessage($this->t('You like to eat @food, And the favorite color is @color', [
      '@food' => $page_values['food'],
      '@color' => $page_values['color'],
    ]));
  }

  /**
   * Provides custom validation handler for page 1.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function nextValidate(array &$form, FormStateInterface $form_state) {
    $current_page = $form_state->get('page_num');
    dump($current_page);
    if ($current_page == 1) {
      $birth_year = $form_state->getValue('birth_year');

      if ($birth_year != '' && ($birth_year < 1900 || $birth_year > 2000)) {
        // Set an error for the form element with a key of "birth_year".
        $form_state->setErrorByName('birth_year', $this->t('Enter a year between 1900 and 2000.'));
      }
    }
    if ($current_page == 2) {
      $color = $form_state->getValue('color');

      if (!in_array($color, ['Red', 'Green', 'Black'])) {
        $form_state->setErrorByName('color', $this->t('your Color is not RGB.'));
      }
    }
  }

  /**
   * Provides custom submission handler for page 1.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function nextSubmit(array &$form, FormStateInterface $form_state) {
    $current_page = $form_state->get('page_num');
    $values = $form_state->get('page_values');

    if ($current_page > 0 && $form_state->getValue('color')) {
      $values["color"] = $form_state->getValue('color');
    } elseif ($current_page > 1 && $form_state->getValue('food')) {
      $values["food"] = $form_state->getValue('food');
    } else {
      $values = [
        'first_name' => $form_state->getValue('first_name'),
        'last_name' => $form_state->getValue('last_name'),
        'birth_year' => $form_state->getValue('birth_year'),
      ];
    }
    $form_state
      ->set('page_values', $values)
      ->set('page_num', $current_page + 1)
      // Since we have logic in our buildForm() method, we have to tell the form
      // builder to rebuild the form. Otherwise, even though we set 'page_num'
      // to 2, the AJAX-rendered form will still show page 1.
      ->setRebuild(TRUE);
    dump($form_state);
  }

  /**
   * Builds the second step form (page 2).
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The render array defining the elements of the form.
   */
  public function pageTwo(array &$form, FormStateInterface $form_state) {

    $form['description'] = [
      '#type' => 'item',
      '#title' => $this->t('A basic multistep form (page 2)'),
    ];

    $form['color'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Favorite color'),
      '#required' => TRUE,
      '#default_value' => $form_state->getValue('color', ''),
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['back'] = [
      '#type' => 'submit',
      '#value' => $this->t('Back'),
      // Custom submission handler for 'Back' button.
      '#submit' => ['::pageBackward'],
      // We won't bother validating the required 'color' field, since they
      // have to come back to this page to submit anyway.
      '#limit_validation_errors' => [],
    ];

    $form['actions']['next'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => $this->t('Next'),
      // Custom submission handler for page 1.
      '#submit' => ['::nextSubmit'],
      // Custom validation handler for page 1.
      '#validate' => ['::nextValidate'],
    ];
    return $form;
  }

  /**
   * Builds the third step form (page 3).
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The render array defining the elements of the form.
   */
  public function pageThree(array &$form, FormStateInterface $form_state) {

    $form['description'] = [
      '#type' => 'item',
      '#title' => $this->t('A basic multistep form (page 3)'),
    ];

    $form['food'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Favorite food'),
      '#required' => TRUE,
      '#default_value' => $form_state->getValue('food', ''),
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['back'] = [
      '#type' => 'submit',
      '#value' => $this->t('Back'),
      // Custom submission handler for 'Back' button.
      '#submit' => ['::pageBackward'],
      // We won't bother validating the required 'color' field, since they
      // have to come back to this page to submit anyway.
      '#limit_validation_errors' => [],
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#button_type' => 'primary',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }

  /**
   * Provides custom submission handler for 'Back' button (page 2).
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function pageBackward(array &$form, FormStateInterface $form_state) {
    $current_page = $form_state->get('page_num');
    if ($current_page > 1) {
      $form_state
        // Restore values for the first step.
        ->setValues($form_state->get('page_values'))
        ->set('page_num', $current_page - 1)
        // Since we have logic in our buildForm() method, we have to tell the form
        // builder to rebuild the form. Otherwise, even though we set 'page_num'
        // to 1, the AJAX-rendered form will still show page 2.
        ->setRebuild(TRUE);
    }

  }
}
