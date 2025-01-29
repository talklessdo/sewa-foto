<x-layout>
    @php
        $no = 1;
    @endphp
    <style>

        .modal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.4);
          padding-top: 60px;
        }
        .modal-content {
          background-color: #fff;
          margin: 5% auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
          max-width: 500px;
        }
        .modal-header {
          font-size: 20px;
          margin-bottom: 10px;
        }
        .modal-body {
          margin-bottom: 20px;
        }
        .modal-footer {
          text-align: right;
        }
        .form-group {
          margin-bottom: 15px;
        }
        label {
          display: block;
          margin-bottom: 5px;
        }
        input, select {
          width: 100%;
          padding: 8px;
          box-sizing: border-box;
        }
        /* button {
          padding: 10px 20px;
          background-color: #007bff;
          color: white;
          border: none;
          cursor: pointer;
          width: 100px;
        } */
        .error {
          color: red;
          font-size: 14px;
          margin-top: 5px;
        }
      </style>
      
<div class="row pt-3">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Akun</h3>
            <div class="card-tools">
                <button type="button" id="openModalBtn" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Akun</button>
              </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
            <thead>
                <tr >
                    <th style="width: 5%">No</th>
                    <th style="width: 35%">Nama</th>
                    <th style="width: 25%">Email</th>
                    <th style="width: 15%">Role</th>
                    <th style="width: 20%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td><span class="tag tag-success">{{ $item->role }}</span></td>
                        <td>
                            <div class="text-center">
                                <button type="button" data-kode="" onclick="detail(this)" class="btn btn-warning"><i class="fa fa-eye"></i> Lihat</button>
                                <button type="button" data-id="{{ $item->id }}" onclick="hapus(this)" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
{{-- modal --}}
      <div id="formModal" class="modal">
        <div class="modal-content">
          <div class="modal-header">
              <h2>Tambah Akun</h2>
            <span id="closeModalBtn" style="cursor: pointer;">&times;</span>
          </div>
          <div class="modal-body">
            <form id="myForm" method="post" action="/add_akun">
                @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" >
                <div class="error" id="nameError"></div>
              </div>
      
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <div class="error" id="emailError"></div>
              </div>
      
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" >
                <div class="error" id="addressError"></div>
              </div>
      
              <div class="form-group">
                <label for="phone">Phone (12 digits)</label>
                <input type="text" id="phone" name="phone"  maxlength="12">
                <div class="error" id="phoneError"></div>
              </div>
      
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" >
                <div class="error" id="passwordError"></div>
              </div>

              <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role">
                  <option value="">Select Role</option>
                  <option value="editor">Editor</option>
                  <option value="customer">Customer</option>
                  <option value="fotografer">Fotografer</option>
                </select>
                <div class="error" id="roleError"></div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- end modal --}}
    <script>
        function hapus(data){
            var id = $(data).attr('data-id');
            alert(id);
        }

        function tambah(){
            window.location.href = '/form_akun';
        }

         // Open Modal
        const openModalBtn = document.getElementById("openModalBtn");
        const formModal = document.getElementById("formModal");
        const closeModalBtn = document.getElementById("closeModalBtn");

        openModalBtn.addEventListener("click", function() {
            formModal.style.display = "block";
        });

        closeModalBtn.addEventListener("click", function() {
            formModal.style.display = "none";
        });

        window.onclick = function(event) {
            if (event.target === formModal) {
            formModal.style.display = "none";
            }
        };

        // Form Validation and Submission
        document.getElementById("myForm").addEventListener("submit", function(e) {
            e.preventDefault();

            let isValid = true;
            // Clear previous errors
            document.querySelectorAll(".error").forEach(error => error.textContent = "");

            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const address = document.getElementById("address").value;
            const phone = document.getElementById("phone").value;
            const password = document.getElementById("password").value;
            const role = document.getElementById("role").value;

            // Name validation
            if (!name || name.length < 3) {
            isValid = false;
            document.getElementById("nameError").textContent = "Minimal 3 karakter";
            }

            // Email validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailPattern.test(email)) {
            isValid = false;
            document.getElementById("emailError").textContent = "Masukkan email yang valid";
            }

            // Address validation
            if (!address || address.length < 10) {
            isValid = false;
            document.getElementById("addressError").textContent = "Minumal 10 Karakter";
            }

            // Phone validation
            if (!phone || phone.length !== 12 || !/^\d+$/.test(phone)) {
            isValid = false;
            document.getElementById("phoneError").textContent = "Hanya menerima angka sebanyak 12 digit";
            }

            // Password validation
            if (!password || password.length < 8) {
            isValid = false;
            document.getElementById("passwordError").textContent = "Password must be at least 8 characters long.";
            }

            // Role validation
            if (!role) {
            isValid = false;
            document.getElementById("roleError").textContent = "Pilih salah satu";
            }

            if (isValid) {
            // Display success message
            formModal.style.display = "none";
            document.getElementById("myForm").submit();
            // alert(`Form submitted successfully!\n\nName: ${name}\nEmail: ${email}\nAddress: ${address}\nPhone: ${phone}\nRole: ${role}`);

            }
        });
    </script>
    <!-- /.row -->
</x-layout>