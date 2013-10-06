<table class="appendo-gii" id="<?php echo $id ?>">
       <thead>
              <tr>
                     <th>Kelas </th><th>Mata Pelajaran</th><th>Bab</th>
              </tr>
       </thead>
       <tbody>
              <?php if ($model->kelas == null): ?>
                     <tr>
                            <td><?php echo CHtml::dropDownList('kelas[]', "string", $model->listkelas, array('style' => 'width:120px')); ?></td>
                            <td><?php echo CHtml::dropDownList('mapel[]', "string", $model->listmapel, array('style' => 'width:200px')); ?></td>
                            <td><?php echo CHtml::dropDownList('bab[]', "string", $model->listbab, array('style' => 'width:100px')); ?> </td>
                     </tr>
              <?php else: ?>
                     <?php for ($i = 0; $i < sizeof($model->kelas); ++$i): ?>
                            <tr>
                                   <td><?php echo CHtml::dropDownList('kelas[]', $model, $model->listkelas, array('style' => 'width:120px')); ?></td>
                                   <td><?php echo CHtml::dropDownList('mapel[]', $model, $model->listmapel, array('style' => 'width:200px')); ?></td>
                                   <td><?php echo CHtml::dropDownList('bab[]', $model, $model->listbab, array('style' => 'width:100px')); ?></td>
                            </tr>
                     <?php endfor; ?>
              <?php endif; ?>
       </tbody>
</table>