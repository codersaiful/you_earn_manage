<?php
add_action( 'wp_footer', 'yem_colum_control_script' );
function yem_colum_control_script(){
  $saved_data = get_option( 'yem_values' );
  $data = array();
  for($i=0;$i<=4;$i++){
     $data[$i] = array(
         '_yem_target_percentage' => $saved_data['_yem_target_percentage'][$i],
         '_yem_min_price' => $saved_data['_yem_min_price'][$i],
         '_yem_max_price' => $saved_data['_yem_max_price'][$i]);
  }
  $target_cf = $saved_data['_yem_target_cf'];
  $percentage = $saved_data['_yem_target_percentage'];
  ?>
  <script>
(function($) {
        $(document).ready(function() {
          var saved_data = <?php echo json_encode( $data ); ?>;
          var targetCF = '<?php echo $target_cf; ?>';
          var targetPercentage = 0;//<?php echo json_encode( $percentage ); ?>;
          //console.log(saved_data);
          var displayValue = 0;
          $('body').on('change','.wpt_quantity input.input-text.qty.text',function(){
                var thisTr = $(this).parents('tr');
                var qt = parseInt($(this).val());
                var price = parseFloat(thisTr.children('td.wpt_total').attr('data-price'));
                
                var total = qt * price;
                
                //Testing start 
                $(saved_data).each(function(index,object){
                    var min = object['_yem_min_price'];
                    var max = object['_yem_max_price'];
                    var parcent = object['_yem_target_percentage'];
                    
                    if(total >= min && total <= max){
                        targetPercentage = parcent;
                    }else if(max === '' && total >= min){
                        targetPercentage = parcent;
                    }
                });
                //console.log(targetPercentage);
                
                displayValue = parseFloat((total * targetPercentage) / 100);
                displayValue = displayValue.toFixed(2);
                //displayValue = (total * targetPercentage) / 100;
                var thisTargetCFObject = thisTr.children('td.wpt_' + targetCF);
                thisTargetCFObject.html(displayValue + " <i style='color:green;'>("+targetPercentage+"%)</i>");
                if($('#div1').length){
                    
                }else{
                    console.log("No found .wpt_" + targetCF + " element in your Table. Please fix your earn custom fild.");
                }
          });
          $('.wpt_quantity input.input-text.qty.text').each(function(){
            var current_value = $(this).val();
                if(current_value !== '0'){
                    $(this).trigger('change');
                }
            });  
        });
    })(jQuery);
  </script>
  <?php
}