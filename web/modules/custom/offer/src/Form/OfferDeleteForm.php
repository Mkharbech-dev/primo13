<?php
/**
 * @file
 * Contains \Drupal\offer\Form\OfferDeleteForm.
 */
namespace Drupal\offer\Form;
use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
/**
 * Provides a form for deleting a content_entity_example entity.
 *
 * @ingroup offer
 */
class OfferDeleteForm extends ContentEntityConfirmFormBase {
  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    $name = $this->entity->label();
    return $this->t('Etes-vous sûr que vous voulez supprimer '.$name);
  }
  /**
   * {@inheritdoc}
   *
   * If the delete command is canceled, return to the offer.
   */
  public function getCancelUrl() {
    return Url::fromRoute('entity.offer.collection', ['offer' => $this->entity->id()]);
  }
  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }
  /**
   * {@inheritdoc}
   *
   * Delete the entity
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->delete();
    $this->logger('offer')->notice('deleted %title.',
      array(
        '%title' => $this->entity->label(),
      ));
    \Drupal::messenger()->addMessage('Votre offre a été supprimée avec succés.');
    // Redirect to offer list after delete.
    $form_state->setRedirect('entity.offer.collection');
  }
}
