$(document).on('ready', function () {
    common.run();
    comment.run();
    editstatus.run();
});

var common = {

    likeFunction: function () {

        var socket = io.connect('http://localhost:8890');
        socket.on('like', function (data) {
            data = jQuery.parseJSON(data);

            console.log(data.status_id);
            $(".count-" + data.status_id).text(
                '(' + data.like + ')'
            );
        });

        $(document).on("click", ".like-btn", function (e) {
            e.preventDefault();
            var staid = $(this).closest("form").find("input[name='status_id']").val();
            $.post("/larasocial-master/status/like",
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "status_id": staid
                }, 'json'
            ).done(function (data) {
                // $('.count-'+staid).text('('+data.count_like+')');
                // $('.count-' + staid).val('');
            }).error(function (err) {
                console.log(err);
            });
        });
    },
    run: function () {
        this.likeFunction();
    }
}

var comment = {
    likeCommentFunction: function () {
        var socket = io.connect('http://localhost:8890');
        socket.on('likecm', function (data) {
            data = jQuery.parseJSON(data);
            console.log(data.comment_id);
            $(".count-comment-" + data.comment_id).text(
                '(' + data.likecm + ')'
            );
        });
        $(document).on('click', ".like-comment-btn", function (e) {
            e.preventDefault();
            var cmid = $(this).closest("form").find("input[name='comment_id']").val();
            $.post('/larasocial-master/comment/like',
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "comment_id": cmid
                }, 'json'
            ).done(function (data) {
                // $('.count-comment-'+cmid).text('('+data.count_like+')');
            }).error(function (err) {
                console.log(err);
            });
        });
    },
    run: function () {
        this.likeCommentFunction();
    }
}

var search = {
    search: function () {
        $(document).on('click', '.search-btn', function (e) {
            e.preventDefault();
            var search_text = $(this).closest("form").find("input[name='search_text']").val();
            $.post('/larasocial-master/search',
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "search_text": search_text
                }, 'json'
            ).done(function (markup) {
                $('#result').html(markup);
            }).error(function (err) {
                console.log(err);
            });
        });
    }
}

var editstatus = {
    showeditStatus: function () {
        $(document).on('click', '.btn-edit-status', function (event) {
            event.preventDefault();
            var statusbody = $(this).closest("#post_status").find("#body_status").text();
            var id_of_status = $(this).closest("#post_status").find("input[name='id_of_status']").val();
            console.log(id_of_status);
            $("#area_edit_status").val(statusbody.trim());
            $("#edit_status_id").val(id_of_status);
            $("#editModal").modal('show');
        });
    },

    edit_Status:function () {
        $(document).on('submit', '#edit_status_form', function (event) {
            event.preventDefault();
            var status_body = $(this).closest(".modal-content").find("#area_edit_status").val();
            var edit_status_id = $(this).closest(".modal-content").find("input[name='edit_status_id']").val();
            console.log(status_body);
            $.post('/larasocial-master/edit/article',
                {
                    "edit_status_id": edit_status_id,
                    "area_edit_status": status_body
                }, 'json'

            ).done(function (data) {
                // $('#result').html(markup);
            }).error(function (err) {
                console.log(err);
            });
        });
    }
    ,
    run: function () {
        this.showeditStatus();
        this.edit_Status();
    }
}
