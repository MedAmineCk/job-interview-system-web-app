var valide = !1, firstName = new mdc.textField.MDCTextField(document.querySelector(".firstName")), lastName = new mdc.textField.MDCTextField(document.querySelector(".lastName")), phone = new mdc.textField.MDCTextField(document.querySelector(".phone")), email = new mdc.textField.MDCTextField(document.querySelector(".email")), cin = new mdc.textField.MDCTextField(document.querySelector(".cin")), select = new mdc.select.MDCSelect(document.querySelector(".ddm")), jobAutre = new mdc.textField.MDCTextField(document.querySelector(".job_autre")), lieu = new mdc.textField.MDCTextField(document.querySelector(".lieu")), source = new mdc.select.MDCSelect(document.querySelector(".source-select")), sourceAutre = new mdc.textField.MDCTextField(document.querySelector(".source-autre")), whyInput = new mdc.textField.MDCTextField(document.querySelector(".whyInput")); function trackerUpdate(e) { $(".tracker .item.active").addClass("validated"), e++ , $(".tracker .item").removeClass("active"), $(".tracker .item:nth-child(" + e + ")").addClass("active") } function validate() { valide = !0, submitData(), setInterval(function () { location.reload() }, 1e4) } select.listen("MDCSelect:change", () => { console.log(select.value), $("#jobType").removeClass("mdc-select--invalid"), "autre" == select.value ? ($(".job_autre").addClass("job_autre_active"), jobAutre.focus()) : $(".job_autre").removeClass("job_autre_active") }), source.listen("MDCSelect:change", () => { console.log(source.value), $("#how").removeClass("mdc-select--invalid"), "autre" == source.value ? (console.log("source.value = " + source.value), $(".source-autre").addClass("source_autre_active"), sourceAutre.focus()) : $(".source-autre").removeClass("source_autre_active") }), i = 0, $("button#Commencer").on("touch click", function () { next() }), $("button.return").on("touch click", function () { i-- , trackerUpdate(i), $("header").css({ width: "90px" }), $(".icon").css({ width: "90px", "justify-content": "start", left: "0px", transform: "translateX(0)" }), tv = 100 * i, $("article").css({ transform: "translateX(-" + tv + "vw)" }) }), $("input[type=radio][name=is_expert]").on("change", function () { "oui" == this.value ? $(".q2, .q3, .q4").css({ display: "block" }) : $(".q2, .q3, .q4").css({ display: "none" }) }); var is_expert, exp_time, job_type, where, how, why, coordonnees = new Array; function getCoodonnees() { var e = new Array; firstName = $("#firstName").val(), lastName = $("#lastName").val(), phone = $("#phone").val(), email = $("#email").val(), cin = $("#cin").val(); var t = new Array; return t = { firstName: firstName, lastName: lastName, phone: phone, email: email, cin: cin }, $.each(t, function (t, a) { "" == a.trim() && ($("." + t).addClass("mdc-text-field--invalid"), e.push([t, "is empty"])) }), validateEmail(email) || (is_emty = !0, e.push(["email", "is not valide"]), $(".email").addClass("mdc-text-field--invalid")), validatePhone(phone) || (e.push(["phone", "is not valide"]), $(".phone").addClass("mdc-text-field--invalid")), !(e.length > 0) && t } function next() { i++ , trackerUpdate(i), $("header").css({ width: "90px" }), $(".icon").css({ width: "90px", "justify-content": "start", left: "0px", transform: "translateX(0)" }), tv = 100 * i, $("article").css({ transform: "translateX(-" + tv + "vw)" }) } function getEperiences() { var e = !0; return is_expert = $("input[type=radio][name=is_expert]:checked").val(), exp_time = $("input[type=radio][name=exp_time]:checked").val(), job_type = $("#post_id").val(), where = $("#where").val(), "non" == is_expert ? exp_time = job_type = where = "-" : (job_type || ($("#jobType").addClass("mdc-select--invalid"), e = !1), where || ($(".lieu").addClass("mdc-text-field--invalid"), e = !1)), new Array, !!e && { "Avez-vous déjà travaillé dans un centre d’appel?": is_expert, "Pour combien de temps?": exp_time, " Quelle fonction avez-vous assuré?": job_type, "Citez le lieu où vous avez exercé": where } } function getSource() { how = $("#how").val(), (why = $("#why").val()) || (why = "-"); var e = new Array; return e = { "Comment avez-vous pris connaissance de notre centre?": how, "Pourquoi avez-vous choisi notre centre?": why }, console.log("how : " + how), !!how && e } function submitData() { var e = firstName, t = lastName, a = phone; console.log("nome: " + e + " | prenom:" + t + "| telephone:" + a + " | email:" + email); var o = is_expert, n = exp_time, i = job_type, l = where, c = how, s = why; $.ajax({ type: "POST", url: "./inc/insertData.php", data: { cin: cin, nom: e, prenom: t, telephone: a, email: email, experience: o, duree_experience: n, fonction_experience: i, lieu_experience: l, connaissance: c, pourquoi_notoriety: s }, success: function (e) { console.log("data sent with success"), console.log(e), next() }, error: function (e) { console.log("can't send data") } }) } function validateEmail(e) { return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(e) } function validatePhone(e) { return /^\d{10}$/.test(e) } function selectValid(e) { console.log(e.val()) } function play() { document.getElementById("audio").play() } function setCaretPosition(e, t) { if (e.setSelectionRange) e.focus(), e.setSelectionRange(t, t); else if (e.createTextRange) { var a = e.createTextRange(); a.collapse(!0), a.moveEnd("character", t), a.moveStart("character", t), a.select() } } function play() { document.getElementById("audio").play() } function setCaretPosition(e, t) { if (e.setSelectionRange) e.focus(), e.setSelectionRange(t, t); else if (e.createTextRange) { var a = e.createTextRange(); a.collapse(!0), a.moveEnd("character", t), a.moveStart("character", t), a.select() } } $(".tracker .item").on("click", function () { $(this).hasClass("validated") ? (i = $(this).data("value") - 1, console.log(i), trackerUpdate(i), tv = 100 * i, $("article").css({ transform: "translateX(-" + tv + "vw)" })) : alert("IL FAUT REMPLIR CE FORMULAIRE POUR PASSER A L'ETAPE SUIVANTE") }), $("button.next#validatePInfo").on("touch click", function () { console.log(getCoodonnees()), getCoodonnees() ? next() : console.log("some field having err") }), $("button.next#validateEinfo").on("touch click", function () { console.log(getEperiences()), getEperiences() && next() }), $("button.next#validateSinfo").on("touch click", function () { console.log(getSource()), getSource() ? next() : $(".source-select").addClass("mdc-select--invalid"); var e = firstName, t = lastName, a = phone; console.log("nome: " + e + " | prenom:" + t + "| telephone:" + a + " | email:" + email); var o = is_expert, n = exp_time, i = job_type, l = where, c = how, s = why; $("#data_nom").html(e), $("#data_prenom").html(t), $("#data_telephone").html(a), $("#data_email").html(email), $("#data_is_expert").html(o), $("#data_expert_time").html(n), $("#data_job_type").html(i), $("#data_where").html(l), $("#data_how").html(c), $("#data_why").html(s), console.log("experience: " + o + " | duree_experience:" + n + "| fonction_experience:" + i + " | lieu_experience:" + l + "| connaissance:" + c + " | pourquoi_notoriety:" + s) }), $("#keyboard button").on("click", function () { if (play(), $("input.active").focus(), !($("input.active").hasClass("phone") && $("input.active").val().length >= 10) || $(this).hasClass("delete")) if ($(this).hasClass("delete")) document.execCommand("delete"); else { var e = $(this).html(); $(this).hasClass("space") && (e = " "), input = $("input.active")[0], position = input.selectionStart, i_val = $("input.active").val(); var t = [i_val.slice(0, position), e, i_val.slice(position)].join(""); $("input.active").val(t), setCaretPosition(input, position + 1) } }), $("body").on("click", function (e) { console.log(e.target), $(e.target).is(".mdc-text-field__input") && ($("input").removeClass("active"), $(".keyboard").show(100), $(".keyboard").addClass("active"), $(e.target).addClass("active")), $(e.target).is("#keyboard *") ? console.log("you clicked on keyboard") : $(e.target).is("input.active") ? console.log("you clicked on input") : ($("#keyboard").removeClass("active"), $(".keyboard").hide(100), $("input").removeClass("active"), $("input").blur()) }), $("input.mdc-text-field__input").focusin(function () { $("input").removeClass("active"), $(this).hasClass("phone") ? ($(".keyboard").addClass("phone-mode"), $(".keyboard .char button").attr("disabled", !0)) : ($(".keyboard").removeClass("phone-mode"), $(".keyboard .char button").attr("disabled", !1)), $(".keyboard").show(100), $(".keyboard").addClass("active"), $(this).addClass("active") }), $("input[type=button]").on("click", function () { var e = $("#text").prop("selectionStart"), t = $("#text").val(), a = t.substring(0, e), o = t.substring(e, t.length); $("#text").val(a + $(this).val() + o) });