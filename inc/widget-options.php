    <p>
        <label>Title</label>
        <input class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php if(isset($title)) { echo esc_attr($title); } ?>" />
    </p>