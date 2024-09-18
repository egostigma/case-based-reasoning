var SnippetProfile = function() {
    var e = $("#m_login"),
        i = function(e, i, a) {
            var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
            e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeIn animated"), l.find("span").html(a)
        },
        a = function() {
            e.removeClass("m-login--forget-password"), e.removeClass("m-login--signup"), e.addClass("m-login--signin"), mUtil.animateClass(e.find(".m-login__signin")[0], "flipInX animated")
        },
        l = function() {
            $("#m_login_forget_password").click(function(i) {
                i.preventDefault(), e.removeClass("m-login--signin"), e.removeClass("m-login--signup"), e.addClass("m-login--forget-password"), mUtil.animateClass(e.find(".m-login__forget-password")[0], "flipInX animated")
            }), $("#m_login_forget_password_cancel").click(function(e) {
                e.preventDefault(), a()
            }), $("#m_login_signup").click(function(i) {
                i.preventDefault(), e.removeClass("m-login--forget-password"), e.removeClass("m-login--signin"), e.addClass("m-login--signup"), mUtil.animateClass(e.find(".m-login__signup")[0], "flipInX animated")
            }), $("#m_login_signup_cancel").click(function(e) {
                e.preventDefault(), a()
            })
        };
    return {
        init: function() {
            l(), $("#m_user_edit_submit").click(function(e) {
                e.preventDefault();
                var a = $(this),
                    l = $(this).closest("form");
                l.validate({
                    rules: {
                        username: {
                            required: !0,
                        },
                        email: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0
                        },
                        conf_password: {
                            equalTo: "#password"
                        }
                    }
                }), l.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), l.ajaxSubmit({
                    url: site_url + "users/edit",
                    timeout: 3000,
                    type: "POST",
                    data: $('#form_edit_profile').serialize(),
                    cache: false,
                    dataType: "JSON",
                    success: function(data, jqXHR, textStatus)
                    {
                        if(!data.status)
                            swal({
                                title: "Peringatan!",
                                text: "Profil gagal diubah.",
                                type: "info",
                            }).then(function () {
                                //i(l, "danger", "Username dan/atau password yang anda masukkan salah. Silahkan coba lagi.");
                            },
                            function (dismiss) {
                                if (dismiss) {
                                }
                            });
                        else
                        {
                            swal({
                                title: "Berhasil!",
                                text: "Profil berhasil diubah.",
                                type: "success",
                            }).then(function () {
                                location.href = data.redirect;
                            },
                            function (dismiss) {
                                if (dismiss) {
                                }
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        if (textStatus === 'timeout')
                            swal({
                                title: "Server Connection Timeout!",
                                text: "Tidak dapat menghubungkan ke server, periksa koneksi anda.",
                                type: "warning"
                            }).then(function () {
                            },
                            function (dismiss) {
                                if (dismiss) {
                                    Ladda.stopAll();
                                }
                            });
                        else if (jqXHR.status === 0)
                            swal({
                                title: "Error code: "+jqXHR.status,
                                text: "Tidak dapat menghubungkan ke server, periksa koneksi anda.",
                                type: "warning"
                            }).then(function () {
                            },
                            function (dismiss) {
                                if (dismiss) {
                                }
                            });
                        else
                            swal({
                                title: "Error code: "+jqXHR.status,
                                text: errorThrown,
                                type: textStatus
                            }).then(function () {
                            },
                            function (dismiss) {
                                if (dismiss) {
                                }
                            });
                    },
                    complete: function (e, t, r, s) {
                        a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1);
                    }
                    // success: function(e, t, r, s) {
                    //     setTimeout(function() {
                    //         a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(l, "danger", "Incorrect username or password. Please try again.")
                    //     }, 2e3)
                    // }
                }))
            }), $("#m_login_signup_submit").click(function(l) {
                l.preventDefault();
                var t = $(this),
                    r = $(this).closest("form");
                r.validate({
                    rules: {
                        fullname: {
                            required: !0
                        },
                        email: {
                            required: !0,
                            email: !0
                        },
                        password: {
                            required: !0
                        },
                        rpassword: {
                            required: !0
                        },
                        agree: {
                            required: !0
                        }
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function(l, s, n, o) {
                        setTimeout(function() {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), a();
                            var l = e.find(".m-login__signin form");
                            l.clearForm(), l.validate().resetForm(), i(l, "success", "Thank you. To complete your registration please check your email.")
                        }, 2e3)
                    }
                }))
            }), $("#m_login_forget_password_submit").click(function(l) {
                l.preventDefault();
                var t = $(this),
                    r = $(this).closest("form");
                r.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        }
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function(l, s, n, o) {
                        setTimeout(function() {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), a();
                            var l = e.find(".m-login__signin form");
                            l.clearForm(), l.validate().resetForm(), i(l, "success", "Cool! Password recovery instruction has been sent to your email.")
                        }, 2e3)
                    }
                }))
            })
        }
    }
}();
var upload_wo = !1;
var upload_kfp = !1;
var upload_mtol = !1;
var mDropzone = {
    init: function() {
        Dropzone.options.mDropzoneWo = {
                //autoProcessQueue: false,
                url: site_url + "work_order/import",
                timeout: 0,
                paramName: "file",
                //addRemoveLinks: !0,
                acceptedFiles: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel",
                error: function(file, errorMessage, xhr) {
                    swal("Terjadi Kesalahan!", errorMessage, "error");
                    $("#progress-text-wo").text("Terjadi Kesalahan");
                    $("#progressbar-wo").width(100 + "%");
                    $("#progressbar-text-wo").text(100 + "%");
                },
                processing: function(file) {
                    $("#progress-text-wo").text("Silahkan tunggu, mohon jangan tutup tab atau keluar dari browser anda");
                    $("#progressbar-wo").width(0 + "%");
                    $("#progressbar-text-wo").text(0 + "%");
                },
                uploadprogress: function(file, progress, bytesSent) {
                    if (file.previewElement) {
                        var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
                        progressElement.style.width = progress + "%";
                    }
                },
                success: function(file, response, xhr) {
                    upload_wo = !0;
                    swal("Berhasil!", response.message, "success");
                    $("#progress-text-wo").text("Berhasil");
                    $("#progressbar-wo").width(100 + "%");
                    $("#progressbar-text-wo").text(100 + "%");
                },
                canceled: function(file) {
                    swal("Gagal!", "Upload data dibatalkan", "info");
                    $("#progress-text-wo").text("Gagal");
                    $("#progressbar-wo").width(100 + "%");
                    $("#progressbar-text-wo").text(100 + "%");
                },
                queuecomplete: function(file) {
                    this.removeAllFiles()
                },
            },
            Dropzone.options.mDropzoneKfp = {
                url: site_url + "kfp/import",
                timeout: 0,
                paramName: "file",
                //addRemoveLinks: !0,
                acceptedFiles: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel",
                error: function(file, errorMessage, xhr) {
                    swal("Terjadi Kesalahan!", errorMessage, "error");
                    $("#progress-text-kfp").text("Terjadi Kesalahan");
                    $("#progressbar-kfp").width(100 + "%");
                    $("#progressbar-text-kfp").text(100 + "%");
                },
                processing: function(file) {
                    $("#progress-text-kfp").text("Silahkan tunggu, mohon jangan tutup tab atau keluar dari browser anda");
                    $("#progressbar-kfp").width(0 + "%");
                    $("#progressbar-text-kfp").text(0 + "%");
                },
                uploadprogress: function(file, progress, bytesSent) {
                    if (file.previewElement) {
                        var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
                        progressElement.style.width = progress + "%";
                    }
                },
                success: function(file, response, xhr) {
                    upload_kfp = !0;
                    swal("Berhasil!", response.message, "success");
                    $("#progress-text-kfp").text("Berhasil");
                    $("#progressbar-kfp").width(100 + "%");
                    $("#progressbar-text-kfp").text(100 + "%");
                },
                canceled: function(file) {
                    swal("Gagal!", "Upload data dibatalkan", "info");
                    $("#progress-text-kfp").text("Gagal");
                    $("#progressbar-kfp").width(100 + "%");
                    $("#progressbar-text-kfp").text(100 + "%");
                },
                queuecomplete: function(file) {
                    this.removeAllFiles()
                },
            },
            Dropzone.options.mDropzoneMtol = {
                url: site_url + "mtol/import",
                timeout: 0,
                paramName: "file",
                //addRemoveLinks: !0,
                acceptedFiles: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel",
                error: function(file, errorMessage, xhr) {
                    swal("Terjadi Kesalahan!", errorMessage, "error");
                    $("#progress-text-mtol").text("Terjadi Kesalahan");
                    $("#progressbar-mtol").width(100 + "%");
                    $("#progressbar-text-mtol").text(100 + "%");
                },
                processing: function(file) {
                    $("#progress-text-mtol").text("Silahkan tunggu, mohon jangan tutup tab atau keluar dari browser anda");
                    $("#progressbar-mtol").width(0 + "%");
                    $("#progressbar-text-mtol").text(0 + "%");
                },
                uploadprogress: function(file, progress, bytesSent) {
                    if (file.previewElement) {
                        var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
                        progressElement.style.width = progress + "%";
                    }
                },
                success: function(file, response, xhr) {
                    upload_mtol = !0;
                    swal("Berhasil!", response.message, "success");
                    $("#progress-text-mtol").text("Berhasil");
                    $("#progressbar-mtol").width(100 + "%");
                    $("#progressbar-text-mtol").text(100 + "%");
                },
                canceled: function(file) {
                    swal("Gagal!", "Upload data dibatalkan", "info");
                    $("#progress-text-mtol").text("Gagal");
                    $("#progressbar-mtol").width(100 + "%");
                    $("#progressbar-text-mtol").text(100 + "%");
                },
                queuecomplete: function(file) {
                    this.removeAllFiles()
                },
            }
    }
};
mDropzone.init();
jQuery(document).ready(function() {
    SnippetProfile.init()
});