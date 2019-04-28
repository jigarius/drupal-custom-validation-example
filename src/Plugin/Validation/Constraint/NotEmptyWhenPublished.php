<?php

namespace Drupal\custom_validation\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Requires a field to have a value when the entity is published.
 *
 * @Constraint(
 *   id = "NotEmptyWhenPublished",
 *   label = @Translation("Not empty when published", context = "Validation"),
 *   type = "string"
 * )
 */
class NotEmptyWhenPublished extends Constraint {

  public $needsValue = '%field field cannot be empty at the time of publication.';

}
