<?php

namespace Drupal\custom_validation\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Requires a field to have a value when the entity is published.
 *
 * @Constraint(
 *   id = "PhoneNumberRequired",
 *   label = @Translation("Phone number required", context = "Validation"),
 *   type = "string"
 * )
 */
class PhoneNumberRequired extends Constraint {

  public $needsValue = 'Both the fields %phone-fixed and %phone-mobile cannot be empty.';

}
