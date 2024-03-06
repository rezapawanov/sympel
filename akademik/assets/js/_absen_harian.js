'use strict';

const form = document.forms['form-input'];
const formSearch = document.forms['form-search'];

// get all data
const getAll = async () => {
    try
    {
        const f = await fetch(BASE_URL + 'absen/get_all_absen_harian');
        const j = await f.json();

        return j;
    }   
    catch(err)
    {
        console.log(err);
    }    
}

// INIT

(async ($) => {
    const allData = await getAll();

    // Datatable
    const tableMain = $('#datatb').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: BASE_URL + 'absen/get_all_paginated_absen_harian'
        },
        pageLength: 10,
        columns: [
            {
                data: 'id_absen',
                visible: false
            },
            {
                data: 'tanggal_absen'
            },
            {
                data: 'nama_siswa'
            },
            {
                data: 'nama_kelas'
            },
            {
                data: 'masuk',
                render(data, type, row, _meta){
                    let time = new Date(data);

                    let minutes = time.getMinutes();
                    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;

                    let hours = time.getHours();
                    const formattedHours = hours < 10 ? '0' + hours : hours; 

                   return `${formattedHours}:${formattedMinutes}`;
                }
            },
            {
                data: 'keluar',
                render(data, type, row, _meta){
                    let time = new Date(data);

                    let minutes = time.getMinutes();
                    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;

                    let hours = time.getHours();
                    const formattedHours = hours < 10 ? '0' + hours : hours; 

                   return `${formattedHours}:${formattedMinutes}`;
                }
            },
            
            {
                data: null,
                render(data, type, row, _meta)
                {
                    const btn = '<span class="d-flex flex-nowrap">' +
                                '<button role="button" class="btn-circle btn-success rounded-circle border-0 edit_data"><i class="fas fa-edit"></i></button>' + 
                                '<button role="button" class="btn-circle btn-danger rounded-circle border-0 delete_data"><i class="fas fa-trash"></i></button>' + 
                                '</span>';

                    return btn;
                }
            }
       ],
       "bDestroy": true
    });
    
	// Search submit
    formSearch.addEventListener('submit', e => {
        e.preventDefault();
		
        // if(formSearch['s_member_name'].value)
		tableMain.columns(1).search(formSearch['start_dt'].value).draw();
		tableMain.columns(2).search(formSearch['end_dt'].value).draw();
    });

	// search reset
	formSearch.addEventListener('reset', e => {
		e.preventDefault();
		tableMain.columns(1).search('').draw();
		formSearch['s_member_name'].value = '';

		tableMain.columns(2).search('').draw();
		formSearch['s_card_number'].value = '';

		tableMain.columns(3).search('').draw();
		formSearch['s_no_induk'].value = '';

	});

})(jQuery);

const loading = () => {
    Swal.fire({
        html: 	'<div class="d-flex flex-column align-items-center">'
        + '<span class="spinner-border text-primary"></span>'
        + '<h3 class="mt-2">Loading...</h3>'
        + '<div>',
        showConfirmButton: false,
        width: '10rem'
    });
}

// Prevent Automatic Submit when press enter
window.addEventListener('keypress', e => {
    const el = e.target;

    if(e.code.toLowerCase() == 'enter')
        e.preventDefault();
});
