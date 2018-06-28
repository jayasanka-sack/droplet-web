<?php session_start();
date_default_timezone_set("Asia/Colombo");
?>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Water Usage(Daily)</h4>
                <p class="card-category">24 Hours performance</p>
            </div>
            <div class="card-body ">
                <div id="chartDays" class="ct-chart"></div>
            </div>
            <div class="card-footer ">
                <div class="legend">
                    <i class="fa fa-circle text-info"></i> Usage
                </div>
                <hr>
                <div class="stats">
                    <i class="fa fa-history"></i> Updated <?php echo date('l jS \of F Y') ?>
                    <br>at <?php echo date("h:i A") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    updateCurrentStatus(<?= $_SESSION['deviceId']?>);
    changeActive("nav2");
</script>