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
    <div class="col-12 d-flex align-items-center justify-content-center" style="min-height: 91.8vh">
        <form action="{{ route('kelas.update', $id) }}" method="POST" class="border border-1 p-5 rounded shadow">
            @csrf
            <label for="" class="h2">Form Class Edit</label>
            <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                    <label for="name" class="form-label">Nama Kelas<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $name->name }}" required>
                </div>
                <div class="col-12">
                    <label for="bangku_tersisa" class="form-label">Jumlah Bangku<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " name="bangku_tersisa" id="bangku_tersisa" maxlength="2" value="{{ $name->rombel }}" required>
                  </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button class="btn bsb-btn-xl fw-bold text-light" style="background: #532200;" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">Change</button>
                    </div>
                </div>
                <x-modal-edit></x-modal-edit>
            </div>
        </form>
    </div>
</x-layout>