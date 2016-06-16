
$(document).on('ready',function(){
    common.run();
    comment.run();
    editstatus.run();
});

var common = {
    likeFunction: function(){
        $(document).on('click','.like-btn',function (e) {
            e.preventDefault();
            var staid = $(this).closest("form").find("input[name='status_id']").val();
            $.post('/larasocial-master/status/like',
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "status_id" : staid
                },'json'
            ).done(function (data) {
                $('.count-'+staid).text('('+data.count_like+')');
            }).error(function (err) {
                console.log(err);
            });
        });
    },
    run: function(){
        this.likeFunction();
    }
}

var comment = {
    likeCommentFunction: function(){
        $(document).on('click','.like-comment-btn',function (e) {
            e.preventDefault();
            var cmid = $(this).closest("form").find("input[name='comment_id']").val();
            $.post('/larasocial-master/comment/like',
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "comment_id" : cmid
                },'json'
            ).done(function (data) {
                $('.count-comment-'+cmid).text('('+data.count_like+')');
            }).error(function (err) {
                console.log(err);
            });
        });
    },
    run: function(){
        this.likeCommentFunction();
    }
}

var editstatus = {
    editStatus: function () {
        $(document).on('click','.btn-edit-status',function (event) {
            event.preventDefault();
            var statusbody = event.target.parentNode.parentNode.parentNode.childNodes[2].textContent;
            console.log(statusbody);
            $('#textareastatus').val(statusbody);
            $("#editModal").modal('show');
        });
    },
    run: function () {
        this.editStatus();
    }
}