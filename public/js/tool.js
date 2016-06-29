$(document).on('ready', function () {
    common.run();
    comment.run();
    showstatus.run();
    showcomment.run();
});

var common = {

    likeFunction: function () {

        var socket = io.connect('http://localhost:8890');
        socket.on('like', function (data) {
            data = jQuery.parseJSON(data);
            if(data.islike == 0) {
                $("#a_like_" + data.status_id).html("Like <i class='fa fa-thumbs-o-up margin-r-5'></i>");
                // console.log(data.status_id);
                $(".count-" + data.status_id).text(
                    '(' + data.like + ')'
                );
            }
            else
            {
                $("#a_like_" + data.status_id).html("</i>Dislike <i class='fa fa-thumbs-o-up margin-r-5'>");
                // console.log(data.status_id);
                $(".count-" + data.status_id).text(
                    '(' + data.like + ')'
                );
            }
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
            // console.log(data.comment_id);

            if(data.islike == 0) {
                $("#a_like_cm_" + data.comment_id).html("Like &nbsp;<i class='fa fa-thumbs-o-up margin-r-5'></i>");
                // console.log(data.status_id);
                $(".count-comment-" + data.comment_id).text(
                    "(" + data.likecm + ")"
                );
            }
            else
            {
                $("#a_like_cm_" + data.comment_id).html("Dislike &nbsp;<i class='fa fa-thumbs-o-up margin-r-5'></i>");
                // console.log(data.status_id);
                $(".count-comment-" + data.comment_id).text(
                    "(" + data.likecm + ")"
                );
            }
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

var showstatus = {
    showeditStatus: function () {
        $(document).on('click', '.btn-edit-status', function (event) {
            event.preventDefault();
            var statusbody = $(this).closest("#post_status").find("#body_status").text();
            var id_of_status = $(this).closest("#post_status").find("input[name='id_of_status']").val();
            console.log(id_of_status);
            $("#area_edit_status").text(statusbody.trim());
            $("#id_edit_status").val(id_of_status);
            $("#editModal").modal('show');
        });
        $(document).on('click', '#saveChangeStatus', function (e) {
            // e.preventDefault();
            var status_body = $(this).closest(".modal-content").find("#area_edit_status").val();
            var id_edit_status = $(this).closest(".modal-content").find("input[name='id_edit_status']").val();
            console.log(status_body);
            $.post('/larasocial-master/edit/article',
                {
                    "id_edit_status": id_edit_status,
                    "area_edit_status": status_body
                }, 'json'
            ).done(function (data) {
                console.log(JSON.stringify(data));
                // $("#post_status").find("#body_status").text(data.newbody);
                $('#editModal').modal('hide');
            }).error(function (err) {
                console.log(err);
            });
        });
    }
    ,
    run: function () {
        this.showeditStatus();
    }
}

var showcomment = {
    showeditComment: function () {
        $(document).on('click', '.btn-edit-comment', function (event) {
            event.preventDefault();
            var commentbody = $(this).closest("#comment-text").find("#body_comment").text();
            var id_of_comment = $(this).closest("#comment-text").find("input[name='id_of_comment']").val();
            // console.log(commentbody);
            $("#area_edit_comment").text(commentbody.trim());
            $("#id_edit_comment").val(id_of_comment);
            $("#editCommentModal").modal('show');
        });
        $(document).on('click', '#saveChangeComment', function (e) {
            // e.preventDefault();
            var comment_body = $(this).closest(".modal-content").find("#area_edit_comment").val();
            var id_edit_comment = $(this).closest(".modal-content").find("input[name='id_edit_comment']").val();
            console.log(comment_body);
            $.post('/larasocial-master/edit/comment',
                {
                    "id_edit_comment": id_edit_comment,
                    "area_edit_comment": comment_body
                }, 'json'
            ).done(function (data) {
                console.log(JSON.stringify(data));
                // $("#post_status").find("#body_status").text(data.newbody);
                $('#editCommentModal').modal('hide');
            }).error(function (err) {
                console.log(err);
            });
        });
    }
    ,
    run: function () {
        this.showeditComment();
    }
}