<?php

namespace Drupal\custom_validation\Plugin\Validation\Constraint;

use Drupal\Core\Entity\EntityPublishedInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the NotEmptyWhenPublished constraint.
 */
class NotEmptyWhenPublishedValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($value, Constraint $constraint) {
    // Since the constraint was added to an entity type, $value will
    // represent the User entity.
    /** @var \Drupal\Core\Field\FieldItemListInterface $items */
    $items =& $value;
    /** @var \Drupal\Core\Entity\ContentEntityInterface $entity */
    $entity = $value->getParent()->getValue();
    if (
      // If the entity can be published.
      $entity instanceof EntityPublishedInterface &&
      $entity->isPublished() &&
      $items->isEmpty()
    ) {
      $this->context->addViolation($constraint->needsValue, [
        '%field' => $items->getFieldDefinition()->getLabel(),
      ]);
    }
  }

}
