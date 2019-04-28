# Drupal Entity Validation API Example

This code was written to support the article [Implementing Custom Validation
Constraints for Entities in Drupal 8 in Drupal](https://jigarius.com/blog/implementing-custom-validation-constraints-entities-drupal-8) on
[jigarius.com](http://jigarius.com/).

## See the code in action

To see the code in action, do the following:

* This repo contains a module. Download the code for this repository
  and rename the directory to `custom_validation`.
* Place the `custom_validation` module directory in to a Drupal installation
  such that `custom_validation.info.yml` is located at
  `modules/custom/custom_validation/custom_validation.info.yml`.
* Make sure `node.article` has an Image (`field_image`) field.
  * This field should not be compulsory.
* Make sure `user` profiles have two phone number fields:
  * Phone (Fixed) - `field_phone_fixed`
  * Phone (Mobile) - `field_phone_mobile`
* Enable the `custom_validation` module.

## Testing validations

### Article must have an image

* Create an article – do not add an image and save it as *unpublished*.
  * **Note:** You should be able to save the node.
* Edit the node and try to save it as *published*.
  * **Note:** You should not be able to save the node without adding an image.

### User must have at least one phone number

* Create a user account – leave *Phone (Fixed)* and *Phone (Mobile)* empty.
  * **Note:** You should not be able to save the user account.
