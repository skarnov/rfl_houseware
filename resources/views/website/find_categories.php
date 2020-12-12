<?php
foreach ($all_subcategories as $subcategory) {
    ?>
    <div class="filter-custom-radio">
        <input type="radio" id="customRadioInline<?php echo $subcategory->category_id ?>" name="featured" onclick="subcategoryProducts(<?php echo $subcategory->category_id ?>)" class="custom-control-input">
        <label class="custom-control-label" for="customRadioInline<?php echo $subcategory->category_id ?>"><?php echo $subcategory->subcategory_name ?></label>
    </div>
    <?php
}
?>