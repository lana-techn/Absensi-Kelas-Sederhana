<x-layout>
    @if ($errors->any())
    <div class="alert alert-danger position-fixed">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
      const alert = document.querySelector('.alert');
      setTimeout(() => {
        alert.style.display = 'none';
      }, 3000);
    </script>
  @endif
    <div class="w-100 d-flex align-items-center justify-content-center mt-5">
        <section class="p-3 p-md-4 p-xl-5 col-11 bg-lightgit  col-md-5 shadow border border-1 rounded border-dark">
            <label for="" class="h3">Edit Form</label>
            <div class="container">
            <div class="row">
                <div class="col-12 bsb-tpl-bg-lotion">
                    <form action="{{ route('siswa.update',$nis) }}" method="GET">
                        @csrf
                        <div class="row gy-3 gy-md-4 overflow-hidden">
                            <div class="col-12">
                                <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
                                <input type="nis" class="form-control" disabled readonly name="nis" id="nis" value="{{ $nis }}" required>
                            </div>
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="nama" class="form-control"  name="nama" id="nama" value="{{ $nama }}" required>
                            </div>
                            <div class="col-12">
                                <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                                <select name="kelas_id" id="Kelas" class="form-control">
                                    <option value="null">--Pilih Kelas--</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn bsb-btn-xl fw-bold text-light" style="background: #532200;" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Change</button>
                                </div>
                            </div>
                            <x-modal-edit></x-modal-edit>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </section>
  </x-layout>