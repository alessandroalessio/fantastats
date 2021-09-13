require('./bootstrap');

require('alpinejs');


$(document).ready( function () {
    $('#view-player-stats-datatable').DataTable({
        "ajax": {
            "url": "/api/player-stats-data",
            "dataSrc": ""
        },
        "columns": [
            { data: "role" },
            { data: "name", render: function(data, type, row){
                if (type === 'display') {
                    return '<a href="' + row.url + '">' + data + '</a>';
                }
                return data;
            } },
            { data: "team" },
            { data: "pg" },
            { data: "mv" },
            { data: "mf" },
            { data: "gt" },
            { data: "gf" },
            { data: "gs" },
            { data: "rp" },
            { data: "rc" },
            { data: "rf" },
            { data: "rs" },
            { data: "ass" },
            { data: "amm" },
            { data: "esp" },
            { data: "au" }
        ]
    });
    if ( $('#view-single-player-stats-datatable') ) {
        let fid = $('#player-fid').val();
        $('#view-single-player-stats-datatable').DataTable({
            "ajax": {
                "url": "/api/single-player-stats-data/"+fid,
                "dataSrc": ""
            },
            "columns": [
                { data: "pg" },
                { data: "mv" },
                { data: "mf" },
                { data: "gf" },
                { data: "gs" },
                { data: "rp" },
                { data: "rc" },
                { data: "rf" },
                { data: "rs" },
                { data: "ass" },
                { data: "amm" },
                { data: "esp" },
                { data: "au" }
            ]
        });
    }
});