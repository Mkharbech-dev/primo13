<?php
namespace Drupal\offer;
use Drupal\views\EntityViewsData;
/**
 * Fournit des données de vues pour les entités d’offre.
 *
 */
class OfferViewsData extends EntityViewsData {
  /**
   * Renvoie les données de vues pour l'entité.
   */
  public function getViewsData() {
    $data = parent::getViewsData();
    $data['offer']['offer_entity_moderation_state_views_field'] = [
      'title' => t('Moderation status'),
      'field' => array(
        'title' => t('Moderation status'),
        'help' => t('Voir le statut de entitié offer.'),
        'id' => 'offer_entity_moderation_state_views_field',
      ),
    ];
    return $data;
  }
}
