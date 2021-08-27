<? /*
    @package pardusthecat

    ====================================================================
          ADD CUSTOM FIELDS WITF Advanced Custom Fields Plugin
    ====================================================================
*/

if( function_exists('acf_add_local_field_group') ):
  /*  ================
        FIELD GROUPS
      ================
  */

  // Portfolio Field Group
  // Price field group
  acf_add_local_field_group(array(
    'key' => 'price_group',
    'title' => 'Artwork Price',
    'position' => 'side',
    'menu_order' => 0,
    'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'pardus-artwork-post',
        ),
      ),
    ),
  ));
  // Sale Price Field Group  
  acf_add_local_field_group(array(
    'key' => 'saleprice_group',
    'title' => 'Sale Price',
    'position' => 'side',
    'menu_order' => 1,
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'pardus-artwork-post',
        ),
      ),
    ),
  ));
  // Buy Now Field Group
  acf_add_local_field_group(array(
    'key' => 'buynow_group',
    'title' => 'Buy Now Link',
    'position' => 'side',
    'menu_order' => 2,
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'pardus-artwork-post',
        ),
      ),
    ),
  ));
  /*  ================
          FIELDS
      ================
  */
  // Buy Now field
  acf_add_local_field(array(
    'key' => 'buynow_field',
    'label' => 'Link to shop',
    'name' => 'buynow',
    'type' => 'url',
    'instructions' => 'Insert external shop link for artwork',
    'parent' => 'buynow_group'
  ));
  // Price field  
  acf_add_local_field(array(
    'key' => 'price_field',
    'label' => 'Price',
    'name' => 'price',
    'type' => 'number',
    'instructions' => 'No need to include currency symbol ( $ )',
    'parent' => 'price_group'
  ));
  // Sale Price field  
  acf_add_local_field(array(
    'key' => 'sale_price_field',
    'label' => 'Sale Price',
    'name' => 'saleprice',
    'type' => 'number',
    'instructions' => 'No need to include currency symbol ( $ )',
    'parent' => 'saleprice_group'
  ));

endif;