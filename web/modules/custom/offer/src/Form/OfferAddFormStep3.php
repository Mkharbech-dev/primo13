<?php
/**
 * @file
 * Contains Drupal\offer\Form\OfferForm.
 */

namespace Drupal\offer\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the offer entity edit forms.
 *
 * @ingroup content_entity_example
 */
class OfferAddFormStep3 extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\offer\Entity\Offer */
    $form = parent::buildForm($form, $form_state);
    $form['actions']['submit']['#value'] = t('Enregistrer');
    unset($form['actions']['delete']);
    $form['field_prix']['#states'] = [
      'visible' => [
        ['select[name="field_offer_type"]' => ['value' => 'with_minimum']],
      ]
    ];
    return $form;
  }

  protected function actions(array $form, FormStateInterface $form_state)
  {
    $actions = parent::actions($form, $form_state);
    $actions['go_back'] = [
      '#type' => 'submit',
      '#value' => $this->t('Revenir'),
      '#submit' => ['::goBack'],
      '#weight' => 90,
      '#limit_validation_errors' => []
    ];
    if (array_key_exists('delete', $actions)) {
      unset($actions['delete']);
    }
    $actions['#prefix'] = '<i>Step 3 of 3</i>';
    return $actions;
  }

  public function goBack(array $form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $id = $entity->id();
    $form_state->setRedirect('offer.step2', ['offer' => $id]);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    // Redirect to offer overview after save.
    $form_state->setRedirect('entity.offer.collection');
    \Drupal::messenger()->addMessage('Votre offre a été crée. Cliquez sur le bouton de publication pour le publier.');
    $entity = $this->getEntity();
    $entity->save();
  }

}
