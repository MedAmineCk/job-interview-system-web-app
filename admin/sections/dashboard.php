<section class="analytics">
    <h3>Analytics</h3>
    <div class="data-analytics">
        <div class="item">
            <div class="icon">
                <i class="material-icons">
                    supervisor_account
                </i>
            </div>
            <div class="val" id="all_data">450</div>
            <div class="type">recus</div>
        </div>
        <div class="item">
            <div class="icon">
                <i class="material-icons">
                    how_to_reg
                </i>
            </div>
            <div class="val" id="accepted_data">375</div>
            <div class="type">acceptée</div>
        </div>
        <div class="item">
            <div class="icon">
                <i class="material-icons">
                    block
                </i>
            </div>
            <div class="val" id="refused_data">45</div>
            <div class="type">refusé</div>
        </div>
        <div class="item">
            <div class="icon">
                <i class="material-icons">
                    assignment_ind
                </i>
            </div>
            <div class="val" id="new_data">45</div>
            <div class="type">non traiter</div>
        </div>
    </div>

    <div class="chart" style="width: 400px;height: 400px;margin: 0 auto;">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</section>
<script>
    var ctx = document.getElementById("myChart").getContext("2d"),
        $new_count = $accepted_count = $refused_count = 0;
    $.get({
        url: "../inc/API/getCount.php",
        success: function (t) {
            console.log(t), t.forEach(t => {
                    "new" == t.statut ? $new_count = parseInt(t.countt) : "accepted" == t.statut ?
                        $accepted_count = parseInt(t.countt) : "refused" == t.statut && (
                            $refused_count = parseInt(t.countt))
                }), $all = $new_count + $accepted_count + $refused_count, console.log("new-count = " +
                    $new_count + " | accepted-count = " + $accepted_count + " | refused-count = " +
                    $refused_count + " | all = " + $all), $("#all_data").html($all), $("#accepted_data")
                .html($accepted_count), $("#refused_data").html($refused_count), $("#new_data").html(
                    $new_count);
            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: ["Accepted", "Refused", "New"],
                    datasets: [{
                        label: "# of Votes",
                        data: [$accepted_count, $refused_count, $new_count],
                        backgroundColor: ["#009688", "#B71C1C", "#2196F3"],
                        borderColor: ["#fff", "#fff", "#fff"],
                        borderWidth: 1
                    }]
                }
            })
        },
        error: function (t) {
            console.log(t)
        }
    });
</script>