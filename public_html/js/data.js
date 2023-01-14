//Datatables
$(function () {
    var table = $('#dmmtable').DataTable({
        dom: 'Plfrtip',
        data: libraries,
        columns: [
            { "data": "library" }, //0
            { "data": "website" }, //1
            { "data": "quantity" }, //2
            { "data": "iiif" }, //3
            { "data": "copyright" }, //4
            { "data": "is_free_cultural_works_license" }, //5
            { "data": "nation" }, //6
            { "data": "city" }, //7
            { "data": "lat" }, //8
            { "data": "lng" }, //9
            { "data": "website" }, //10
            { "data": "library_name_slug" },
        ],

        responsive: true,
        searchPanes: true,
        searchPanes: {
            threshold: 1,
            initCollapsed: true
        },

        columnDefs: [
            {
                targets: [4, 6, 7, 8, 9],
                visible: false,
                searchable: true
            },
            {
                targets: [8, 9],
                visible: false,
                searchable: false
            },
            {
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: 1
            },
            {
                targets: [3, 5],
                render: function (data) {

                    if (data === 1) {
                        return "<p style='display:none'>yes</p><i class='fas fa-2x fa-check-circle text-success'></i>";

                    }
                    else {
                        return "<p style='display:none'>no</p><i class='fas fa-2x fa-times-circle text-danger'></i>";
                    }
                }
            },
            {
                targets: 10,
                render: function (data, type, row, meta) {
                    return '<a class="btn btn-primary" href="' + row['library_name_slug'] + '" role="button"><i class="fas fa-search-plus"></i> Explore</a>';
                }
            },
            {
                targets: 11,
                render: function (data, type, row, meta) {
                    if (row['has_post'] === 1) {
                        return '<a href="' + row['post_url'] + '" role="button">Read <sup><i class="fas fa-external-link-alt"></i></sup></a>';
                    }
                    else {
                        return '<p class="text-dark">No post available</p>';
                    }
                },
            },
            {
                targets: 1,
                render: function (data, type, row, meta) {
                    return '<a class="btn btn-success" href="' + row['website'] + '" role="button"><i class="fas fa-link"></i> Digitized manuscripts <sup><i class="fas fa-external-link-alt"></i></sup></a>';

                }
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [4, 8, 9, 10, 11]
            },
            {
                searchPanes: {
                    viewCount: false
                },
                targets: [0],
            }
        ],

        fnInitComplete : function() {
            $("#spinner").hide();
         }

    });
    table.searchPanes.container().prependTo(table.table().container());
    table.searchPanes.resizePanes();
});