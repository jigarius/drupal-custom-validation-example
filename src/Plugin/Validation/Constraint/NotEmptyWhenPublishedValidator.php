<?php

namespace Drupal\custom_validation\Plugin\Validation\Constraint;

use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\Core\Field\FieldItemListInterface;
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
    // Since the constraint was added to an field, $value will represent
    // a list of field items.
    /** @var \Drupal\Core\Field\FieldItemListInterface $items */
    $items =& $value;
    /** @var \Drupal\Core\Entity\ContentEntityInterface $entity */
    $entity = $this->context->getRoot()->getValue();
    if (
      // If the entity can be published.
      $entity instanceof EntityPublishedInterface &&
      // If the entity is published.
      $entity->isPublished() &&
      // If the provided value is empty.
      $items->isEmpty()
    ) {
      $this->context->addViolation($constraint->needsValue, [
        '%field' => $items->getFieldDefinition()->getLabel(),
      ]);
    }
  }

}
