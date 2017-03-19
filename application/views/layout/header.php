<!--Header-part-->
<div id="header">
    <h1><a href="<?php echo base_url();?>"><?php echo $this->layout['head']['title']?></a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse<?php echo ($this->layout['navbar']['search'] === false)?' navbar-right':'';?>">
    <ul class="nav">
    <?php foreach ($this->layout['navbar']['menu'] as $menu):?>
        <li>
            <a href="<?php echo $menu['href'];?>">
                <i class="fa <?php echo $menu['icon'];?>" aria-hidden="true"></i>
                <span><?php echo $menu['label'];?></span>
            </a>
        </li>
    <?php endforeach;?>
    </ul>
</div>
<!--close-top-Header-menu-->

<?php if($this->layout['navbar']['search'] !== false):?>
    <!--start-top-serch-->
    <div id="search">
        <input type="text" placeholder="Search here..."/>
        <button type="submit" class="tip-bottom" title="Search"><i class="fa fa-search fa-white"></i></button>
    </div>
    <!--close-top-serch-->
<?php endif;?>
