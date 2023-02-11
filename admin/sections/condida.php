<section class="condida">
    <div class="back" onclick="$('#main_content').load('../sections/data.php')">
        <span class="icon">
            <i class="material-icons">
                keyboard_arrow_left
            </i>
        </span>
        <span>Condidats</span>
    </div>
    <div class="main-info">
        <div class="order-id">#1</div>
        <span class="date">April 11, 2017 at 4:39pm</span>
    </div>
    <div class="mor-actions" style="position: absolute; top: 20px; right: 20px;">
        <select name="actions" id="actions" onchange="update($(this).val(), localStorage.getItem('condida_id'))">
            <option id="statu-option-selected" value="new" selected disabled hidden>new</option>
            <option value="accepted">accepted</option>
            <option value="refused">refused</option>
        </select>
    </div>
    <div class="container" style="padding: 0; background: transparent; border: none">
        <div class="order-detail">
            <div class="data-table">
                <table>
                    <thead>
                        <tr>
                            <th style="color: black;font-size: 22px;">Questions</th>
                            <th style="color: black;font-size: 22px;">réponses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Avez-vous déjà travaillé dans un centre d’appel</td>
                            <td id="is_expert">non</td>
                        </tr>
                        <tr>
                            <td>Pour combien de temps ?</td>
                            <td id="expert_time">-</td>
                        </tr>
                        <tr>
                            <td>Quelle fonction avez-vous assuré ?</td>
                            <td id="job_type">-</td>
                        </tr>
                        <tr>
                            <td>Citez le lieu où vous avez exercé</td>
                            <td id="where">Anapec</td>
                        </tr>
                        <tr>
                            <td>Comment avez-vous pris connaissance de notre centre ?</td>
                            <td id="src">-</td>
                        </tr>
                        <tr>
                            <td>Pourquoi avez-vous choisi notre centre ?</td>
                            <td id="why">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="customer">
            <div class="profile">
                <div class="up">
                    <h3>Personal Info</h3>
                    <span class="icon">
                        <i class="material-icons">
                            account_circle
                        </i>
                    </span>
                </div>
                <div class="name">
                    <a href="#" class="full_nam">Asmae lazzer</a>
                </div>
            </div>
            <hr>
            <div class="contact">
                <p class="title">CONTACT</p>
                <a href="mailto:mdeamineck4u@gmail.com" class="email">medamineck4u@gmail.com</a>
                <div class="phone">+212 6 20 10 8495</div>
            </div>
            <hr>
            <div class="adress">
                <p class="title">CIN</p>
                <p class="cin">xxxxx</p>
            </div>
            <hr>
            <div class="status">
                <h3>Statu</h3>
                <p class="statu">xxxxx</p>
            </div>
        </div>
    </div>
</section>

<script>
    function update(e, t) {
        Swal.fire({
            title: "Are you sure?",
            text: "you want to update statut to " + e,
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Update Status!"
        }).then(o => {
            o.value && (Swal.fire("Updated!", "Status has benn updated", "success"), $.get({
                url: "../inc/API/update.php",
                data: {
                    status: e,
                    id_candidat: t
                },
                success: function (e) {
                    console.log(e)
                },
                error: function (e) {
                    console.log(e)
                }
            }))
        })
    }
    $(".description textarea").focus(function () {
        $(".err").hide(100), $(this).siblings("label").css({
            top: "-11px",
            "font-size": "12px",
            background: "#fff",
            padding: "2px"
        }), $(this).parent().css({
            border: "2px solid #03A9F4"
        })
    }), $(".description textarea").focusout(function () {
        "" != $(this).val() ? ($(this).parent().css({
            border: "1px solid #ccc"
        }), $(this).siblings(".err").css({
            display: "none"
        })) : ($(this).siblings("label").css({
            left: "10px",
            top: "10px",
            "font-size": "18px"
        }), $(this).parent().css({
            border: "1px solid #ccc"
        }))
    }), $(".back").on("click", function () {
        $("#main_content").load("./sections/orders.php")
    }), $(".order-id").html("#" + localStorage.getItem("condida_id")), $(".full_nam").html(localStorage.getItem(
        "full_name")), $(".email").html(localStorage.getItem("email")), $(".phone").html(localStorage.getItem(
        "phone")), $(".cin").html(localStorage.getItem("cin")), $(".statu").html(localStorage.getItem("statu")), $(
        "#statu-option-selected").html(localStorage.getItem("statu")), $(".main-info .date").html(localStorage
        .getItem("date"));
    var id = localStorage.getItem("condida_id");
    $.get({
        url: "../inc/API/readQs.php",
        data: {
            id_candidat: id
        },
        success: function (e) {
            console.log(e), connaissance = e[0].connaissance, duree_experience = e[0].duree_experience,
                experience = e[0].experience, fonction_experience = e[0].fonction_experience,
                lieu_experience = e[0].lieu_experience, pourquoi_notoriety = e[0].pourquoi_notoriety, $(
                    "#is_expert").html(experience), $("#expert_time").html(duree_experience), $("#job_type")
                .html(fonction_experience), $("#where").html(lieu_experience), $("#src").html(connaissance),
                $("#why").html(pourquoi_notoriety)
        },
        error: function (e) {
            console.log(e)
        }
    });
</script>