<?php

include('save_to_db.php');

session_start();

?>

<?php

$note_title = "";
$content = "";
$sender_id = "";
$post_date = "";
$note_id = "";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Notifications</title>
    <!--custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/jobSeeker_Profile.css">
    <!--Bootstrap link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awsome icons-->
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="extra/css/bootstrap.min.css" />
    <link rel="stylesheet" href="extra/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="extra/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="extra/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="extra/css/ace-skins.min.css" />
    <link rel="stylesheet" href="extra/css/ace-rtl.min.css" />
    <script src="extra/js/ace-extra.min.js"></script>

</head>

<body>

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">

                <div class="col-xs-12">
                    <div class="row gutters-sm" style="margin-bottom: 10px;">
                        <div class="col-xs-12">
                            <div class="card h-100">
                                <div class="card-body">
                                    <a href="jobSeeker-dashboard.php"><i class="ace-icon fa fa-close blue"></i></a>
                                    <h6 class="d-flex align-items-center mb-3" style="display: inline-block;">
                                        Notifications</h6>
                                    <div style="display: inline-block;float: right;">
                                        <form class="form-search">
                                            <span class="input-icon">
                                                <input type="text" placeholder="Search ..." class="nav-search-input"
                                                    id="nav-search-input" autocomplete="off" />
                                                <i class="ace-icon fa fa-search nav-search-icon"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-xs-12">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                            <div class="timeline-container">


                                                <?php $notification = mysqli_query($conn, "SELECT * FROM notification_tbl WHERE receiver_id = '" . $_SESSION['id'] . "' ORDER BY note_id DESC");
                                              ?>
                                                <?php while ($row = mysqli_fetch_array($notification)) { ?>

                                                <?php $post_date = $row['post_date']; ?>

                                                <!-- Obtain chat date and time -->
                                                <?php

                          $time = date("M/d/y", strtotime($post_date));

                          $seconds = strtotime(date("y-m-d H:i:s")) - strtotime($post_date);

                          $months = floor($seconds / (3600 * 24 * 30));
                          $day = floor($seconds / (3600 * 24));
                          $hours = floor($seconds / 3600);
                          $mins = floor(($seconds - ($hours * 3600)) / 60);
                          $sec = floor($seconds / 60); ?>


                                                <div class="timeline-items">
                                                    <div class="timeline-item clearfix">
                                                        <div class="timeline-info">
                                                            <img src="extra/images/avatars/avatar1.png" />
                                                        </div>
                                                        <div class="widget-box transparent">
                                                            <div class="widget-header widget-header-small">
                                                                <h5 class="widget-title smaller">
                                                                    <a href="#" class="blue">Company Name:</a>
                                                                    <span
                                                                        class="grey"><?php echo $row['note_title']; ?></span>
                                                                </h5>


                                                                <?php if ($seconds <= 60) : ?>
                                                                <span class="widget-toolbar no-border">
                                                                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                    Now
                                                                </span>
                                                                <?php endif ?>

                                                                <?php if (in_array($seconds, range(60, 3600))) : ?>
                                                                <span class="widget-toolbar no-border">
                                                                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                    <?php echo $mins; ?> min</sapn>
                                                                    <?php endif ?>

                                                                    <?php if (in_array($seconds, range(3600, 7200))) : ?>
                                                                    <span class="widget-toolbar no-border">
                                                                        <i
                                                                            class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                        <?php echo $hours; ?> hr</span>
                                                                    <?php endif ?>

                                                                    <?php if (in_array($seconds, range(7200, 43200))) : ?>
                                                                    <span class="widget-toolbar no-border">
                                                                        <i
                                                                            class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                        <?php echo $hours; ?> hrs</span>
                                                                    <?php endif ?>

                                                                    <?php if (in_array($seconds, range(43200, 86400))) : ?>
                                                                    <span class="widget-toolbar no-border">
                                                                        <i
                                                                            class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                        Yesterday</span>
                                                                    <?php endif ?>

                                                                    <?php if (in_array($seconds, range(86400, 172800))) : ?>
                                                                    <span class="widget-toolbar no-border">
                                                                        <i
                                                                            class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                        <?php echo $day; ?> day</span>
                                                                    <?php endif ?>

                                                                    <?php if ($seconds > 172800) : ?>
                                                                    <span class="widget-toolbar no-border">
                                                                        <i
                                                                            class="ace-icon fa fa-clock-o bigger-110"></i>
                                                                        <?php echo $time; ?> </span>
                                                                    <?php endif ?>

                                                            </div>
                                                            <div class="widget-body">
                                                                <div class="widget-main">
                                                                    <?php echo $row['content']; ?> &hellip;
                                                                    <div class="space-6"></div>
                                                                    <div class="widget-toolbox clearfix">
                                                                        <div class="pull-left">
                                                                            <i
                                                                                class="ace-icon fa fa-hand-o-right grey bigger-125"></i>
                                                                            <a href="view-job-notification.php?noteID=<?php echo $row['note_id']; ?>"
                                                                                class="bigger-110">Click to read
                                                                                &hellip;</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>