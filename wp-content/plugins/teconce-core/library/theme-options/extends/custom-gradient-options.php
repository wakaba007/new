<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: Gradient color
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'CSF_Field_teconce_gradient' ) ) {
  class CSF_Field_teconce_gradient extends CSF_Fields {

     public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $default_attr = ( ! empty( $this->field['default'] ) ) ? ' data-default-color="'. esc_attr( $this->field['default'] ) .'"' : '';

      echo $this->field_before();
      echo '<input type="text" name="'. esc_attr( $this->field_name() ) .'" value="'. esc_attr( $this->value ) .'" class="csf-color teconcegradient-'.$this->field['id'].'"'. $default_attr . $this->field_attributes() .'/>';
      echo $this->field_after();
      
      ?>
<script>
jQuery(document).ready(function($){
    $('.teconcegradient-<?php echo $this->field['id'];?>').coloringPick({
	'show_input': false,
	'theme': 'dark',
	'picker_text': 'Select Color',
	'swatches':['#fff','#000','#2E4053','#138D75','#2471A3','#F4D03F','#A93226'],
});
});
</script>
  <?php  }

    public function output() {

      $output    = '';
      $elements  = ( is_array( $this->field['output'] ) ) ? $this->field['output'] : array_filter( (array) $this->field['output'] );
      $important = ( ! empty( $this->field['output_important'] ) ) ? '!important' : '';
      $mode      = ( ! empty( $this->field['output_mode'] ) ) ? $this->field['output_mode'] : 'color';

      if ( ! empty( $elements ) && isset( $this->value ) && $this->value !== '' ) {
        foreach ( $elements as $key_property => $element ) {
          if ( is_numeric( $key_property ) ) {
            $output = implode( ',', $elements ) .'{'. $mode .':'. $this->value . $important .';}';
            break;
          } else {
            $output .= $element .'{'. $key_property .':'. $this->value . $important .'}';
          }
        }
      }

      $this->parent->output_css .= $output;

      return $output;

    }

  }
}
