<?php
/**
 * File: service.php
 * User: daijianhao(toruneko@outlook.com)
 * Date: 15/6/3 11:09
 * Description:
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">PAC维护</div>
    <div class="panel-body">
        <?php $form = $this->beginWidget('CActiveForm', [
            'id' => 'form',
            'method' => 'get',
            'action' => $this->createUrl('wakfu/pac'),
            'htmlOptions' => [
                'class' => 'form-inline'
            ]
        ]);
        ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'uid', ['class' => 'sr-only control-label']); ?>
            <?php echo $form->textField($model, 'uid', ['class' => 'form-control', 'placeholder' => '用户ID']) ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'email', ['class' => 'sr-only control-label']); ?>
            <?php echo $form->textField($model, 'email', ['class' => 'form-control', 'placeholder' => '邮箱']) ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::submitButton('搜索', ['class' => 'btn btn-default']); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <table class="table table-hover" id="table">
        <thead>
        <tr>
            <td>UID</td>
            <td>邮箱</td>
            <td>PAC地址</td>
            <td></td>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="4">
                <?php $this->widget('RedLinkPager', ['pages' => $pager]) ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php $this->widget('red.zii.widget.RedListView', [
            'dataProvider' => $data,
            'itemView' => 'pacList',
            'template' => '{items}',
            'emptyText' => '',
        ]); ?>
        </tbody>
    </table>
</div>