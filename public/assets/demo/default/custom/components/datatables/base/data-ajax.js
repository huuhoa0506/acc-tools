//== Class definition

var DatatableRemoteAjaxDemo = function () {
	//== Private functions

	// 
	var options = {
		data: {
			type: 'remote',
			source: {
				read: {
					method: 'GET',
					url: 'http://acctools.local/xhr/users',
				}
			},
			pageSize: 10, // display 20 records per page
			saveState: {
				cookie: true,
				webstorage: true
			},
			serverPaging: true,
			serverFiltering: false,
			serverSorting: true
		},
		columns: [{
	        field: "id",
	        title: "ID",
	        locked: {left: 'xl'},
	        sortable: false,
	        width: 40,
	    }, {
	        field: "image",
	        title: "Avatar",
	        locked: {left: 'xl'},
	        sortable: false,
	        width: 50,
	        template: function(row){
	        	return "<img width=\"50\" height=\"50\" src=\""+row.image.encoded+"\"/>";
	        }
	    }, {
	        field: "name",
	        title: "Name",
	        sortable: 'asc',
	        filterable: false,
	        width: 150,
	        responsive: {visible: 'lg'},
	        locked: {left: 'xl'},
	    }, {
	        field: "email",
	        title: "Email",
	        width: 150,
	        overflow: 'visible',
	    }, {
	        field: "phone",
	        title: "Phone",
	        width: 150,
	        overflow: 'visible',
	    }]
	};




	var datatable_ini = function () {
		datatable = $('.m_datatable').mDatatable(options);
	};

	return {
		// public functions
		init: function () {
			datatable_ini();
		}
	};
}();

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

jQuery(document).ready(function () {
	DatatableRemoteAjaxDemo.init();
});