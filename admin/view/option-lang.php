<?php?>
<div class="option-lang">
<label for="lang">Wersja jezykowa </label>
<select name="lang" id="lang">
    <?php 
    foreach($config->lang as $lang) { 
        echo '<option value="'.$lang->id.'"';
        if ( isset($dane['lang']) && $dane['lang']==$lang->id) {
            echo ' selected';
        }
        echo '>'.$lang->name.'</option>'; 
    }
    ?>
</select>
</div>
