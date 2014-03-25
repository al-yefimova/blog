<script>
    tinymce.init({
        selector: "textarea#Post_content",
        theme: "modern",
        forced_root_block : " ",
        width: 700,
        height: 400,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor",
        ],
        extended_valid_elements: "iframe[src|width|height|name|align], embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage]",
        valid_elements: "img[*], iframe[*]",
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect youtubeIframe | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
    });
</script>
<div class="form">

    <?php $form=$this->beginWidget('CActiveForm'); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>80,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo CHtml::activeTextArea($model,'content',array('rows'=>10, 'cols'=>70)); ?>
        <?php # $this->widget('application.extensions.tinymce.ETinyMce', array('name'=>'html')); ?>
        <?php	#<p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown syntax</a>.</p>?>
        <?php echo $form->error($model,'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'tags'); ?>
        <?php $this->widget('CAutoComplete', array(
            'model'=>$model,
            'attribute'=>'tags',
            'url'=>array('suggestTags'),
            'multiple'=>true,
            'htmlOptions'=>array('size'=>50),
        )); ?>
        <p class="hint">Please separate different tags with commas.</p>
        <?php echo $form->error($model,'tags'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>

    <div class="row buttons">

        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    <?php $this->widget('application.extensions.tinymce.SladekTinyMce', array (
        'model'=>$model,
        'attribute'=>'content',
        'htmlOptions'=>array('style'=>'width: 600px; height: 200px;')
    )); ?>

    <script>
        tinymce.init({forced_root_block : "",selector:'textarea'});
    </script>

    <?php $this->endWidget(); ?>

</div><!-- form -->