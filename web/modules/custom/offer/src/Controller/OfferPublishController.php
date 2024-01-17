<?php
namespace Drupal\offer\Controller;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Url;
use Drupal\offer\Entity\Offer;
use Symfony\Component\HttpFoundation\RedirectResponse;
/**
* Class OfferPublishController
*/
class OfferPublishController extends ControllerBase {
  public function Render(Offer $offer) {
    // We set the moderation to published
    $new_state = 'published';
    $offer->set('moderation_state', $new_state);
    if ($offer instanceof RevisionLogInterface) {
      $offer->setRevisionLogMessage('Changement de l\'état de modération en Publié.');
      $offer->setRevisionUserId($this->currentUser()->id());
    }
    $offer->save();
    $publishedOffer = Url::fromRoute('entity.offer.canonical', ['offer' => $offer->id()]);
    \Drupal::messenger()->addMessage($offer->label() . ' est publié(e) par '.$this->currentUser()->getDisplayName().'.');
    return new RedirectResponse($publishedOffer->toString());
  }

  public function Access(Offer $offer) {
    // S'assurer que personne n'essaie de publier les offres des autres.
    $access = AccessResult::allowedIf($offer->access('view'));
    // Assurez-vous que l'état est en  (draft)
    if($offer->get('moderation_state')->getString() != 'draft') {
      $access = AccessResult::forbidden();
    }
    return $access;
  }
}
