document.querySelectorAll('.btn_edit').forEach((btnEdit, index) => {
    const btnChange = document.getElementById('btn_change_' + index);

    btnEdit.addEventListener('click', function(){
        btnEdit.style.display = 'none';
        btnChange.style.display = 'flex';  // Tampilkan tombol 'Change' (bisa juga 'block')
    });

    // Jika ingin menambahkan fungsionalitas untuk mengubah kembali ke tombol edit:
    btnChange.querySelectorAll('form').forEach((form) => {
        form.addEventListener('submit', function() {
            btnChange.style.display = 'none';
            btnEdit.style.display = 'block'; // Kembali ke tombol 'Edit' setelah submit
        });
    });
});
