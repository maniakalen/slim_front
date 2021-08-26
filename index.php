<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Hello World</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<div class="col-md-12">
    <div class="pull-right col-md-4">
        <a href="#">Login</a>
    </div>
</div>
<div id="root" class="container"></div>
<script src="js/jquery.min.js"></script>
<script src="js/handlebars.js"></script>
<script src="js/script.js"></script>
<script id="post-template" type="text/html">
    <div class="row">
        <div class="col-md-4">
            <img src="http://localhost:8080/img/{{ photo_name }}" height="200" />
        </div>
        <div class="col-md-8">
            <div class="col-md-12">{{ title }}</div>
            <div class="col-md-12">{{ content }}</div>
        </div>
    </div>
</script>
</body>
</html>