var TableAjax = function () {
    var initPickers = function () {
        //init date pickers
        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            autoclose: true
        });
    }

    var bindDetails = function() {
        // Add event listener for opening and closing details
        $('#datatable_ajax').on('click', '.view-detail', function () {
            var tr = $(this).closest('tr');
            var voucherId = $(tr).find('td:eq(2) span').data('voucherid');
            console.log('View detail clicked, voucherId = ' + voucherId);

            if ($(tr).hasClass('shown')) {
                // The row is already open - close it
                $(tr).next('.voucher-detail').remove();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                var trDetail = $('<tr class="voucher-detail" data-voucherid="' + voucherId + '"><td></td><td class="datatdv" colspan="8"></td></tr>').insertAfter($(this).closest('tr'));
                $(trDetail).insertAfter($(tr));
                openChildRow(trDetail, tr, voucherId);
            }
        });

        $('#datatable_ajax').on('click', '.updateVoucherConfig', function () {
            var tr = $(this).closest('tr');
            submitVoucherDetail(tr);
        });
    }

    var submitVoucherDetail = function(tr) {
        var voucherId = $(tr).data('voucherid');
        console.log('Submit voucher detail clicked, voucherId = ' + voucherId);

        var data = getConfigData(tr); 

        $.ajax({
            url: 'demo/voucher_detail.php',
            data: data,
            success: function (response) {
                alert('Voucher was updated.');
            }
        });
    }

    var getConfigData = function(tr) {
        var virtualRestaurantIds = [];
        $($(tr).find('.select2-vrs').val()).each(function(i, v){
            virtualRestaurantIds[i] = v;
        });        

        var minimumOrderAmount = $(tr).find('.MinimumOrderAmount').val();

        var isEnabled = $(tr).find('.IsEnabled').is(':checked');
        var isReusable = $(tr).find('.IsReusable').is(':checked');
        var isUsedUp = $(tr).find('.IsUsedUp').is(':checked');
        var isValidForPickupOrders = $(tr).find('.IsValidForPickupOrders').is(':checked');
        var isValidForDeliveryOrders = $(tr).find('.IsValidForDeliveryOrders').is(':checked');
        var isValidForCardOrders = $(tr).find('.IsValidForCardOrders').is(':checked');
        var isValidForCashOrders = $(tr).find('.IsValidForCashOrders').is(':checked');
        var isValidForFirstOrderOnly = $(tr).find('.IsValidForFirstOrderOnly').is(':checked');
        var isValidOncePerCustomer = $(tr).find('.IsValidOncePerCustomer').is(':checked');
        var autoApply = $(tr).find('.AutoApply').is(':checked');

        var data = {
            virtualRestaurantIds: virtualRestaurantIds,
            minimumOrderAmount: minimumOrderAmount,
            isEnabled: isEnabled,
            isReusable: isReusable,
            isUsedUp: isUsedUp,
            isValidForPickupOrders: isValidForPickupOrders,
            isValidForDeliveryOrders: isValidForDeliveryOrders,
            isValidForCardOrders: isValidForCardOrders,
            isValidForCashOrders: isValidForCashOrders,
            isValidForFirstOrderOnly: isValidForFirstOrderOnly,
            isValidOncePerCustomer: isValidOncePerCustomer,
            autoApply: autoApply,
        }

        return data;
    }

    var openChildRow = function (trDetail, tr, voucherId) {
        $.ajax({
            url: 'demo/voucher_detail.php',
            data: {
                "voucherId": voucherId
            },
            success: function (data) {
                trDetail.find('td.datatdv').html(data);
                $(".select2-vrs").select2({
                    selectOnBlur: true
                });                   
                tr.addClass('shown');
            }
        });
    }

    var setEditables = function() {
        $('.vcodeedit, .descedit, .amountedit').editable({

        });

        $('.dateedit').editable({
            format: 'yyyy-mm-dd',    
            viewformat: 'dd/mm/yyyy',    
            datepicker: {
                weekStart: 1
           }
        });

        $('.typeedit').editable({
            source: [
                {value: 1, text: 'Percentage Discount'},
                {value: 2, text: 'Lump Discount'},
                {value: 3, text: 'Credit Note'}
            ],
            success: function(response, newValue) {
                var tr = $(this).closest('tr');
                newValue = 1;
                var descr = response.Description;
                if (newValue == 1)
                {
                    $(tr).find('.eurosign').hide();
                    $(tr).find('.percentsign').show();
                    var descEl = $(tr).find('.descedit');
                    var amount = $(tr).find('.amountedit').html();
                    $(descEl).editable('setValue',amount + "% OFF");
                    // todo use values from server
                }
            }
        });
        
    }

    var handleRecords = function () {

        var grid = new Datatable();

        grid.init({
            src: $("#datatable_ajax"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
                console.log('onSuccess');
            },
            onError: function (grid) {
                // execute some code on network or other general error
                console.log('onError');  
            },
            onDataLoad: function(grid) {
                // execute some code on ajax data load
                console.log('onDataLoad');
                setEditables();
            },
            loadingMessage: 'Loading...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js). 
                // So when dropdowns used the scrollable div should be removed. 
                //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",
                
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

                "lengthMenu": [
                    [10, 20, 50, 100, 150, -1],
                    [10, 20, 50, 100, 150, "All"] // change per page values here
                ],
                "pageLength": 10, // default record count per page
                "ajax": {
                    "url": "demo/table_ajax.php", // ajax source
                },
                "order": [
                    [1, "asc"]
                ]// set first column as a default sort by asc
            }
        });

        // handle group actionsubmit button click
        grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
            e.preventDefault();
            var action = $(".table-group-action-input", grid.getTableWrapper());
            if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
                grid.setAjaxParam("customActionType", "group_action");
                grid.setAjaxParam("customActionName", action.val());
                grid.setAjaxParam("id", grid.getSelectedRows());
                grid.getDataTable().ajax.reload();
                grid.clearAjaxParams();
            } else if (action.val() == "") {
                Metronic.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'Please select an action',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });
            } else if (grid.getSelectedRowsCount() === 0) {
                Metronic.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'No record selected',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {

            initPickers();
            bindDetails();
            handleRecords();
        }

    };

}();