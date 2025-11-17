

// document.getElementById('submitStudents').addEventListener('click', function (e) {
//     e.preventDefault(); // Mencegah submit form bawaan

//     // Ambil semua checkbox yang dicentang
//     let selectedStudents = [];
//     document.querySelectorAll('input[name="students[]"]:checked').forEach((checkbox) => {
//         selectedStudents.push(checkbox.value);
//     });
//     let bangku = document.getElementById('bangkuTersisa').value


//     // Ambil kelas ID
//     let kelasId = document.querySelector('input[name="id_kelas"]').value;

//     if (selectedStudents.length > 0 && kelasId && selectedStudents.length <= bangku) {
//         // Kirim data menggunakan AJAX
//         fetch('{{ route("siswa.kelas.add") }}', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({ students: selectedStudents, id_kelas: kelasId, jumlah_siswa: much })
//         })
//         .then(response => response.json())
//         .then(data => {
//             alert('Siswa berhasil ditambahkan ke kelas');
//             // Tambahkan logika untuk mengupdate UI jika diperlukan
//         })
//         .catch(error => {
//             console.error('Error:', error);
//             alert('Terjadi kesalahan saat menambahkan siswa');
//         });
//     } else {
//         alert('Siswa yang anda pilih Melebihi batas maksimal.');
//     }
// });
