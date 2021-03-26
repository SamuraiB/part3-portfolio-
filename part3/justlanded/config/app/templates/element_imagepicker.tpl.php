<input type="hidden" class="item item_imagepicker" id="<?php echo @$content['id']; ?>" name="<?php echo @$content['id']; ?>" value="<?php echo get_value(@$content['id']); ?>">
<input type="hidden" class="item item_imagepicker_selected" id="<?php echo @$content['id']; ?>_selected" name="<?php echo @$content['id']; ?>_selected" value="<?php echo get_value(@$content['id']."_selected"); ?>">
<ul class="imagepicker">
<?php
$folder=dir("../".$content['directory']);
$selected = get_value(@$content['id']);
$x=1;
while($file=$folder->read())
{
    if (substr_count($file, @$content['filetype']) > 0)
    {
        if ($file == $selected){$class_selected = " active"; } else { $class_selected = "";}
        echo '<li><a id="'.@$content['id'].'_item_'.$x.'" href="javascript:selectImage(\''. @$content['id'] . '\' , \'' . $file . '\', '.$x.');" class="item_imagepicker_selectable'.$class_selected.'"><img src="../' . @$content['directory'] . "/" . $file . '"></a></li>';
        $x++;
    }
}
$folder->close();
?>
</ul>