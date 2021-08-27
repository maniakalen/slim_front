<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/all.css" rel="stylesheet" />
</head>
<body>
<div class="col-md-12 menu">
    <div class="pull-right col-md-4 public-menu">
        <a href="#" id="login-button" class="btn btn-link">Login</a> <a href="#" id="logout-button" class="d-none btn btn-link">Logout</a>| <a href="#" id="load-posts" class="btn btn-link">Posts</a>
    </div>
</div>
<div id="root" class="container"></div>
<script src="js/jquery.min.js"></script>
<script src="js/handlebars.js"></script>
<script src="js/script.js"></script>
<script id="post-template" type="text/html">
    {{#each this}}
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <img src="http://localhost:8080/img/{{ photo_name }}" height="200" />
        </div>
        <div class="col-md-8">
            <div class="col-md-12">{{ title }}</div>
            <div class="col-md-12"><sup>{{ updated_at }}</sup></div>
            <div class="col-md-12">{{ content }}</div>
        </div>
    </div>
    {{/each}}
</script>
<script id="post-admin-template" type="text/html">
    {{#each this}}
    <div class="row justify-content-md-center">
        <div class="col-md-2">{{ id }}</div>
        <div class="col-md-2">{{ author_id }}</div>
        <div class="col-md-2">{{ title }}</div>
        <div class="col-md-2">{{ content }}</div>
        <div class="col-md-2">{{ photo_name }}</div>
        <div class="col-md-2"><i class="btn btn-default far fa-edit" data-key="{{ id }}"></i> | <i class="btn btn-default far fa-trash-alt"  data-key="{{ id }}"></i></div>
    </div>
    {{/each}}
    <div class="row justify-content-md-center">
        <div class="col-md-12"><a href="#" id="add-new" class="btn btn-primary">Add new post</a></div>
    </div>
</script>
<script id="post-edit-template" type="text/html">
    <div class="row justify-content-md-center">
        <div class="col-md-12"><a href="#" id="back-to-list">Back to list</a></div>
        <form id="post_edit">
            <div class="form-group row mb-3">
                <div class="col-md-2 "><label class="col-form-label" for="photo_name">Image</label></div>
                <div class="col-md-10">{{#if photo_name}}<img src="http://localhost:8080/img/{{ photo_name }}" height="100"/>{{/if}}<input type="file" name="photo_name" id="photo_name" class="form-control" /></div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-2"><label class="col-form-label" for="title">Title</label></div>
                <div class="col-md-10"><input type="text" value="{{ title }}" class="form-control" name="title" id="title" /></div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-md-2"><label class="col-form-label" for="content">Content</label></div>
                <div class="col-md-10"><textarea class="form-control" name="content" id="content">{{ content }}</textarea></div>
            </div>
            <div class="form-group row">
                <div class="col-md-12"><button id="edit_post" class="btn btn-primary" data-id="{{ id }}">Submit</button></div>
            </div>
        </form>
    </div>
</script>
<script id="login-template" type="text/html">
    <div class="row justify-content-md-center">
        <form>
    <div class="row col-md-4 form-group">
        <div class="col-md-12 mb-3">
            <input id="username" class="form-control" placeholder="Username" />
        </div>
        <div class="col-md-12 mb-3">
            <input id="password" class="form-control" placeholder="Password" />
        </div>
        <div class="col-md-12">
            <button id="login" class="btn btn-primary">Login</button>
        </div>
    </div>
        </form>
    </div>
</script>
</body>
</html>