<?php
if(array_key_exists('rowclickable',$table['actions'])){
    $rowclickable = "class='row-clickable' data-link='".base_url().$table['actions']['rowclickable']."'";
    unset($table['actions']['rowclickable']);
}
?>
<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fa <?php echo $table['icon']?>" aria-hidden="true"></i>
        </span>
        <h5><?php echo $table['titulo']?></h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <?php foreach ($table['cabecalho'] as $cab):?>
                    <th><?php echo $cab;?></th>
                <?php endforeach;?>
            </tr>
            </thead>
            <tbody>
            <?php if(count($table['dados']) > 0):?>
                <?php foreach ($table['dados'] as $dado):
                    $dado=array_change_key_case((array)$dado,CASE_LOWER);
                    ?>
                    <tr <?php echo sprintf($rowclickable,$dado[$table['primarykey']])?>>
                    <?php foreach ($table['cabecalho'] as $cab):
                        $key = convert_accented_characters(str_replace(' ','',strtolower($cab)));
                        if(trim($key) == '#'): ?>
                            <?php foreach ($table['actions'] as $k => $v):?>
                                <td class="no-clickable">
                                    <a href="<?php echo base_url().sprintf($v['url'],$dado[$table['primarykey']]);?>">&nbsp;<i class="fa <?php echo $v['icon'];?>"></i>&nbsp;</a>
                                </td>
                            <?php endforeach;?>
                            <?php else:?>
                            <td class="text-center"><?php echo $dado[$key];?></td>
                            <?php endif;?>

                    <?php endforeach;?>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr>
                    <td colspan="5">Nenhum resultado encontrado</td>
                </tr>
            <?php endif;?>
            </tbody>
        </table>
    </div>
</div>
