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
        <a href="#" id="login-button">Login</a> | <a href="#" id="load-posts">Posts</a>
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
</script>
<script id="login-template" type="text/html">
    <div class="row justify-content-md-center">
        <form>
    <div class="row col-md-4 form-group">
        <div class="col-md-12">
            <input id="username" class="form-control" placeholder="Username" />
        </div>
        <div class="col-md-12">
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