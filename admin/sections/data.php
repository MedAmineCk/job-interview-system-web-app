<section class="orders">
    <h3>Condidats</h3>
    <div class="container" id="Condidats-container">
        <div class="status">
            <nav>
                <a href="#" class="active" data-status="">Tous les Condidats</a>
                <a href="#" data-status="accepted">accepté</a>
                <a href="#" data-status="refused">refusé</a>
                <a href="#" data-status="new">non traiter</a>

                <?php 
                session_start();
                if ($_SESSION['user_statut'] == 'admin') {
                    echo '<a href="#" data-status="Delete">supprimé</a>';
                };
                ?>
            </nav>
        </div>
        <div class="data-table">
            <table>
                <thead>
                    <tr>
                        <th>
                            <div class="select" id="actions_container">
                                <div class="drop">
                                    <input type="checkbox">
                                    <i class="material-icons" onclick="$('.actions').show(100)">
                                        arrow_drop_down
                                    </i>
                                </div>
                                <div class="actions">
                                    <div class="item">Delete</div>
                                </div>
                            </div>
                        </th>
                        <th>Condida Id</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>CIN</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    function filter(t) {
        $.get({
            url: "../inc/API/read.php",
            data: {
                status: t
            },
            success: function (t) {
                console.log(t), $(".data-table tbody").empty(), t.forEach(t => {
                    var a = t.id_candidat;
                    $(".data-table tbody").append('<tr data-id="' + a + '" data-date="' + t
                        .date_added + '"><td><input type="checkbox" data-id="' + a +
                        '"></td><td><a href="#' + a + '" onclick="condida_info(' + a + ')">#' +
                        a + '</a></td><td class="full_name">' + t.nom + " " + t.prenom +
                        '</td><td class="phone">' + t.telephone + '</td><td class="email">' + t
                        .email + '</td><td class="cin">' + t.cin +
                        '</td><td class="statu-c"> <div class="statu" data-statu="' + t.statut +
                        '">' + t.statut + "</div></td></tr>")
                })
            },
            error: function (t) {
                console.log(t)
            }
        })
    }

    function actions(t, a) {
        Swal.fire({
            title: "Are you sure?",
            text: "you want to " + t + " recrutment id: " + a,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes," + t
        }).then(n => {
            n.value && (Swal.fire("Updated!", "recrutment has benn " + t + "ed", "success"), $.get({
                url: "../inc/API/update.php",
                data: {
                    status: t,
                    id_candidat: a
                },
                success: function (t) {
                    console.log(t), $("#main_content").load("../sections/data.php")
                },
                error: function (t) {
                    console.log(t)
                }
            }))
        })
    }

    function condida_info(t) {
        condida_id = t, parent_container = $(".data-table tbody"), container = parent_container.children(
                'tr[data-id = "' + condida_id + '"]'), full_name = container.find("td.full_name").html(), phone =
            container.find("td.phone").html(), email = container.find("td.email").html(), cin = container.find("td.cin")
            .html(), statu = container.find("td.statu-c .statu").html(), date_add = container.data("date"), localStorage
            .setItem("condida_id", t), localStorage.setItem("full_name", full_name), localStorage.setItem("phone",
                phone), localStorage.setItem("email", email), localStorage.setItem("cin", cin), localStorage.setItem(
                "statu", statu), localStorage.setItem("date", date_add), $("#main_content").load(
                "../sections/condida.php")
    }
    $(".status nav a").on("click", function () {
        $(".status nav a").removeClass("active"), $(this).addClass("active"), filter($(this).data("status"))
    }), $(".data-table td.order-id").on("click", function () {
        $("#main_content").load("./sections/_order.php")
    }), $(window).click(function () {
        $(".actions").hide(100)
    }), $("#actions_container").click(function (t) {
        t.stopPropagation()
    }), filter(""), $(".actions .item").on("click", function () {
        actions($(this).html(), $(".data-table tbody input:checked").data("id"))
    });
</script>