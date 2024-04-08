'use strict';

const form = document.forms['form-input'];
const formSearch = document.forms['form-search'];

// get all data
const getAll = async () => {
    try
    {
        const f = await fetch(BASE_URL + 'kewirausahaan/get_all');
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
            url: BASE_URL + 'kewirausahaan/get_all'
        },
        pageLength: 10,
        columns: [
            {
                data: 'id',
                visible: false
            },
            {
                data: 'id_siswa',
                visible: false
            },
            {
                data: 'created_at'
            },
            {
                data: 'nama_siswa'
            },
            {
                data: 'program_keahlian'
            },
            {
                data: 'nama_usaha'
            },
            {
                data: 'jenis_usaha'
            },
            {
                data: 'omset'
            },
            {
                data: null,
                render(data, type, row, _meta)
                {
                    const btn = `<span class="d-flex flex-nowrap">
                                <button role="button" class="btn-circle btn-success rounded-circle border-0 edit_data" data="${row.id}"><i class="fas fa-edit"></i></button>
                                <button role="button" class="btn-circle btn-danger rounded-circle border-0 hapus" data="${row.id}"><i class="fas fa-trash"></i></button>
                                </span>`;

                    return btn;
                }
            }
       ],
       "bDestroy": true
    }).columns(4).search($('input[name="id_siswa"]').val()).draw();
    
    console.log($('input[name="id_siswa"]').val())
	// Search submit
    formSearch.addEventListener('submit', e => {
        e.preventDefault();
		
        // if(formSearch['s_member_name'].value)
        tableMain.columns(4).search($('input[name="id_siswa"]').val()).draw();
		tableMain.columns(1).search(formSearch['start_dt'].value).draw();
		tableMain.columns(2).search(formSearch['end_dt'].value).draw();
    });

    /**
     * Simpan data
     */
    $('#save').on('click',  e => {
        $.ajax({
            type: "POST",
            url: BASE_URL+"kewirausahaan/simpan",
            data: {
                id_siswa: $('input[name="id_siswa"]').val(),
                program_keahlian: $('input[name="program_keahlian"]').val(),
                nama_usaha: $('input[name="nama_usaha"]').val(),
                jenis_usaha: $('input[name="jenis_usaha"]').val(),
                nib: $('input[name="nib"]').val(),
                omset: $('input[name="omset"]').val(),
            },
            dataType: "JSON",
            success: function (response) {
                if(response.success){
                    Swal.fire({
                        title: "Sukses!",
                        text: response.message,
                        icon: "success"
                    })

                    setInterval(function(){
                        window.location.reload()
                    }, 1500);
                }
            }
        });
    });


    /** 
     * Delete
     */
    $('#datatb').on('click', 'button.hapus', e => {
        let id = (e.currentTarget.getAttribute('data'))
        $.ajax({
            type: "POST",
            url: BASE_URL+"kewirausahaan/delete",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function (response) {
                if(response.success){
                    Swal.fire({
                            title: "Sukses!",
                            text: response.message,
                            icon: "success"
                        })

                    setInterval(function(){
                        window.location.reload()
                    }, 1500);
                }
            }
        });
    });

    /**
     * Edit
     */
    $('#datatb').on('click', 'tr .edit_data', e => {
        let id = (e.currentTarget.getAttribute('data'))

        $('input[name="program_keahlian"]').val(e.currentTarget.parentNode.parentNode.parentNode.children[2].innerHTML);
        $('input[name="nama_usaha"]').val(e.currentTarget.parentNode.parentNode.parentNode.children[3].innerHTML);
        $('input[name="jenis_usaha"]').val(e.currentTarget.parentNode.parentNode.parentNode.children[4].innerHTML);
        $('input[name="nib"]').val(e.currentTarget.parentNode.parentNode.parentNode.children[5].innerHTML);
        $('input[name="omset"]').val(e.currentTarget.parentNode.parentNode.parentNode.children[6].innerHTML);

        $('#exampleModal').modal('show');
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
