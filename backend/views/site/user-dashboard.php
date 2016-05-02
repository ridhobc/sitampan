<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Admin Dashboard');
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    $(document).ready(function () {
        $('.tab-content').slimScroll({
            height: '300px'
        });
    });
    $(document).ready(function () {
        $('#coursList').slimScroll({
            height: '250px'
        });
    });
</script>
<style>
    .tab-content {
        padding:15px;
    }
    .box .box-body .fc-widget-header {
        background: none;
    }
    .popover{
        max-width:450px;   
    }
    .legend { list-style: none; }
    .legend li { float: left; margin-right: 10px; }
    .legend span { border: 1px solid #ccc; float: left; width: 12px; height: 12px; margin: 2px; }
    /* your colors */
    .legend .holiday { background-color: #00A65A; }
    .legend .importantnotice { background-color: #00C0EF; }
    .legend .meeting { background-color: #F39C12; }
    .legend .messages { background-color: #074979; }
</style>


<?php
$this->registerJs(
        "$(function() {
	$('.noticeModalLink').click(function() {
		$('#NoticeModal').modal('show')
		.find('#NoticeModalContent')
		.load($(this).attr('data-value'));
	});
});");

$this->registerJs(
        "$('body').on('click', function (e) {
    $('[data-toggle=\"popover\"]').each(function () {
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide'); 
        }
    });
});"
)
?>

<?php
yii\bootstrap\Modal::begin([
    'header' => '<h4><i class="fa fa-eye"></i> View Notice Details</h4>',
    'id' => 'NoticeModal',
]);
echo '<div id="NoticeModalContent"></div>';
yii\bootstrap\Modal::end();
?>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <?php
    $stuMsg = backend\models\MsgOfDay::find()->where('is_status = 0  ')->one();
    if (!empty($stuMsg)) :
        ?>
        <div class="callout callout-info msg-of-day">
            
            <h3><i class="fa fa-bullhorn"></i> <?php echo Yii::t('app', 'Message of day box') ?></h3>
            <p><marquee onmouseout="this.setAttribute('scrollamount', 8, 0);" onmouseover="this.setAttribute('scrollamount', 0, 0);" scrollamount="6" behavior="scroll" direction="left"><?= $stuMsg->msg_details; ?></marquee></p>
        </div>
    <?php endif; ?>



    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li><a href="#emp-notice" data-toggle="tab"><?php echo Yii::t('app', 'Staf IP') ?></a></li>
                    <li><a href="#stu-notice" data-toggle="tab"><?php echo Yii::t('app', 'Kordinator') ?></a></li>
                    <li class="active"><a href="#all-notice" data-toggle="tab"><?php echo Yii::t('app', 'General') ?></a></li>
                    <li class="pull-left header"><i class="fa fa-inbox"></i><?php echo Yii::t('app', 'Notice Board') ?></li>
                </ul>
                <div class="tab-content">
                    <!-- Notice -->
                    <div class="tab-pane active" id="all-notice">

                        <?php
                        $noticeList = backend\models\Notice::find()->where("is_status = 0 AND notice_user_type = '0'")->all();

                        if (!empty($noticeList)) {
                            foreach ($noticeList as $nl) :
                                ?>
                                <div class="notice-main bg-light-blue">
                                    <div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
                                    </div>
                                    <div class="notice-body">
                                        <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class' => 'noticeModalLink', 'data-value' => Url::to(['dashboard/notice/view-popup', 'id' => $nl->notice_id])]); ?>&nbsp; </div>
                                        <div class="notice-desc"><?= $nl->notice_description; ?> </div>
                                    </div>					          
                                </div>
                                <?php
                            endforeach;
                        } else {
                            echo '<div class="box-header bg-warning"><div style="padding:5px">';
                            echo Yii::t('app', 'No Notice....');
                            echo '</div></div>';
                        }
                        ?>
                    </div>
                    <div class="tab-pane" id="stu-notice">

                        <?php
                        $noticeList = backend\models\Notice::find()->where("is_status = 0 AND notice_user_type = 'S'")->all();

                        if (!empty($noticeList)) {
                            foreach ($noticeList as $nl) :
                                ?>
                                <div class="notice-main bg-aqua">
                                    <div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
                                    </div>
                                    <div class="notice-body">
                                        <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class' => 'noticeModalLink', 'data-value' => Url::to(['dashboard/notice/view-popup', 'id' => $nl->notice_id])]); ?>&nbsp; </div>
                                        <div class="notice-desc"><?= $nl->notice_description; ?> </div>
                                    </div>					          
                                </div>
                                <?php
                            endforeach;
                        } else {
                            echo '<div class="box-header bg-warning"><div style="padding:5px">';
                            echo Yii::t('app', 'No Notice....');
                            echo '</div></div>';
                        }
                        ?>
                    </div>
                    <div class="tab-pane" id="emp-notice">

                        <?php
                        $noticeList = backend\models\Notice::find()->where("is_status = 0 AND notice_user_type = 'E'")->all();

                        if (!empty($noticeList)) {
                            foreach ($noticeList as $nl) :
                                ?>
                                <div class="notice-main bg-teal">
                                    <div class="notice-disp-date">				        		<small class="label label-success"><i class="fa fa-calendar"></i> <?= (!empty($nl->notice_date) ? Yii::$app->formatter->asDate($nl->notice_date) : "Not Set"); ?></small>	
                                    </div>
                                    <div class="notice-body">
                                        <div class="notice-title"><?= Html::a($nl->notice_title, '#', ['style' => 'color:#FFF', 'class' => 'noticeModalLink', 'data-value' => Url::to(['dashboard/notice/view-popup', 'id' => $nl->notice_id])]); ?>&nbsp; </div>
                                        <div class="notice-desc"><?= $nl->notice_description; ?> </div>
                                    </div>					          
                                </div>
                                <?php
                            endforeach;
                        } else {
                            echo '<div class="box-header bg-warning"><div style="padding:5px">';
                            echo Yii::t('app', 'No Notice....');
                            echo '</div></div>';
                        }
                        ?>
                    </div>
                </div> <!--  /.tab-content -->
            </div><!-- /.nav-tabs-custom -->

            <!-- Calendar -->


        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <div class="nav-tabs-custom"><!-- .nav-tabs-custom -->
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li><a href="#birth-upcoming" data-toggle="tab"><?php echo Yii::t('app', 'Upcoming') ?></a></li>
                    <li class="active"><a href="#birth-taday" data-toggle="tab"><?php echo Yii::t('app', "Today's") ?></a></li>
                    <li class="pull-left header"><i class="fa fa-birthday-cake"></i><?php echo Yii::t('app', 'Birthdays') ?></li>
                </ul>
                <div class="tab-content">
                    <!-- Birthdays -->
                    <div class="tab-pane active" id="birth-taday">
                        <?php
                        $empList = backend\models\User::find()->where(["LIKE", "birthday", date('m-d')])->all();
                        if (!empty($empList)) {
                            foreach ($empList as $el) :
                                ?>
                                <div class="box box-solid bg-aqua">
                                    <div class="box-header">
                                        <div class="pull-left" style="padding:5px">
                                            <img src="<?= Yii::getAlias('@web')."/user/".(($el->photo)? : "no-photo.png");  ?>" class="img-circle" alt="noa image" width="40px" height="40px">
                                        </div>
                                        <h3 class="box-title"><?php echo $el->name; ?>&nbsp;
                                            <small class="label label-success"><i class="fa fa-calendar"></i> <?php echo date('d M', strtotime($el->birthday)); ?></small></h3>
                                    </div>
                                </div><!-- /.box -->
                                <?php
                            endforeach;
                        } else {
                            echo '<div class="box-header bg-warning"><div style="padding:5px">';
                            echo Yii::t('app', 'No Birthday Today');
                            echo '</div></div>';
                        }
                        ?>
                    </div>
                    <div class="tab-pane" id="birth-upcoming">
                        <?php
                        $empLi = "SELECT * FROM  user WHERE  DATE_ADD(birthday, INTERVAL YEAR(CURDATE())-YEAR(birthday) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(birthday),1,0) YEAR) BETWEEN CURDATE()+1 AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";
                        $empList = backend\models\User::findBySql($empLi)->all();
                        if (!empty($empList)) {
                            foreach ($empList as $el) :
                                ?>
                                <div class="box box-solid bg-aqua">
                                    <div class="box-header">
                                        <div class="pull-left" style="padding:5px">
                                            <img src="<?= Yii::getAlias('@web')."/user/".(($el->photo)? : "no-photo.png");  ?>" class="img-circle" alt="noa image" width="40px" height="40px">
                                        </div>
                                        <h3 class="box-title"><?php echo $el->name; ?>&nbsp;
                                            <small class="label label-warning"><i class="fa fa-calendar"></i> <?php echo date('d M', strtotime($el->birthday)); ?></small></h3>
                                    </div>
                                </div><!-- /.box -->
                                <?php
                            endforeach;
                        } else {
                            echo '<div class="box-header bg-warning"><div style="padding:5px">';
                            echo Yii::t('app', 'No Birthday within 30 days duration');
                            echo '</div></div>';
                        }
                        ?>
                    </div>
                </div> <!--  /.tab-content -->
            </div><!-- /.nav-tabs-custom -->

            <!-- TO DO List -->


        </section><!-- right col -->
    </div><!-- /.row (main row) -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title"><?php echo Yii::t('app', 'Calendar') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!--The calendar -->
                    <?php
                    $AEurl = Url::to(["events/add-event"]);
                    $UEurl = Url::to(["events/update-event"]);

                    $JSEvent = <<<EOF
function(start, end, allDay) {
	var start = moment(start).unix();
   	var end = moment(end).unix();
	$.ajax({
	   url: "{$AEurl}",
	   data: { start_date : start, end_date : end },
	   type: "GET",
	   success: function(data) {
		   $(".modal-body").addClass("row");
		   $(".modal-header").html('<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>Add Event</h3>');
		   $('.modal-body').html(data);
		   $('#eventModal').modal();
	   }
   	});
		}
EOF;

                    $JSEventClick = <<<EOF
function(calEvent, jsEvent, view) {
    var eventId = calEvent.id;
	$.ajax({
	   url: "{$UEurl}",
	   data: { event_id : eventId },
	   type: "GET",
	   success: function(data) {
		   $(".modal-body").addClass("row");
		   $(".modal-header").html('<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>Update Event</h3>');
		   $('.modal-body').html(data);
		   $('#eventModal').modal();
	   }
   	});
	$(this).css('border-color', 'red');
}
EOF;
                    $JsF = <<<EOF
		function (event, element) {
			var start_time = moment(event.start).format("DD-MM-YYYY, h:mm:ss a");
		    	var end_time = moment(event.end).format("DD-MM-YYYY, h:mm:ss a");

			element.popover({
		            title: event.title,
		            placement: 'top',
		            html: true,
			    global_close: true,
			    container: 'body',
			    trigger: 'hover',
			    delay: {"show": 500},
		            content: "<table class='table'><tr><th>Event Detail : </th><td>" + event.description + " </td></tr><tr><th> Event Type : </th><td>" + event.event_type + "</td></tr><tr><th> Start Time : </t><td>" + start_time + "</td></tr><tr><th> End Time : </th><td>" + end_time + "</td></tr></table>"
        		});
               }
EOF;
                    ?>

                    <?=
                    \yii2fullcalendar\yii2fullcalendar::widget([
                        'options' => ['language' => 'en'],
                        'clientOptions' => [
                            'fixedWeekCount' => false,
                            'weekNumbers' => true,
                            'editable' => true,
                            'selectable' => true,
                            'eventLimit' => true,
                            'eventLimitText' => 'more Events',
                            'selectHelper' => true,
                            'header' => [
                                'left' => 'today prev,next',
                                'center' => 'title',
                                'right' => 'month,agendaWeek,agendaDay'
                            ],
                            'select' => new \yii\web\JsExpression($JSEvent),
                            'eventClick' => new \yii\web\JsExpression($JSEventClick),
                            'eventRender' => new \yii\web\JsExpression($JsF),
                            'aspectRatio' => 2,
                            'timeFormat' => 'hh(:mm) A'
                        ],
                        'ajaxEvents' => Url::toRoute(['/dashboard/events/view-events'])
                    ]);
                    ?>
                    <div class="row">
                        <ul class="legend">
                            <li><span class="holiday"></span> <?php echo Yii::t('app', 'Holiday') ?></li>
                            <li><span class="importantnotice"></span> <?php echo Yii::t('app', 'Important Notice') ?></li>
                            <li><span class="meeting"></span> <?php echo Yii::t('app', 'Meeting') ?></li>
                            <li><span class="messages"></span> <?php echo Yii::t('app', 'Messages') ?></li>
                        </ul>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </section>
    </div>
</section><!-- /.content -->

