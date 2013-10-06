

<h1>Grafik perkembangan</h1>

<?php
echo TbHtml::buttonGroup(array(
    array('label' => 'Left', 'value' => 10),
    array('label' => 'Middle', 'value' => 40),
    array('label' => 'Right', 'value' => 70),
        ), array('toggle' => TbHtml::BUTTON_TOGGLE_RADIO, 'color' => TbHtml::BUTTON_COLOR_PRIMARY));
?>

<?php
$this->widget('application.extensions.OpenFlashChart2Widget.OpenFlashChart2Widget', array(
    'chart' => $chart,
    'width' => '700',
    'height' => '300',
));

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>  
