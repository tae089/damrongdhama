<?php 
use dektrium\user\models\profile;
?>
<aside class="main-sidebar">
    <?php if(!Yii::$app->user->isGuest){

        $rs = Profile::findOne(Yii::$app->user->identity->id);
        $photo = $rs->photo;
        $name = $rs->name;

        if ($photo) {
         $photo_new = $photo;
     }else{
        $photo_new =  $directoryAsset."/img/avatar5.png";
    }
    ?>
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="<?= $photo_new ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?php if(!Yii::$app->user->isGuest){echo $name;}?>
                    
                </p>

                <a href="index.php?r=user/profile/show&id=<?php echo Yii::$app->user->identity->id; ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <?php if(Yii::$app->user->identity->username=="admin"){ ?>
            <?= dmstr\widgets\Menu::widget(
                [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                ['label' => '<span style="font-size: 140%;color: #FFFFFF;">รับแจ้งเรื่องร้องเรียน</span>', 'options' => ['class' => 'header']],
                ['label' => 'บันทึก เรื่องร้องเรียน', 'url' => ['/col-request/index'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'ปรับปรุง เรื่องร้องเรียน', 'url' => ['/col-request/index_update'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'บันทึกแจ้งเตือน', 'url' => ['/col-request/alert_1'],'icon' => 'fa fa-bell-o'],
                // ['label' => 'เตือน ครั้งที 2', 'url' => ['/col-request/alert_2'],'icon' => 'fa fa-bell-o'],
                // ['label' => 'เตือน ครั้งที 3', 'url' => ['/col-request/alert_3'],'icon' => 'fa fa-bell-o'],
                ['label' => 'รายงานรวมทั้งหมด', 'icon' => 'fa fa-indent', 'url' => ['/request/index']],
                ['label' => 'รายงาน 3 ปี', 'icon' => 'fa fa-indent', 'url' => ['/request/report1']],
                ['label' => 'รายงาน (ช่วงเวลา)', 'icon' => 'fa fa-indent', 'url' => ['/request/report2']],
                ['label' => 'Graph (เป็นช่วงวัน)', 'icon' => 'fa fa-pie-chart', 'url' => ['/site/graph_menu1']],
                ['label' => 'Graph (เป็นปี)', 'icon' => 'fa fa-pie-chart', 'url' => ['/site/graph_menu2']],
                ['label' => '<span style="font-size: 140%;color: #FFFFFF;">รับแจ้งเรื่องร้องเรียน(เรื่องทั่วไป)</span>', 'options' => ['class' => 'header']],
                ['label' => 'บันทึก เรื่องร้องเรียน', 'url' => ['/col-request/index_out'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'ปรับปรุง เรื่องร้องเรียน', 'url' => ['/col-request/index_update_out'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'รายงานรวมทั้งหมด', 'icon' => 'fa fa-indent', 'url' => ['/request/index1']],
                ['label' => '<span style="font-size: 140%;color: #FFFFFF;">ตั้งค่า</span>', 'options' => ['class' => 'header']],
                ['label' => 'จัดการผู้ใช้', 'url' => ['/user/admin/index'],'icon' => 'fa fa-users'],
/*                    [
                        'label' => 'รายงานและกราฟ',
                        'icon' => 'fa fa-bar-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'รายงานรวมทั้งหมด', 'icon' => 'fa fa-indent', 'url' => '/e-mongo/web/index.php?r=request/index', 'options' => ['target' => '_blank']],
                            ['label' => 'Graph (ประเภท)', 'icon' => 'fa fa-pie-chart','url' => '/e-mongo/web/index.php?r=site/graph',],
                            ['label' => 'Graph (ช่องทาง)', 'icon' => 'fa fa-pie-chart', 'url' => '/e-mongo/web/index.php?r=site/graph1',],
                            ['label' => 'Graph (หน่วยงานที่รับผิดชอบ)', 'icon' => 'fa fa-pie-chart','url' => ['/e-mongo/web/index.php?r=site/graph2'],],
                            ['label' => 'Graph (ผู้ถูกร้องเรียน)', 'icon' => 'fa fa-pie-chart', 'url' => ['/e-mongo/web/index.php?r=site/graph3'],],
                            ['label' => 'Graph (สถานะเรื่องร้องเรียน)', 'icon' => 'fa fa-pie-chart','url' => ['/e-mongo/web/index.php?r=site/graph4'],],
                        ],
                        ],*/
                        ],
                        'encodeLabels' => false,
                        ]
                        ) ?>
            <?php }else{ ?>
              <?= dmstr\widgets\Menu::widget(
                [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                ['label' => '<span style="font-size: 140%;color: #FFFFFF;">รับแจ้งเรื่องร้องเรียน</span>', 'options' => ['class' => 'header']],
                ['label' => 'บันทึก เรื่องร้องเรียน', 'url' => ['/col-request/index'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'ปรับปรุง เรื่องร้องเรียน', 'url' => ['/col-request/index_update'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'บันทึกแจ้งเตือน', 'url' => ['/col-request/alert_1'],'icon' => 'fa fa-bell-o'],
                // ['label' => 'เตือน ครั้งที 2', 'url' => ['/col-request/alert_2'],'icon' => 'fa fa-bell-o'],
                // ['label' => 'เตือน ครั้งที 3', 'url' => ['/col-request/alert_3'],'icon' => 'fa fa-bell-o'],
                ['label' => 'รายงานรวมทั้งหมด', 'icon' => 'fa fa-indent', 'url' => ['/request/index']],
                ['label' => 'รายงาน 3 ปี', 'icon' => 'fa fa-indent', 'url' => ['/request/report1']],
                ['label' => 'รายงาน (ช่วงเวลา)', 'icon' => 'fa fa-indent', 'url' => ['/request/report2']],
                ['label' => 'Graph (เป็นช่วงวัน)', 'icon' => 'fa fa-pie-chart', 'url' => ['/site/graph_menu1']],
                ['label' => 'Graph (เป็นปี)', 'icon' => 'fa fa-pie-chart', 'url' => ['/site/graph_menu2']],
                ['label' => '<span style="font-size: 140%;color: #FFFFFF;">รับแจ้งเรื่องร้องเรียน(เรื่องทั่วไป)</span>', 'options' => ['class' => 'header']],
                ['label' => 'บันทึก เรื่องร้องเรียน', 'url' => ['/col-request/index_out'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'ปรับปรุง เรื่องร้องเรียน', 'url' => ['/col-request/index_update_out'],'icon' => 'fa fa-bullhorn'],
                ['label' => 'รายงานรวมทั้งหมด', 'icon' => 'fa fa-indent', 'url' => ['/request/index1']],
              //      ['label' => 'ตั้งค่า', 'options' => ['class' => 'header']],
              //      ['label' => 'จัดการผู้ใช้', 'url' => ['/user/admin/index'],'icon' => 'fa fa-users'],
                /*    ['label' => 'Graph (ประเภท)', 'icon' => 'fa fa-pie-chart','url' => ['/site/graph']],
                    ['label' => 'Graph (ช่องทาง)', 'icon' => 'fa fa-pie-chart', 'url' => ['/site/graph1']],
                    ['label' => 'Graph (อำเภอ)', 'icon' => 'fa fa-pie-chart', 'url' => ['/site/graph5']],
                    ['label' => 'Graph (หน่วยงานที่รับผิดชอบ)', 'icon' => 'fa fa-pie-chart','url' => ['/site/graph2']],
                    ['label' => 'Graph (ผู้ถูกร้องเรียน)', 'icon' => 'fa fa-pie-chart', 'url' => ['/site/graph3']],
                    ['label' => 'Graph (สถานะเรื่องร้องเรียน)', 'icon' => 'fa fa-pie-chart','url' => ['/site/graph4']], */
                    
/*                    [
                        'label' => 'รายงานและกราฟ',
                        'icon' => 'fa fa-bar-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'รายงานรวมทั้งหมด', 'icon' => 'fa fa-indent', 'url' => '/e-mongo/web/index.php?r=request/index', 'options' => ['target' => '_blank']],
                            ['label' => 'Graph (ประเภท)', 'icon' => 'fa fa-pie-chart','url' => '/e-mongo/web/index.php?r=site/graph',],
                            ['label' => 'Graph (ช่องทาง)', 'icon' => 'fa fa-pie-chart', 'url' => '/e-mongo/web/index.php?r=site/graph1',],
                            ['label' => 'Graph (หน่วยงานที่รับผิดชอบ)', 'icon' => 'fa fa-pie-chart','url' => ['/e-mongo/web/index.php?r=site/graph2'],],
                            ['label' => 'Graph (ผู้ถูกร้องเรียน)', 'icon' => 'fa fa-pie-chart', 'url' => ['/e-mongo/web/index.php?r=site/graph3'],],
                            ['label' => 'Graph (สถานะเรื่องร้องเรียน)', 'icon' => 'fa fa-pie-chart','url' => ['/e-mongo/web/index.php?r=site/graph4'],],
                        ],
                        ],*/
                        ],
                        'encodeLabels' => false,
                        ]
                        ) ?>
              <?php } ?>
          </section>
          <?php } ?>
      </aside>
