require('./bootstrap');

require('alpinejs');


$(document).ready( function () {
    if ( $('#view-player-stats-datatable') ) {
        let view_players_stats_table = $('#view-player-stats-datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/it_it.json"
            },
            "ajax": {
                "url": "/api/player-stats-data",
                "dataSrc": ""
            },
            "pageLength": 25,
            "columns": [
                { data: "role", className: "text-center" },
                { data: "name", render: function(data, type, row){
                    if (type === 'display') {
                        return '<a href="' + row.url + '">' + data + '</a>';
                    }
                    return data;
                } },
                { data: "team", className: "text-center" },
                { data: "pg", className: "text-center" },
                { data: "mv", className: "text-center" },
                { data: "mf", className: "text-center" },
                { data: "gt", className: "text-center" },
                { data: "gf", className: "text-center" },
                { data: "gs", className: "text-center" },
                { data: "rp", className: "text-center" },
                { data: "rc", className: "text-center" },
                { data: "rf", className: "text-center" },
                { data: "rs", className: "text-center" },
                { data: "ass", className: "text-center" },
                { data: "amm", className: "text-center" },
                { data: "esp", className: "text-center" },
                { data: "au", className: "text-center" }
            ]
        });
        $('.filter-position').bind('click', function(event){
            event.preventDefault();
            view_players_stats_table.ajax.url( "/api/player-stats-data?role=" + $(this).attr('data-role')  ).load();
        });
    }
    if ( $('#view-single-player-stats-datatable') ) {
        let fid = $('#player-fid').val();
        $('#view-single-player-stats-datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/it_it.json"
            },
            "ajax": {
                "url": "/api/single-player-stats-data/"+fid,
                "dataSrc": ""
            },
            "columns": [
                { data: "year" },
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
    }
});