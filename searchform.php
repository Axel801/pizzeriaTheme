<?php
/**
* Template for displaying search forms in Twenty Seventeen
*
* @package WordPress
* @subpackage pizzeriaWp
* @since 1.0
* @version 1.0
*/

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group mb-3">
    <label for="<?php echo $unique_id; ?>" class="d-none">
      <span class="screen-reader-text "><?php echo _x( 'Search for:', 'label', 'al_pizzeriaTheme' ); ?></span>
      </label>
      <input type="seach" id="<?php echo $unique_id; ?>" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'al_pizzeriaTheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
      <div class="input-group-append">
        <button type="submit" class="search-submit input-group-text btn-brand-primary  border-0"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>
