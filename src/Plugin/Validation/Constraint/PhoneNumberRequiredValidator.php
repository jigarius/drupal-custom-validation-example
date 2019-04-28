<?php

namespace Drupal\custom_validation\Plugin\Validation\Constraint;

use Drupal\Core\Entity\EntityPublishedInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the NotEmptyWhenPublished constraint.
 */
class PhoneNumberRequiredValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($value, Constraint $constraint) {
    // Since the constraint was added to an entity type, $value will
    // represent the User entity.
    /** @var \Drupal\Core\Entity\EntityInterface $entity */
    $entity =& $value;

    // Since we have the entire entity, our validation can check multiple
    // fields. This helps perform validations on the entity as a whole as
    // opposed to only a field.
    if (
      $entity->field_phone_fixed->isEmpty() &&
      $entity->field_phone_mobile->isEmpty()
    ) {
      $this->context->addViolation($constraint->needsValue, [
        '%phone-fixed' => $entity->field_phone_fixed->getFieldDefinition()->getLabel(),
        '%phone-mobile' => $entity->field_phone_mobile->getFieldDefinition()->getLabel(),
      ]);
    }
  }

}
