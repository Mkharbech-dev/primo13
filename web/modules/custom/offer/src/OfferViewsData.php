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
    return $data;
  }
}
