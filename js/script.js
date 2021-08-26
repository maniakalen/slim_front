$(document).ready(function() {
    let post = Handlebars.compile($('#post-template').html());
    $.get('http://localhost:8080/posts', function(data) {
        let container = $('#root');
        data.forEach(function(item) { container.append(post(item)); })
    });
});