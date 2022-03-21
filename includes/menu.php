<?php
function yem_admin_menu() {
    add_submenu_page('woo-product-table', 'Earn Column Configure', 'You Earn Column', 'edit_theme_options', 'you_earn_manage_codersaiful', 'yem_configuration_page');
}
add_action('admin_menu', 'yem_admin_menu');

function yem_configuration_page(){
    echo '<h1>Manage You Earn Colum</h1>';
    if(  isset( $_POST['data'] ) && isset( $_POST['configure_submit'] ) ){
        $values = ( is_array( $_POST['data'] ) ? $_POST['data'] : false );

        
        $data = $final_data = array();
        if( is_array( $values ) && count( $values ) > 0 ){
            foreach( $values as $key=>$value ){
                if( empty( $value ) ){
                   $data[$key] = false; 
                }else{
                   $data[$key] = $value;  
                }
            }
        }
        update_option( 'yem_values', $data );
    }
    $saved_data = get_option( 'yem_values' );
    //var_dump($saved_data);
    
?>
<div class="fieldwrap yem_wrapper">
    <form action="" method="POST">
        <div class="yem_input_wrapper">
            <label>Target Custom Field Name</label>
            <input type="text" name="data[_yem_target_cf]" value="<?php echo esc_attr( $saved_data['_yem_target_cf'] ); ?>">
            <p>No need real Custom Field, You can use anything. Remember, use 'cf_' as prefix in table shortcode</p>
        </div>
        
        <div class="condition_box_wrapper">
            <div style="border: 1px solid black; padding: 5px;margin: 5px 0;" class="yem_input_wrapper condition_box" data-box="0">
                <h2>Box 1</h2>
                <label>Percentage</label>
                <input type="number" step='any' name="data[_yem_target_percentage][0]" value="<?php echo esc_attr( $saved_data['_yem_target_percentage'][0] ); ?>">
                <label>Min Price</label>
                <input type="number" step='any' name="data[_yem_min_price][0]" value="<?php echo esc_attr( $saved_data['_yem_min_price'][0] ); ?>">

                <label>Max Price</label>
                <input type="number" step='any' name="data[_yem_max_price][0]" value="<?php echo esc_attr( $saved_data['_yem_max_price'][0] ); ?>">
            </div>
            <div style="border: 1px solid black; padding: 5px;margin: 5px 0;" class="yem_input_wrapper condition_box" data-box="1">
                <h2>Box 2</h2>
                <label>Percentage</label>
                <input type="number" step='any' name="data[_yem_target_percentage][1]" value="<?php echo esc_attr( $saved_data['_yem_target_percentage'][1] ); ?>">
                <label>Min Price</label>
                <input type="number" step='any' name="data[_yem_min_price][1]" value="<?php echo esc_attr( $saved_data['_yem_min_price'][1] ); ?>">

                <label>Max Price</label>
                <input type="number" step='any' name="data[_yem_max_price][1]" value="<?php echo esc_attr( $saved_data['_yem_max_price'][1] ); ?>">
            </div>
            
            <div style="border: 1px solid black; padding: 5px;margin: 5px 0;" class="yem_input_wrapper condition_box" data-box="2">
                <h2>Box 3</h2>
                <label>Percentage</label>
                <input type="number" step='any' name="data[_yem_target_percentage][2]" value="<?php echo esc_attr( $saved_data['_yem_target_percentage'][2] ); ?>">
                <label>Min Price</label>
                <input type="number" step='any' name="data[_yem_min_price][2]" value="<?php echo esc_attr( $saved_data['_yem_min_price'][2] ); ?>">

                <label>Max Price</label>
                <input type="number" step='any' name="data[_yem_max_price][2]" value="<?php echo esc_attr( $saved_data['_yem_max_price'][2] ); ?>">
            </div>
            
            <div style="border: 1px solid black; padding: 5px;margin: 5px 0;" class="yem_input_wrapper condition_box" data-box="3">
                <h2>Box 4</h2>
                <label>Percentage</label>
                <input type="number" step='any' name="data[_yem_target_percentage][3]" value="<?php echo esc_attr( $saved_data['_yem_target_percentage'][3] ); ?>">
                <label>Min Price</label>
                <input type="number" step='any' name="data[_yem_min_price][3]" value="<?php echo esc_attr( $saved_data['_yem_min_price'][3] ); ?>">

                <label>Max Price</label>
                <input type="number" step='any' name="data[_yem_max_price][3]" value="<?php echo esc_attr( $saved_data['_yem_max_price'][3] ); ?>">
            </div>
            
            <div style="border: 1px solid black; padding: 5px;margin: 5px 0;" class="yem_input_wrapper condition_box" data-box="4">
                <h2>Box 5</h2>
                <label>Percentage</label>
                <input type="number" step='any' name="data[_yem_target_percentage][4]" value="<?php echo esc_attr( $saved_data['_yem_target_percentage'][4] ); ?>">
                <label>Min Price</label>
                <input type="number" step='any' name="data[_yem_min_price][4]" value="<?php echo esc_attr( $saved_data['_yem_min_price'][4] ); ?>">

                <label>Max Price</label>
                <input type="number" step='any' name="data[_yem_max_price][4]" value="<?php echo esc_attr( $saved_data['_yem_max_price'][4] ); ?>">
            </div>
            
            
            
        </div>
        <div class="yem_input_wrapper">
            <!--<button id="add_percentage_box" class="button">+ Add Percentage Box</button> -->
            <button name="configure_submit" class="button button-primary" type="submit">Submit</button>
        </div>
        
    </form>
</div>
<p>
    In Min Max Plugin, Custom Field are: _wcmmq_min_quantity,_wcmmq_max_quantity, _wcmmq_product_step
</p>
<script>
(function($) {
        $(document).ready(function() {
            $('body').on('click','#add_percentage_box',function(){
                //var condition_box = 
            });
        });
    })(jQuery);    
</script>
<style>
    .yem_wrapper{padding: 10px;background: white;max-width: 800px;}
    .yem_wrapper form{}
    .yem_wrapper .yem_input_wrapper{margin-bottom: 15px;}
    .yem_wrapper form label{display: block;font-weight: bold;font-size: 16px;}
    .yem_wrapper form input{width: 300px;display: block;clear: both;}
</style>
<?php
}
