require('./bootstrap');

require('alpinejs');


$(document).ready( function () {
    $('#view-player-stats-datatable').DataTable({
        "ajax": {
            "url": "/api/player-stats-data",
            "dataSrc": ""
        },
        "columns": [
            { "data": "role" },
            { "data": "name" },
            { "data": "team" },
            { "data": "pg" },
            { "data": "mv" },
            { "data": "mf" },
            { "data": "gf" },
            { "data": "gs" },
            { "data": "rp" },
            { "data": "rc" }
        ]
    });
});