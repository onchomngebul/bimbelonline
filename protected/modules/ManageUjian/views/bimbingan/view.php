<?php
/* @var $this UjianController */
/* @var $model Ujian */

$this->breadcrumbs = array(
    'Ujians' => array('index'),
    $model->idbimbingan,
);

?>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'Nama User',
            'value' => $model->r_user->username,
        ),
        'idbimbingan',
        array(
            'name' => 'Nama Ujian',
            'value' => $model->r_ujian->namaujian,
        ),
        'waktubimbingan',
        'nilai',
        'catatan',
    ),
));
?>

<div class="row">
       <?php
       foreach ($model2 as $persoal) {
              echo "No Soal : " . $persoal->nosoal . "_______________________";
              $this->widget('zii.widgets.CDetailView', array(
                  'data' => $persoal,
                  'attributes' => array(
                      array(
                          'name' => 'Pertanyaan',
                          'value' => $persoal->r_soal->pertanyaan,
                      ),
                      array(
                          'name' => 'Pilihan Jawaban',
                          'value' => $persoal->r_soal->pilihanjawaban,
                      ),
                      array(
                          'name' => 'Jawaban yang benar',
                          'value' => $persoal->r_soal->jawaban,
                      ),
                      'jawabansiswa',
                      array(
                        'name'=> 'Benar ?',
                          'value'=> $persoal->dijawabbenar == 1 ? 'Benar' : 'Salah',
                      ),
                      array(
                          'name' => 'Pembahasan',
                          'value' => $persoal->r_soal->bahasan,
                      ),
                  ),
              ));
       }
       ?>
</div>
