<?php session_start();
date_default_timezone_set("Asia/Colombo");
?>
<div class="row">
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-chart-pie-36 text-success"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Today</p>
                            <h4 id="val-usage-today" class="card-title">Loading...</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Updated 1min ago
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-spaceship text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">This month</p>
                            <h4 id="val-usage-month" class="card-title">Loading...</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Updated 1min ago
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-battery-81 text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="numbers">
                            <p class="card-category">Remaining</p>
                            <h4 id="val-remaining-level" class="card-title">Loading...</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i> Updated 1min ago
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Tank's Water</h4>
                <p class="card-category">Last Day results</p>
            </div>
            <div class="card-body" style="height: 300px">
                <div id="chartWaterLevel" class="ct-chart ct-minor-sixth"></div>
            </div>
            <div class="card-footer ">
                <div class="legend">
                    <i class="fa fa-circle text-info"></i> Remaining
                    <i class="fa fa-circle text-danger"></i> Used
                </div>
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i> Updated <?php echo date('l jS \of F Y') ?>
                    <br>at <?php echo date("h:i A") ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header ">
                <h4 class="card-title">Goals</h4>
                <p class="card-category">Latest results</p>
            </div>
            <div class="card-body" style="height: 300px">
                <p style="margin-bottom: 8px; margin-top: 10px">Daily Goal</p>
                <div id="month-progress" class="progress" style="height: 25px;background:linear-gradient(to right, whitesmoke 80% ,#ffcccc 0);">
<!--                    <span  class="popOver" data-toggle="tooltip" data-placement="top" title="85%"> </span>-->
                </div>
                <br>
                <p style="margin-bottom: 8px">Monthly Goal</p>
                <div class="progress" style="height: 25px;background:linear-gradient(to right, #b2d8ff 80% ,#ffcccc 0);">
                    <div class="progress-bar bg-" role="progressbar" style="background-color: #4ca6ff;width: 40%; height: 25px" aria-valuenow="40" aria-valuemin="0" aria-valuemax="80"><p>40%</p></div>
                    <!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>-->
                </div>

            </div>
            <div class="card-footer ">
                <div class="legend">
                    <i class="fa fa-circle text" style="color: #4ca6ff"></i> Used
                    <i class="fa fa-circle text" style="color: #ff4c4c"></i> Over Used
                </div>
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i> Updated <?php echo date('l jS \of F Y') ?>
                    <br>at <?php echo date("h:i A") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--charts---------------------------------------------------->
<script>
    updateCurrentStatus(<?= $_SESSION['deviceId']?>);
    changeActive("nav1");
    // $(function () {
    //    //     $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
    //    // });
    //    //
    //    // // $( window ).scroll(function() {
    //    // // if($( window ).scrollTop() > 10){  // scroll down abit and get the action
    //    // $(".progress-bar").each(function(){
    //    //     each_bar_width = $(this).attr('aria-valuenow');
    //    //     $(this).width(each_bar_width + '%');
    //    // });
    //    //
    //    // //  }
    //    // // });

    function updateProgressBar(progress) {
        if (progress < 80 ){
            document.getElementById("month-progress").innerHTML = '<div id="month-progress-success" class="progress-bar bg-" role="progressbar" style="background-color: #4ca6ff; height: 25px" aria-valuenow="20" aria-valuemin="0" aria-valuemax="80"></div>';
            document.getElementById('month-progress-success').style.width = progress+"%";
            var node = document.createElement("P");
            var textNode = document.createTextNode(progress+"%");
            node.appendChild(textNode);
            document.getElementById('month-progress-success').appendChild(node);
        }else {
            document.getElementById("month-progress").innerHTML
                = '<div id="month-progress-success" class="progress-bar" role="progressbar" style="background-color:#4ca6ff;height:25px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="80"></div>' +
                '<div id="month-progress-unsuccess" class="progress-bar" role="progressbar" style="background-color:#ff4c4c;height:25px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>';
            document.getElementById('month-progress-success').style.width = "80%";
            var node = document.createElement("P");
            var textNode = document.createTextNode(progress+"%");
            node.appendChild(textNode);
            document.getElementById('month-progress-success').appendChild(node);
            progress -= 80;
            document.getElementById('month-progress-unsuccess').style.width = progress+"%";
        }
    }
    updateProgressBar(90)
</script>