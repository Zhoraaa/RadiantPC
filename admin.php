<?php
require("./funcs/pageBase.php");
require("./funcs/user.php");
require("./funcs/alert.php");
require("./funcs/session.php");
require("./funcs/alert.php");

include("./admin/adminNav.php");
?>
<section id="first-content-on-page" class="inner-shadow brad20 p20 flex row-reverse jc-sa wrap">
    <?php
    if (!empty($_GET['edit'])) {
        include("./admin/editFormFilter.php");
    ?>
        <div  class="wcenter">
            <div class="inner-shadow brad20 g10 p20 flex column ai-c">
                <?php
                getEditForm();
                ?>
            </div>
        </div>
    <?php
    }

    if (!isset($_GET['tool'])) {
        include("./admin/toolInstances.php");
    } else {
        $tool = $_GET['tool'];
        include("./admin/tool$tool.php");
    }
    ?>
</section>