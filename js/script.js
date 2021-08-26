$(document).ready(function() {
    let backend = "http://localhost:8080";
    let token = null;
    let post = Handlebars.compile($('#post-template').html());
    let postAdmin = Handlebars.compile($('#post-admin-template').html());
    let container = $('#root');
    let loadPosts = function() {
        $.get('http://localhost:8080/posts', function (data) {
            container.html(post(data));
        });
    }
    loadPosts();
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
                loadPostsForEdit();
            }
        });
    });
    let loadPostsForEdit = function() {
        $.get('http://localhost:8080/posts', function (data) {
            container.html(postAdmin(data));
        });
    };
});