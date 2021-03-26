    <ul class="thumbnails">
    <?php
    foreach ($this->presets as $preset => $preset_item)
    {
    ?>
            <li class="span3">
                <a href="#" id="preset_<?php echo @$preset ?>" class="thumbnail preset" data-presentation-gradient-from="<?php echo @$preset_item['presentation_gradient-start'] ?>" data-presentation-gradient-end="<?php echo @$preset_item['presentation_gradient-end'] ?>" data-preset-id="<?php echo @$preset ?>">
                    <h2><?php echo @$preset ?></h2>
                </a>
            </li>
    <?php
    }
    ?>
    </ul>
