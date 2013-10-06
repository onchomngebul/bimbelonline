
<div class ="onesoal">
       <?php echo $no . ' ' . $model->r_bimbnnsoal[$no - 1]->r_soal->pertanyaan; ?> </br>
       <?php
       $piljawa = explode("-", $model->r_bimbnnsoal[$no - 1]->r_soal->pilihanjawaban);
       
       
//       $option = array('a','b','c','d','e','f','g');
       
       $option = array_slice(array('a','b','c','d','e','f','g'), 0, count($piljawa));
       
       $data = array_combine($option, $piljawa);
       echo $form->radioButtonList($model, 'alljawa[' . $no . ']', $data);

//       $this->widget('bootstrap.widgets.TbButtonGroup', array(
//           'type' => 'success',
//           'toggle' => 'radio', // 'checkbox' or 'radio'
//           'buttons' => $tombol
//       ));
       ?>

</div>
