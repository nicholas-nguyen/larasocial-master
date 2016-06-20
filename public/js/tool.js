
$(document).on('ready',function(){
    common.run();
    comment.run();
    editstatus.run();
});

var common = {
    
    likeFunction: function(){
        var socket = io.connect('http://localhost:8890');
        socket.on('like', function (data) {
            data = jQuery.parseJSON(data);
            console.log(data);
            if(data.status_id == $("input[name='status_id']").val()) {
                $(".count-"+$("input[name='status_id']").val()).text(
                    '('+data.like+')'
                );
            }
        });
        $(document).on('click','.like-btn',function (e) {
            e.preventDefault();
            var staid = $(this).closest("form").find("input[name='status_id']").val();
            $.post('/larasocial-master/status/like',
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "status_id" : staid
                },'json'
            ).done(function (data) {
                // $('.count-'+staid).text('('+data.count_like+')');
                //  $('.count-'+staid).val('');
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
        var socket = io.connect('http://localhost:8890');
        socket.on('likecm', function (data) {
            data = jQuery.parseJSON(data);
            console.log(data);
            if(data.comment_id == $("input[name='comment_id']").val()) {
                $(".count-comment-"+$("input[name='comment_id']").val()).text(
                    '('+data.likecm+')'
                );
            }
        });
        $(document).on('click','.like-comment-btn',function (e) {
            e.preventDefault();
            var cmid = $(this).closest("form").find("input[name='comment_id']").val();
            $.post('/larasocial-master/comment/like',
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "comment_id" : cmid
                },'json'
            ).done(function (data) {
                // $('.count-comment-'+cmid).text('('+data.count_like+')');
            }).error(function (err) {
                console.log(err);
            });
        });
    },
    run: function(){
        this.likeCommentFunction();
    }
}

var search = {
    search: function () {
        $(document).on('click','.search-btn',function (e) {
            e.preventDefault();
            var search_text = $(this).closest("form").find("input[name='search_text']").val();
            $.post('/larasocial-master/search',
                {
                    "_token": $(this).closest("form").find("input[name='_token']").val(),
                    "search_text" : search_text
                },'json'
            ).done(function (markup) {
                $('#result').html(markup);
            }).error(function (err) {
                console.log(err);
            });
        });
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