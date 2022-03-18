<style>
    #lisa_logo {
        width: 410px;
        /* height: auto; */
        margin-left: -70px;
        margin-top: -280px;
    }

    .sidebarMenu {
        text-align: center;
        font-size: 24px;
        font-family: RSU_BOLD;
        color: #CCA500;
        margin-top: 30px;
        width: 270px;
        height: 60px;
        display: flex;
        align-items: center;

    }

    .sidebarMenu a {
        color: #CCA500;
    }

    .active {
        background: #FFDD53 0% 0% no-repeat padding-box;
        border-radius: 0px 24px 24px 0px;
        color: #000000;
    }

    ul .sidebarMenu {
        color: #000000;
    }

    a:hover {
        color: #000000 !important;
        text-decoration: none;
    }

    .active a {
        color: #000000 !important;
    }

    .iconSidebar {
        width: 50px;
        margin-left: 40px;
    }
</style>
<div class="container-fluid" style="position: fixed;
top: 0px;">
    <div class="row flex-nowrap" style="position: absolute; top: 0px; background-color: #FFFFFF;">
        <div style="width: fit-content; width: 280px; height: 100vh; box-shadow: 0px 3px 12px #00000029;">
            <div>
                <img id="lisa_logo" src="../public/img/lisa-full.png" alt="lisa text logo">
                <ul style="list-style-type: none;">
                    <li class="nav-item sidebarMenu  <?php if ($this->dispatcher->getActionName() == 'main') { ?>active <?php } ?>">
                        <img <?php if ($this->dispatcher->getActionName() == 'main') { ?>src="../public/img/icon/icon128_dashboard_01.png"
                            <?php } else { ?> src="../public/img/icon/icon128_dashboard_2.png" <?php } ?> alt=""
                            class="iconSidebar">
                        <a class="nav-link" href="<?= $this->url->get('lisa/authen/main') ?>">แผงควบคุม</a>
                    <li
                        class="nav-item sidebarMenu <?php if ($this->dispatcher->getActionName() == 'document' || $this->dispatcher->getActionName() == 'viewDetail' || $this->dispatcher->getControllerName() == 'upload' || $this->dispatcher->getActionName() == 'editDetail' || $this->dispatcher->getActionName() == 'viewPage') { ?>active <?php } ?>">
                        <img <?php if ($this->dispatcher->getActionName() == 'document' || $this->dispatcher->getActionName() == 'viewDetail' || $this->dispatcher->getControllerName() == 'upload' || $this->dispatcher->getActionName() == 'editDetail' || $this->dispatcher->getActionName() == 'viewPage') { ?>src="../public/img/icon/icon128_form.png"
                            <?php } else { ?> src="../public/img/icon/icon128_form_2.png" <?php } ?> alt=""
                            class="iconSidebar">
                        <a class="nav-link" href="<?= $this->url->get('lisa/authen/document') ?>">เอกสาร</a>
                    </li>
                    <?php if (($permission == 'admin')) { ?>
                    <li
                        class="nav-item sidebarMenu <?php if ($this->dispatcher->getActionName() == 'viewAllUser' || $this->dispatcher->getActionName() == 'editProfile') { ?>active <?php } ?>">
                        <img <?php if ($this->dispatcher->getActionName() == 'viewAllUser' || $this->dispatcher->getActionName() == 'editProfile') { ?>src="../public/img/icon/icon128_about.png"
                            <?php } else { ?> src="../public/img/icon/icon128_user_3.png" <?php } ?> alt=""
                            class="iconSidebar">
                        <a class="nav-link" href="<?= $this->url->get('lisa/authen/viewAllUser') ?>">สมาชิกผู้ใช้</a>
                    </li>
                    <li
                        class="nav-item sidebarMenu <?php if ($this->dispatcher->getActionName() == 'viewHistory') { ?>active <?php } ?>">
                        <img <?php if ($this->dispatcher->getActionName() == 'viewHistory') { ?>src="../public/img/icon/icon128_profile_01.png"
                            <?php } else { ?> src="../public/img/icon/icon128_profile_02.png" <?php } ?> alt=""
                            class="iconSidebar">
                        <a class="nav-link" href="<?= $this->url->get('lisa/authen/viewHistory') ?>">ประวัติการใช้งาน</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>