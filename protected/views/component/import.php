<div class="panel panel-default" style="color: black">
    <div class="panel-header">
        <a href="<?php echo Yii::app()->baseUrl . '/component/index'; ?>" class="btn btn-primary"><i class="fa fa-fw fa-table"></i>Kembali ke Daftar Komponen</a>
    </div>
    <div class="panel-body">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'component-form',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        ));
        ?>


        <?php echo $form->errorSummary($model); ?>
        <?php
        echo 'Import Excel file';
        echo '</br>';
        ?>
        <?php echo $form->fileFieldRow($model, 'file', array('class' => 'span5', 'maxlength' => 256, 'labelOptions' => array('label' => false))); ?>
        <p>File excel yang digunakan adalah file d_kmpnen yang sudah difilter jumlah barisnya</p>

        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Import',
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>

    <div class="panel-header">
        <a href="<?php echo yii::app()->baseUrl; ?>/component/exportError" class="btn btn-primary"><i class="fa fa fa-download"></i> Export Error</a>
    </div>
    <div class="panel-body">
        <h2>Daftar Error Import Karena Sudah Terealisasi</h2>

        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'id' => 'component-error-grid',
            'dataProvider' => $componentError->search(),
            'filter' => $componentError,
            'columns' => array(
                array(
                    'header' => 'No',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),
                array(
                    'name' => 'satker_code',
                    'value' => 'isset($data->satker->name)?$data->satker->name:"Not set"',
                    'filter' => Satker::model()->getSatkerOptions(),
                ),
                array(
                    'name' => 'activity_code',
                    'value' => 'isset($data->activity->name)?$data->activity->name:"Not set"',
                    'filter' => Activity::model()->getActivityOptions(),
                ),
                array(
                    'name' => 'output_code',
                    'value' => 'isset($data->outputCode->name)?$data->outputCode->name:$data->output_code',
                    'filter' => Output::model()->getOutputOptions(),
                ),
                array(
                    'name' => 'suboutput_code',
                    'value' => 'isset($data->suboutputCode->name)?$data->suboutputCode->name:$data->suboutput_code',
                    'filter' => Suboutput::model()->getSuboutputOptions(),
                ),                
                'code',
                'name',
                array(
                    'class' => 'bootstrap.widgets.TbButtonColumn',
                    'template' => '{view}',
                ),
            ),
        ));
        ?>
    </div>
</div>

