<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-list"></i> Menu</a>
    <ul>
        <?php foreach ($this->layout['menu'] as $item => $value):
            $class = array();
            if($item==$activeMenu){
                $class[] = 'active';
            }
            if(isset($value['submenu'])){
                $class[] = (in_array('active',$class))?'submenu open':'submenu';
            }
            ?>
            <li class="<?php echo implode(' ',$class)?>">
                <a href="<?php echo $value['href']?>">
                    <i class="fa <?php echo $value['icon']?>" aria-hidden="true"></i>
                    <span><?php echo $value['label']?></span>
                    <?php echo (isset($value['submenu']))?'<i class="fa fa-chevron-down  pull-right" aria-hidden="true"></i>':'';?>
                </a>
                <?php if(isset($value['submenu'])):?>
                    <ul>
                        <?php foreach ($value['submenu'] as $subItem => $subValue):?>
                            <li class="<?php echo ($subItem==$activeSubMenu)?'active':'';?>"><a href="<?php echo $subValue['href']?>"><?php echo $subValue['label']?></a></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach;?>
    </ul>
</div>