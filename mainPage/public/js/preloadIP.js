$.getJSON('http://ip-api.com/json', function (data) {
    let t = JSON.parse((JSON.stringify(data, null, 2)));
    $('#ipp').val(t["query"]);
});