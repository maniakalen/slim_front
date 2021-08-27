$(document).ready(function() {
    let backend = "http://localhost:8080";
    let token = null;
    let post = Handlebars.compile($('#post-template').html());
    let postAdmin = Handlebars.compile($('#post-admin-template').html());
    let editForm = Handlebars.compile($('#post-edit-template').html());
    let container = $('#root');
    let loadPosts = function() {
        $.get('http://localhost:8080/posts', function (data) {
            container.html(post(data));
        });
    }
    loadPosts();
    let loadPostsForEdit = function() {
        $.get('http://localhost:8080/posts', function (data) {
            container.html(postAdmin(data));
        });
    };
    $('body').on('click', '#load-posts', loadPosts)
        .on('click', '#login-button', function(e) {
            let login = Handlebars.compile($('#login-template').html());
            container.html(login());
            return false;
        }).on('click', 'button#login', function(e) {
            let username = $('#username').val();
            let password = $('#password').val();
            $.ajax({
                "method":"POST",
                "url" : backend + "/user/login",
                "data": JSON.stringify({"username":username, "password":password}),
                "contentType": "application/json"
            }).done(function(data) {
                if (data.success && typeof data.body !== "undefined") {
                    token = data.body;
                    $('#login-button').addClass('d-none');
                    $('#logout-button').removeClass('d-none');
                    loadPostsForEdit();
                }
            });
            return false;
        }).on('click', '#logout-button', function() {
            $.ajax({
                url: backend + '/user/logout',
                type: 'POST',
                contentType: "application/json",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader ("Authorization", "Bearer " + token);
                }
            }).done(function(data) {
                if (data.success) {
                    token = null;
                    $('#logout-button').addClass('d-none');
                    $('#login-button').removeClass('d-none');
                    loadPosts();
                }
            });
            return false;
        }).on('click', 'i.fa-edit', function(e) {
            let id = $(e.target).data('key');
            $.get(backend + "/post/" + id).done(function(data) {
                if (data.success) {
                    container.html(editForm(data.body));
                }
            });
        }).on('click', '#back-to-list', loadPostsForEdit)
        .on('click', '#edit_post', function(e) {
            let target = $(e.target);
            let fd = new FormData();
            let files = $('#photo_name')[0].files[0];
            fd.append('image', files);
            $.ajax({
                url: backend + '/file/upload',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function (xhr) {
                    xhr.setRequestHeader ("Authorization", "Bearer " + token);
                }
            }).done(function(data) {
                if (data.success) {
                    let id = $(target).data('id');
                    if (id) {
                        $.ajax({
                            url: backend + '/post/' + $(target).data('id'),
                            type: 'PUT',
                            data: JSON.stringify({
                                "title": $('input#title').val(),
                                "content": $('textarea#content').val(),
                                "photo_name": data.body[0]
                            }),
                            contentType: "application/json",
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader("Authorization", "Bearer " + token);
                            }
                        }).done(function (data) {
                            if (data.success) {
                                loadPostsForEdit();
                            }
                        });
                    } else {
                        $.ajax({
                            url: backend + '/posts',
                            type: 'POST',
                            data: JSON.stringify({
                                "title": $('input#title').val(),
                                "content": $('textarea#content').val(),
                                "photo_name": data.body[0]
                            }),
                            contentType: "application/json",
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader("Authorization", "Bearer " + token);
                            }
                        }).done(function (data) {
                            if (data.success) {
                                loadPostsForEdit();
                            }
                        });
                    }
                }
            });
            return false;
        }).on('click', '#add-new', function() {
            container.html(editForm({"title":"", "content":"", "photo_name":""}));
        }).on('click', '.fa-trash-alt', function(e) {
            let id = $(e.target).data('key');
            $.ajax({
                url: backend + '/post/' + id,
                type: 'DELETE',
                contentType: "application/json",
                beforeSend: function (xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + token);
                }
            }).done(function (data) {
                if (data.success) {
                    loadPostsForEdit();
                }
            });
        });

});