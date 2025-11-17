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
  <div class="container col-12 d-flex justify-content-center align-items-center pt-5">
    <div class="col-11 col-lg-5 d-flex flex-column shadow align-items-center p-5 mt-5 bg-light border border-2 border-dark rounded">
        <div class="d-flex align-items-center col-12 ">
          <img src="{{ url('img/logo.png') }}" width="30px" alt="">
          <h4 class="text-start ms-3">Add Student</h4>
        </div>
        <form action="{{ route('siswa.add') }}" class="mt-5" method="POST">
          @csrf
          <div class="row gy-3 gy-md-4 overflow-hidden">
            <div class="col-12">
              <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="nis" id="nis" maxlength="10" required 
                   placeholder="example: 123XXXXXXX" autocomplete="off">
              <p class="text-secondary" id="criteria" style="font-size: 12px; display: block;" >Input harus berupa angka</p>
              <p class="text-danger" id="notif-false" style="font-size: 12px; display: none;" >Input tidak valid</p>
            </div>
            <div class="col-12">
              <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
              <input type="nama" class="form-control" name="nama" id="nama" value="" required>
            </div>
            <div class="col-12">
              <div class="d-grid">
                <button class="btn bsb-btn-xl fw-bold text-light" id='btn-submit' style="background: #532200;" type="submit">Add</button>
              </div>
              
            @if (session('error'))
              <p class="text-danger">{{ session('error') }}</p>
            @endif
            </div>
          </div>
        </form>
      </div>
    </div>
    @if ($errors->any())


    @endif
    <script>
      document.getElementById('nis').addEventListener('input', function () {
        var input = this.value;
        var sub1 = document.getElementById('criteria');
        var sub2 = document.getElementById('notif-false');
        var btn = document.getElementById('btn-submit');

        if (isNaN(input)) {
          sub2.style.display = 'block'; 
          sub1.style.display = 'none';   
          btn.setAttribute('disabled','')
        } else {
          sub2.style.display = 'none';   
          sub1.style.display = 'block';
          btn.removeAttribute('disabled')
        }
      });
    </script>
</x-layout>